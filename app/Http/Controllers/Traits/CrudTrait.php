<?php

namespace App\Http\Controllers\Traits;

trait CrudTrait
{
    use GetTrait, AllTrait, StoreTrait, UpdateTrait, DeleteTrait;
}
