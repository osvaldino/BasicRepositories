<?php

namespace App\Repositories\Traits;

use App\Exceptions\RepositoryException;

trait GetsTrait
{
    public function all(array $columns = ['*'], array $with = [], $orders = [], $limit = 50, $page = 1)
    {
        $all = $this->model;

        if (!empty($with)) {
            $all = $all->with($with);
        }

        foreach ($orders as $order) {
            $order['order'] = isset($order['order']) ? $order['order'] : 'ASC';

            $all = $all->orderBy($order['column'], $order['order']);
        }

        $all = $all->paginate($limit, $columns, 'page', $page);

        return $all;
    }

    public function get($id, array $columns = ['*'], array $with = [], array $load = [])
    {
        $item = $this->model;
        if (!empty($with)) {
            $item = $item->with($with);
        }
        $item = $item->find($id, $columns);

        if (!empty($load) and !is_null($item)) {
            $item->load($load);
        }

        if ($item) {
            return $item;
        }

        throw new RepositoryException('Item not found');
    }

    public function getByIds(array $ids, array $columns = ['*'], array $with = [], array $load = [])
    {
        $items = $this->model;
        if (!empty($with)) {
            $items = $items->with($with);
        }
        $items = $items->find($id, $columns);

        if (!empty($load) and !is_null($items)) {
            $items->load($load);

            return $items;
        }

        if ($items) {
            return $items;
        }

        throw new RepositoryException('Items not found');
    }
}
