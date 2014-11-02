@extends('layouts.default')

@section('content')
<div>
	<div>
		{{ Form::open(['route' => 'sessions.store', 'class' => 'form-inline']) }}
			<h3>Log in</h3>
			<div class="input-group">
				{{ Form::text('email', null, ['placeholder' => 'Email address', 'class' => 'form-control', 'required' => 'required']) }}
			</div>
            <br><br>
			<div class="input-group">
				{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required']) }}
			</div>
            <br><br>
			<div>
				{{ Form::submit('Log in', ['class' => 'btn btn-default']) }} &nbsp;&nbsp;or&nbsp;&nbsp;<a href="/login/fb" class="btn btn-primary">Log in with Facebook</a>
			</div>
            @if($errors->any())
                <br>
                <div class="alert alert-danger">
                    <strong>Oops!</strong> {{$errors->first()}}
                </div>
            @endif
			<br>
		{{ Form::close() }}
		<p class='xs'>Don't have an account yet? <a href="register" class="link">Register</a> here.</p>
	</div>
</div>
@stop