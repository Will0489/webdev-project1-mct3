 <header>
 	<nav>
 		<a href="/" class="logo left">Newsfeedr</a>
 		@if(Auth::check())
 		<ul class="left">
 			<li><a href="submit" class="btn small red">Submit an article!</a></li>
 		</ul>
 		@endif
 		<ul>
	 		@if(Auth::check())
	 		<li><a href="profile" class="btn small" alt="your profile"><img src="{{ $data['photo']}}" class="icon avatar"/>{{ $data['username'] }}</a></li>
	 		<li><a href="settings" alt="settings"><img src="/assets/icons/icon-settings.png" class="icon"/></a></li>
	 		<li><a href="logout"  alt="sign out"><img src="/assets/icons/icon-logout.png" class="icon"/></a></li>
	 		@else
	 		<li><a href="login" class="btn small">Sign In</a></li>
	 		<li><a href="register" class="btn small red">Sign Up</a></li>
 			@endif
 		</ul>
 	</nav>
 	
 	@if(Session::has('flash_notice'))
 		<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
 	@endif
 </header>
 