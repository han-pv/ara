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

    <!-- Posts -->
    @foreach ($posts as $post)
        <div class="post-card">
            <div class="post-header">
                <div class="post-user">
                    <img src="{{ asset('img/avatar.jpg') }}" alt="User">
                    <div class="post-user-info">
                        <h6>{{ $post->user->username }}</h6>
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                <i class="bi bi-three-dots" style="cursor: pointer; color: var(--text-muted);"></i>
            </div>
            <a href="{{ route('posts.show', [$post->id]) }}" class="text-decoration-none text-dark">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post" class="post-image">
                <div class="post-content short-content">
                    {{ $post->content  }}
                </div>
            </a>
            <div class="post-stats">
                <span>{{ $post->likes_count }} {{ __('app.likes') }}</span>
                <span>45 {{ __('app.comments') }} · 12 {{ __('app.shares') }}</span>
            </div>
            <div class="post-interactions">
                <form action="{{ route('post.like', $post->id) }}" method="post">
                    @csrf
                    <input type="hidden">
                    <button type="submit" class="interaction-btn {{ $post->LikedBy(auth()->user()) ? 'liked' : '' }}">
                        <i class="bi bi-heart{{ $post->LikedBy(auth()->user()) ? '-fill' : '' }}"></i>
                        <span>{{ __('app.like') }}</span>
                    </button>
                </form>
                <button class="interaction-btn">
                    <i class="bi bi-chat"></i>
                    <span>{{ __("app.comment") }}</span>
                </button>
                <button class="interaction-btn">
                    <i class="bi bi-share"></i>
                    <span>{{ __('app.share') }}</span>
                </button>
            </div>
        </div>
    @endforeach
@endsection