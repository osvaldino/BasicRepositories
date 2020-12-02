<?php

namespace App\Http\Controllers\Traits;

trait ForceDeleteTrait
{
    public function forceDelete($id)
    {
        return $this->repo->forceDelete($id);
    }
}
