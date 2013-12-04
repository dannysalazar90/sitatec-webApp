<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	return Redirect::to('login');
});
Route::get('login', 'HomeController@getLogin');
Route::get('register', 'HomeController@getRegister');
Route::post('register', 'HomeController@postRegister');
Route::post('login', 'HomeController@postLogin');
Route::get('logout', 'HomeController@logout');

Route::group(array('before' => 'auth'), function(){
	Route::get('admin','AdminController@getIndex');
	Route::get('usuarios','HomeController@getUsuarios');
	Route::post('usuarios', 'HomeController@postUsuarios');
	Route::get('usuarios/{id}', 'HomeController@getEditarUsuario');
	Route::post('usuarios/{id}', 'HomeController@postEditarUsuario');

	Route::get('upload', 'HomeController@getFile');
	Route::post('upload', 'HomeController@postFile');
});