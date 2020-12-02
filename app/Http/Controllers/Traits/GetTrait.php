<?php

namespace App\Http\Controllers\Traits;

trait GetTrait
{
    public function show($id)
    {
        return $this->repo->get($id, $this->columns, $this->with, $this->load);
    }
}
