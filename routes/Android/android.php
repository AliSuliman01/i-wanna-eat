<?php

use App\Http\Controllers\Android\AndroidController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '' , 'prefix' => 'android' ], function (){

    Route::get('home_page',[AndroidController::class,'home_page']);
});
