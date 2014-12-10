@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-6 col-xs-offset-2 col-md-offset-3" >
    		{{ Form::model($user, array('route' => array('admin.users.update', $user->id), 'class' => 'form-horizontal', 'files' => true, 'method' => 'put')) }}

    		<legend>Edit User</legend>
    		<!-- <h2 class="header-login">Create Users</h2>
            {{ HTML::alert() }} -->
      		
              <div class="form-group">
                {{ Form::label('first_name','First Name', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('first_name', null, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'First Name') ) }}
                  {{ Form::first_field_error('first_name') }}
                </div>
              </div>

              <div class="form-group">
                {{ Form::label('last_name','Last Name', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('last_name', null, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Last Name') ) }}
                  {{ Form::first_field_error('last_name') }}
                </div>
              </div>

              <div class="form-group">
                {{ Form::label('username','Username', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('username', null, array('id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username') ) }}
                  {{ Form::first_field_error('username') }}
                </div>
              </div>

             <!--  <div class="form-group">
                {{ Form::label('password','Password', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('password', null, array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password') ) }}
                  {{ Form::first_field_error('password') }}
                </div>
              </div> -->

              <div class="form-group">
                {{ Form::label('email','Email', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email') ) }}
                  {{ Form::first_field_error('email') }}
                </div>
              </div>

              <div class="form-group">
                {{ Form::label('mobile_no','Mobile No', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('mobile_no', null, array('id' => 'mobile_no', 'class' => 'form-control', 'placeholder' => 'Mobile No') ) }}
                  {{ Form::first_field_error('mobile_no') }}
                </div>
              </div>

              <div class="form-group">
                {{ Form::label('address','Address', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::textarea('address', null, array('id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address', 'rows' => '3') ) }}
                  {{ Form::first_field_error('address') }}
                </div>
              </div>

              <div class="form-group">
                {{ Form::label('role','Role', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::select('role', Config::get('user_roles'), null,  array('id' => 'role', 'class' => 'form-control') ) }}
                  {{ Form::first_field_error('role') }}
                </div>
              </div>

              <div class="form-group">
                {{ Form::label('is_active','Status', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::select('is_active', Config::get('user_status'), null,  array('id' => 'is_active', 'class' => 'form-control') ) }}
                  {{ Form::first_field_error('is_active') }}
                </div>
              </div>

              @if($user->image)
              <div class="form-group">
                {{ Form::label('profile_pic','Profile Picture', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  <img src='{{ URL::asset("image/users/$user->image") }}' width="150px">
                </div>
              </div>
              @endif

              <div class="form-group">
                {{ Form::label('image','Profile Picture', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::file('image', null, array('id' => 'image', 'class' => 'form-control') ) }}
                  {{ Form::first_field_error('image') }}
                </div>
              </div>

             
              <div class="form-group">
                <div class="col-md-offset-6 col-md-9 col-xs-offset-3 col-xs-9">
                  <button type="submit" class="btn btn-primary btn-login">Update</button>
                  <a href="javascript:history.back();" class="btn btn-primary">Cancel</a>
                </div>
              </div>

    		{{ Form::close() }}
    	</div>
    </div>
@stop