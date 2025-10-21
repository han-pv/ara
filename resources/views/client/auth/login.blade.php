<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    @include('client.alert.app')
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="username">Username: </label><br>
        <input type="text" name="username" id="username"><br><br>

        <label for="password">Password: </label><br>
        <input type="password" name="password" id="password"><br><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>