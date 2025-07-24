<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-5">
                        <h2 class="text-center text-primary mb-4">Edit Service</h2>

                        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $service->title }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $service->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="icon" class="form-label">Font Awesome Icon</label>
                                <input type="text" name="icon" id="icon" class="form-control" value="{{ $service->icon }}" required>
                                <small class="form-text text-muted">Use Font Awesome class names (e.g., fa-car)</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Current Image</label><br>
                                <img src="{{ asset('storage/' . $service->image) }}" width="100" class="mb-2 rounded">
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label">Upload New Image (optional)</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success rounded-pill">Update Service</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
