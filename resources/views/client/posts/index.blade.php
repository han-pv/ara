<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <title>Document</title>
</head>

<body>
    @include('client.alert.app')
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="hidden">
        <button type="submit">LogOut</button>
    </form>
    @foreach ($posts as $post)
        <a href="{{ route('posts.show', [$post->id]) }}">
            <br><br>
            <hr>
            <h3> {{ $post->id }} <br></h3>
            <h3> {{ $post->content }} <br></h3>
            <!-- <h3>Image: {{ $post->image_path }} <br></h3> -->
            <img src="{{ asset('storage/' . $post->image_path) }}" style="width: 250px;" alt="">
            <h3>Video: {{ $post->video_path }} <br></h3>
        </a>

    @endforeach
</body>

</html>