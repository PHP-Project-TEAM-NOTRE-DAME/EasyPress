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
                $validationRules = [
                    'email' => 'required|email',
                    'password' => 'required'
                ];
            
		$data = Input::all();	
		$remember = isset($data['remember']);
                $validator = Validator::make($data, $validationRules);
                
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }
                
		if (Auth::attempt(array('email' => $data['email'], 'password' => $data['password']), $remember))
		{
		    return Redirect::intended('/');
		}

		$authErrors = ['summary' => ['Invalid email or password!']];
		
		return Redirect::back()->withErrors($authErrors);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home.login');
	}
}
