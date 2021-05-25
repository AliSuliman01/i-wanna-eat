<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\Regions\Regions', 'prefix' => 'regions'],
	function () {
		Route::get('', 'RegionController@index');
		Route::get('show/{id}', 'RegionController@show');
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', 'RegionController@create');
			Route::post('update', 'RegionController@update');
			Route::post('destroy', 'RegionController@destroy');
		});
	});
