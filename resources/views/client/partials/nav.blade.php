<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('posts.index') }}">ARA</a>

        <div class="d-flex align-items-center gap-3">
            <div style="position: relative;">
                <i class="bi bi-bell nav-icon"></i>
                <span class="notification-badge"></span>
            </div>
            <div class="dropdown bd-mode-toggle">
                <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme"
                    type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                    <div class="bi my-1 theme-icon-active" width="1em" height="1em">
                        <i></i>
                    </div>
                    <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center"
                            data-bs-theme-value="light" aria-pressed="false">
                            <i class="bi bi-brightness-high-fill me-2"></i>Light
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                            aria-pressed="false">
                            <i class="bi bi-moon-stars-fill me-2"></i>Dark
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center active"
                            data-bs-theme-value="auto" aria-pressed="true">
                            <i class="bi bi-circle-half me-2"></i>Auto
                        </button>
                    </li>
                </ul>
            </div>

            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown">
                    <img src="{{ asset($profile->avatar ? 'storage/' . $profile->avatar : "img/avatar.jpg") }}"
                        alt="Profile" class="profile-avatar ">

                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit', auth()->id()) }}">
                            Edit Profile
                            <i class="bi bi-pencil ms-2"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>