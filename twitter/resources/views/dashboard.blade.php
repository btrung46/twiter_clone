@extends('Layout.layout')

@section('context')
    <div class="row">
        <div class="col-3">
            @include('shares.left_sidebar')
        </div>
        <div class="col-6">
            @include('shares.success')
            <h4> Share yours ideas </h4>
            @include('shares.create_idea')
            <hr>
                @forelse ($ideas as $idea)
                    @include('shares.card-idea')
                @empty
                    <hr>
                    <h4 class="text-center">not found</h4>
                @endforelse
                <div class="mt-3"> {{ $ideas->withQueryString()->links() }}</div>

        </div>

        <div class="col-3">
            @include('shares.search_bar')
            @include('shares.follow_box')
        </div>
    </div>
@endsection
