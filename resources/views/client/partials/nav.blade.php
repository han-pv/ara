<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">ARA</a>

        <div class="search-bar mx-auto">
            <input type="text" class="form-control" placeholder="Search...">
        </div>

        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-house-door nav-icon"></i>
            <div style="position: relative;">
                <i class="bi bi-bell nav-icon"></i>
                <span class="notification-badge">5</span>
            </div>
            <i class="bi bi-chat-dots nav-icon"></i>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                    <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Profile" class="profile-avatar ">

                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @method('put')
                    <li><a class="dropdown-item" href="{{ route('profile.edit', auth()->id()) }}">Edit Profile<i class="bi bi-pencil ms-2"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>