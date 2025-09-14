<?php

use App\Http\Controllers\Api\User\Auth\LoginController;
use App\Http\Controllers\Api\User\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/testAPI', function () {
    return 'test APIdddd';
});
Route::group(['prefix' => 'user'], function () {
    ########################################### login routes  ##############################################################
    Route::post('login', [LoginController::class, 'login']);

    ########################################### register routes  ##############################################################
    Route::post('register', [RegisterController::class, 'register']);

    ########################################### auth routes ##################################################################
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('test', function () {
            return 'authicated';
        });
    });
});

