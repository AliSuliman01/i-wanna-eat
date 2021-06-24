<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Categories\CategoryPhotos\CategoryPhotoController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Categories\CategoryPhotos', 'prefix' => 'category_photos'],
	function () {
		Route::get('', [CategoryPhotoController::class,'index']);
		Route::get('show/{id}', [CategoryPhotoController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [CategoryPhotoController::class,'create']);
			Route::post('update', [CategoryPhotoController::class,'update']);
			Route::post('destroy', [CategoryPhotoController::class,'destroy']);
		});
	});
