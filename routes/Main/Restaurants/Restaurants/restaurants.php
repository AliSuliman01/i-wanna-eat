<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Restaurants\Restaurants\RestaurantController;

Route::group(['namespace' => 'App\Http\Controllers\Content\Restaurants\Restaurants', 'prefix' => 'restaurants'],
	function () {
		Route::get('', [RestaurantController::class,'index']);
		Route::get('show/{id}', [RestaurantController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [RestaurantController::class,'create']);
			Route::post('update', [RestaurantController::class,'update']);
			Route::post('destroy', [RestaurantController::class,'destroy']);
		});
	});
