@extends('layouts.admin')

@section('content')
    <div class="row top-spacing-big">
    	<div class="col-xs-8 col-md-5 col-xs-offset-2 col-md-offset-3" >
    		{{ Form::model(null, array('route' => array('login.post'), 'class' => 'form-horizontal')) }}
    		{{ Form::token(); }}

    		<h2 class="header-login">Login</h2>
            {{ HTML::alert() }}
      
              <div class="form-group">
                {{ Form::label('username','Username', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::text('username', null, array('id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username') ) }}
                </div>
              </div>
              <div class="form-group">
                {{ Form::label('password','Password', array('class' => 'col-md-3 control-label') ) }}
                <div class="col-md-9">
                  {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-offset-6 col-md-9 col-xs-offset-3 col-xs-9">
                  <button type="submit" class="btn btn-primary btn-login">Sign in</button>
                </div>
              </div>

    		{{ Form::close(); }}
    	</div>
    </div>
@stop