<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\Restaurants\Restaurants\RestaurantController;

Route::group(['namespace' => 'App\Http\Controllers\Content\Restaurants\Restaurants', 'prefix' => 'restaurants'],
	function () {
		Route::get('', [RestaurantController,'index']);
		Route::get('show/{id}', [RestaurantController,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [RestaurantController,'create']);
			Route::post('update', [RestaurantController,'update']);
			Route::post('destroy', [RestaurantController,'destroy']);
		});
	});
