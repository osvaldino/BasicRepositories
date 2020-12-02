<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Request;

class StoreRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required'
        ];
    }
}
