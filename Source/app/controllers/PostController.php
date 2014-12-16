<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /post
	 *
	 * @return Response
	 */
	public function index()
	{
            $allPosts = Post::with('user')->get();

            return View::make('post.index')->with('posts', $allPosts);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /post/create
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /post
	 *
	 * @return Response
	 */
	public function store()
	{
            $data = Input::all();

		$validator = Validator::make($data, Post::$validationRules);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
                
                $data['user_id'] = 2;

		Post::create($data);

		return Redirect::route('home.index');
	}

	/**
	 * Display the specified resource.
	 * GET /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::with('user')->find($id);

		return View::make('post.show')->with('post', $post);
	}

	public function showByUserId($id)
	{
		$posts = Post::where('user_id', $id)->get();

		return View::make('post.showByUserId')->with('posts', $posts);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /post/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}