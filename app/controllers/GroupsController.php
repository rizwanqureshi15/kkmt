<?php

class GroupsController extends BaseController {

	public function index()
	{
		$groups = Group::paginate(10);

		return View::make('admin.groups.index', compact('groups'));
	}


	public function create()
	{
		return View::make('admin.groups.create');
	}


	public function store()
	{
		$input = Input::all();
		$rules = array(
		    'name' => 'required',
		    'date' => 'required',
		    'total_members' => 'required|numeric'
		);
		// Validate input
		$v = Validator::make($input, $rules);
		if($v->fails()){
			return Redirect::route('admin.groups.create')->withInput()->withErrors( $v->messages() );
		}


		$Group = new Group();
		$group->fill($input);
		$group->save();
		return Redirect::route('admin.groups.index')->withSuccess('Group created successfully');
	}


	public function edit($id)
	{
		$group = Group::find($id);
		return View::make('admin.groups.edit', compact('group'));
	}


	public function show($id)
	{
		$group = Group::find($id);
		return View::make('admin.groups.show', compact('group'));
	}


	public function update($id)
	{

		$group = Group::find($id);
		$input = Input::all();
		$rules = array(
		    'name' => 'required',
		    'date' => 'required',
		    'total_members' => 'required|numeric'
		);
		// Validate input
		$v = Validator::make($input, $rules);

		if($v->fails()){
			return Redirect::route('admin.groups.edit', $group->id)->withInput()->withErrors( $v->messages() );
		}

		$group->fill($input);
		$group->save();
		return Redirect::route('admin.groups.index')->withSuccess('Group updated successfully');
	}


	public function destroy($id)
	{
		$group = Group::find($id);
		$group->delete();
		
		return Redirect::route('admin.groups.index')->withSuccess('Group removed successfully');
	}

}
