<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Categories\Categories\CategoryController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Categories\Categories', 'prefix' => 'categories'],
	function () {
		Route::get('', [CategoryController::class,'index']);
		Route::get('show/{id}', [CategoryController::class,'show']);
			Route::post('create', [CategoryController::class,'create']);
			Route::post('update', [CategoryController::class,'update']);
			Route::post('destroy', [CategoryController::class,'destroy']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
		});
	});
