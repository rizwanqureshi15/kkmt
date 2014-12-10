@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-6 col-xs-offset-2 col-md-offset-3" >
    		{{ Form::model(null, array('route' => array('admin.groups.store'), 'class' => 'form-horizontal', 'files' => true)) }}

    		<legend>Create Group</legend>
    		
              <div class="form-group">
                {{ Form::label('name','Name', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('name', null, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name') ) }}
                  {{ Form::first_field_error('name') }}
                </div>
              </div>

              <div class="form-group">
                {{ Form::label('date','Date', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('date', null, array('id' => 'date', 'class' => 'form-control datepicker', 'placeholder' => 'Date', 'data-date-format' => "yyyy-mm-dd") ) }}
                  {{ Form::first_field_error('date') }}
                </div>
              </div>

              <div class="form-group">
                {{ Form::label('total_members','Total Members', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('total_members', null, array('id' => 'total_members', 'class' => 'form-control', 'placeholder' => 'Total Members') ) }}
                  {{ Form::first_field_error('total_members') }}
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-offset-5 col-md-9 col-xs-offset-1 col-xs-10">
                  <button type="submit" class="btn btn-primary btn-login">Add Group</button>
                  <a href="javascript:history.back();" class="btn btn-primary">Cancel</a>
                </div>
              </div>

    		{{ Form::close() }}
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
