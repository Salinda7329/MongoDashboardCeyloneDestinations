@extends('components.mazer.layout')

@section('page-title')
    @yield('title')| User
@endsection

@section('custom-left-sidebar')
    @include('user.layout.user_left_side_bar')
@endsection
