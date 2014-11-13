@extends('layouts.default')

@section('content')
    <h3>Recent posts</h3>
    @if($posts->isEmpty())
        <p>Nothing has been posted yet today.</p>
    @else
        <table class="table table-striped">
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ link_to($post->url, $post->title) }}</td>
                    <td>submitted by {{ link_to("/profile/{$post->user->id}", $post->user->username) }}</td>
                    <td>Today at {{ $post->created_at->format('H:i') }}</td>
                    <td><span class="glyphicon glyphicon-thumbs-up"></span> {{ $post->upvotes }}</td>
                    <td><span class="glyphicon glyphicon-comment"></span> {{ link_to("/news/$post->id", "Discuss") }}</td>

                    <td>
                    @if($post->votes->isEmpty())
                        {{ Form::open(['url' => '/upvote']) }}
                            {{ Form::hidden('post_id', $post->id) }}
                            {{ Form::submit('Vote', ['class' => 'btn-xs btn-default']) }}
                        {{ Form::close() }}
                    @else
                        Voted.
                    @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop