@extends('client.layouts.app')

@section('content')
    <div class="h3 fw-bold mb-4">
        <a href="{{ route('posts.index') }}" class="text-decoration-none h2">
            <i class="bi bi-arrow-left"></i>
        </a>
        {{ __('app.users') }}
    </div>

    @forelse($users as $user)
        <div class="suggestion-item">
            <div class="suggestion-user">
                <img src="{{ asset('img/avatar.jpg') }}" alt="User">
                <div class="suggestion-user-info">
                    <h6>{{ $user->name . " " . $user->surname }}</h6>
                </div>
            </div>
            <form action="{{ route('follow', $user->id) }}" method="post">
                @csrf
                <input type="hidden">
                @if (auth()->user()->isFollow($user))
                    <button type="submit" class="follow-btn bg-secondary">{{ __('app.following') }}</button>
                @else
                    <button type="submit" class="follow-btn">{{ __('app.follow') }}</button>

                @endif
            </form>
        </div>
    @empty
        <div class="h1 text-center">
            User tapylmady
        </div>
    @endforelse
@endsection