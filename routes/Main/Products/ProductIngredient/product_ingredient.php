<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Products\ProductIngredient\ProductIngredientController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Products\ProductIngredient', 'prefix' => 'product_ingredient'],
	function () {
		Route::get('', [ProductIngredientController::class,'index']);
		Route::get('show/{id}', [ProductIngredientController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ProductIngredientController::class,'create']);
			Route::post('update', [ProductIngredientController::class,'update']);
			Route::post('destroy', [ProductIngredientController::class,'destroy']);
		});
	});
