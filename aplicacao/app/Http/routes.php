<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');

Route::post('login', 'HomeController@postIndex');

Route::group(['middleware' => 'auth'], function () {
	Route::get('sistema', 'HomeController@getSistema');

	Route::post('sistema', 'HomeController@postSistema');

	Route::get('logout', 'HomeController@getLogout');

	Route::get('excluir/{artigo}', 'HomeController@getExcluirArtigo');
});