@extends('client.layouts.app')


@section('content')
<div class="h3 fw-bold mb-4">
    <a href="{{ route('profile.show') }}" class="text-decoration-none h2">
        <i class="bi bi-arrow-left"></i>
    </a>
    {{ __('app.editProfile') }}
</div>


<form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <label for="image">{{ __('app.avatar') }}: </label><br>
    <input class="form-control" type="file" name="image" id="image" ><br><br>

    <label class="form-label" for="text">{{ __('app.bio') }}: </label><br>
    <input class="form-control" type="text" name="text" id="text" value="{{ $user->bio }}"><br><br>

    <button type="submit" class="btn btn-primary">{{ __('app.submit') }}</button>
</form>
@endsection