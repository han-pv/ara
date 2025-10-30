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
        @if ($post->image_path)
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post" class="post-image">
        @endif
        <div class="post-content short-content">
            {{ $post->content  }}
        </div>
    </a>
    <div class="post-stats">
        <span>{{ $post->likes_count }} {{ __('app.likes') }}</span>
        <span>45 {{ __('app.comments') }}</span>
    </div>
    <div class="post-interactions">
        <form action="{{ route('post.like', $post->id) }}" method="post" class="w-100">
            @csrf
            <input type="hidden">
            <button type="submit" class="interaction-btn  {{ $post->LikedBy(auth()->user()) ? 'liked' : '' }}">
                <i class="bi bi-heart{{ $post->LikedBy(auth()->user()) ? '-fill' : '' }}"></i>
                <span>{{ __('app.like') }}</span>
            </button>
        </form>
        <button class="interaction-btn">
            <i class="bi bi-chat"></i>
            <span>{{ __("app.comment") }}</span>
        </button>
    </div>
</div>