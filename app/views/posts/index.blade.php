@extends('layouts.default')

@section('content')
    <h1>Recent news</h1>
    <ul>
        @foreach($posts as $post)
            <li>
                {{ link_to("news/$post->id", $post->title) }}
                posted by {{ link_to("profile/{$post->user->id}", $post->user->username) }}
                upvotes {{ $post->upvotes }}
            </li>
        @endforeach
    </ul>
@stop