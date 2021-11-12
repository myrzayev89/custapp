<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth', 'as' => 'front.'], function () {
    Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index'])->name('home');
    Route::resource('customer', \App\Http\Controllers\Front\Customer\CustomerController::class)->parameter('customer', 'id');
    Route::resource('product', \App\Http\Controllers\Front\Product\ProductController::class)->parameter('product', 'id');
});
