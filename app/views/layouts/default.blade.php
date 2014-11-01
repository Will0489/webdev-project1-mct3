<!doctype html>
<html>
	<head>
		@include('layouts.partials.head')
	</head>

	<body>
		@include('layouts.partials.navbar')
			
		@yield('content')
		
		<div class="clearfix"></div>
		 
		@include('layouts.partials.footer')
		 		
	</body>
</html>