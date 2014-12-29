@extends('layouts.admin')

@section('content')
    <div class="row">
    	<div class="col-xs-8 col-md-6 col-xs-offset-2 col-md-offset-3" >
        {{ HTML::alert() }}

        <legend>
          {{ $member->name }}
          <span class="btn-amount"><a href="{{ URL::route("admin.members.amounts.create", $member->id) }}" class="btn btn-primary">Add Amount</a></span>
        </legend>

        <div class="row">
          <div class="col-md-3 profile-pic">
            @if($member->image)
              <img src='{{ URL::asset("image/members/$member->image") }}' width="150px" height="150px">
            @endif
          </div>

          <div class="col-md-9">
            <dl class="dl-horizontal">
          <dt>Name:</dt>
          <dd>{{ $member->name }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Passport Number:</dt>
          <dd>{{ $member->passport_no }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Address:</dt>
          <dd>{{ $member->address }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Birth Date:</dt>
          <dd>{{ $member->birth_date }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Contact Number:</dt>
          <dd>{{ $member->contact_no }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Group:</dt>
          <dd>{{ $member->group->name }}</dd>
        </dl>

        @if($member->amounts->count())
         <dl class="dl-horizontal">
          <dt>Amounts:</dt>
          <dd>
            <?php $i = 1; ?>
            @foreach($member->amounts as $amount)
              <span><strong>{{ $i }}: </strong></span>
              <span><strong>Date:</strong> {{ $amount->date->format('d-m-Y') }}</span>
              <span><strong>Rs:</strong> {{ $amount->amount }}</span>
              <span><a href="{{ URL::route("admin.members.amounts.edit", [$member->id, $amount->id]) }}" class="btn btn-primary">Edit</a></span>
              <?php $i++; ?>
            @endforeach
          </dd>
        </dl>
        @endif
        

          <div>
            <a href="{{ URL::route("admin.members.edit", $member->id) }}" class="btn btn-primary">Edit</a>
            <a href="javascript:history.back();" class="btn btn-primary">Cancel</a>
          </div>

          </div>
        </div>

        
    	</div>
    </div>
@stop