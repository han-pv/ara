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
                <span>{{ __('app.send') }}</span>
            </a>
        </div>
    </div>

    <div id="posts-container">
        @forelse($posts as $post)
            @include('client.partials.post-card')
        @empty
            <div class="h1 text-center">
                Post tapylmady
            </div>
        @endforelse
    </div>
    @if ($posts->hasMorePages())
        <div class="text-center mb-5">
            <button id="load-more" class="btn-load-more" data-next-page="{{ $posts->currentPage() + 1 }}">
                + Show More
            </button>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loadMoreBtn = document.getElementById('load-more');

            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function () {
                    const nextPage = this.dataset.nextPage;

                    fetch("{{ route('posts.index') }}?page=" + nextPage, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(response => response.text())
                        .then(data => {
                            const parser = new DOMParser();
                            const htmlDoc = parser.parseFromString(data, 'text/html');
                            const newPosts = htmlDoc.getElementById('posts-container').innerHTML;

                            document.getElementById('posts-container').insertAdjacentHTML('beforeend', newPosts);

                            const newButton = htmlDoc.getElementById('load-more');
                            if (newButton) {
                                loadMoreBtn.dataset.nextPage = newButton.dataset.nextPage;
                            } else {
                                loadMoreBtn.style.display = 'none';
                            }
                        });
                });
            }
        });
    </script>
@endsection