<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /comment
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /comment/create
	 *
	 * @return Response
	 */
	public function create()
	{
            
	}
	

	/**
	 * Store a newly created resource in storage.
	 * POST /comment
	 *
	 * @return Response
	 */
	public function store($id)
	{
        $data = Input::all();

        $validator = Validator::make($data, Comment::$validationRules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $newComment = new Comment();
        $newComment->content = $data['content'];
        $newComment->post_id = $id;
        if (Auth::check()) {
            $newComment->user_id = Auth::id();
        } else {
            $newComment->name = $data['name'];
            $newComment->email = $data['email'];
        }

        $newComment->save();

        return Redirect::refresh();
	}

	/**
	 * Display the specified resource.
	 * GET /comment/{id}
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
	 * GET /comment/{id}/edit
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
	 * PUT /comment/{id}
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
	 * DELETE /comment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}