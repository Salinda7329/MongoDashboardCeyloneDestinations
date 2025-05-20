@extends('components.mazer.layout')

@section('page-title')
    @yield('title')| Admin
@endsection

@section('custom-left-sidebar')
    @include('admin.layout.admin_left_side_bar')
@endsection
