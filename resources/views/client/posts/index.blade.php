@extends('client.layouts.app')

@section('content')
    <div class="create-post">
        <div class="create-post-input">
            <input type="text" placeholder="{{ __('app.whatsOnYourMind') }}">
            <a href="{{ route('posts.create') }}" class="btn-custom">
                <i class="bi bi-plus-circle"></i>
                {{ __('app.newPost') }}
            </a>
        </div>
    </div>

    <div id="posts-container">
        @forelse($posts as $post)
            @include('client.partials.post-card')
        @empty
            <div class="h1 text-center">
                {{ __('app.postNotFound') }}
            </div>
        @endforelse
    </div>
    @if ($posts->hasMorePages())
        <div class="text-center mb-5">
            <button id="load-more" class="btn-load-more" data-next-page="{{ $posts->currentPage() + 1 }}">
                + {{ __('app.loadMore') }}
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

                            attachLikeButtonListeners();

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