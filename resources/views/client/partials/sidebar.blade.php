<div class="sidebar-menu">
    <a href="#" class="menu-item">
        <i class="bi bi-house-door-fill"></i>
        <span>{{ __('app.home') }}</span>
    </a>
    <a href="{{ route('profile.show') }}" class="menu-item">
        <i class="bi bi-house-door-fill"></i>
        <span>{{ __('app.myProfile') }}</span>
    </a>
    <a href="{{ route('users.index') }}" class="menu-item">
        <i class="bi bi-people"></i>
        <span>{{ __('app.users') }}</span>
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