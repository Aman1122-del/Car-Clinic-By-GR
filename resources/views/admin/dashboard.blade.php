
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Appointments - Pharmacy POS</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
      <link href="/img/logo.png" rel="icon">
  </head>
  <body>
    <div class="dashboard">
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="logo">
          <h2>Admin</h2>
        </div>
        <ul class="nav">
          <li class="link"><a href="/admin/dashboard">Dashboard</a></li>

          <li class="link"><a href="/admin/records">Records</a></li>

          <li class="link"><a href="/services/create">Create Services</a></li>

          <li class="link"><a href="/services/manage">Manage Services</a></li>

           <form action="/logout" method="POST">
            @csrf
            <button type="submit" style="background:none;border:none;color:red;cursor:pointer;font-size:18px;">
                Logout
            </button>
        </form>
        </ul>
      </div>


      <!-- Main Content -->
      <div class="main-content">
        <!-- Header -->
        <div class="header">
          <h1>Dashboard</h1>
          <form action="{{ route('admin.dashboard') }}" method="GET" style="margin-bottom: 20px;">
            <input
                type="text"
                name="search"
                placeholder="Search"
                value="{{ request('search') }}"
                style="padding:8px; width:250px; border-radius:4px; border:1px solid #ccc;">
            <button type="submit" style="padding:8px 12px; border:none; background-color:#007BFF; color:white; border-radius:4px; cursor:pointer;">Search</button>
        </form>

          <div class="user-profile">
            <span>Admin</span>
          </div>
        </div>



        <!-- Medical History -->
        <div class="medical-history-section">
          <h2>All Appointments</h2>
          <!-- Search Form -->


          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Service</th>
                <th>Vehicle</th>
                <th>Vehicle Number</th>
                <th>Service Date</th>
                <th>Special Request</th>
                <th>Booked At</th>
              </tr>
            </thead>
            <tbody>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->service }}</td>
                            <td>{{ $booking->vehicle }}</td>
                            <td>{{ $booking->vehicle_number }}</td>
                            <td>{{ $booking->service_date }}</td>
                            <td>{{ $booking->special_request }}</td>
                            <td>{{ $booking->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>

            </tbody>

          </table>
        </div>
      </div>
    </div>
    <form method="POST" action="{{ route('services.store') }}">
  @csrf
  <input type="text" name="name" placeholder="Service Name" required>
  <input type="text" name="description" placeholder="Description" required>
  <input type="number" name="price" placeholder="Price" required>
  <button type="submit">Add Service</button>
</form>

  </body>
</html>
