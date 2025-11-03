@extends('client.layouts.app')

@section('content')

    <a href="{{ route('posts.index') }}" class="h2">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div class="user-profile-card">
        <div class="profile-cover"></div>
        <div class="profile-info">
            <img src="{{ asset('img/avatar.jpg') }}" alt="Profile" class="profile-photo">
            <h5 class="profile-name">{{ $user->name . " " . $user->surname  }}</h5>
            <p class="profile-username"><span>@</span>{{  $user->username }}</p>
            <div class="bio mt-3">
                <div class="">{{ $profile->bio }}</div>
            </div>
            <div class="profile-stats">
                <div class="stat-item">
                    <div class="stat-number">{{ $user->posts_count }}</div>
                    <div class="stat-label">{{ __('app.posts') }}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $user->followers_count  }}</div>
                    <div class="stat-label">{{  __('app.followers') }}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $user->following_count  }}</div>
                    <div class="stat-label">{{ __('app.followings')  }}</div>
                </div>
            </div>
        </div>
    </div>

    <div>
        @forelse($myPosts as $post)
            @include('client.partials.post-card')

        @empty
            <div class="text-center">
                <div class="display-2 mb-3">
                    {{ __('app.notFoundPost') }} :(
                </div>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    + {{ __('app.addPost') }}
                </a>
            </div>
        @endforelse

    </div>
@endsection