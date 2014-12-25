@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-6 col-xs-offset-2 col-md-offset-3" >
    		{{ Form::model(null, array('route' => array('admin.members.store'), 'class' => 'form-horizontal', 'files' => true)) }}

    		<legend>Create Member</legend>
      
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

        <div class="form-group">
          {{ Form::label('image','Picture', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9">
            {{ Form::file('image', null, array('id' => 'image', 'class' => 'form-control') ) }}
            {{ Form::first_field_error('image') }}
          </div>
        </div>

       
        <div class="form-group">
          <div class="col-md-offset-5 col-md-9 col-xs-offset-1 col-xs-10">
            <button type="submit" class="btn btn-primary btn-login">Add</button>
            <a href="javascript:history.back();" class="btn btn-primary">Cancel</a>
          </div>
        </div>

    		{{ Form::close(); }}
    	</div>
    </div>
@stop

@section('footer')
<link rel="stylesheet" href="{{ URL::asset('assets/css/datepicker.css') }}" />
  <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap-datepicker.js') }}"></script>

  <script type="text/javascript">
    $('.datepicker').datepicker()
  </script>
@stop
