@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-6 col-xs-offset-2 col-md-offset-3" >
    
        <legend>Groups</legend>
        {{ HTML::alert() }}

        @if(Auth::user()->role == 'admin')
          <div class="col-md-11 col-md-offset-1 text-right btn-add">
            <a class="btn btn-primary" href="{{ URL::route('admin.groups.create') }}">Add Group</a>
          </div>
        @endif

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Members</th>
                <th>Status</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach($groups as $group)
              <tr>
                <td><a href="{{ URL::route("admin.groups.show", $group->id ) }}">{{ $group->name }}</a></td>
                <td>{{ $group->date }}</td>
                <td>{{ $group->total_members }}</td>
                <td>{{ Config::get("user_status.$group->is_active")}}</td> 
                <td><a href="{{ URL::route("admin.groups.edit", $group->id ) }}">Edit</a></td>
                <td>
                  {{ Form::open(array('route' => array('admin.groups.destroy', $group->id), 'method' => 'delete')) }}
                    <button class="btn btn-danger">Delete</button>
                  {{ Form::close() }}
                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="text-right">
          {{ $groups->links() }}
        </div>

    	</div>
    </div>
@stop