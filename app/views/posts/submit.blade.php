@extends('layouts.default')

@section('content')
<div>
    <div>
        {{ Form::open(['route' => 'post.store', 'method' => 'post']) }}
        <h1>Submit an article, user {{ Auth::id() }}</h1>
            <div>
                {{ Form::text('title', null, ['placeholder' => 'Title', 'class' => 'input', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::text('url', null, ['placeholder' => 'Url to article', 'class' => 'input', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::submit('Submit') }}
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