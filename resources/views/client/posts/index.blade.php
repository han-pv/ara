@extends('client.layouts.app')

@section('content')
    <!-- Create Post -->
    <div class="create-post">
        <div class="create-post-input">
            <img src="{{ asset('img/avatar.jpg') }}" alt="User">
            <input type="text" placeholder="{{ __('app.whatsOnYourMind') }}">
        </div>
        <div class="post-actions">
            <a href="{{ route("posts.create") }}" class="post-action-btn text-decoration-none">
                <i class="bi bi-image" style="color: #10b981;"></i>
                <span>{{ __('app.photo') }}</span>
            </a>
            <a href="{{ route("posts.create") }}" class="post-action-btn text-decoration-none">
                <i class="bi bi-play-btn" style="color: #ef4444;"></i>
                <span>{{ __('app.video') }}</span>
            </a>
            <a href="{{ route("posts.create") }}" class="post-action-btn text-decoration-none">
                <i class="bi bi-emoji-smile" style="color: #f59e0b;"></i>
                <span>{{ __('app.feeling') }}</span>
            </a>
        </div>
    </div>


    @forelse($posts as $post)
        @include('client.partials.post-card')
    @empty
        <div class="h1 text-center">
            Post tapylmady
        </div>
    @endforelse
@endsection