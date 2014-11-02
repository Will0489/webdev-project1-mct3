@extends('layouts.default')

@section('content')
    <h3>Recent posts</h3>
    {{ $nonews = null }}
    <table class="table table-striped">
        <tbody>
        @foreach($posts as $post)
            @if($post->created_at->format('d-M-Y') == date('d-M-Y'))
            {{ $nonews = false; }}
            <tr>
                <td>{{ link_to($post->url, $post->title) }}</td>
                <td>submitted by {{ link_to("/profile/{$post->user->id}", $post->user->username) }}</td>
                <td>{{ $post->created_at->format('d-M-Y') }}</td>
                <td><span class="glyphicon glyphicon-thumbs-up"></span> {{ $post->upvotes }}</td>
                <td><span class="glyphicon glyphicon-comment"></span> {{ link_to("/news/$post->id", "Discuss") }}</td>

                <td>
                @if($post->votes->isEmpty())
                    {{ Form::open(['url' => '/upvote']) }}
                        {{ Form::hidden('post_id', $post->id) }}
                        {{ Form::submit('Vote', ['class' => 'btn-xs btn-default']) }}
                    {{ Form::close() }}
                @else
                    @foreach($post->votes as $vote)
                        @if($vote->upvoted_by == Auth::id())
                            Voted.
                        @endif
                    @endforeach
                @endif
                </td>

            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    @if($nonews == null)
        <p>No posts have been submitted yet today.</p>
    @endif
@stop