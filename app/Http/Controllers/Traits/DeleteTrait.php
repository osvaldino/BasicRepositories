<?php

namespace App\Http\Controllers\Traits;

trait DeleteTrait
{
    public function destroy($id)
    {
        return $this->repo->delete($id);
    }
}
