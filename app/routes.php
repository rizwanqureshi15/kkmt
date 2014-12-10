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

Route::group(array('prefix' => 'admin'), function()
{

    Route::get('login', array( 'as' => 'login', 'uses' => 'UsersController@login'));
    Route::post('login', array( 'as' => 'login.post', 'uses' => 'UsersController@postLogin'));
    Route::get('logout', array( 'as' => 'logout', 'uses' => 'UsersController@logout'));
    Route::resource('users', 'UsersController');

});

Route::group(array('prefix' => 'admin'), function()
{

    Route::resource('users', 'UsersController');

});

Route::get('/', function()
{
	return View::make('hello');
});
