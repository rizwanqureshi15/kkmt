<?php


class Member extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'members';


	protected $fillable = array('name', 'address', 'passport_no', 'birth_date', 'contact_no', 'image', 'is_active', 'user_id', 'group_id');


	public function group()
    {
        return $this->belongsTo('Group');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }


    public function amounts()
    {
    	return $this->hasMany('Amount');
    }


}
