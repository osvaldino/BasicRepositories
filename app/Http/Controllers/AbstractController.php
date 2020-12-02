<?php

namespace App\Http\Controllers;

use Illuminate\Container\Container as App;

abstract class AbstractController extends Controller
{
    protected $columns = ['*'];

    protected $with = [];

    protected $load = [];

    protected $app;

    protected $repo;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->repo = $app->make($this->repo());
    }

    abstract public function repo();
}
