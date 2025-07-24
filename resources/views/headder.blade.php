<head>
    <meta charset="utf-8">
    <title>Car Clinic by G.R</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">





    <link href="/img/logo.png" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    {{-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> --}}
    <!-- Spinner End -->


    <!-- Topbar Start -->

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="/user" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary">
                <img src="/img/logo.png" alt="Logo" style="height: 68px; margin-right: 10px;">
                Car Clinic By GR
            </h2>

        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ auth()->check() ? '/user' : '/' }}"
                    class="nav-item nav-link {{ Request::is('/') || Request::is('user') ? 'active' : '' }}">Home</a>

                <a href="{{ route('about') }}"
                    class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>

                <a href="/service" class="nav-item nav-link {{ Request::is('service') ? 'active' : '' }}">Services</a>

                <a href="/booking" class="nav-item nav-link {{ Request::is('booking') ? 'active' : '' }}">Booking</a>

                <a href="/parts" class="nav-item nav-link {{ Request::is('parts') ? 'active' : '' }}">Parts</a>

                <a href="/contact" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>


            </div>
            <!-- If user is not logged in (guest) -->
            @guest
                <a href="/login" class="btn btn-primary">Login</a>
            @endguest

            <!-- If user is logged in (authenticated) -->
            @auth
                <div class="dropdown dropdown-fix">
                    <a href="#" class="d-flex align-items-center justify-content-center rounded-circle bg-light"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                        style="width: 45px; height: 45px; text-decoration:none; border:1px solid #ccc;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="gray"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M8 9a5 5 0 0 0-4.546 2.916.5.5 0 0 0 .832.554A4 4 0 0 1 8 10a4 4 0 0 1 3.714 2.47.5.5 0 0 0 .832-.554A5 5 0 0 0 8 9z" />
                        </svg>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="/account">Account</a></li>
                        <li><a class="dropdown-item" href="/appointments">Appointments</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>

            @endauth

        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Navbar End -->
