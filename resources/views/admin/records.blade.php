<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customers - Pharmacy POS</title>
      <link href="/img/logo.png" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
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
          <h1>Records</h1>
          <form action="{{ route('admin.records') }}" method="GET" style="margin-bottom: 20px;">
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

        <!-- Customer Table -->
        <div class="table-section">
          <h3>All Records</h3>

          <table>
            <thead>
              <tr>
                  <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Service </th>
                <th>Service Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                     <td>{{ $booking->id }}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->service }}</td>
                    <td>{{ $booking->service_date }}</td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
