@extends('layouts.default')

@section('content')
    <h3>{{ $user->username }}'s profile</h3>
    <p><img src="@if($user->photo != NULL)@if($user->password!="")/@endif{{ $user->photo }}@endif" /></p>
    <p>They registered @if ($user->password == "") via Facebook @endif using {{ $user->email }} on {{ $user->created_at }}</p>
@stop