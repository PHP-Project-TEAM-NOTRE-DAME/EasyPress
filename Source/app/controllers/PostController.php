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
            $allPosts = Post::with('user')
				->orderBy('created_at', 'desc')
	            ->paginate(5);

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
		$postValidator = Validator::make($data, Post::$validationRules);
		if ($postValidator->fails()) {
			return Redirect::back()->withErrors($postValidator)->withInput();
		}

		$tagBuilder = new TagBuilder($data['tags']);
		if ($tagBuilder->isValid()) {
	        $tagIds = $tagBuilder->getIds();
		}
		else {
			return Redirect::back()->withErrors($tagBuilder->getErrors())->withInput();
		}

		$newPost = Post::create([
			'title' => $data['title'],
			'content' => $data['content'],
			'user_id' => Auth::id()
		]);

        $newPost->tags()->attach($tagIds);

		return Redirect::route('post.show', ['id' => $newPost->id]);
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
        
        $post->view_count++;
        $post->save();
        
		return View::make('post.show')->with('post', $post);
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
		$post = Post::find($id);

		return View::make('post.edit')->with('post', $post);
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
		$data = Input::all();

		$postValidator = Validator::make($data, Post::$validationRules);
		if ($postValidator->fails()) {
			return Redirect::back()->withErrors($postValidator)->withInput();
		}

		$tagBuilder = new TagBuilder($data['tags']);
		if ($tagBuilder->isValid()) {
	        $tagIds = $tagBuilder->getIds();
		}
		else {
			return Redirect::back()->withErrors($tagBuilder->getErrors())->withInput();
		}

		Post::find($id)->update($data);
		Post::find($id)->tags()->sync($tagIds);

		return Redirect::route('post.show', ['id' => $id]);
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