@extends('client.layouts.app')

@section('content')
    <a href="{{ route('posts.index') }}" class="h2 mb-4 d-inline-block">
        <i class="bi bi-arrow-left"></i>
    </a>

    @include('client.partials.post-card')

    <div class="create-comment">
        <form action="{{ route('comments.store', $post->id) }}" method="post">
            @csrf
            <div class="d-flex gap-3 align-items-center">
                <div class="flex-fill">
                    <input type="text" name="text" class="comment-input" placeholder="Write a comment..." required>
                </div>
                <button type="submit" class="btn-custom">Send</button>
            </div>
        </form>
    </div>

    @foreach ($comments as $comment)
        <div class="comment-card">
            <div class="d-flex gap-3 position-relative">
                <img src="{{ asset($comment->user->avatar ? 'storage/' . $comment->user->avatar : "img/avatar.jpg") }}"
                    class="comment-avatar" alt="{{ $comment->user->getFullName() }}">

                @if ($comment->user->id == auth()->id())
                    <div class="position-absolute top-0 end-0 m-2">
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="me-2 btn btn-sm btn-outline-danger">
                                <span class="bi bi-trash"></span>
                            </button>
                        </form>
                    </div>
                @endif

                <div class="flex-fill">
                    <div class="fw-bold mb-1">{{ $comment->user->getFullName() }}</div>
                    <div class="comment-text mb-3">{{ $comment->comment }}</div>

                    <details class="reply-section">
                        <summary class="reply-toggle-btn">Reply</summary>
                        <div class="mt-3">
                            <form action="{{ route('comments.store', $post->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="commentId" value="{{ $comment->id }}">
                                <div class="d-flex gap-3 align-items-center">
                                    <input type="text" name="text" class="comment-input" placeholder="Write a reply..."
                                        required>
                                    <button type="submit" class="btn-custom">Send</button>
                                </div>
                            </form>
                        </div>
                    </details>

                    @if ($comment->children->count() > 0)
                        <button onclick="showSubcomment(this)" class="subcomment-toggle-btn mt-2"
                            data-count="{{ $comment->children->count() }}">
                            Show {{ $comment->children->count() }} replies
                        </button>

                        <div class="subcomments-container d-none">
                            @foreach ($comment->children as $child)
                                <div class="subcomment-item">
                                    <div class="d-flex gap-3 position-relative">
                                        <img src="{{ asset($child->user->avatar ? 'storage/' . $child->user->avatar : "img/avatar.jpg") }}"
                                            class="comment-avatar-sm" alt="{{ $child->user->getFullName() }}">

                                        @if ($comment->user->id == auth()->id())
                                            <div class="position-absolute top-0 end-0 m-2">
                                                <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="me-2 btn btn-sm btn-outline-danger">
                                                        <span class="bi bi-trash"></span>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="fw-bold text-primary small">
                                                {{ $child->user->getFullName() }}
                                                <span class="text-muted">→ {{ $comment->user->getFullName() }}</span>
                                            </div>
                                            <div class="comment-text small">{{ $child->comment }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function showSubcomment(btn) {
            const container = btn.nextElementSibling;
            container.classList.toggle('d-none');
            btn.textContent = container.classList.contains('d-none')
                ? `Show ${btn.dataset.count} replies`
                : 'Hide replies';
        }
    </script>
@endsection