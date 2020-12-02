<?php

namespace App\Http\Controllers\Traits;

trait StoreTrait
{
    public function store()
    {
        $request = $this->app->make($this->storeRequest());

        $save = $this->repo->store($request->all());
        if ($save) {
            return $save;
        }

        return response()->json(['error' => 'Internal error'], 500);
    }

    abstract public function storeRequest();
}
