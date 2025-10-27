@extends('client.layouts.app')


@section('content')
    <div class="h3 fw-bold mb-4">
        <a href="{{ route('posts.index') }}" class="text-decoration-none h2">
            <i class="bi bi-arrow-left"></i>
        </a>
        {{ __('app.newPost') }}
    </div>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="form-label" for="text">{{ __('app.text') }}: </label><br>
        <input class="form-control" type="text" name="text" id="text"><br><br>

        <label for="image">{{ __('app.image') }}: </label><br>
        <input class="form-control" type="file" name="image" id="image"><br><br>

        <button type="submit" class="btn btn-primary">{{ __('app.submit') }}</button>
    </form>
@endsection