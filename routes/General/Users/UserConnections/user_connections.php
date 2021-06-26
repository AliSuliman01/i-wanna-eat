<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General\Users\UserConnections\UserConnectionController;

Route::group(['namespace' => 'App\Http\Controllers\General\Users\UserConnections', 'prefix' => 'user_connections'],
	function () {
		Route::get('', [UserConnectionController::class,'index']);
		Route::get('show/{id}', [UserConnectionController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('destroy', [UserConnectionController::class,'destroy']);
		});
	});
