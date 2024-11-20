@extends('Layout.layout')
@section('title', 'Admin comment')
@section('context')
    <div class="row">
        @include('shares.success')
        <div class="col-3">
            @include('admin.shared.left_sidebar')
        </div>
        <div class="col-9">
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Idea Id</th>
                        <th style="width: 300px;">Content</th>
                        <th>Created At </th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td><a href="{{ route('user.show', $comment->user->id) }}">{{ $comment->user->name }}</a></td>
                            <td><a href="{{ route('idea.show', $comment->idea->id) }}">{{$comment->idea->id}}</a></td>
                            <td
                                class="text-truncate d-inline-block" style="max-width: 300px; width: 300px;"
                            >{{ $comment->comment }}</td>
                            <td>{{ $comment->created_at->toDateString() }}</td>
                            <td>
                                <form action="{{route('admin.comments.destroy', $comment->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button>delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
