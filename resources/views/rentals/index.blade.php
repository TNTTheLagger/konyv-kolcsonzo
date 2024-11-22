@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Rentals</h1>

        <form method="GET" action="{{ route('rentals.index') }}">
            <div>
                <label for="book_title">Book Title</label>
                <input type="text" name="book_title" id="book_title" value="{{ request('book_title') }}">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ request('email') }}">
            </div>

            <div>
                <label for="genre_id">Genre</label>
                <select name="genre_id" id="genre_id">
                    <option value="">--Select Genre--</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">
            </div>

            <div>
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">
            </div>

            <button type="submit">Filter</button>
        </form>

        @if($rentals->isEmpty())
            <p>No rentals found.</p>
        @else
            <div>
                @foreach($rentals as $rental)
                    <div>
                        <h3>{{ optional($rental->book)->title ?: 'Unknown Title' }}</h3>
                        <p>Email: {{ $rental->email }}</p>
                        <p>Genre: {{ optional($rental->book->genre)->name ?: 'Unknown Genre' }}</p>
                        <p>Rental Date: {{ $rental->rental_date }}</p>
                        <p>Return Date: {{ $rental->return_date }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
