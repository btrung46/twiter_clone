@extends('Layout.layout')
@section('title', 'Admin dashboard')
@section('context')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left_sidebar')
        </div>
        <div class="col-9">
            <h1> admin dashboard</h1>
    </div>
@endsection
