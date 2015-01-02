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
          {{ Form::open(array('route' => 'report_by_group', 'method' => 'GET', 'class' => 'navbar-form navbar-right')) }}
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
                  <th>Group</th>
                  <th>Amount</th>
                </tr>
              </thead>

              <tbody>
                <?php $group_total = 0;?>
                @foreach($members as $member)
                <tr>
                 
                  <td><a href="{{ URL::route("admin.members.show", $member->id ) }}">{{ $member->name }}</a></td>
                  <td>{{ $member->contact_no }}</td>
                  <td>{{ $member->group->name }}</td>
                  <td>
                    <?php $total = 0; ?>
                    @foreach($member->amounts as $amount)
                      <?php $total += $amount->amount; ?>
                    @endforeach
                    <?php $group_total += $total; ?>
                    {{ number_format($total) }}
                  </td>
                  
                </tr>
                @endforeach
                <tr>
                  <td colspan="3" style="text-align: right;"><strong>Total: </strong></td>
                  <td>{{ number_format($group_total) }}</td>
                </tr>
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