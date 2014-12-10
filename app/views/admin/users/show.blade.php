@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-6 col-xs-offset-2 col-md-offset-3" >

        <legend>{{ $user->first_name }} {{ $user->last_name }}</legend>

        <div class="row">
          <div class="col-md-3 profile-pic">
            @if($user->image)
              <img src='{{ URL::asset("image/users/$user->image") }}' width="150px" height="150px">
            @endif
          </div>

          <div class="col-md-9">
            <dl class="dl-horizontal">
          <dt>First Name:</dt>
          <dd>{{ $user->first_name }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Last Name:</dt>
          <dd>{{ $user->last_name }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Username:</dt>
          <dd>{{ $user->username }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Email:</dt>
          <dd>{{ $user->email }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Mobile Number:</dt>
          <dd>{{ $user->mobile_no }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Address:</dt>
          <dd>{{ $user->address }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Role:</dt>
          <dd>{{ Config::get("user_roles.$user->role") }}</dd>
        </dl>



          <div>
            <a href="{{ URL::route("admin.users.edit", $user->id) }}" class="btn btn-primary">Edit</a>
            <a href="javascript:history.back();" class="btn btn-primary">Cancel</a>
          </div>

          </div>
        </div>

        
    	</div>
    </div>
@stop