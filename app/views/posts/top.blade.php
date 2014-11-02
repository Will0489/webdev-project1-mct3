@extends('layouts.default')

@section('content')
    <h3>Top voted posts</h3>
    <table class="table table-striped">
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ link_to($post->url, $post->title) }}</td>
                <td>submitted by {{ link_to("profile/{$post->user->id}", $post->user->username) }}</td>
                <td>{{ $post->created_at->format('d-M-Y') }}</td>
                <td>upvotes {{ $post->upvotes }}</td>
                <td>{{ link_to("news/$post->id", "Discuss") }}</td>
                <td>{{ link_to("upvote", "Upvote") }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop