<?php

class Post extends \Eloquent 
{
	protected $fillable = [];

	public function commnets() 
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