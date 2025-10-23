<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <div>{{ __('app.welcome') }}</div>
            <div>@lang('app.welcome')</div>
            
            <div class="display-3 fw-bold">ARA</div>
            <div class="h1 fw-bold"><span class="text-success">ÖZ </span> ARA</div>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary">Register Now</a>

        </div>
    </div>

</body>

</html>