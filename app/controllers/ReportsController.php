<?php

class ReportsController extends \BaseController {

	
	public function group()
	{
		$group_id = Input::get('group_id');
		if($group_id){
			$members = Member::where('group_id', '=', $group_id)->get();
			$group = Group::find($group_id);
			$selected_group = $group_id;
		}
		else{
			$members = Member::get();
			$group = null;
			$selected_group = null;
		}

		$groups = Group::where('is_active', '=', true)->lists('name', 'id');

		return View::make('admin.reports.group', compact('members', 'group', 'groups', 'selected_group'));
	}


	public function prints()
	{
		$group_id = Input::get('group_id');
		if($group_id){
			$members = Member::where('group_id', '=', $group_id)->get();
			$group = Group::find($group_id);
			$selected_group = $group_id;
		}
		else{
			$members = Member::get();
			$group = null;
			$selected_group = null;
		}

		$groups = Group::where('is_active', '=', true)->lists('name', 'id');

		return View::make('admin.reports.print', compact('members', 'group', 'groups', 'selected_group'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
