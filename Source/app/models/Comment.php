<?php

class Comment extends \Eloquent 
{
	protected $fillable = ['content', 'user_id', 'post_id'];
        
        public static $validationRules = [
		'content' => 'required'
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