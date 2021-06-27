<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General\Files\Files\FileController;

Route::group(['namespace' => 'App\Http\Controllers\General\Files\Files', 'prefix' => 'files'],
	function () {
		Route::get('', [FileController::class,'index']);
		Route::get('show/{id}', [FileController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('upload', [FileController::class,'create']);
			Route::post('destroy', [FileController::class,'destroy']);
		});
	});
