<!DOCTYPE html>
<html lang="en">

@include('headder')
<!-- Navbar End -->


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/car.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

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


<div class="container my-5">
    <h2 style="color:rgb(180, 1, 1); text-align: center; margin-bottom: 40px;">Our Services</h2>

    <div style="margin-bottom: 30px;">
        <h4 style="color: #333;">General Maintenance</h4>
        <p style="color: #555; line-height: 1.7;">
            Comprehensive vehicle checkups, oil changes, tire rotation, brake inspections, and fluid top-ups to ensure your car runs smoothly and efficiently for everyday use.
        </p>
    </div>

    <div style="margin-bottom: 30px;">
        <h4 style="color: #333;">Engine Repair & Maintenance</h4>
        <p style="color: #555; line-height: 1.7;">
            Full engine diagnostics, performance tuning, repairs, and preventive maintenance using advanced tools to maximize your engine's lifespan and power output.
        </p>
    </div>

    <div style="margin-bottom: 30px;">
        <h4 style="color: #333;">Transmission Repair</h4>
        <p style="color: #555; line-height: 1.7;">
            Specialized transmission services including repairs, oil changes, and part replacements to ensure seamless gear shifting and prevent long-term transmission failure.
        </p>
    </div>

    <div style="margin-bottom: 30px;">
        <h4 style="color: #333;">Suspension Works</h4>
        <p style="color: #555; line-height: 1.7;">
            Professional suspension diagnostics and repairs to improve road handling, stability, ride comfort, and to prevent uneven tire wear and steering issues.
        </p>
    </div>

    <div style="margin-bottom: 30px;">
        <h4 style="color: #333;">Car Electrical Maintenance</h4>
        <p style="color: #555; line-height: 1.7;">
            Detailed inspection and repair of electrical systems, including battery, lights, wiring, alternators, and starter motors to maintain vehicle reliability and safety.
        </p>
    </div>

    <div style="margin-bottom: 30px;">
        <h4 style="color: #333;">Car Detailing</h4>
        <p style="color: #555; line-height: 1.7;">
            Professional interior and exterior cleaning, polishing, waxing, and paint protection to restore your car’s shine and keep it looking like new.
        </p>
    </div>

    <div style="margin-bottom: 30px;">
        <h4 style="color: #333;">Denting & Painting</h4>
        <p style="color: #555; line-height: 1.7;">
            Expert dent removal and precision color matching paint jobs to bring back your vehicle’s original beauty after scratches, dents, or accidents.
        </p>
    </div>

    <div style="margin-bottom: 30px;">
        <h4 style="color: #333;">PPF & Ceramic Coating</h4>
        <p style="color: #555; line-height: 1.7;">
            High-quality Paint Protection Film and ceramic coatings that safeguard your vehicle's paint from scratches, UV rays, and environmental damage while providing a long-lasting shine.
        </p>
    </div>

    <div style="margin-bottom: 30px;">
        <h4 style="color: #333;">Spare Parts</h4>
        <p style="color: #555; line-height: 1.7;">
            Genuine and high-quality spare parts for all vehicle makes and models to ensure safety, durability, and the perfect fit for your repair and maintenance needs.
        </p>
    </div>
</div>


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-primary text-uppercase">// Testimonial //</h6>
                <h1 class="mb-5">Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">

                    <h5 class="mb-0">Sara Khan</h5>
                    <p>Graphic Designer</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">"Outstanding service!"
                        My car was fixed quickly and professionally. I’ll definitely be coming back!</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">

                    <h5 class="mb-0">Muhammad Zeeshan</h5>
                    <p>Software Engineer</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">"Highly recommended!"
                        The staff is friendly, honest, and truly skilled at what they do.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">

                    <h5 class="mb-0">Ali Ahmed</h5>
                    <p>Marketing Executive</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">"Best repair experience ever!"
                        They explained everything clearly and delivered on time. Great value too.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">

                    <h5 class="mb-0">Alishba Anjum</h5>
                    <p>High School Teacher</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">"Impressive attention to detail!"
                        They treated my car like their own. Excellent workmanship throughout.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Testimonial End -->


@include('footer')
</body>

</html>
