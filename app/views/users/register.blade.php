@extends('layouts.default')

@section('content')
<br/>
<div class="md-overlay"></div> 
<div class="md-modal md-effect md-show" id="modal">
    <div class="md-content">
        {{ Form::open(['route' => 'user.store', 'method' => 'post', 'files' => true, 'class' => 'form-group']) }}
        <h1>Sign Up</h1>
            <div class='btn fb big'>
                <a href="/login/fb">Sign Up  with Facebook</a>
            </div> 
            <div class="separator">
                <span class="div-line" ></span><p class="divider xs">or</p><span class="div-line" ></span>
            </div>   
            <div>
                {{ Form::text('firstname', null, ['placeholder' => 'First Name', 'class' => 'form-field form-field-xs left', 'required' => 'required']) }}
                {{ Form::text('lastname', null, ['placeholder' => 'Last Name', 'class' => 'form-field form-field-xs', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::text('email', null, ['placeholder' => 'Email address', 'class' => 'form-field', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-field', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::submit('Sign Up', ['class' => 'btn red xxl']) }}
            </div>
            <div>
                @if($errors->any())
                <p class='xs'>{{$errors}}</p>
                @endif
            </div>
            <p class='xs'>Creating an account means you are o'k with our <a class="link">Terms of Service</a> and <a class="link">Privacy Policy</a>.</p>
            <br/>
            <p class='xs'>Already have an account? <a href="login" class="link">Sign in</a></p>
        {{ Form::close() }}
@stop