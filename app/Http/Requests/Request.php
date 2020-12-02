<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function __construct()
    {
        parent::__construct();
    }

    public function authorize()
    {
        return true;
    }

    public function forbiddenResponse()
    {
        return response()->json('Forbidden', 403);
    }

    public function response(array $errors)
    {
        return response()->json($errors, 422);
    }
}
