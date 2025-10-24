<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
        #wrapper {
            width: 100%;
            min-height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3em;
        }

        #wrapper span {
            transition: all 0.6s ease-in-out;
            white-space: nowrap;
        }

        #oz {
            opacity: 0;
            margin-right: -150px;
        }

        .activated #oz {
            opacity: 1;
            margin-right: 20px;
        }
    </style>

</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <a href="{{ route('locale', 'tm') }}" class="btn btn-sm btn-outline-dark">TM</a>
            <a href="{{ route('locale', 'ru') }}" class="btn btn-sm btn-outline-dark">RU</a>
            <a href="{{ route('locale', 'en') }}" class="btn btn-sm btn-outline-dark">EN</a>
            <div class="h1 my-4">{{ __('app.welcome') }}</div>

            <div class="h1 fw-bold">
                <div id="wrapper">
                    <span id="oz" class="text-success">ÖZ </span>
                    <span id="ara">ARA</span>
                </div>
            </div>
            <a href="{{ route('login') }}" class="btn btn-dark">{{ __('app.login') }} <i class="bi-box-arrow-in-right"></i> </a>
            <a href="{{ route('register') }}" class="btn btn-outline-success ms-2">{{ __("app.registerNow") }} <i
                    class="bi-person-plus"></i></a>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const wrapper = document.getElementById('wrapper');
                const ozElement = document.getElementById('oz');

                setTimeout(() => {
                    wrapper.classList.add('activated');
                }, 2000)

                setInterval(() => {
                    wrapper.classList.toggle('activated');
                }, 9000);
            });
        </script>
    </div>

</body>

</html>