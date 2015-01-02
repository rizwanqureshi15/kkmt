@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-6 col-xs-offset-2 col-md-offset-3" >
    		{{ Form::model($amount, array('route' => array('admin.members.amounts.update', $amount->member->id, $amount->id), 'class' => 'form-horizontal', 'files' => true, 'method' => 'put')) }}

    		<legend>Edit Amount</legend>
    		<!-- <h2 class="header-login">Create Users</h2>
            {{ HTML::alert() }} -->
        {{ Form::hidden('member_id', $amount->member->id) }}

        <div class="form-group">
          {{ Form::label('name','Name', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9" style="margin-top:5px;">
            {{ $amount->member->name }}
          </div>
        </div>
      
        <div class="form-group">
          {{ Form::label('amount','Amount', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9">
            {{ Form::text('amount', null, array('id' => 'amount', 'class' => 'form-control', 'placeholder' => 'Amount') ) }}
            {{ Form::first_field_error('amount') }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('receipt_no','Receipt Number', array('class' => 'col-md-3 control-label') ) }}
          <div class="col-md-9">
            {{ Form::text('receipt_no', null, array('id' => 'receipt_no', 'class' => 'form-control', 'placeholder' => 'Receipt Number') ) }}
            {{ Form::first_field_error('receipt_no') }}
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
            <div class="col-md-offset-6 col-md-9 col-xs-offset-1 col-xs-10">
              <button type="submit" class="btn btn-primary btn-login">Update</button>
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