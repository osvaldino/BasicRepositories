<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

//Route::resource('categorias', CategoryController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

Route::group([
    'middleware' => 'api',
    'prefix'     => 'v1'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::resource('categorias', CategoryController::class)->except(['create', 'edit']);
    });
});

