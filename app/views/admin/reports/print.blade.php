@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-10 col-xs-offset-2 col-md-offset-1" >
    
        <legend>Members
          @if($group)
            - {{ $group->name }}
          @endif
        </legend>
        
        <div class="hidden-print">
          {{ Form::open(array('route' => 'report_by_group_print', 'method' => 'GET', 'class' => 'navbar-form navbar-right')) }}
              <label>Select Group: </label>
              <div class="form-group">
                {{ Form::select('group_id', $groups, $selected_group, array('id' => 'group_id',  'class' => 'form-control col-md-3')) }}
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>

          {{ Form::close() }}
        </div>

        <div class="table-responsive">

          @if($members->count())
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Bags</th>
                  <th>Belt</th>
                </tr>
              </thead>

              <tbody>
                @foreach($members as $member)
                <tr>
                 
                  <td><a href="{{ URL::route("admin.members.show", $member->id ) }}">{{ $member->name }}</a></td>
                  <td>{{ $member->contact_no }}</td>
                  <td></td>
                  <td>
                   
                  </td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <div class="alert alert-warning alert-dismissible div-warning" role="alert" > 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              No report founds
            </div>
          @endif
          
        </div>
        @if($members->count())
        <div class="text-right">
          <input id ="printbtn" type="button" value="Print this page" onclick="window.print();" class="btn btn-primary hidden-print">
        </div>
        @endif
    	</div>
    </div>
@stop