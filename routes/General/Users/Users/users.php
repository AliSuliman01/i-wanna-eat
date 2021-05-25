<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'General\Users\Users', 'prefix' => 'users'],
	function () {
		Route::get('', 'UserController@index');
		Route::get('show/{id}', 'UserController@show');
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', 'UserController@create');
			Route::post('update', 'UserController@update');
			Route::post('destroy', 'UserController@destroy');
		});
	});
