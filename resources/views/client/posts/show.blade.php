@extends('client.layouts.app')

@section('content')

    <a href="{{ route('posts.index') }}" class="h2">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div class="post-card">
        <div class="post-header">
            <div class="post-user">
                <img src="{{ asset('img/avatar.jpg') }}" alt="User">
                <div class="post-user-info">
                    <h6>{{ $post->user->username }}</h6>
                    <small>2 hours ago</small>
                </div>
            </div>
            <i class="bi bi-three-dots" style="cursor: pointer; color: var(--text-muted);"></i>
        </div>
        <div class="text-decoration-none text-dark">
            <!-- <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post" class="post-image"> -->
            <div class="post-content short-content">
                {{ $post->content }}
            </div>
        </div>
        <div class="post-stats">
            <span>234 {{ __('app.likes') }}</span>
            <span>45 {{ __('app.comments') }} · 12 {{ __('app.shares') }}</span>
        </div>
        <div class="post-interactions">
            <button class="interaction-btn">
                <i class="bi bi-heart"></i>
                <span>{{ __('app.like') }}</span>
            </button>
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
@endsection