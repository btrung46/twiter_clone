@extends('Layout.layout')
@section('title', 'Admin idea')
@section('context')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left_sidebar')
        </div>
        <div class="col-9">
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th style="width: 300px;">Content</th>
                        <th>Join At </th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ideas as $idea)
                        <tr>
                            <td>{{ $idea->id }}</td>
                            <td>{{ $idea->user->name }}</td>
                            <td
                                class="text-truncate d-inline-block" style="max-width: 300px; width: 300px;"
                            >
                                {{ $idea->content }}</td>
                            <td>{{ $idea->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('idea.edit', $idea->id) }}">edit</a>
                                <a href="{{ route('idea.show', $idea->id) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $ideas->links() }}
            </div>
        </div>
    </div>
@endsection
