<nav class="navbar  navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-xxl">
        <a class="navbar-brand" href="#">ARA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.users.index') }}">
                        <i class="bi bi-people"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.posts.index') }}">
                        <i class="bi bi-file-post"></i> Posts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">
                        <i class="bi bi-images"></i> Comments
                    </a>
                </li>
            </ul>
            <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                <input type="hidden">
                <button type="submit" class="btn btn-outline-danger">
                    <span>Logout</span>
                    <i class="bi bi-box-arrow-right ms-2"></i>
                </button>
            </form>
        </div>
    </div>
</nav>