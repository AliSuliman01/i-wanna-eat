<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\Languages', 'prefix' => 'languages'],
	function () {
		Route::get('', 'LanguageController@index');
		Route::get('show/{id}', 'LanguageController@show');
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', 'LanguageController@create');
			Route::post('update', 'LanguageController@update');
			Route::post('destroy', 'LanguageController@destroy');
		});
	});
