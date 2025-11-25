@extends('client.layouts.app')


@section('content')
    <div class="h3 fw-bold mb-4">
        <a href="{{ route('profile.show') }}" class="text-decoration-none h2">
            <i class="bi bi-arrow-left"></i>
        </a>
        {{ __('app.editProfile') }}
    </div>

    <div class="mb-5">
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
    
            <label class="form-label" for="text">{{ __('app.name') }}: </label><br>
            <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}"><br><br>
    
            <label class="form-label" for="text">{{ __('app.surname') }}: </label><br>
            <input class="form-control" type="text" name="surname" id="surname" value="{{ $user->surname }}"><br><br>
    
            <label class="form-label" for="text">{{ __('app.username') }}: </label><br>
            <input class="form-control" type="text" name="username" id="username" value="{{ $user->username }}"><br><br>
    
            <label for="image">{{ __('app.avatar') }}: </label><br>
            <input class="form-control" type="file" name="image" id="image"><br><br>
    
            <label class="form-label" for="text">{{ __('app.bio') }}: </label><br>
            <input class="form-control" type="text" name="text" id="text" value="{{ $profile->bio }}"><br><br>
    
            <button type="submit" class="btn btn-primary">{{ __('app.submit') }}</button>
        </form>
    </div>
@endsection