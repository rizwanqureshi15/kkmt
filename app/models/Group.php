<?php


class Group extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groups';


	protected $fillable = array('name', 'date', 'total_members', 'is_active');

	// public function members()
 //    {
 //        return $this->hasMany('Member');
 //    }


}
