@extends('client.layouts.app')

@section('content')

 <!-- [http://192.168.3.177:8000] -->

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="hidden">
        <button type="submit">LogOut</button>
    </form>
    @foreach ($posts as $post)
        <a href="{{ route('posts.show', [$post->id]) }}">
            <br><br>
            <hr>
            <h3> {{ $post->user->username }} <br></h3>
            <h3> {{ $post->user->name }} <br></h3>
            <h3> {{ $post->id }} <br></h3>
            <h3> {{ $post->content }} <br></h3>
            <!-- <h3>Image: {{ $post->image_path }} <br></h3> -->
            <img src="{{ asset('storage/' . $post->image_path) }}" style="width: 250px;" alt="">
            <h3>Video: {{ $post->video_path }} <br></h3>
        </a>

    @endforeach
@endsection