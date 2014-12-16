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

Route::get('/', array('as' => 'home.index', 'uses' => 'HomeController@index'));

Route::get('/post', array('as' => 'post.index', 'uses' => 'PostController@index'));
Route::get('/post/create', array('as' => 'post.create', 'uses' => 'PostController@create'));
Route::post('/post', array('as' => 'post.store', 'uses' => 'PostController@store'));
Route::get('/post/{id}', array('as' => 'post.show', 'uses' => 'PostController@show'));
Route::get('/user/{id}/posts', array('as' => 'post.show_by_user', 'uses' => 'PostController@showByUserId'));

// Route::get('/user/login', array('as' => 'get.post.show', 'uses' => 'PostController@show'));
// Route::get('/user/logout', array('as' => 'get.post.show', 'uses' => 'PostController@show'));
Route::get('/user/create', array('as' => 'user.create', 'uses' => 'UserController@create'));
Route::post('/user', array('as' => 'user.store', 'uses' => 'UserController@store'));

