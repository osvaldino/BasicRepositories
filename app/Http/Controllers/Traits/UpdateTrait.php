<?php

namespace App\Http\Controllers\Traits;

trait UpdateTrait
{
    public function update($id)
    {
        $request = $this->app->make($this->updateRequest());

        $save = $this->repo->update($request->all(), $id);
        if ($save) {
            return $save;
        }

        return response()->json(['error' => 'Internal error'], 500);
    }

    abstract public function updateRequest();
}
