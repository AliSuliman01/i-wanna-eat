<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Products\ProductPhotos\ProductPhotoController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Products\ProductPhotos', 'prefix' => 'product_photos'],
	function () {
		Route::get('', [ProductPhotoController::class,'index']);
		Route::get('show/{id}', [ProductPhotoController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ProductPhotoController::class,'create']);
			Route::post('update', [ProductPhotoController::class,'update']);
			Route::post('destroy', [ProductPhotoController::class,'destroy']);
		});
	});
