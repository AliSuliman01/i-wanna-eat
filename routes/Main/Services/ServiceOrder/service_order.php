<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Services\ServiceOrder\ServiceOrderController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Services\ServiceOrder', 'prefix' => 'service_order'],
	function () {
		Route::get('', [ServiceOrderController::class,'index']);
		Route::get('show/{id}', [ServiceOrderController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ServiceOrderController::class,'create']);
			Route::post('update', [ServiceOrderController::class,'update']);
			Route::post('destroy', [ServiceOrderController::class,'destroy']);
		});
	});
