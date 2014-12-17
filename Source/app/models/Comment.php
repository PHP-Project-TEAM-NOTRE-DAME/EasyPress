<?php

class Comment extends \Eloquent 
{
	protected $fillable = ['content', 'user_id', 'post_id', 'name', 'email'];
        
    public static $validationRules = [
    'content' => 'required',
    'email' => 'sometimes|email',
    'name' => 'sometimes|required|min:3'
	];

	public function post() 
	{
		return $this->belongsTo('Post');
	}

	public function user() 
	{
		return $this->belongsTo('User');
	}
}