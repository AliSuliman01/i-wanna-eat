<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General\ActivityTypes\ActivityTypes\ActivityTypeController;

Route::group(['namespace' => 'App\Http\Controllers\General\ActivityTypes\ActivityTypes', 'prefix' => 'activity_types'],
	function () {
		Route::get('', [ActivityTypeController::class,'index']);
		Route::get('show/{id}', [ActivityTypeController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ActivityTypeController::class,'create']);
			Route::post('update', [ActivityTypeController::class,'update']);
			Route::post('destroy', [ActivityTypeController::class,'destroy']);
		});
	});
