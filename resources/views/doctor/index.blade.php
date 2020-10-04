@extends('components.app')
@section('navbar-additional-buttons')
    @include('components.nurse-dashboard.nurse-navbar')
@endsection
@section('content')
    <h1>you logged in as Doctor {{$user['name']}}</h1>
@endsection
@include('components.attend-pop-up')
@include('components.did-not-attend-pop-up')
