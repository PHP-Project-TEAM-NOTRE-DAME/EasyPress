<?php

class HomeController extends BaseController {

	public function index()
	{
		$latestPosts = Post::with('user')->orderBy('created_at', 'desc')->take(4)->get();

		return View::make('home.index')->with('posts', $latestPosts);
	}
}
