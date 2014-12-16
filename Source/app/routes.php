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

Route::get('/', array('as' => 'get.home.index', 'uses' => 'HomeController@index'));

Route::get('/post/{id}', array('as' => 'get.post.show', 'uses' => 'PostController@show'));
Route::get('/user/{id}/posts', array('as' => 'get.post.user', 'uses' => 'PostController@showByUserId'));

// Route::get('/user/login', array('as' => 'get.post.show', 'uses' => 'PostController@show'));
// Route::get('/user/logout', array('as' => 'get.post.show', 'uses' => 'PostController@show'));
Route::get('/user/create', array('as' => 'get.user.create', 'uses' => 'UserController@create'));
Route::post('/user', array('as' => 'user.store', 'uses' => 'UserController@store'));

