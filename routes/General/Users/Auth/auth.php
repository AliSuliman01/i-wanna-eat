<?php

use App\Http\Controllers\General\Users\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\Users\Auth', 'prefix' => 'auth'],
    function () {
        Route::post('login',[AuthController::class,'login']);
        Route::post('signup',[AuthController::class,'signup'])->middleware('hashing_password');
    }
);
