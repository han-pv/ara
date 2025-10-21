<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="" style="display: flex; justify-content: space-between; width: 50%;">
        <h1>Post Show</h1>

        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="hidden">
            <button style="background-color: red; padding: 10px;">Delete</button>
        </form>
    </div>
    <br>
    <hr>
    <h3> {{ $post->id }} <br></h3>
    <h3> {{ $post->content }} <br></h3>
    <!-- <h3>Image: {{ $post->image_path }} <br></h3> -->
    <img src="{{ asset('storage/' . $post->image_path) }}" style="width: 250px;" alt="">
    <h3>Video: {{ $post->video_path }} <br></h3>
</body>

</html>