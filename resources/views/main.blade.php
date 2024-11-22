@extends('layouts.app')

@section('title', 'Bookstore')

@section('content')
    <h1>Welcome to the Bookstore</h1>

    <h2>Available Books</h2>
    @foreach($books as $book)
        <div>
            <h3>{{ $book->title }}</h3>
            <p>Author: {{ $book->author }}</p>
            <p>Genre: {{ $book->genre->name }}</p>
            <p>Publication Year: {{ $book->publication_year }}</p>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <a href="{{ route('rentals.create', $book->id) }}">Rent</a>
        </div>
    @endforeach

    <a href="{{ route('books.create') }}">Add a New Book</a>
    <a href="{{ route('genres.create') }}">Add a New Genre</a>
    <a href="{{ route('rentals.index') }}">View All Rentals</a>
    <a href="{{ route('rentals.active') }}">View Active Rentals</a>
@endsection
