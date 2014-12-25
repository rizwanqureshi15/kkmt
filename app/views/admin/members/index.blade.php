@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-10 col-xs-offset-2 col-md-offset-1" >
    
        <legend>Members</legend>
        {{ HTML::alert() }}

        @if(Auth::user())
          <div class="col-md-11 col-md-offset-1 text-right btn-add">
            <a class="btn btn-primary" href="{{ URL::route('admin.members.create') }}">Add Member</a>
          </div>
        @endif

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Address</th>
                <th>Passport No</th>
                <th>Mobile Number</th>
                <th>Group</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach($members as $member)
              <tr>
                @if($member->image)
                <td><img src='{{ URL::asset("image/members/$member->image") }}' class="img-responsive img-circle img-size"></td>
                @else
                <td>No Image</td>
                @endif
                <td><a href="{{ URL::route("admin.members.show", $member->id ) }}">{{ $member->name }}</a></td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->passport_no }}</td>
                <td>{{ $member->contact_no }}</td>
                <td>{{ $member->group->name }}</td>
                <td><a href="{{ URL::route("admin.members.edit", $member->id ) }}">Edit</a></td>
                <td>
                  {{ Form::open(array('route' => array('admin.members.destroy', $member->id), 'method' => 'delete')) }}
                    <button class="btn btn-danger">Delete</button>
                  {{ Form::close() }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="text-right">
          {{ $members->links() }}
        </div>

    	</div>
    </div>
@stop