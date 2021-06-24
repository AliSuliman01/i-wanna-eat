<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Services\ServiceTranslation\ServiceTranslationController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Services\ServiceTranslation', 'prefix' => 'service_translation'],
	function () {
		Route::get('', [ServiceTranslationController::class,'index']);
		Route::get('show/{id}', [ServiceTranslationController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ServiceTranslationController::class,'create']);
			Route::post('update', [ServiceTranslationController::class,'update']);
			Route::post('destroy', [ServiceTranslationController::class,'destroy']);
		});
	});
