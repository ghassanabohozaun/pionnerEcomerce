<?php

use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'as' => '',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        /// any
        Route::get('',[HomeController::class, 'index'])
            ->where(['any' => '.*'])
            ->name('index');
        Route::get('/home', [HomeController::class, 'index'])->name('index');
    },
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
