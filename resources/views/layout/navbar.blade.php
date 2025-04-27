<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('frontend/image/logo.png') }}" alt="logo" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#">Tentang kami</a>
                    </li>
                </ul>
                <div class="ms-auto dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                        <span>Account</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        @if (Route::has('login'))
                            @auth
                                <li><a href="#" class="dropdown-item"><i class="bi bi-person-circle"></i> Profile</a></li>
                                <li><a href="#" class="dropdown-item"><i class="bi bi-cart"></i> Pesanan</a></li>
                                <li>
                                    <form method="POST" action="#" id="logout-form">
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                    </form>
                                </li>
                            @else
                                <li><a href="#" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                                <li><a href="#" class="dropdown-item"><i class="bi bi-person-plus"></i> Register</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
