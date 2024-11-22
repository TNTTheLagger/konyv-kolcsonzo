@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Current Rentals</h1>

        @if($rentals->isEmpty())
            <p>No active rentals found.</p>
        @else
            <form method="POST" action="{{ route('rentals.updateReturnDate') }}">
                @csrf
                @method('PATCH')

                @foreach($rentals as $rental)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ optional($rental->book)->title ?: 'Unknown Title' }}</h5>
                            <p class="card-text">
                                <strong>Author:</strong> {{ optional($rental->book)->author ?: 'Unknown Author' }}<br>
                                <strong>Email:</strong> {{ $rental->email }}<br>
                                <strong>Rental Date:</strong> {{ $rental->rental_date }}<br>
                            </p>
                            <div class="form-group">
                                <label for="return_date_{{ $rental->id }}">Return Date</label>
                                <input type="date" name="return_dates[{{ $rental->id }}]" id="return_date_{{ $rental->id }}" class="form-control" value="{{ old('return_dates.' . $rental->id) }}">
                            </div>
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Update Return Dates</button>
            </form>
        @endif
    </div>
@endsection
