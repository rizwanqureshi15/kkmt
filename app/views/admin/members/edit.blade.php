@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-6 col-xs-offset-2 col-md-offset-3" >
    		{{ Form::model($member, array('route' => array('admin.members.update', $member->id), 'class' => 'form-horizontal', 'files' => true, 'method' => 'put')) }}

    		<legend>Edit Member</legend>
    		<!-- <h2 class="header-login">Create Users</h2>
            {{ HTML::alert() }} -->

        <div class="form-group">
          {{ Form::label('name','Name', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9">
            {{ Form::text('name', null, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name') ) }}
            {{ Form::first_field_error('name') }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('passport_no','Passport Number', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9">
            {{ Form::text('passport_no', null, array('id' => 'passport_no', 'class' => 'form-control', 'placeholder' => 'Passport Number') ) }}
            {{ Form::first_field_error('passport_no') }}
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
          {{ Form::label('birth_date','Birth Date', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9">
            {{ Form::text('birth_date', null, array('id' => 'birth_date', 'class' => 'form-control datepicker', 'placeholder' => 'Birth Date', 'data-date-format' => "yyyy-mm-dd") ) }}
            {{ Form::first_field_error('birth_date') }}
          </div>
        </div>
        
        <div class="form-group">
          {{ Form::label('contact_no','Contact Number', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9">
            {{ Form::text('contact_no', null, array('id' => 'contact_no', 'class' => 'form-control', 'placeholder' => 'Contact Number') ) }}
            {{ Form::first_field_error('contact_no') }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('group_id','Group', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9">
            {{ Form::select('group_id', $groups, null, array('id' => 'email', 'class' => 'form-control') ) }}
            {{ Form::first_field_error('group_id') }}
          </div>
        </div>

        @if($member->image)
          <div class="form-group">
            {{ Form::label('profile_pic','Profile Picture', array('class' => 'col-md-3 control-label') ) }}
            <div class="col-md-9">
              <img src='{{ URL::asset("image/members/$member->image") }}' width="150px">
            </div>
          </div>
        @endif

        <div class="form-group">
          {{ Form::label('image','Picture', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9">
            {{ Form::file('image', null, array('id' => 'image', 'class' => 'form-control') ) }}
            {{ Form::first_field_error('image') }}
          </div>
        </div>
             
          <div class="form-group">
            <div class="col-md-offset-6 col-md-9 col-xs-offset-1 col-xs-10">
              <button type="submit" class="btn btn-primary btn-login">Update</button>
              <a href="javascript:history.back();" class="btn btn-primary">Cancel</a>
            </div>
          </div>

    		{{ Form::close() }}
    	</div>
    </div>
@stop