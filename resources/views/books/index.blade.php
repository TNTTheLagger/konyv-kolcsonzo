<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>
<h1>Books</h1>

<form action="{{ route('books.index') }}" method="GET">
    <input type="text" name="filter" placeholder="Search by title">
    <button type="submit">Search</button>
</form>

@foreach($books as $book)
    <div>
        <h3>{{ $book->title }}</h3>
        <p>Author: {{ $book->author }}</p>
        <p>Publication Year: {{ $book->publication_year }}</p>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <a href="{{ route('rentals.create', $book->id) }}">Rent</a>
    </div>
@endforeach
</body>
</html>
