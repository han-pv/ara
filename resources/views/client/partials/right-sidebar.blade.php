<!-- Suggestions -->
<div class="widget">
    <h6 class="widget-title">{{ __('app.suggestionsForYou') }}</h6>
    <div class="suggestion-item">
        <div class="suggestion-user">
            <img src="{{ asset('img/avatar.jpg') }}" alt="User">
            <div class="suggestion-user-info">
                <h6>David Brown</h6>
                <small>15 {{ __('app.mutualFriends') }}</small>
            </div>
        </div>
        <button class="follow-btn">{{ __('app.follow') }}</button>
    </div>
    <div class="suggestion-item">
        <div class="suggestion-user">
            <img src="{{ asset('img/avatar.jpg') }}" alt="User">
            <div class="suggestion-user-info">
                <h6>Lisa Anderson</h6>
                <small>8 {{ __('app.mutualFriends') }}</small>
            </div>
        </div>
        <button class="follow-btn">{{ __('app.follow') }}</button>
    </div>
    <div class="suggestion-item">
        <div class="suggestion-user">
            <img src="{{ asset('img/avatar.jpg') }}" alt="User">
            <div class="suggestion-user-info">
                <h6>James Miller</h6>
                <small>23 {{ __('app.mutualFriends') }}</small>
            </div>
        </div>
        <button class="follow-btn">{{ __('app.follow') }}</button>
    </div>
</div>

<!-- Trending -->
<div class="widget">
    <h6 class="widget-title">{{ __('app.trending') }}</h6>
    <div class="trending-item">
        <div class="trending-category">{{ __('app.technology') }}</div>
        <div class="trending-title">#ArtificialIntelligence</div>
        <div class="trending-posts">{{ __('app.posts_count', ['count' => '2.5K']) }}</div>
    </div>
    <div class="trending-item">
        <div class="trending-category">{{ __('app.sports') }}</div>
        <div class="trending-title">#Football</div>
        <div class="trending-posts">{{ __('app.posts_count', ['count' => '1.8K']) }}</div>
    </div>
    <div class="trending-item">
        <div class="trending-category">{{ __('app.music') }}</div>
        <div class="trending-title">#NewMusic</div>
        <div class="trending-posts">{{ __('app.posts_count', ['count' => '956']) }}</div>
    </div>
    <div class="trending-item">
        <div class="trending-category">{{ __('app.travel') }}</div>
        <div class="trending-title">#Travel2024</div>
        <div class="trending-posts">{{ __('app.posts_count', ['count' => '743']) }}</div>
    </div>
</div>