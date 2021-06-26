<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'General\Regions\RegionTypeTranslations', 'prefix' => 'region_type_translations'],
	function () {
		Route::get('', 'RegionTypeTranslationController@index');
		Route::get('show/{id}', 'RegionTypeTranslationController@show');
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', 'RegionTypeTranslationController@create');
			Route::post('update', 'RegionTypeTranslationController@update');
			Route::post('destroy', 'RegionTypeTranslationController@destroy');
		});
	});
