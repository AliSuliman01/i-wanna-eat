<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General\ActivityTypes\ActivityTypeTranslation\ActivityTypeTranslationController;

Route::group(['namespace' => 'App\Http\Controllers\General\ActivityTypes\ActivityTypeTranslation', 'prefix' => 'activity_type_translation'],
	function () {
		Route::get('', [ActivityTypeTranslationController::class,'index']);
		Route::get('show/{id}', [ActivityTypeTranslationController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ActivityTypeTranslationController::class,'create']);
			Route::post('update', [ActivityTypeTranslationController::class,'update']);
			Route::post('destroy', [ActivityTypeTranslationController::class,'destroy']);
		});
	});
