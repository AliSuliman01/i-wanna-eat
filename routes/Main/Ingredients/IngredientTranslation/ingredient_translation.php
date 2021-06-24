<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Ingredients\IngredientTranslation\IngredientTranslationController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Ingredients\IngredientTranslation', 'prefix' => 'ingredient_translation'],
	function () {
		Route::get('', [IngredientTranslationController::class,'index']);
		Route::get('show/{id}', [IngredientTranslationController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [IngredientTranslationController::class,'create']);
			Route::post('update', [IngredientTranslationController::class,'update']);
			Route::post('destroy', [IngredientTranslationController::class,'destroy']);
		});
	});
