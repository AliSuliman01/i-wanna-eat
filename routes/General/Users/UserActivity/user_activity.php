<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General\Users\UserActivity\UserActivityController;

Route::group(['namespace' => 'App\Http\Controllers\General\Users\UserActivity', 'prefix' => 'user_activity'],
	function () {
		Route::get('', [UserActivityController::class,'index']);
		Route::get('show/{id}', [UserActivityController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('destroy', [UserActivityController::class,'destroy']);
		});
	});
