<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface 
{
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = ['email', 'username', 'password'];

	public static $validationRules = [
		'email' => 'required|email|unique:users',
		'username' => 'required|min:3|alpha_dash',
		'password' => 'required|min:5|confirmed'
	];


	public function comments() 
	{
		return $this->hasMany('Comment');
	}

	public function posts() 
	{
		return $this->hasMany('Post');
	}
}
