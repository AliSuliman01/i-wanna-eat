<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\Regions\RegionTranslations', 'prefix' => 'region_translations'],
	function () {
		Route::get('', 'RegionTranslationController@index');
		Route::get('show/{id}', 'RegionTranslationController@show');
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', 'RegionTranslationController@create');
			Route::post('update', 'RegionTranslationController@update');
			Route::post('destroy', 'RegionTranslationController@destroy');
		});
	});
