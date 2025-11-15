<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('posts.index') }}">ARA</a>

        <div class="search-bar mx-auto">
            <input type="text" class="form-control" placeholder="Search...">
        </div>

        <div class="d-flex align-items-center gap-3">
            <div style="position: relative;">
                <i class="bi bi-bell nav-icon"></i>
                <span class="notification-badge">5</span>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                    <img src="{{ asset($profile->avatar ? 'storage/' . $profile->avatar : "img/avatar.jpg") }}" alt="Profile" class="profile-avatar ">

                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @method('put')
                    <li><a class="dropdown-item" href="{{ route('profile.edit', auth()->id()) }}">Edit Profile<i class="bi bi-pencil ms-2"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>