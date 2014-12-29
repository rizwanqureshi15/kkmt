<?php

class MembersAmountsController extends BaseController {

	public function create($member_id)
	{
		$member = Member::find($member_id);
		return View::make('admin.amounts.create', compact('member'));
	}


	public function store($member_id)
	{
		$input = Input::get();
		$rules = array(
		    'amount' => 'required',
		    'date' => 'required',
		    'receipt_no' => 'required|numeric',
		    'member_id' => 'integer'
		);

		// Validate input
		$v = Validator::make($input, $rules);
		if($v->fails()){
			return Redirect::route('admin.members.amounts.create', $input['member_id'])->withInput()->withErrors( $v->messages() );
		}

		$amount = new Amount();
		$amount->fill($input);
		$amount->save();
		return Redirect::route('admin.members.show', $input['member_id'])->withSuccess('Amount added successfully');
	}


	public function edit($member_id, $amount_id)
	{
		$amount = Amount::whereMemberId($member_id)->whereId($amount_id)->first();
		return View::make('admin.amounts.edit', compact('amount'));
	}



	public function update($member_id, $amount_id)
	{

		$amount = Amount::find($amount_id);
		$input = Input::get();
		$rules = array(
		    'amount' => 'required',
		    'date' => 'required',
		    'receipt_no' => 'required|numeric',
		    'member_id' => 'integer'
		);

	    // Validate input
		$v = Validator::make($input, $rules);

		if($v->fails()){
			return Redirect::route('admin.members.amounts.edit', [ $input['member_id'], $amount->id ])->withInput()->withErrors( $v->messages() );
		}

		$amount->fill($input);
		$amount->save();
		return Redirect::route('admin.members.show', $input['member_id'])->withSuccess('Amount updated successfully');

	}


	public function destroy($member_id, $amount_id)
	{
		$amount = Amount::whereMemberId($member_id)->whereId($amount_id)->first();

		$amount->delete();
		
		return Redirect::route('admin.members.show', $member_id)->withSuccess('Amount removed successfully');
	}

}
