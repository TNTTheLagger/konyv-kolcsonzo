<!DOCTYPE html>
<html>
<head>
    <title>Create Book</title>
</head>
<body>
<h1>Create Book</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required><br>
    <label for="genre_id">Genre:</label>
    <select id="genre_id" name="genre_id" required>
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select><br>
    <label for="publication_year">Publication Year:</label>
    <input type="number" id="publication_year" name="publication_year" required><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>
