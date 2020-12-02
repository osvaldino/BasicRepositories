<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Request;
use App\Models\Category;

class UpdateRequest extends Request
{

    public function authorize()
    {
        $id = $this->route('categoria');
        return Category::where('id', $id)->exists();
    }

    public function rules()
    {
        $id = $this->route('categoria');

        return [
            'name' => 'required|max:40|unique:categories,name,'.$id
        ];
    }
}
