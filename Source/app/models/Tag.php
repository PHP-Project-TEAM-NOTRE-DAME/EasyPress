<?php

class Tag extends \Eloquent 
{
	protected $fillable = ['name'];

	public static $validationRules = [
		'name' => 'required|min:2'
	];

	public function posts() 
	{
		return $this->belongsToMany('Post');
	}
}