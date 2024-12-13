<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File to S3</title>
</head>
<body>
    <h1>Upload File to S3</h1>

    <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Select file:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Upload</button>
    </form>

    @if (session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
</body>
</html>
