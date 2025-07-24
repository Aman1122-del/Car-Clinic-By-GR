<!DOCTYPE html>
<html lang="en">
    <style>
.parts {
    padding: 40px 20px;
}

.parts h2 {
    margin-bottom: 30px;
    font-size: 2rem;
    font-weight: bold;
}

.parts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Responsive */
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.part-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background-color: #fff;
    transition: box-shadow 0.3s ease;
}

.part-card h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.part-card p {
    font-size: 0.95rem;
    color: #555;
}

.part-card:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}


    </style>

@include('headder')
    <!-- Navbar End -->
<body>
    <!-- Spinner Start -->

    <!-- Spinner End -->


    <!-- Topbar Start -->

    <!-- Topbar End -->




    <section class="parts text-center mt-5">
        <h2>Genuine Parts Catalog</h2>
        <div class="parts-grid">
            <div class="part-card">
                <h3>Engine Oil</h3>
                <p>Premium synthetic blend</p>
                <!-- <p class="price">₹1,200</p> -->
            </div>
            <div class="part-card">
                <h3>Brake Pads</h3>
                <p>OEM-quality ceramic pads</p>
                <!-- <p class="price">₹2,500</p> -->
            </div>
            <div class="part-card">
                <h3>Air Filter</h3>
                <p>High-flow performance</p>
                <!-- <p class="price">₹800</p> -->
            </div>
            <div class="part-card">
                <h3>Spark Plugs</h3>
                <p>Ignites air-fuel mixture.</p>
                <!-- <p class="price">₹600 each</p> -->
            </div>
            <div class="part-card">
                <h3>Battery</h3>
                <p>Stores and supplies electricity.</p>
                <!-- <p class="price">₹600 each</p> -->
            </div>
            <div class="part-card">
                <h3>Radiator</h3>
                <p>Cools engine operating temperature.</p>
                <!-- <p class="price">₹600 each</p> -->
            </div>
            <div class="part-card">
                <h3>Alternator</h3>
                <p>Charges battery, powers electronics.</p>
                <!-- <p class="price">₹600 each</p> -->
            </div>
            <div class="part-card">
                <h3>Shock Absorbers</h3>
                <p>Smooths ride, absorbs bumps.</p>

            </div>
<div class="part-card">
                <h3>Catalytic Converter</h3>
                <p>Reduces harmful exhaust emissions.</p>

            </div>
            <div class="part-card">
                <h3>Transmission</h3>
                <p>Controls engine power transfer.</p>

            </div>
            <div class="part-card">
                <h3>Fuel Injector</h3>
                <p>Sprays fuel into cylinders.</p>

            </div>
            <div class="part-card">
                <h3>Timing Belt</h3>
                <p>Synchronizes engine moving parts.</p>

            </div>
            <div class="part-card">
                <h3>Muffler</h3>
                <p>Reduces engine noise output.</p>

            </div>
            <div class="part-card">
                <h3>Clutch Plate</h3>
                <p>Connects engine to transmission.</p>

            </div>
            <div class="part-card">
                <h3>Headlights</h3>
                <p>Illuminate road at night.</p>

            </div>
            </div>

        </div>
    </section>
    <!-- Footer Start -->
   @include('footer')
</body>

</html>
