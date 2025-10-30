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
    @include('client.partials.alert')
    <div class="container-xxl">
        <div class="d-flex align-items-center justify-content-center vh-100">

            <form action="{{ route('login') }}" method="post" class="col-10 col-md-8 col-lg-6 col-xl-4">
                <div class="h2 fw-bold text-center mb-5">{{ __("app.login") }}</div>
                @csrf
                <div class="w-100">
                    <label for="username" class="h6 form-label">{{ __("app.username") }}: </label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                    @error('username')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="w-100 mt-3">
                    <label for="password" class="h6 form-label">{{ __("app.password") }}: </label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-success w-100 mt-4">{{ __("app.submit") }}</button>
            </form>
        </div>
    </div>
</body>

</html>