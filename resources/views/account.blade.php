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


    <title>User Details & History</title>
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

        <!-- User Details Section -->
        <div class="user-details">
            <div class="user-info">
                <h3>Name:</h3>
                <p>{{ $user->fullname }}</p>
            </div>

            <div class="user-info">
                <h3>Email:</h3>
                <p>{{ $user->email }}</p>
            </div>

            <div class="user-info">
                <h3>Phone:</h3>
                <p>{{ $user->phone }}</p>
            </div>
        </div>

        <!-- User History Section -->
        <div class="history">
            <h2>User Service History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Service Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($serviceHistory as $service)
                        <tr>
                            <td>{{ $service->service }}</td>
                            <td>{{ $service->service_date }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No service history available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Car Clinic by GR, Walayat Colony,
                        Rawalpindi, 46000</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>03015247111</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>carclinicbygr@gmails.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4">09.00 AM - 09.00 PM</p>
                    <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">09.00 AM - 12.00 PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="">General Maintenaqnce </a>
                    <a class="btn btn-link" href="">Engine Repair & Maintenance</a>
                    <a class="btn btn-link" href="">Transmission Repair</a>
                    <a class="btn btn-link" href="">Suspension Works </a>
                    <a class="btn btn-link" href="">Car Electrical Maintenance</a>
                    <a class="btn btn-link" href="">Car Detailing</a>
                    <a class="btn btn-link" href="">Denting & Painting</a>
                    <a class="btn btn-link" href="">PPF & Ceramic Coating</a>
                    <a class="btn btn-link" href="">Spare Parts</a>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email">
                    <button type="button"
                        class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div> -->
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <!-- &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. -->

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> -->
                        <br>Copyright © 2024 Car Clinic by G.R.<a class="border-bottom" target="_blank"></a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="https://api.whatsapp.com/send?phone=+923295066929&text=Hi,%20I%20am%20interested%20to%20know%20more%20about%20you."
        <button class=""><svg class="back-to-top2" style="fill: green;" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path
                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3 -28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
        </svg></button></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
