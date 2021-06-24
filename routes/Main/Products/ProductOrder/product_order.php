<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Products\ProductOrder\ProductOrderController;

Route::group(['namespace' => 'App\Http\Controllers\Main\Products\ProductOrder', 'prefix' => 'product_order'],
	function () {
		Route::get('', [ProductOrderController::class,'index']);
		Route::get('show/{id}', [ProductOrderController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ProductOrderController::class,'create']);
			Route::post('update', [ProductOrderController::class,'update']);
			Route::post('destroy', [ProductOrderController::class,'destroy']);
		});
	});
