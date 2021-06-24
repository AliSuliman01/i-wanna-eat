<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Products\ProductTranslation\ProductTranslationController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Products\ProductTranslation', 'prefix' => 'product_translation'],
	function () {
		Route::get('', [ProductTranslationController::class,'index']);
		Route::get('show/{id}', [ProductTranslationController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ProductTranslationController::class,'create']);
			Route::post('update', [ProductTranslationController::class,'update']);
			Route::post('destroy', [ProductTranslationController::class,'destroy']);
		});
	});
