@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl mt-5">
        <div class="h1 fw-bold">Posts</div>
        <div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Userid</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image_path</th>
                    <th scope="col">View_Count</th>
                    <th scope="col">Settings
                        <i class="bi bi-gear-fill"></i>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $post->user_id }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->image_path }}</td>
                        <td>{{ $post->view_count }}</td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden">
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection