@extends('layouts.default')

@section('content')
    <h3>Top voted posts</h3>
    @if(!$posts->isEmpty())
    <table class="table table-striped">
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ link_to($post->url, $post->title) }}</td>
                <td>submitted by {{ link_to("profile/{$post->user->id}", $post->user->username) }}</td>
                <td>{{ $post->created_at->format('d-M-Y') }}</td>
                <td><span class="glyphicon glyphicon-thumbs-up"></span> {{ $post->upvotes }}</td>
                <td><span class="glyphicon glyphicon-comment"></span> {{ link_to("news/$post->id", "Discuss") }}</td>
                <td>
                @if($post->votes->isEmpty())
                    {{ Form::open(['url' => '/upvote']) }}
                        {{ Form::hidden('post_id', $post->id) }}
                        {{ Form::submit('Upvote', ['class' => 'btn-xs btn-default']) }}
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
        @endforeach
        </tbody>
    </table>
    @else
        <p>No posts have been upvoted yet.</p>
    @endif
@stop