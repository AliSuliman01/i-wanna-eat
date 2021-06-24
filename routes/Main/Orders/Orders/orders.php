<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Orders\Orders\OrderController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Orders\Orders', 'prefix' => 'orders'],
	function () {
		Route::get('', [OrderController::class,'index']);
		Route::get('show/{id}', [OrderController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [OrderController::class,'create']);
			Route::post('update', [OrderController::class,'update']);
			Route::post('destroy', [OrderController::class,'destroy']);
		});
	});
