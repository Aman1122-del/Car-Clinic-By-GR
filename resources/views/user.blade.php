<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Car Clinic by G.R</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">




    <!-- Favicon -->
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
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


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

        </div>
        <!-- User Profile Dropdown -->

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






    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Car Servicing //
                                    </h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Qualified Car Repair
                                        Service Center</h1>

                                </div>
                                <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/carousel-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/car.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Car Servicing //
                                    </h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Qualified Car PPT
                                        Service Center</h1>

                                </div>
                                <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/carousel-2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Quality Servicing</h5>
                            <p>Delivering reliable, efficient, and customer-focused solutions with a commitment to
                                excellence.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex bg-light py-5 px-4">
                        <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Expert Workers</h5>
                            <p>Skilled professionals dedicated to delivering top-quality results with precision and
                                expertise.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-tools fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Modern Equipment</h5>
                            <p>State-of-the-art equipment designed for high performance, accuracy, and efficiency.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/about.jpg"
                            style="object-fit: cover;" alt="">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
                            style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">10 <span class="fs-4">Years</span></h1>
                            <h4 class="text-white">Experience</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-primary text-uppercase">// About Us //</h6>
                    <h1 class="mb-4"><span class="text-primary">Car clinic by G.R</span> Is The Best Place For Your
                        Auto Care
                    </h1>
                    <p class="mb-4">Car Clinic by G.R is the ultimate destination for expert auto care, offering
                        reliable service with modern equipment and skilled professionals.</p>
                    <div class="row g-4 mb-3 pb-3">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                    style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">01</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Professional & Expert</h6>
                                    <span>Highly trained and experienced individuals committed to excellence and
                                        professional integrity.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                    style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">02</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Quality Servicing Center</h6>
                                    <span>A trusted servicing center delivering top-notch quality, reliability, and
                                        customer satisfaction.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                    style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">03</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Awards Winning Workers</h6>
                                    <span>Award-winning workers celebrated for excellence, skill, and outstanding
                                        performance.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/about" class="btn btn-primary py-3 px-5">Read More<i
                            class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">10</h2>
                    <p class="text-white mb-0">Years Experience</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">20</h2>
                    <p class="text-white mb-0">Expert Technicians</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1000</h2>
                    <p class="text-white mb-0">Satisfied Clients</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-car fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1000</h2>
                    <p class="text-white mb-0">Compleate Projects</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

  <!-- Service Start -->
<div class="container-xxl service py-5">
    <div class="container">
        <div class="text-center">
            <h6 class="text-primary text-uppercase">// Our Services //</h6>
            <h1 class="mb-5">Explore Our Services</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="nav w-100 nav-pills me-4">
                    @foreach($services as $key => $service)
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 {{ $key == 0 ? 'active' : '' }}"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-{{ $service->id }}" type="button">
                            <i class="fa {{ $service->icon }} fa-2x me-3"></i>
                            <h4 class="m-0">{{ $service->title }}</h4>
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content w-100">
                    @foreach($services as $key => $service)
                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="tab-pane-{{ $service->id }}">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('storage/' . $service->image) }}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">10 Years Of Experience In Auto Servicing</h3>
                                    <p class="mb-4">{{ $service->description }}</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Quality Servicing</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Expert Workers</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Modern Equipment</p>
                                    <a href="/services" class="btn btn-primary py-3 px-5 mt-3">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Service End -->


    {{-- <!-- Booking Start -->
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="text-white mb-4">Certified and Award Winning Car Repair Service Provider</h1>
                        <p class="text-white mb-0">We are a trusted, certified, and award-winning car repair service
                            provider known for delivering top-quality automotive solutions. With a team of experienced
                            technicians, state-of-the-art equipment, and a commitment to customer satisfaction, we
                            ensure your vehicle receives the best care possible. Our excellence in service has been
                            recognized by industry experts, making us a reliable choice for all your car repair and
                            maintenance needs.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Book For A Service</h1>
                        <form action="{{ route('book.service') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control border-0"
                                        placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control border-0"
                                        placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select name="service_time" id="service_time" class="form-select border-0"
                                        style="height: 55px;">
                                        <option value="">Select Time</option>
                                        @for ($hour = 9; $hour <= 16; $hour++)
                                            <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00">
                                                {{ date('g:i A', strtotime("$hour:00")) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const dateInput = document.getElementById('service_date');
                                        const timeSelect = document.getElementById('service_time');

                                        dateInput.addEventListener('change', function() {
                                            const selectedDate = this.value;

                                            // Clear and reset time options
                                            timeSelect.innerHTML = '<option value="">Select Time</option>';
                                            for (let hour = 9; hour <= 16; hour++) {
                                                const hourStr = hour.toString().padStart(2, '0') + ':00';
                                                const display = (hour > 12 ? hour - 12 : hour) + ':00 ' + (hour >= 12 ? 'PM' : 'AM');
                                                const option = document.createElement('option');
                                                option.value = hourStr;
                                                option.textContent = display;
                                                timeSelect.appendChild(option);
                                            }

                                            if (selectedDate) {
                                                $.ajax({
                                                    url: '{{ route('get.available.times') }}',
                                                    method: 'POST',
                                                    data: {
                                                        service_date: selectedDate,
                                                        _token: '{{ csrf_token() }}'
                                                    },
                                                    success: function(response) {
                                                        const bookedTimes = response.booked_times;

                                                        // Disable booked + ±1 hour slots
                                                        bookedTimes.forEach(time => {
                                                            const bookedHour = parseInt(time.split(':')[0]);

                                                            for (let block = bookedHour - 1; block <= bookedHour +
                                                                1; block++) {
                                                                const blockStr = block.toString().padStart(2, '0') +
                                                                    ':00';
                                                                const option = timeSelect.querySelector(
                                                                    `option[value="${blockStr}"]`);
                                                                if (option) {
                                                                    option.disabled = true;
                                                                    option.textContent += ' (Unavailable)';
                                                                }
                                                            }
                                                        });
                                                    }
                                                });
                                            }
                                        });

                                        // Restrict date picker to today or later
                                        const today = new Date().toISOString().split('T')[0];
                                        dateInput.min = today;
                                    });
                                </script>


                                <div class="col-12 col-sm-6">
                                    <select name="service" class="form-select border-0" style="height: 55px;">
                                        <option selected disabled>Select A Service</option>
                                        <option value="General Maintenance">General Maintenance</option>
                                        <option value="Engine Repair and Maintenance">Engine Repair and Maintenance
                                        </option>
                                        <option value="Transmission Repair">Transmission Repair</option>
                                        <option value="Suspension Works">Suspension Works</option>
                                        <option value="Car Electrical Maintenance">Car Electrical Maintenance</option>
                                        <option value="Car Detailing">Car Detailing</option>
                                        <option value="Denting & Painting">Denting & Painting</option>
                                        <option value="PPF & Ceramic coating">PPF & Ceramic coating</option>
                                        <option value="Spare Parts">Spare Parts</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="date" name="service_date" id="service_date"
                                        class="form-control border-0" style="height: 55px;">
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const dateInput = document.getElementById('service_date');
                                        const today = new Date().toISOString().split('T')[0];
                                        dateInput.min = today;
                                    });
                                </script>

                                <div class="col-12 col-sm-6">
                                    <input type="text" name="vehicle" class="form-control border-0"
                                        placeholder="Vehicle Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="vehicle_number" class="form-control border-0"
                                        placeholder="Vehicle Number " style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea name="special_request" class="form-control border-0" placeholder="Special Request"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div style="color: rgb(0, 0, 0); margin-bottom: 10px;">
                                    <ul style="padding-left: 18px;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End --> --}}


    {{-- <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Company Owners //</h6>
                <h1 class="mb-5">Owners</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <!-- <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div> -->
                        <!-- <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/ceo.png" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Muhammad Rayan</h5>
                            <small>CEO</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Muhammad Ghaffar</h5>
                            <small>Vice CEO</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <!-- <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Team End --> --}}

<div class="container my-5">
    <h2 style="color:rgb(194, 1, 1); text-align: center; margin-bottom: 30px;">Leave Your Feedback</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('feedback.store') }}" method="POST" style="max-width: 600px; margin: auto;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Your Feedback</label>
            <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit Feedback</button>
    </form>
</div>





    <!-- Testimonial Start -->
 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="text-primary text-uppercase">Testimonial</h6>
            <h1 class="mb-5">Our Clients Say!</h1>
        </div>

        <div class="owl-carousel testimonial-carousel position-relative">
            @foreach($feedbacks as $feedback)
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3"
                         style="width: 80px; height: 80px;" src="https://ui-avatars.com/api/?name={{ urlencode($feedback->name) }}&background=random&color=fff" alt="User Avatar">
                    <h5 class="mb-0">{{ $feedback->name }}</h5>
                    <p>{{ $feedback->email }}</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">"{{ $feedback->comment }}"</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".testimonial-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1000,
            center: true,
            dots: true,
            loop: true,
            responsive: {
                0:{ items:1 },
                768:{ items:2 },
                992:{ items:3 }
            }
        });
    });
</script>

    <!-- Testimonial End -->


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
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/carclinic_official?igsh=MXd0ZzVja29peDhnYQ=="><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/share/198zoXLr1f/?mibextid=wwXIfr"><i class="fab fa-facebook-f"></i></a>

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
                    <a class="btn btn-link" href="/services">General Maintenaqnce </a>
                    <a class="btn btn-link" href="/services">Engine Repair & Maintenance</a>
                    <a class="btn btn-link" href="/services">Transmission Repair</a>
                    <a class="btn btn-link" href="/services">Suspension Works </a>
                    <a class="btn btn-link" href="/services">Car Electrical Maintenance</a>
                    <a class="btn btn-link" href="/services">Car Detailing</a>
                    <a class="btn btn-link" href="/services">Denting & Painting</a>
                    <a class="btn btn-link" href="/services">PPF & Ceramic Coating</a>
                    <a class="btn btn-link" href="/services">Spare Parts</a>
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
    <a href="https://api.whatsapp.com/send?phone=+923015247111&text=Hi,%20I%20am%20interested%20to%20know%20more%20about%20you."
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
