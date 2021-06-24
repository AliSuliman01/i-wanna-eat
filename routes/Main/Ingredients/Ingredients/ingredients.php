<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Ingredients\Ingredients\IngredientController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Ingredients\Ingredients', 'prefix' => 'ingredients'],
	function () {
		Route::get('', [IngredientController::class,'index']);
		Route::get('show/{id}', [IngredientController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [IngredientController::class,'create']);
			Route::post('update', [IngredientController::class,'update']);
			Route::post('destroy', [IngredientController::class,'destroy']);
		});
	});
