@if(Auth::user())  
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">KKMT</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          @if(Auth::user()->role == 'admin')
          <li class="{{ Request::url() == URL::route('admin.users.index') ? 'active' : ''}}"><a href="{{ URL::route('admin.users.index') }}"> Users<span class="sr-only">(current)</span></a></li>
          <li class="{{ Request::url() == URL::route('admin.groups.index') ? 'active' : ''}}"><a href="{{ URL::route('admin.groups.index') }}">Groups</a></li>
          @endif
          <li class="{{ Request::url() == URL::route('admin.members.index') ? 'active' : ''}}" ><a href="{{ URL::route('admin.members.index') }}">Members</a></li>
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ URL::route('admin.users.show', Auth::user()->id ) }}">Profile</a></li>
              <li><a href="{{ URL::route('admin.users.edit', Auth::user()->id ) }}">Edit Profile</a></li>
              <li class="divider"></li>
              <li><a href="{{ URL::route('logout') }}">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
@endif