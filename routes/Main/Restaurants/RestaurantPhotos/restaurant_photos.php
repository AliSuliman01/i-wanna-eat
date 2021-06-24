<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Restaurants\RestaurantPhotos\RestaurantPhotoController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Restaurants\RestaurantPhotos', 'prefix' => 'restaurant_photos'],
	function () {
		Route::get('', [RestaurantPhotoController::class,'index']);
		Route::get('show/{id}', [RestaurantPhotoController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [RestaurantPhotoController::class,'create']);
			Route::post('update', [RestaurantPhotoController::class,'update']);
			Route::post('destroy', [RestaurantPhotoController::class,'destroy']);
		});
	});
