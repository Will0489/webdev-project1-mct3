@extends('layouts.default')

@section('content')
<div>
    <div>
        {{ Form::open(['route' => 'post.store', 'method' => 'post', 'class' => 'form-inline']) }}
        <h3>Submit a post</h3>
            <div>
                {{ Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <br>
            <div>
                {{ Form::text('url', null, ['placeholder' => 'Url to article', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <br>
            <div>
                {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
            </div>
            @if($errors->any())
                <br>
                <div class="alert alert-danger">
                    <strong>Oops!</strong> {{$errors->first()}}
                </div>
            @endif
        {{ Form::close() }}
    </div>
</div>
@stop