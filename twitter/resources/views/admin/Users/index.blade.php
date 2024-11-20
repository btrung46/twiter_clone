@extends('Layout.layout')
@section('title', 'Admin user')
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Join At </th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{ route('user.show', $user->id) }}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->toDateString()}}</td>
                            <td>
                                <form action="{{route('admin.user.destroy', $user->id)}}" method="post">
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
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
