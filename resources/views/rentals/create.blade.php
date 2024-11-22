@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rent a Book: {{ $book->title }}</h1>

        <form action="{{ route('rentals.store') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>

            <div class="form-group">
                <label for="rental_date">Rental Date</label>
                <input type="date" name="rental_date" class="form-control" id="rental_date" required>
            </div>

            <div class="form-group">
                <label for="return_date">Return Date</label>
                <input type="date" name="return_date" class="form-control" id="return_date">
            </div>

            <button type="submit" class="btn btn-primary">Rent Book</button>
        </form>
    </div>
@endsection
