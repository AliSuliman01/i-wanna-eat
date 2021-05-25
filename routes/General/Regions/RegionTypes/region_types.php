<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\Regions\RegionTypes', 'prefix' => 'region_types'],
	function () {
		Route::get('', 'RegionTypeController@index');
		Route::get('show/{id}', 'RegionTypeController@show');
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', 'RegionTypeController@create');
			Route::post('update', 'RegionTypeController@update');
			Route::post('destroy', 'RegionTypeController@destroy');
		});
	});
