<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudTrait;
use App\Repositories\CategoryRepository as Repository;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Requests\Category\DeleteRequest;
//use App\Services\CategoryService;

class CategoryController extends AbstractController
{
    use CrudTrait;

    protected $columns = ['id', 'name', 'slug'];

    public function repo()
    {
        return Repository::class;
    }

    public function index()
    {
        return $this->repo->all($this->columns);
    }

    public function show($id)
    {
        return $this->repo->get($id, $this->columns, $this->with);
    }

//    public function store(StoreRequest $request, CategoryService $service)
//    {
//        $save = $service->store($request->all());
//
//        if ($save) {
//            return $save;
//        }
//
//        return response()->json('Internal error', 500);
//    }
//
//    public function update(UpdateRequest $request, CategoryService $service, $id)
//    {
//        $save = $service->update($request->all(), $id);
//        if ($save) {
//            return $save;
//        }
//
//        return response()->json('Internal error', 500);
//    }

    public function storeRequest()
    {
        return StoreRequest::class;
    }

    public function updateRequest()
    {
        return UpdateRequest::class;
    }

    public function deleteRequest()
    {
        return DeleteRequest::class;
    }
}
