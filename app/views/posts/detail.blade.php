@extends('layouts.default')

@section('content')
<div>
    <div>
        <a href="{{ $post->url }}">{{ $post->title }}</a>
    </div>
    <section class="comments">
        @foreach($post->comments as $comment)
            <br><br>
            {{ $comment->body }}
            <br><br>
            by {{ $comment->user->username }} on {{ $comment->created_at }}
        @endforeach
    </section>
    @if(Auth::check())
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
                    {{ Form::hidden('post_id', $post->id) }}
                </div>
                <div>
                    @if($errors->any())
                    <p>{{$errors->first()}}</p>
                    @endif
                </div>
            {{ Form::close() }}
        </div>
    @else
        <div>
            <p>
                You need to <a href="/login">log in</a> to add comments.
            </p>
        </div>
    @endif
</div>
@stop