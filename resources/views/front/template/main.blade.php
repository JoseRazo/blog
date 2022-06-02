<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title', 'Default') | Blog</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('plugins/square/square.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body class="bg-light">
	<div class="m-3">
		@yield('content')
		<div class="row">
			<div class="col-md-12 col-lg-3 col-xl-3">
				@yield('asideleft')
			</div>
			<div class="col-md-12 col-lg-9 col-xl-9">
				@yield('main')
			</div>
		</div>
	</div>
	<script src="{{ asset('plugins/jquery/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
    	document.addEventListener('DOMContentLoaded', function() {
		    var elems = document.querySelectorAll('.sidenav');
		    var instances = M.Sidenav.init(elems, options);
		 });

		  // Or with jQuery

		$(document).ready(function(){
		  $('.sidenav').sidenav();
		});
    </script>
</body>
</html>