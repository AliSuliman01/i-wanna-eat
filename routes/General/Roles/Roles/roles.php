<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\Roles\Roles', 'prefix' => 'roles'],
	function () {
		Route::get('', 'RoleController@index');
		Route::get('show/{id}', 'RoleController@show');
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', 'RoleController@create');
			Route::post('update', 'RoleController@update');
			Route::post('destroy', 'RoleController@destroy');
		});
	});
