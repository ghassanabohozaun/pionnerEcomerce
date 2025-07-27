<?php

use App\Http\Controllers\Website\Auth\AuthController;
use App\Http\Controllers\Website\Auth\RegisterController;
use App\Http\Controllers\Website\BrandsController;
use App\Http\Controllers\Website\CategoriesController;
use App\Http\Controllers\Website\FaqController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PagesController;
use App\Http\Controllers\Website\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'as' => 'website.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        ########################################### register routes  ##################################################################
        Route::controller(RegisterController::class)->group(function () {
            Route::get('register', 'index')->name('get.register');
            Route::post('register', 'store')->name('post.register');
        });

        ########################################### login routes ##################################################################
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'getLogin')->name('get.login');
            Route::post('login', 'postLogin')->name('post.login');
            Route::get('logout', 'logout')->name('logout');
        });
        ########################################### profile routes ##################################################################
        Route::group(['middleware' => 'auth:web'], function () {
            Route::controller(ProfileController::class)->group(function () {
                Route::get('/profile', 'index')->name('profile.index');
            });
        });
        ########################################### other routes ##################################################################
        /// any
        Route::get('', [HomeController::class, 'index'])
            ->where(['any' => '.*'])
            ->name('index');
        Route::get('/home', [HomeController::class, 'index'])->name('index');
        ########################################### pages routes ##################################################################
        Route::get('/page/{slug?}', [PagesController::class, 'getDaymamicPage'])->name('get.daynamic.page');

        ########################################### faqs routes ##################################################################
        Route::get('/faqs', [FaqController::class, 'showFaqsPage'])->name('faqs.index');
        ########################################### brands routes ##################################################################
        Route::controller(BrandsController::class)->group(function () {
            Route::get('/brands', 'index')->name('brands.index');
            Route::get('/brand/{slug?}/products', 'getProudctsByBrand')->name('products.by.brands');
        });
        ########################################### categories routes ##################################################################
        Route::controller(CategoriesController::class)->group(function () {
            Route::get('/categories', 'index')->name('categories.index');
            Route::get('/category/{slug?}/products', 'getProductsByCategory')->name('products.by.category');
        });
    },
);

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
