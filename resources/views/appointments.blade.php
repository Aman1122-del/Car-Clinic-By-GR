<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">

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


    <title>Appointments</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9f9f9;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .user-details {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .user-info {
            flex: 1;
            margin: 0 10px;
        }

        .user-info h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #333;
        }

        .history {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #00bcd4;
            color: white;
        }

        @media (max-width: 768px) {
            .user-details {
                flex-direction: column;
            }

            .user-info {
                margin: 10px 0;
            }
        }
    </style>
</head>

<body>



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

            <a href="/service" class="nav-item nav-link">Services</a>

            <a href="/booking" class="nav-item nav-link">Booking</a>
            <a href="/parts" class="nav-item nav-link">Parts</a>
            <a href="/contact" class="nav-item nav-link">Contact</a>

        </div>
       <!-- If user is not logged in (guest) -->
@guest
<a href="/login" class="btn btn-primary">Login</a>
@endguest

<!-- If user is logged in (authenticated) -->
@auth
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
<div class="container">

    <!-- User History Section -->
    <div class="history">
        @if (session('success'))
    <div class="alert alert-success p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

        <h2>Appointments</h2>
        <table>
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Vehicle</th>
                    <th>Vehicle Number</th>
                    <th>Service Date</th>
                    <th>Action</th> <!-- NEW COLUMN -->
                </tr>
            </thead>
            <tbody>
                @forelse($serviceHistory as $service)
                    <tr>
                        <td>{{ $service->service }}</td>
                        <td>{{ $service->vehicle }}</td>
                        <td>{{ $service->vehicle_number }}</td>
                        <td>{{ $service->service_date }}</td>
                        <td>
                            <form action="{{ route('cancel.appointment', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No service history available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

    <!-- Footer Start -->
@include('footer')
</body>

</html>
