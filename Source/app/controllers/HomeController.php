<?php

class HomeController extends BaseController {

	public function index()
	{
		$latestPosts = Post::with('user')->orderBy('created_at', 'desc')->take(4)->get();

		return View::make('home.index')->with('posts', $latestPosts);
	}

	public function getLogin()
	{
		return View::make('home.login');
	}

	public function postLogin() 
	{		
		$data = Input::all();

		$remember = isset($data['remember']);

		if (Auth::attempt(array('email' => $data['email'], 'password' => $data['password']), $remember))
		{
		    return Redirect::intended('/');
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home.login');
	}
}
