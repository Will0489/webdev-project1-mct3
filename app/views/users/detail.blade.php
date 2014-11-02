@extends('layouts.default')

@section('content')
    <h3>{{ $user->username }}'s profile</h3>
    <p><img src="@if($user->photo != NULL)@if($user->password!="")/@endif{{ $user->photo }}@endif" /></p>
    <h4>About them</h4>
        <p>
        @if($user->about == "")
            They have nothing to say about themselves.
        @else
            {{ $user->about }}
        @endif
        </p>
        <h4>Social</h4>
        <p>
        @if($user->facebook == "")
            They haven't entered a Facebook profile.
        @else
            Their Facebook profile: {{ $user->facebook }}
        @endif
        </p>
        <p>
        @if($user->twitter == "")
            They haven't entered a Twitter profile.
        @else
            Their Twitter profile: {{ $user->twitter }}
        @endif
        </p>
        <p>They registered @if ($user->password == "") via Facebook @endif using {{ $user->email }} on {{ $user->created_at->format('d-M-Y') }}</p>
@stop