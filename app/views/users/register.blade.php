@extends('layouts.default')

@section('content')
<div>
    <div>
        {{ Form::open(['route' => 'user.store', 'method' => 'post', 'files' => true, 'class' => 'form-inline']) }}
        <h3>Sign Up</h3>
            <div class="input-group">
                {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <br><br>
            <div class="input-group">
                {{ Form::text('email', null, ['placeholder' => 'Email address', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <br><br>
            <div class="input-group">
                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <br><br>
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-default btn-file">Profile picture&hellip;
                        {{ Form::file('photo', null, ['placeholder' => 'Your profile picture', 'class' => 'form-control', 'required' => 'required']) }}
                    </span>
                </span>
                {{ Form::text('photo_feedback', null, ['class' => 'form-control']) }}

            </div>
            <br><br>
            <div class="input-group">
                {{ Form::textarea('about', null, ['placeholder' => 'Tell us about yourself', 'class' => 'form-control']) }}
            </div>
            <br><br>
            <div class="input-group">
                {{ Form::text('location', null, ['placeholder' => 'Location', 'class' => 'form-control']) }}
            </div>
            <br><br>
            <div class="input-group">
                {{ Form::text('facebook', null, ['placeholder' => 'Facebook', 'class' => 'form-control']) }}
            </div>
            <br><br>
            <div class="input-group">
                {{ Form::text('twitter', null, ['placeholder' => 'Twitter', 'class' => 'form-control']) }}
            </div>
            <br><br>
            <div class="input-group">
                {{ Form::submit('Register', ['class' => 'btn btn-default']) }}
            </div>
            @if($errors->any())
                <br>
                <div class="alert alert-danger">
                    <strong>Oops!</strong> {{$errors->first()}}
                </div>
            @endif
            <br><br><p class='xs'>Already have an account? <a href="login" class="link">Log in</a></p>
        {{ Form::close() }}
    </div>
</div>
@stop