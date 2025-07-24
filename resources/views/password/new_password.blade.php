<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Car Clinic by G.R</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">




    <!-- Favicon -->
    {{-- <!-- <link href="{{ asset('img/favicon.ico') }}" rel="icon"> --> --}}


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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->



    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
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
                <a href="{{ auth()->check() ? '/user' : '/' }}" class="nav-item nav-link active">Home</a>

                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>

                <a href="/services" class="nav-item nav-link">Services</a>

                <a href="/booking" class="nav-item nav-link">Booking</a>
                <a href="/parts" class="nav-item nav-link">Parts</a>
                <a href="/contact" class="nav-item nav-link">Contact</a>
            </div>

        </div>
     <!-- User Profile Dropdown -->

<div class="dropdown">
    <a href="#" class="d-flex align-items-center justify-content-center rounded-circle bg-light"
       id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"
       style="width: 45px; height: 45px; text-decoration:none; border:1px solid #ccc;">


       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="gray" class="bi bi-person" viewBox="0 0 16 16">
           <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
           <path fill-rule="evenodd" d="M8 9a5 5 0 0 0-4.546 2.916.5.5 0 0 0 .832.554A4 4 0 0 1 8 10a4 4 0 0 1 3.714 2.47.5.5 0 0 0 .832-.554A5 5 0 0 0 8 9z"/>
       </svg>

    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li><a class="dropdown-item" href="/account">Account</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </li>
    </ul>
</div>





    </nav>
    <!-- Navbar End -->

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%; border-radius: 12px;">
          <h3 class="text-center mb-4 text-primary">Set New Password</h3>

          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form method="POST" action="/password/update">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-3">
              <label for="password" class="form-label">New Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
            </div>

            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
            </div>

            <button type="submit" class="btn btn-danger w-100">Update Password</button>
          </form>

          @if ($errors->any())
            <div class="mt-3">
              @foreach ($errors->all() as $error)
                <p class="text-danger small">{{ $error }}</p>
              @endforeach
            </div>
          @endif
        </div>
      </div>


</body>
</html>
