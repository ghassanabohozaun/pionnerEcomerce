<?php

use App\Http\Controllers\Api\User\Auth\LoginController;
use App\Http\Controllers\Api\User\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => 'setLanguage'], function () {

########################################### login routes  ##############################################################
Route::post('login', [LoginController::class, 'login']);

########################################### register routes  ##############################################################
Route::post('register', [RegisterController::class, 'register']);

########################################### auth user api routes ##################################################################
Route::group(['middleware' => 'auth:user-api'], function () {
    Route::get('testAuth', function () {
        return __('users.login_success');
    });
});
// });
