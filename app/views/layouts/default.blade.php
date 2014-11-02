<!doctype html>
<html>
	<head>
		@include('layouts.partials.head')
	</head>

	<body role="document" cz-shortcut-listen="true">
		@include('layouts.partials.navbar')
        <div class="container theme-showcase" role="main">
		@yield('content')
		</div>
		<div class="clearfix"></div>
		 
		@include('layouts.partials.footer')
		 		
	</body>
</html>