<?php

use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\AttributesController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\Passowrd\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\Passowrd\ResetPasswordController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\BrandsController;
use App\Http\Controllers\Dashboard\CitiesController;
use App\Http\Controllers\Dashboard\ContactsController;
use App\Http\Controllers\Dashboard\CountriesController;
use App\Http\Controllers\Dashboard\CouponsController;
use App\Http\Controllers\Dashboard\EventsController;
use App\Http\Controllers\dashboard\FaqsController;
use App\Http\Controllers\Dashboard\GovernoratiesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\WelcomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        ########################################### Auth  ##################################################################
        Route::get('login', [AuthController::class, 'getLogin'])->name('get.login');
        Route::post('login', [AuthController::class, 'postLogin'])->name('post.login');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        ########################################### reset password  ######################################################################
        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
            Route::controller(ForgetPasswordController::class)->group(function () {
                Route::get('email', 'showEmailForm')->name('get.email');
                Route::post('email', 'sendOTP')->name('post.email');
                Route::get('verify/{email?}', 'showVerifyOTPForm')->name('verify');
                Route::post('verify', 'verifyOTP')->name('post.verify');
            });

            Route::controller(ResetPasswordController::class)->group(function () {
                Route::get('reset/{email?}', 'showResetFrom')->name('reset');
                Route::post('reset', 'resetPasword')->name('post.reset');
            });
        });

        ########################################### protected routes  #####################################################################
        Route::group(['middleware' => 'auth:admin'], function () {
            ########################################### welcome  ##########################################################################
            Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');
            ########################################### roles routes ######################################################################
            Route::group(['middleware' => 'can:roles'], function () {
                Route::resource('roles', RolesController::class);
                Route::post('/roles/destroy', [RolesController::class, 'destroy'])->name('roles.destroy');
            });
            ########################################### admins routes  #####################################################################
            Route::group(['middleware' => 'can:admins'], function () {
                Route::resource('admins', AdminsController::class);
                Route::post('/admins/destroy', [AdminsController::class, 'destroy'])->name('admins.destroy');
                Route::post('/admins/status', [AdminsController::class, 'changeStatus'])->name('admins.change.status');
            });

            ########################################### world routes  ######################################################################
            Route::group(['middleware' => 'can:world'], function () {
                // countries routes
                Route::resource('countries', CountriesController::class);
                Route::post('/countries/destroy', [CountriesController::class, 'destroy'])->name('countries.destroy');
                Route::post('/countries/status', [CountriesController::class, 'changeStatus'])->name('countries.change.status');
                Route::get('/country/{country_id?}/governorates', [CountriesController::class, 'getGovrnoratesByCountryID'])->name('countries.get.govnernorates.by.country.id');

                // governorates routes
                Route::resource('governorates', GovernoratiesController::class);
                Route::post('/governorates/destroy', [GovernoratiesController::class, 'destroy'])->name('governorates.destroy');
                Route::get('/governorates/status/{id?}', [GovernoratiesController::class, 'changeStatus'])->name('governorates.change.status');
                Route::get('/governorates/get/all/cities', [GovernoratiesController::class, 'getAllCitiesByGovernorate'])->name('governorates.get.all.cities');
                Route::get('/governorate/{governorate_id?}/cities', [GovernoratiesController::class, 'getCitesByGovernrateID'])->name('governorates.get.cities.by.governorate.id');
                Route::post('/govnerorates/update/price', [GovernoratiesController::class, 'updateShippingPrice'])->name('governorates.update.shipping.price');
                // cities routes
                Route::resource('cities', CitiesController::class);
                Route::post('/cities/destroy', [CitiesController::class, 'destroy'])->name('cities.destroy');
            });

            ########################################### categories routes  ######################################################################
            Route::group(['middleware' => 'can:categories'], function () {
                Route::resource('categories', CategoriesController::class)->except('show');
                Route::get('/categories-all', [CategoriesController::class, 'getAll'])->name('categories.all');
                Route::post('/categories/destroy', [CategoriesController::class, 'destroy'])->name('categories.destroy');
                Route::post('/categories/status', [CategoriesController::class, 'changeStatus'])->name('categories.change.status');
            });
            ########################################### brands routes  ######################################################################

            Route::group(['middleware' => 'can:brands'], function () {
                Route::resource('brands', BrandsController::class);
                Route::get('/brands-all', [BrandsController::class, 'getAll'])->name('brands.get.all');
                Route::post('/brands/destroy', [BrandsController::class, 'destroy'])->name('brands.destroy');
                Route::post('/brands/chnage-status', [BrandsController::class, 'changeStatus'])->name('brands.change.status');
            });

            ########################################### coupons routes  ######################################################################
            Route::group(['middleware' => 'can:coupons'], function () {
                Route::resource('coupons', CouponsController::class);
                Route::get('/coupons-all', [CouponsController::class, 'getAll'])->name('coupons.get.all');
                Route::post('/coupons/chnage-status', [CouponsController::class, 'changeStatus'])->name('coupons.change.status');
            });
            ########################################### faqs routes  ######################################################################
            Route::group(['middleware', 'can:faqs'], function () {
                Route::resource('faqs', FaqsController::class);
                Route::get('/faqs-all', [FaqsController::class, 'getAll'])->name('faqs.get.all');
                Route::post('/faqs/status', [FaqsController::class, 'changeStatus'])->name('faqs.change.status');
            });
            ########################################### settings routes  ######################################################################
            Route::group(['middleware' => 'can:settings'], function () {
                Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
                Route::put('/settings/{id?}', [SettingsController::class, 'update'])->name('settings.update');
            });

            ########################################### attributes routes  ######################################################################
            Route::group(['middleware' => 'can:attributes'], function () {
                Route::resource('attributes', AttributesController::class);
                Route::get('/attributes-all', [AttributesController::class, 'getAll'])->name('attributes.get.all');
            });

            ########################################### products routes  ######################################################################

            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/livewire/update', $handle);
            });
            Route::group(['middleware' => 'can:products'], function () {
                Route::resource('products', ProductsController::class);
                Route::get('/products-all', [ProductsController::class, 'getAll'])->name('products.get.all');
                Route::post('/products/change-status', [ProductsController::class, 'changeStatus'])->name('products.change.status');
                Route::delete('/product/destroy-varaint/{id?}', [ProductsController::class, 'destroyProductVaraint'])->name('products.destroy.varaint');
            });

            ########################################### events routes  ######################################################################
            //  Livewire::setUpdateRoute(function ($handle) {
            //     return Route::post('/livewire/update', $handle);
            // });
            Route::group(['middlewere' => 'can:events'], function () {
                Route::resource('events', EventsController::class);
            });

            ########################################### users routes  ######################################################################
            Route::group(['middlewire' => 'can:users'], function () {
                Route::resource('users', UsersController::class);
                Route::get('/users-all', [UsersController::class, 'getAll'])->name('users.get.all');
                Route::post('/users/change-status', [UsersController::class, 'changeStatus'])->name('users.change.status');
            });

            ########################################### contacts routes  ######################################################################
            Route::group(['middleware' => 'can:contacts'], function () {
                Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
            });
        });
    },
);
