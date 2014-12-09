<?php

class UsersController extends BaseController {


	public function login()
	{
		return View::make('admin.login');
	}

	public function postLogin()
	{
		if(! Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
		{
		    return Redirect::back()->withInput()->withError('Wrong username or password!');
		}

		return Redirect::intended('/');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::back()->withSuccess('Logout successfuly.');
	}

}
