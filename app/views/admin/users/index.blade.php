@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-10 col-xs-offset-2 col-md-offset-1" >
    
        <legend>Users</legend>
        {{ HTML::alert() }}

        @if(Auth::user()->role == 'admin')
          <div class="col-md-11 col-md-offset-1 text-right btn-add">
            <a class="btn btn-primary" href="{{ URL::route('admin.users.create') }}">Add User</a>
          </div>
        @endif

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Address</th>
                <th>Role</th>
                <th>Status</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach($users as $user)
              <tr>
                <td><a href="{{ URL::route("admin.users.show", $user->id ) }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile_no }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ Config::get("user_roles.$user->role") }}</td>
                <td>{{ Config::get("user_status.$user->is_active")}}</td> 
                <td><a href="{{ URL::route("admin.users.edit", $user->id ) }}">Edit</a></td>
                <td>
                  {{ Form::open(array('route' => array('admin.users.destroy', $user->id), 'method' => 'delete')) }}
                    <button class="btn btn-danger">Delete</button>
                  {{ Form::close() }}
                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="text-right">
          {{ $users->links() }}
        </div>

    	</div>
    </div>
@stop