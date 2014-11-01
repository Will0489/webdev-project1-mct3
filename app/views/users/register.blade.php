@extends('layouts.default')

@section('content')
<div>
    <div>
        {{ Form::open(['route' => 'user.store', 'method' => 'post', 'files' => true]) }}
        <h1>Sign Up</h1>
            <div>
                <a href="/login/fb">Sign up with Facebook</a><br><br>
            </div>
            <div>
                {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'input', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::text('email', null, ['placeholder' => 'Email address', 'class' => 'input', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'input', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::file('photo', null, ['placeholder' => 'Your profile picture', 'class' => 'input', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::textarea('about', null, ['placeholder' => 'Tell us about yourself', 'class' => 'input']) }}
            </div>
            <div>
                {{ Form::text('location', null, ['placeholder' => 'Location', 'class' => 'input']) }}
            </div>
            <div>
                {{ Form::text('facebook', null, ['placeholder' => 'Facebook', 'class' => 'input']) }}
            </div>
            <div>
                {{ Form::text('twitter', null, ['placeholder' => 'Twitter', 'class' => 'input']) }}
            </div>
            <div>
                {{ Form::submit('Register', ['class' => 'btn red xxl']) }}
            </div>
            <div>
                @if($errors->any())
                <p class='xs'>{{$errors}}</p>
                @endif
            </div>
            <p class='xs'>Already have an account? <a href="login" class="link">Log in</a></p>
        {{ Form::close() }}
    </div>
</div>
@stop