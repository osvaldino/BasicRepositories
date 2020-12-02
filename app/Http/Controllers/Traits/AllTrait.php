<?php

namespace App\Http\Controllers\Traits;

trait AllTrait
{
    public function index()
    {
        return $this->repo->all($this->columns, $this->with, $this->load);
    }
}
