@extends('layouts.default')

@section('content')
<div>
    <div>
        <h3>{{ $post->title }}</h3>
        Article source: <a href="{{ $post->url }}">{{{ $post->title }}}</a><br><br>
    </div>
    <section class="comments">
        @foreach($post->comments as $comment)
            <div class="well">
                {{{ $comment->body }}}
            </div>
            by {{ link_to("profile/{$comment->user->id}", $comment->user->username) }} on
            @if($comment->created_at == new DateTime('today') )
                Today
            @else
                {{ $comment->created_at->format('j F Y') }}
            @endif
            <br><br>
        @endforeach
    </section>
    @if(Auth::check())
        <div>
            {{ Form::open(['route' => 'comment.store', 'method' => 'post']) }}
            <h4><a name="comment"></a>Add a comment</h4>
                <div>
                    {{ Form::textarea('body', null, ['placeholder' => 'Your comment', 'class' => 'input', 'required' => 'required']) }}
                </div>
                <div>
                    {{ Form::submit('Add comment', ['class' => 'btn btn-sm btn-default']) }}
                </div>
                <div>
                    {{ Form::hidden('post_id', $post->id) }}
                </div>
                @if($errors->any())
                <br>
                <div class="alert alert-danger">
                    <strong>Oops!</strong> {{$errors->first()}}
                </div>
                @endif
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