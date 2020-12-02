<?php

namespace App\Http\Controllers\Traits;

trait RestoreTrait
{
    public function restore($id)
    {
        return $this->repo->restore($id);
    }
}
