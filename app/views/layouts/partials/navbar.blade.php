 <header>
 	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 	    <div class="container">
 	        <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="http://newsfeedr.herokuapp.com" class="navbar-brand">Newsfeedr</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/news">Latest</a></li>
                    <li><a href="/top-voted">Top voted</a></li>
                @if(Auth::check())
                    <li><a href="/submit">Submit</a></li>
                @endif
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/profile" alt="your profile">Profile</a></li>
                            <li><a href="/upvotes" alt="your upvotes">Upvotes</a></li>
                            <li class="divider"></li>
                            <li><a href="/logout"  alt="sign out">Log out</a></li>
                        </ul>
                @else
                    <li><a href="/login" alt="login">Log in</a></li>
                    <li><a href="/register" alt="register">Register</a></li>
                @endif
                </ul>
            </div>
        </div>
 	</nav>
 	
 	@if(Session::has('flash_notice'))
 		<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
 	@endif
 </header>
 