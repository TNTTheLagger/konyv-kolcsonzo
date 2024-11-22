<!DOCTYPE html>
<html>
<head>
    <title>Create Genre</title>
</head>
<body>
    <h1>Create Genre</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('genres.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit">Submit</button>
</form>
</body>
</html>
