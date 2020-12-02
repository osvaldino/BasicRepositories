<?php

namespace App\Repositories;

use App\Exceptions\RepositoryException;
use Auth;
use Exception;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseRepository
{
    use Traits\DeleteTrait;
    use Traits\GetsTrait;
    use Traits\RestoreTrait;
    use Traits\StoreTrait;
    use Traits\UpdateTrait;

    abstract public function model();

    protected $model;

    public function getModel()
    {
        return $this->model;
    }

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    public function withTrashed()
    {
        if (!in_array(SoftDeletes::class, class_uses($this->model))) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\SoftDeletes");
        }
        $this->model = $this->makeModel()->withTrashed();

        return $this;
    }

    public function withoutTrashed()
    {
        $this->model = $this->makeModel();

        return $this;
    }

    public function onlyTrashed()
    {
        if (!in_array(SoftDeletes::class, class_uses($this->model))) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\SoftDeletes");
        }
        $this->model = $this->makeModel()->onlyTrashed();

        return $this;
    }

    public function onlyMe($field = 'user_id', $owner_id = null)
    {
        if (is_null($owner_id)) {
            $owner_id = Auth::user()->id;
        }
        $this->model = $this->model->where($field, $owner_id);

        return $this;
    }

    public function count()
    {
        return $this->model->count();
    }

    public function max($field = 'id')
    {
        return $this->model->max($field);
    }

    public function sum($field = 'id')
    {
        return $this->model->sum($field);
    }

    public function min($field = 'id')
    {
        return $this->model->min($field);
    }
}
