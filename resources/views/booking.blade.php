<!DOCTYPE html>
<html lang="en">

@include('headder')
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Quality Servicing</h5>
                            <p>Delivering reliable, efficient, and customer-focused solutions with a commitment to excellence.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex bg-light py-5 px-4">
                        <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Expert Workers</h5>
                            <p>Skilled professionals dedicated to delivering top-quality results with precision and expertise.</p>

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


    <!-- Booking Start -->
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="text-white mb-4">Certified and Award Winning Car Repair Service Provider</h1>
                        <p class="text-white mb-0">We are a trusted, certified, and award-winning car repair service provider known for delivering top-quality automotive solutions. With a team of experienced technicians, state-of-the-art equipment, and a commitment to customer satisfaction, we ensure your vehicle receives the best care possible. Our excellence in service has been recognized by industry experts, making us a reliable choice for all your car repair and maintenance needs.</p>
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
    <!-- Booking End -->


    <!-- Call To Action Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-6">
                    <h6 class="text-primary text-uppercase">// Call To Action //</h6>
                    <h1 class="mb-4">Have Any Pre Booking Question?</h1>
                    <p class="mb-0">We're here to help! If you have any questions before booking your service—whether it's about pricing, availability, or the process—feel free to reach out. Our team is ready to provide the answers you need for a smooth and confident booking experience.
</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-primary d-flex flex-column justify-content-center text-center h-100 p-4">
                        <h3 class="text-white mb-4"><i class="fa fa-phone-alt me-3"></i>03015247111</h3>
                        <a href="/contact" class="btn btn-secondary py-3 px-5">Contact Us<i class="fa fa-arrow-right ms-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action End -->


    <!-- Footer Start -->
    @include('footer')
</body>

</html>
