<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('home', [
	'uses' => 'SpaceController@index',
	'as' => 'home'
]);

Route::get('create', [
	'uses' => 'SpaceController@create',
	'as' => 'create'
]);

Route::post('store', [
	'uses' => 'SpaceController@store',
	'as' => 'store'
]);

Route::get('browse', [
	'uses' => 'SpaceController@browse',
	'as' => 'browse'
]);

Route::get('edit/{id}', [
	'uses' => 'SpaceController@edit',
	'as' => 'edit'
]);

Route::post('update/{id}', [
	'uses' => 'SpaceController@update',
	'as' => 'update'
]);

Route::get('destroy/{id}', [
	'uses' => 'SpaceController@destroy',
	'as' => 'destroy'
]);

Route::get('/show/{id}', [
	'uses' => 'SpaceController@show',
	'as' => 'show'
]);