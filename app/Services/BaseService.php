<?php

namespace App\Services;

class BaseService
{
    protected $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    public function store(array $data)
    {
        $repo = $this->repo->store($data);
        return $repo;
    }

    public function update(array $data, $id)
    {
        $repo = $this->repo->update($data, $id);
        return $repo;
    }
}
