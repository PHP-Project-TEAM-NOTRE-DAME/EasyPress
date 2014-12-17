<?php

class UserPostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /userpost
	 *
	 * @return Response
	 */
	public function index($userId)
	{
		$posts = Post::where('user_id', $userId)
			->orderBy('created_at', 'desc')
			->paginate(5);
			
		return View::make('user.post.index')->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /userpost/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /userpost
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /userpost/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /userpost/{id}/edit
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
	 * PUT /userpost/{id}
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
	 * DELETE /userpost/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}