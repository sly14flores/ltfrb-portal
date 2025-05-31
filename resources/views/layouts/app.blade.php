<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Making the font black for the body and text elements */
        body, .navbar-nav, .navbar-toggler-icon, .dropdown-item, .text-primary, .fw-bold {
            color: black !important;
        }

        /* Increase font size for the title */
        .navbar .fw-bold {
            font-size: 2.5rem; /* Adjust size as per preference */
        }

        /* Semi-transparent navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.8); /* 80% opacity, adjust as needed */
        }

        /* Optional: Darken navbar items slightly for better contrast */
        .navbar-nav .nav-link {
            color: rgba(0, 0, 0, 0.8); /* Darker text color */
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- START NAVBAR -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-2">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <!-- Left side: Logos and Title -->
                <div class="d-flex align-items-center">
                    <a href="{{ route('dashboard.index') }}" class="d-flex align-items-center text-decoration-none">
                        <img src="{{ asset('icons/ltfrb_seal.png') }}" alt="LTFRB SEAL" class="nav-icons me-2" style="height: 50px;width:50px;">
                        <img src="{{ asset('icons/dot_logo.png') }}" alt="DOT LOGO" class="nav-icons me-2" style="height: 50px;width:50px;">
                        <img src="{{ asset('icons/bglogo.png') }}" alt="BAGONG PILIPINAS LOGO" class="nav-icons me-2" style="height: 50px;width:50px;">
                    </a>
                    <span class="ms-4 fw-bold fs-5 text-primary ">LTFRB Public Transport Online Service Portal</span>
                </div>

                <!-- Navbar toggle for mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Right side: Authentication -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <button id="account-dropdown" class="btn shadow-none nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (Auth::user()->avatar)
                                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle" style="height: 30px; width: 30px;">
                                    @else
                                        <i class="fas fa-circle-user text-dark fs-4"></i>
                                    @endif
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="account-dropdown">
                                    @can('admin')
                                        <a class="dropdown-item" href="{{ route('admin.denominations') }}">
                                            <i class="fas fa-user-gear me-2"></i> Admin
                                        </a>
                                        <hr class="dropdown-divider">
                                    @endcan
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-circle-user me-2"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-right-from-bracket me-2"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- MAIN CONTENT -->
        <main class="background-image">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
