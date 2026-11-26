<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            KursusKu
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">Kursus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('enrollments.create') }}">
                        Pendaftaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('enrollments.index') }}">
                        Laporan
                    </a>
                </li>

                @auth

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-sm btn-outline-light" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
