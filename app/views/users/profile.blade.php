@extends('layouts.default')

@section('content')
    <h3>Your profile</h3>
    <p><img src="@if($data->photo != NULL)@if($data->password!="")/@endif{{ $data->photo }}@endif" /></p>
    <p>{{ $data->username }} @if($data->location!="") from {{ $data->location }}@endif</p>
    <h4>About you</h4>
    <p>
    @if($data->about == "")
        You have nothing to say about yourself.
    @else
        {{ $data->about }}
    @endif
    </p>
    <h4>Social</h4>
    <p>
    @if($data->facebook == "")
        You haven't entered a Facebook profile.
    @else
        Your Facebook profile: {{ $data->facebook }}
    @endif
    </p>
    <p>
    @if($data->twitter == "")
        You haven't entered a Twitter profile.
    @else
        Your Twitter profile: {{ $data->twitter }}
    @endif
    </p>
    <p>You registered @if ($data->password == "") via Facebook @endif using {{ $data->email }} on {{ $data->created_at->format('d-M-Y') }}</p>
@stop