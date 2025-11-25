<div class="post-card">
    <div class="post-header">
        <div class="post-user">
            <img src="{{ asset($post->user->avatar ? 'storage/' . $profile->avatar : "img/avatar.jpg") }}" alt="User">
            <div class="post-user-info">
                <h6>{{ $post->user->username }}</h6>
                <small>{{ $post->created_at->diffForHumans() }}</small>
            </div>
        </div>
        @if ($post->user->id == auth()->id())
            <div class="d-flex">
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="me-2 btn btn-sm btn-outline-danger"><span class="bi bi-trash"></span></button>
                </form>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-warning"><i
                        class="bi bi-pencil"></i></a>
            </div>

        @endif
    </div>
    <a href="{{ route('posts.show', [$post->id]) }}" class="text-decoration-none text-dark">
        @if ($post->image_path)
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post" class="post-image">
        @endif
        @if ($post->created_at != $post->updated_at)
            <div class="fst-italic text-secondary">
                <i class="bi bi-pencil"></i>
                {{ __('app.edited') }}
            </div>
        @endif
        <div class="post-content short-content">
            {{ $post->content  }}
        </div>
    </a>
    <div class="post-interactions">
        <button class="interaction-btn like-btn {{ $post->LikedBy(auth()->user()) ? 'liked' : '' }}"
            data-post-id="{{ $post->id }}" data-liked="{{ $post->LikedBy(auth()->user()) ? '1' : '0' }}"
            id="like-btn-{{ $post->id }}">
            <i class="bi bi-heart{{ $post->LikedBy(auth()->user()) ? '-fill' : '' }}"></i>
            <span class="like-count" id="like-count-{{ $post->id }}">{{ $post->likes_count }}</span>
        </button>
        <button class="interaction-btn">
            <i class="bi bi-chat"></i>
            <span>{{ $post->comments_count }}</span>
        </button>
        <button class="interaction-btn ms-auto">
            <i class="bi bi-bookmark"></i>
        </button>
    </div>
</div>