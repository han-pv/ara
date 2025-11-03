@extends('client.layouts.app')


@section('content')
    <div class="h3 fw-bold mb-4">
        <a href="{{ route('posts.index') }}" class="text-decoration-none h2">
            <i class="bi bi-arrow-left"></i>
        </a>
        {{ __('app.editPost') }}
    </div>
    <img src="{{ asset('storage/' . $post->image_path) }}" class="w-100" alt="">

    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('put')
        <label class="form-label" for="text">{{ __('app.text') }}: </label><br>
        <input class="form-control" type="text" name="text" id="text" value="{{ $post->content }}"><br><br>

        <button type="submit" class="btn btn-primary">{{ __('app.submit') }}</button>
    </form>
@endsection