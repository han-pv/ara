<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title") ARA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset("./css/style.css") }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset("./js/main.js") }}"></script>
</head>

<body>
    @include('client.partials.nav')
    @include('client.partials.alert')

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3 sidebar">
                @include('client.partials.sidebar')
            </div>

            <div class="col-lg-7">
                @yield('content')
            </div>

            <div class="col-lg-3 right-sidebar">
                <!--     -->
            </div>
        </div>
    </div>
</body>

</html>