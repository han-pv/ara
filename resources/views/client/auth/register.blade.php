<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset("./css/style.css") }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    @include('client.partials.alert')
    <div class="container-xxl">
        <div class="d-flex align-items-center justify-content-center vh-100">

            <form action="{{ route('register') }}" method="post" class="col-10 col-md-8 col-lg-6 col-xl-4">
                <div class="h2 fw-bold text-center mb-5">{{ __('app.register') }}</div>
                @csrf
                <div class="w-100  mt-3">
                    <label for="name" class="h6 form-label">{{ __("app.name") }}<span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error("name") border-danger @enderror" name="name" id="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-100 mt-3">
                    <label for="surname" class="h6 form-label">{{ __("app.surname") }} </label>
                    <input type="text" class="form-control @error("surname") border-danger @enderror" name="surname"
                        id="surname" value="{{ old('surname') }}">
                    @error('surname')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-100 mt-3">
                    <label for="username" class="h6 form-label">{{ __("app.username") }}<span
                            class="text-danger">*</span> </label>
                    <input type="text" class="form-control @error("username") border-danger @enderror" name="username"
                        id="username" value="{{ old('username') }}">

                    @error('username')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-100 mt-3">
                    <label for="password" class="h6 form-label">{{ __("app.password") }}<span
                            class="text-danger">*</span> </label>
                    <input type="password" id="password @error("password") border-danger @enderror" name="password"
                        class="form-control">
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-100 mt-3">
                    <label for="password_confirmation" class="h6 form-label">{{ __("app.PasswordConfirmation") }}<span
                            class="text-danger">*</span> </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control  @error("password_confirmation") border-danger @enderror">
                    @error('password_confirmation')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-custom w-100 mt-4">{{ __("app.submit") }}</button>
            </form>
        </div>
    </div>
</body>

</html>