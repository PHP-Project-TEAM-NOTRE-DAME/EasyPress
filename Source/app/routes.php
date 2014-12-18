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
Route::post('/post', array('before' => 'auth|csrf', 'as' => 'post.store', 'uses' => 'PostController@store'));
Route::get('/post/{id}', array('as' => 'post.show', 'uses' => 'PostController@show'));
Route::get('/post/{id}/edit', array('before' => 'auth|isOwn', 'as' => 'post.edit', 'uses' => 'PostController@edit'));
Route::put('/post/{id}', array('before' => 'auth|isOwn|csrf', 'as' => 'post.update', 'uses' => 'PostController@update'));

	Route::get('/user/{id}/post', array('as' => 'user.post.index', 'uses' => 'UserPostController@index'));

Route::get('/user/create', array('before' => 'guest', 'as' => 'user.create', 'uses' => 'UserController@create'));
Route::post('/user', array('before' => 'guest|csrf', 'as' => 'user.store', 'uses' => 'UserController@store'));
Route::get('/user/{id}', array('as' => 'user.show', 'uses' => 'UserController@show'));

Route::get('/login', array('before' => 'guest', 'as' => 'home.login', 'uses' => 'HomeController@getLogin'));
Route::post('/login', array('before' => 'guest|csrf', 'as' => 'post.home.login', 'uses' => 'HomeController@postLogin'));
Route::get('/logout', array('as' => 'home.logout', 'uses' => 'HomeController@logout'));

Route::post('/post/{id}', array('as' => 'comment.store', 'uses' => 'CommentController@store'));

Route::get('/other/about',function(){
    return View::make("/other/about");
});

Route::get('/search',function(){
    return View::make("search");
});