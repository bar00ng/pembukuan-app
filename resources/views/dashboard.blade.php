<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Esentieel Dashboard</title>
    <!-- {{ asset('') }} -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="header">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="{{ asset('assets/images/logo essentieel.jpg') }}" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item active ">
                            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <a href="{{ route('category.list') }}" class='sidebar-link'>
                            <i data-feather="coffee" width="20"></i>
                            <span>Kategori</span>
                        </a>
                        </li>
                        </li>
                        <a href="{{ route('unit.list') }}" class='sidebar-link'>
                            <i data-feather="filter" width="20"></i>
                            <span>Satuan</span>
                        </a>
                        </li>
                        </li>
                        <a href="{{ route('product.list') }}" class='sidebar-link'>
                            <i data-feather="package" width="20"></i>
                            <span>Produk</span>
                        </a>
                        </li>
                        </li>
                        <a href="{{ route('pembukuan.list') }}" class='sidebar-link'>
                            <i data-feather="book" width="20"></i>
                            <span>Pembukuan</span>
                        </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">

                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle btn btn-outline-light nav-link-lg nav-link-user">
                                <div class="font-medium text-base">Selamat Datang, {{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                        data-feather="settings"></i>
                                    Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('signout') }}"><i data-feather="log-out"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Dashboard</h3>

                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2023 &copy; Kelompok 6</p>
                        </div>
                        <div class="float-end">
                            <p>Dibuat Oleh Kelompok 6 </p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

        <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
