<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .sidebar-item .sidebar-link.active {
            background-color: rgb(80, 80, 227) !important;
            color: white !important;
            border-radius: 5px;
        }

        /* RESPONSIVE SIDEBAR */
        @media (max-width: 768px) {
            #sidebar {
                position: fixed;
                left: -250px;
                /* Sembunyikan sidebar di awal */
                width: 250px;
                height: 100%;
                background-color: #fff;
                transition: all 0.3s ease-in-out;
                z-index: 1000;
            }

            #sidebar.active {
                left: 0;
                /* Munculkan sidebar saat tombol ditekan */
            }

            .body-wrapper {
                margin-left: 0 !important;
            }
        }
       
        /* TAMPILAN NAVBAR DI MOBILE */
       /* TAMPILAN NAVBAR DI MOBILE */
    @media (max-width: 768px) {
        .navbar-toggler {
            padding: 0.25rem 0.5rem;
            font-size: 1.25rem;
            line-height: 1;
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }

        .navbar-toggler.ms-auto {
            margin-left: auto; /* Tombol kanan */
        }

        .navbar-brand.mx-auto {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .navbar-collapse {
            background: #fff;
            padding: 10px;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    }
    </style>
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo mt-2">
                            <h6>CV Adith Trithama</h6>
                        </div>
                    </div>

                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Data Master</li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.jenispaket.index') }}" class='sidebar-link {{ request()->routeIs('admin.jenispaket.index') ? 'active' : '' }}'>
                                <i class="fa-solid fa-list-ol"></i>
                                <span>Jenis Paket</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.item.index') }}" class='sidebar-link {{ request()->routeIs('admin.item.index') ? 'active' : '' }}'>
                                <i class="fa-solid fa-list"></i>
                                <span>Item</span>
                            </a>
                        </li>
                     

                        <li class="sidebar-title">Transaksi</li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.pesanan.index') }}" class='sidebar-link {{ request()->routeIs('admin.pesanan.index') ? 'active' : '' }}'>
                                <i class="fa-solid fa-cart-plus"></i>
                                <span>Pesanan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class='sidebar-link'>
                                <i class="fa-solid fa-money-bill"></i>
                                <span>Pembayaran</span>
                            </a>
                        </li>
                      

                        <li class="sidebar-title">Laporan</li>
                        <li class="sidebar-item">
                            <a href="form-layout.html" class="sidebar-link">
                                <i class="fa-solid fa-file-pdf"></i>
                                <span>Laporan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="body-wrapper">
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Tombol Menu di Sebelah Kiri -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            
                    <!-- Logo atau Judul di Tengah (Opsional) -->
                    <div class="navbar-brand mx-auto d-block d-lg-none">
                        <h6>CV Adith Trithama</h6>
                    </div>
            
                    <!-- Tombol Menu di Sebelah Kanan -->
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
            
                    <!-- Menu Navbar -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link">Hi, {{ Str::limit(Auth::user()->username) }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-users"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('index') }}" class="dropdown-item">
                                        <i class="fas fa-home"></i> Halaman Utama
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
                                        <button class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>

        <div id="main">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    <!-- Need: Apexcharts -->
    {{-- <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script> --}}
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    var sidebar = document.getElementById("sidebar");
    var toggleBtn = document.querySelector(".navbar-toggler[data-bs-target='#sidebar']");

    if (toggleBtn) {
        toggleBtn.addEventListener("click", function() {
            sidebar.classList.toggle("active");
        });
    }
});

    </script>

    @if (session('success'))
        <script>
        Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: 'Sukses!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000
        });
        </script>
    @endif
    @if (session('error'))
        <script>
        Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: 'Sukses!',
        text: '{{ session('success') }}', 
        showConfirmButton: false,
        timer: 3000
        });
        </script>
    @endif
</body>
</html>