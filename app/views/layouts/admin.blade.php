<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Kutch Karvane Madina Tour</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" />
</head>
<body>
	<div class="container">
        @yield('content')
    </div>
    @include('partials.footer');


    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-2.1.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
</body>
</html>