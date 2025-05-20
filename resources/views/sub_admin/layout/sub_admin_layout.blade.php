@extends('components.mazer.layout')

@section('page-title')
    @yield('title')| Sub Admin
@endsection

@section('custom-left-sidebar')
    @include('sub_admin.layout.sub_admin_left_side_bar')
@endsection
