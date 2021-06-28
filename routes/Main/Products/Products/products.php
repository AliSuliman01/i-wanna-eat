<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Products\Products\ProductController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Products\Products', 'prefix' => 'products'],
	function () {
		Route::get('', [ProductController::class,'index']);
		Route::get('show/{id}', [ProductController::class,'show']);
			Route::post('create', [ProductController::class,'create']);
			Route::post('update', [ProductController::class,'update']);
			Route::post('destroy', [ProductController::class,'destroy']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
		});
	});
