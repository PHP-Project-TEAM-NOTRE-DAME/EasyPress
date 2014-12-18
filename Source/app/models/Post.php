<?php

class Post extends \Eloquent 
{
	protected $fillable = ['title', 'content', 'user_id'];
        
        public static $validationRules = [
		'title' => 'required|min:3',
		'content' => 'required|min:10',
		'tags' => 'required'
	];

	public function comments() 
	{
		return $this->hasMany('Comment');
	}

	public function user() 
	{
		return $this->belongsTo('User');
	}

	public function tags() 
	{
		return $this->belongsToMany('Tag');
	}
}