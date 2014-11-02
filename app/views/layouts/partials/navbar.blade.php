 <header>
 	<nav>
 		<a href="/" class="logo left">Newsfeedr</a>
 		<ul class="left">
 		@if(Auth::check())
 			<li><a href="/submit">Submit</a></li>
 		@else
 		    <li><a href="/login">Submit</a></li>
 		@endif
 		</ul>
 		<ul>
	 		@if(Auth::check())
                <li><a href="/profile" alt="your profile"><img src="{{ Auth::user()->photo}}" class="icon avatar"/>{{ Auth::user()->username }}</a></li>
                <li><a href="/logout"  alt="sign out">Log out</a></li>
	 		@else
                <li><a href="/login" alt="login">Log in</a></li>
                <li><a href="/register" alt="register">Register</a></li>
 			@endif
 		</ul>
 	</nav>
 	
 	@if(Session::has('flash_notice'))
 		<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
 	@endif
 </header>
 