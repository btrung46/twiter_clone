@extends('Layout.layout')
@section('title', 'View Idea')
@section('context')
<div class="row">
    <div class="col-3">
        @include('shares.left_sidebar')
    </div>
    <div class="col-6">
        @include('shares.success')
        <h4> Share yours ideas </h4>
            @include('shares.card-idea')
    </div>

    <div class="col-3">
        @include('shares.search_bar')
        @include('shares.follow_box')
    </div>
</div>
@endsection
