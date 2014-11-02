@extends('layouts.default')

@section('content')
    <h3>Posts you upvoted</h3>
    @if($posts->first())
        <p>You haven't upvoted any posts yet.</p>
    @else
        <table class="table table-striped">
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post }}</td>
                    <td>{{ link_to($post->url, $post->title) }}</td>
                    <td>submitted by {{ link_to("/profile/{$post->user->id}", $post->user->username) }}</td>
                    <td>{{ $post->created_at->format('d-M-Y') }}</td>
                    <td><span class="glyphicon glyphicon-thumbs-up"></span> {{ $post->upvotes }}</td>
                    <td><span class="glyphicon glyphicon-comment"></span> {{ link_to("/news/$post->id", "Discuss") }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop