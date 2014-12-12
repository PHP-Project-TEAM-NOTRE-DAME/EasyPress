<?php

class Tag extends \Eloquent 
{
	protected $fillable = [];

	public function posts() 
	{
		return $this->belongsToMany('Post');
	}
}