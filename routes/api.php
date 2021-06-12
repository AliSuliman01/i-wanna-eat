<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/add_clients', function () {

    Artisan::call('passport:install');

});
Route::get('/linkstorage', function () {

    Artisan::call('storage:link');

});

Route::get('config-cache',function (){
    $exitCode = Artisan::call('config:cache');
    return '<h1>cache config cleared!</h1>';
});

Route::get('/show_all_tables', function () {
    $tables = DB::select('SHOW TABLES');
    echo '[';
    foreach($tables as $table){
        print_r($table);
    }
    echo ']';

});
Route::get('/show_table/{table_name}', function ($table_name) {

    return Schema::getColumnListing($table_name);

});
