@extends('layouts.default')

@section('content')
    <h3>Your profile</h3>
    <p><img src="@if($data->photo != NULL) {{ $data->photo }} @endif" /></p>
    <p>Welcome back {{ $data->username }}. Your profile details can be found below.</p>
    <p>You registered @if ($data->password == "") via Facebook @endif using {{ $data->email }} on {{ $data->created_at }}</p>

@stop