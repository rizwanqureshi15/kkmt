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

		return Redirect::route('admin.users.index');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route("login")->withSuccess('Logout successfuly.');
	}


	public function index()
	{
		$users = User::paginate(10);

		return View::make('admin.users.index', compact('users'));
	}


	public function create()
	{
		return View::make('admin.users.create');
	}


	public function store()
	{
		$input = Input::all();
		$rules = array(
		    'first_name' => 'required',
		    'last_name' => 'required',
		    'username' => 'required|unique:users',
		    'password' => 'required|min:6',
		    'email' => 'required|email',
		    'mobile_no' => 'required|numeric',
		    'address' => 'required',
		    'role' => 'required',
		    'image' => 'image',
		    
		);
		// Validate input
		$v = Validator::make($input, $rules);
		if($v->fails()){
			return Redirect::route('admin.users.create')->withInput()->withErrors( $v->messages() );
		}

		// Move News image to news folder
	    if( array_key_exists('image', $input) && !is_null($input['image']) ){
	      $fileName = sha1(time() . rand()) .".". $input['image']->getClientOriginalExtension();
	      $input['image']->move(public_path(). '/image/users/', $fileName);
	      $input['image'] = $fileName;
	    }
	    else{
	    	unset($input['image']);
	    }

		$user = new User();
		$user->fill($input);
		$user->save();
		return Redirect::route('admin.users.index')->withSuccess('User created successfully');
	}


	public function edit($id)
	{
		$user = User::find($id);
		return View::make('admin.users.edit', compact('user'));
	}


	public function show($id)
	{
		$user = User::find($id);
		return View::make('admin.users.show', compact('user'));
	}


	public function update($id)
	{

		$user = User::find($id);
		$input = Input::all();
		$rules = array(
		    'first_name' => 'required',
		    'last_name' => 'required',
		    'username' => "required|unique:users,username,$id",
		    'email' => 'required|email',
		    'mobile_no' => 'required|numeric',
		    'address' => 'required',
		    'role' => 'required',
		    
		);
		// Validate input
		$v = Validator::make($input, $rules);

		if($v->fails()){
			return Redirect::route('admin.users.edit', $user->id)->withInput()->withErrors( $v->messages() );
		}

		// Move News image to news folder
	    if( array_key_exists('image', $input) && !is_null($input['image']) ){
	      $fileName = sha1(time() . rand()) .".". $input['image']->getClientOriginalExtension();
	      $input['image']->move(public_path(). '/image/users/', $fileName);
	      $input['image'] = $fileName;
	    }
	    else{
	    	unset($input['image']);
	    }

		$user->fill($input);
		$user->save();
		return Redirect::route('admin.users.index')->withSuccess('User updated successfully');
	}


	public function destroy($id)
	{
		$user = User::find($id);
		File::delete(public_path(). "/image/users/$user->image");
		$user->delete();
		
		return Redirect::route('admin.users.index')->withSuccess('User removed successfully');
	}

}
