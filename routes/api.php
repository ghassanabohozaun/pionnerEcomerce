<?php

use App\Http\Controllers\Api\Dashboard\ApiCategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

########################################### categories routes  ######################################################################

Route::get('test',function(){
    return 'test';
});

Route::controller(ApiCategoriesController::class)->group(function () {
    Route::resource('categories', ApiCategoriesController::class)->except('show');
    Route::post('/categories/destroy', [ApiCategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::post('/categories/status', [ApiCategoriesController::class, 'changeStatus'])->name('categories.change.status');
});
