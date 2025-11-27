@extends('client.layouts.app')

@section('content')
    <div class="h1 fw-bold mb-4">
        {{ __('app.settings') }}
    </div>
    <div>
        <div class="dropdown w-100">
            <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ __('app.languages') }}
            </button>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="{{ route('locale', 'tm') }}">Türkmen</a></li>
                <li><a class="dropdown-item" href="{{ route('locale', 'ru') }}">Russian</a></li>
                <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">English</a></li>
            </ul>
        </div>
    </div>
@endsection