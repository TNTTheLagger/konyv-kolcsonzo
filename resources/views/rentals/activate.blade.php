<!DOCTYPE html>
<html>
<head>
    <title>Active Rentals</title>
</head>
<body>
<h1>Active Rentals</h1>

@foreach($rentals as $rental)
    <div>
        <h3>{{ $rental->book->title }}</h3>
        <p>Email: {{ $rental->email }}</p>
        <p>Rental Date: {{ $rental->rental_date }}</p>

        <form action="{{ route('rentals.updateReturnDate', $rental->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="return_date">Return Date:</label>
            <input type="date" id="return_date" name="return_date" required><br>
            <button type="submit">Update Return Date</button>
        </form>
    </div>
@endforeach
</body>
</html>
