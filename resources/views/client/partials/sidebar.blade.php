<div class="user-profile-card">
    <div class="profile-cover"></div>
    <div class="profile-info">
        <img src="{{ asset('img/avatar.jpg') }}" alt="Profile" class="profile-photo">
        <h5 class="profile-name">John Smith</h5>
        <p class="profile-username">@johnsmith</p>
        <div class="profile-stats">
            <div class="stat-item">
                <div class="stat-number">324</div>
                <div class="stat-label">{{ __('app.posts') }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">1.2K</div>
                <div class="stat-label">{{  __('app.followers') }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">856</div>
                <div class="stat-label">{{ __('app.followings')  }}</div>
            </div>
        </div>
    </div>
</div>

<div class="sidebar-menu">
    <a href="#" class="menu-item active">
        <i class="bi bi-house-door-fill"></i>
        <span>{{ __('app.home') }}</span>
    </a>
    <a href="#" class="menu-item">
        <i class="bi bi-compass"></i>
        <span>{{ __('app.explore') }}</span>
    </a>
    <a href="#" class="menu-item">
        <i class="bi bi-people"></i>
        <span>{{ __('app.friends') }}</span>
    </a>
    <!-- <a href="#" class="menu-item">
        <i class="bi bi-bookmark"></i>
        <span>{{ __('app.saved') }}</span>
    </a>
    <a href="#" class="menu-item">
        <i class="bi bi-images"></i>
        <span>{{ __('app.gallery') }}</span>
    </a>
    <a href="#" class="menu-item">
        <i class="bi bi-calendar-event"></i>
        <span>{{ __('app.events') }}</span>
    </a> -->
    <a href="#" class="menu-item">
        <i class="bi bi-gear"></i>
        <span>{{ __('app.settings') }}</span>
    </a>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="hidden">
        <button type="submit" class="menu-item text-danger">
            <i class="bi bi-box-arrow-left"></i>
            <span>{{ __('app.logout') }}</span>
        </button>
    </form>
</div>