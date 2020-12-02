<?php

namespace App\Repositories\Traits;

trait RestoreTrait
{
    public function restore($id, $field = 'id')
    {
        return $this->model->onlyTrashed()->where($field, $id)->restore();
    }
}
