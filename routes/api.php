<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'api', 'as' => 'api.'], function () {
    Route::get('products', [\App\Http\Controllers\Front\IndexController::class, 'getProducts']);
    Route::post('products', [\App\Http\Controllers\Front\IndexController::class, 'store']);
});
