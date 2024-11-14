@extends('Layout.layout')
@section('title', 'Edit profile')
@section('context')
    <div class="row">
        <div class="col-3">
            @include('shares.left_sidebar')
        </div>
        <div class="col-6">
            @include('shares.success')
            <div class="card mt-3">
                @include('users.profile_edit_card')
            </div>
            @if ($edit === false)
                @foreach ($ideas as $idea)
                    @include('shares.card-idea')
                @endforeach
                <div class="mt-3"> {{$ideas ->withQueryString()->links()}}</div>
            @endif
        </div>

        <div class="col-3">
            @include('shares.follow_box')
        </div>
    </div>
@endsection
