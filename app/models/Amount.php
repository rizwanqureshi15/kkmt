<?php


class Amount extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'amounts';


	protected $fillable = array('amount', 'member_id', 'receipt_no', 'date');


    public function member()
    {
        return $this->belongsTo('Member');
    }

    public function getDates()
	{
	    return array('created_at', 'updated_at', 'date');
	}



}
