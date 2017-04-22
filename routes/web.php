<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource ('keluhan','KeluhanController');
Route::group(['prefix' => 'keluhan'], function(){

	Route::get('/keluhan', 'KeluhanController@index');
	Route::get('/create', 'KeluhanController@create');
	Route::post('/store', 'KeluhanController@store');
	Route::get('/show/{id}', 'KeluhanController@show');
	Route::post('/update/{id}', 'KeluhanController@update');
	

});

