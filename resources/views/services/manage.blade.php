<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="text-center text-primary mb-4">Manage Services</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td><i class="fa {{ $service->icon }}"></i> {{ $service->icon }}</td>
                                <td>{{ $service->title }}</td>
                                <td>{{ Str::limit($service->description, 60) }}</td>
                                <td><img src="{{ asset('storage/' . $service->image) }}" width="60" height="60" style="object-fit: cover;"></td>
                                <td>
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm rounded-pill">Edit</a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
