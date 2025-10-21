<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="content">Content: </label><br>
        <input type="text" name="content" id="content"><br><br>

        <label for="image">Image: </label><br>
        <input type="file" name="image" id="image"><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>