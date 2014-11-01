@extends('layouts.default')

@section('content')
<br/>
<div class="md-overlay"></div>
<div class="md-modal md-effect md-show" id="modal">
	<div class="md-content">
		{{ Form::open(['route' => 'sessions.store', 'class' => 'form-group']) }}
			<h1>Log in</h1>
			<div class='btn fb big'>
				<a href="/login/fb">Log in with Facebook</a>
			</div>
			<div class="separator">
				<span class="div-line" ></span><p class="divider xs">or</p><span class="div-line" ></span>
			</div>

			<div>
				{{ Form::text('email', null, ['placeholder' => 'Email address', 'class' => 'form-field', 'required' => 'required']) }}
			</div>

			<div>
				{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-field', 'required' => 'required']) }}
			</div>

			<div>
				{{ Form::submit('Log in', ['class' => 'btn red xxl']) }}
			</div>
			<div>
				@if($errors->any())
				<p class='xs'>{{$errors->first()}}</p>
				<br/>
				@endif
			</div>
			<br/>
		{{ Form::close() }}
		<p class='xs'>Don't have an account yet? <a href="signup" class="link">Register</a> here.</p>
	</div>
</div>
@stop