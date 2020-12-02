<?php

namespace App\Repositories\Traits;

use App\Exceptions\RepositoryException;
use Exception;

trait DeleteTrait
{

    public function delete($id)
    {
        try {
            return $this->model->destroy($id);
        } catch (Exception $e) {
        }

        throw new RepositoryException('Could not delete the record. You must delete all relationships before proceeding.');
    }

    public function forceDelete($id, $field = 'id')
    {
        try {
            return $this->model->where($field, $id)->forceDelete();
        } catch (Exception $e) {
        }

        throw new RepositoryException('Could not delete the record. You must delete all relationships before proceeding.');
    }
}
