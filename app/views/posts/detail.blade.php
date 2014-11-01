@extends('layouts.default')

@section('content')
<div>
    <div>
        <a href="{{ $post['url'] }}">{{ $post['title'] }}</a>
    </div>
    <div>
        {{ Form::open(['route' => 'comment.store', 'method' => 'post']) }}
        <h3>Add a comment</h3>
            <div>
                {{ Form::textarea('body', null, ['placeholder' => 'Your comment', 'class' => 'input']) }}
            </div>
            <div>
                {{ Form::submit('Add comment') }}
            </div>
            <div>
                @if($errors->any())
                <p class='xs'>{{$errors}}</p>
                @endif
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop