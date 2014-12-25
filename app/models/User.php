<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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

	protected $fillable = array('first_name', 'last_name', 'username', 'password', 'email', 'mobile_no', 'address', 'role', 'is_active', 'image');

	public static function boot()
    {
        parent::boot();

        User::creating(function($user)
		{
		    $user['password'] = Hash::make($user['password']);
		});
    }

    public function members()
    {
        return $this->hasMany('Member');
    }


	

}
