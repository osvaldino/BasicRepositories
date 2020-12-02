<?php

namespace App\Repositories\Traits;

use App\Exceptions\RepositoryException;
use Exception;
use Log;

trait UpdateTrait
{

    public function update(array $data, $id)
    {
        if (empty($data)) {
            throw new RepositoryException('Empty data');
        }

        $model = $this->model->find($id);
        if (!$model) {
            throw new RepositoryException('Item not found');
        }
        try {
            $model->fill($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new RepositoryException('Empty fillable');
        }
        try {
            $model->save();

            return $model;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new RepositoryException('Error update');
        }
    }
}
