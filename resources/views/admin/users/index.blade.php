@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl mt-5">
        <div class="h1 fw-bold">Users</div>
        <div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Post Count</th>
                    <th scope="col">Settings
                        <i class="bi bi-gear-fill"></i>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->posts_count }}</td>
                        <td>
                            <form action="{{ route('admin.users.block', $user->id) }}" method="post">
                                @csrf
                                <input type="hidden">
                                <button type="submit" class="btn btn-sm btn{{ $user->is_blocked ? '' : '-outline'}}-danger">
                                    <i class="bi bi-ban"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection