<?php

class MembersController extends BaseController {

	public function index()
	{
		$members = Member::paginate(10);

		return View::make('admin.members.index', compact('members'));
	}


	public function create()
	{
		$groups = Group::where('is_active','=', true)->lists('name', 'id');
		return View::make('admin.members.create', compact('groups'));
	}


	public function store()
	{
		$input = Input::all();
		$rules = array(
		    'name' => 'required',
		    'passport_no' => 'required',
		    'address' => 'required',
		    'birth_date' => 'required',
		    'contact_no' => 'required|numeric',
		    'image' => 'image',
		    'group_id' => 'integer',
		);

		// Validate input
		$v = Validator::make($input, $rules);
		if($v->fails()){
			return Redirect::route('admin.members.create')->withInput()->withErrors( $v->messages() );
		}

		// Move News image to news folder
	    if( array_key_exists('image', $input) && !is_null($input['image']) ){
	      $fileName = sha1(time() . rand()) .".". $input['image']->getClientOriginalExtension();
	      $input['image']->move(public_path(). '/image/members/', $fileName);
	      $input['image'] = $fileName;
	    }
	    else{
	    	unset($input['image']);
	    }
	    $input['user_id'] = Auth::user()->id;

		$member = new Member();
		$member->fill($input);
		$member->save();
		return Redirect::route('admin.members.index')->withSuccess('Member created successfully');
	}


	public function edit($id)
	{
		$member = Member::find($id);
		$groups = Group::where('is_active','=', true)->lists('name', 'id');
		return View::make('admin.members.edit', compact('member', 'groups'));
	}


	public function show($id)
	{
		$member = Member::find($id);
		return View::make('admin.members.show', compact('member'));
	}


	public function update($id)
	{
		$member = Member::find($id);
		$input = Input::all();
		$rules = array(
		    'name' => 'required',
		    'passport_no' => 'required',
		    'address' => 'required',
		    'birth_date' => 'required',
		    'contact_no' => 'required|numeric',
		    'image' => 'image',
		    'group_id' => 'integer',
		);

	    // Validate input
		$v = Validator::make($input, $rules);

		if($v->fails()){
			return Redirect::route('admin.members.edit', $member->id)->withInput()->withErrors( $v->messages() );
		}

		// Move News image to news folder
	    if( array_key_exists('image', $input) && !is_null($input['image']) ){
	      $fileName = sha1(time() . rand()) .".". $input['image']->getClientOriginalExtension();
	      $input['image']->move(public_path(). '/image/members/', $fileName);
	      $input['image'] = $fileName;
	    }
	    else{
	    	unset($input['image']);
	    }

		$member->fill($input);
		$member->save();
		return Redirect::route('admin.members.index')->withSuccess('Member updated successfully');

	}


	public function destroy($id)
	{
		$member = Member::find($id);
		File::delete(public_path(). "/image/members/$member->image");

		$user->delete();
		
		return Redirect::route('admin.members.index')->withSuccess('Member removed successfully');
	}

}
