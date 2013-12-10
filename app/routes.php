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
	Route::get('usuarios/eliminar/{id}', 'HomeController@getEliminarUsuario');

	Route::get('operadores', 'HomeController@getOperadores');
	Route::post('operadores', 'HomeController@postOperadores');
	Route::get('operadores/{id}', 'HomeController@getEditarOperador');
	Route::post('operadores/{id}', 'HomeController@postEditarOperador');
	Route::get('operadores/eliminar/{id}', 'HomeController@getEliminarOperador');

	Route::get('upload', 'HomeController@getFile');
	Route::post('upload', 'HomeController@postFile');

	Route::get('asignarRango', 'HomeController@getAsignarRango');
	Route::post('asignarRango', 'HomeController@postAsignarRango');

	Route::get('asignarTarifa', 'HomeController@getAsignarTarifa');
	Route::post('asignarTarifa', 'HomeController@postAsignarTarifa');

	Route::get('asignarFecha', 'HomeController@getAsignarFecha');
	Route::post('asignarFecha', 'HomeController@postAsignarFecha');

	Route::get('asignarDia', 'HomeController@getAsignarDia');
	Route::post('asignarDia', 'HomeController@postAsignarDia');

	Route::get('reportes', 'HomeController@getReportes');
	Route::post('reportes', 'HomeController@postReportes');

});