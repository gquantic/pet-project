<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('/users')->group(function () {
        Route::post('/', 'App\Http\Controllers\Api\V1\Auth\RegisterController')
            ->name('users.register');

        Route::post('/login', 'App\Http\Controllers\Api\V1\Auth\LoginController');
    });

    Route::middleware('auth:api')->group(function () {
        Route::prefix('/users/')->group(function () {
            Route::get('/', 'App\Http\Controllers\Api\V1\User\UserDataController');
        });
    });
});
