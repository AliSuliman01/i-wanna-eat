<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Categories\CategoryTranslations\CategoryTranslationController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Categories\CategoryTranslations', 'prefix' => 'category_translations'],
	function () {
		Route::get('', [CategoryTranslationController::class,'index']);
		Route::get('show/{id}', [CategoryTranslationController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [CategoryTranslationController::class,'create']);
			Route::post('update', [CategoryTranslationController::class,'update']);
			Route::post('destroy', [CategoryTranslationController::class,'destroy']);
		});
	});
