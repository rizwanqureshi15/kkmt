@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-6 col-xs-offset-2 col-md-offset-3" >

        <legend>{{ $group->name }}</legend>

        <dl class="dl-horizontal">
          <dt>Name:</dt>
          <dd>{{ $group->name }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Date:</dt>
          <dd>{{ $group->date }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Members:</dt>
          <dd>{{ $group->total_members }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Status:</dt>
          <dd>{{ Config::get("user_status.$group->is_active") }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt></dt>
          <dd>
             <a href="{{ URL::route("admin.groups.edit", $group->id) }}" class="btn btn-primary">Edit</a>
            <a href="javascript:history.back();" class="btn btn-primary">Cancel</a>
          </dd>
        </dl>
        
    	</div>
    </div>
@stop