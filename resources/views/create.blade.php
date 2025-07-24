<!DOCTYPE html>
<html>
<head>
    <title>Upload Service Image</title>
</head>
<body>
    <h2>Upload Service Image</h2>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Select Image:</label>
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
