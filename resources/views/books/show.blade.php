@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>Author: {{ $book->author }}</p>
    <p>Genre: {{ $book->genre->name }}</p>
    <p>Publication Year: {{ $book->publication_year }}</p>

    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="rental_date">Rental Date:</label>
        <input type="date" id="rental_date" name="rental_date" required><br>
        <button type="submit">Rent</button>
    </form>
@endsection
