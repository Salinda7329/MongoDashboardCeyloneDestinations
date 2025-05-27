@extends('admin.layout.admin_layout')

@section('page-title')
    Admin | Dashboard
@endsection

@section('main-content')
    @foreach ($destinations as $item)
        <div>{{ $item }}</div>
    @endforeach
@endsection

@section('after-body')
@endsection
