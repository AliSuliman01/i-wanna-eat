<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Services\Services\ServiceController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Services\Services', 'prefix' => 'services'],
	function () {
		Route::get('', [ServiceController::class,'index']);
		Route::get('show/{id}', [ServiceController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ServiceController::class,'create']);
			Route::post('update', [ServiceController::class,'update']);
			Route::post('destroy', [ServiceController::class,'destroy']);
		});
	});
