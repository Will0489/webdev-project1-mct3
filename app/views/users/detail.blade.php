@extends('layouts.default')

@section('content')
    <h3>{{ $user->username }}'s profile</h3>
    <p><img src="@if($user->photo != NULL) {{ $user->photo }} @endif" /></p>
    <p>Their profile details can be found below.</p>
    <p>They registered @if ($user->password == "") via Facebook @endif using {{ $user->email }} on {{ $user->created_at }}</p>

@stop