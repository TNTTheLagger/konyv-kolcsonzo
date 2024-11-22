<!-- resources/views/rentals/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>All Rentals</title>
</head>
<body>
<h1>All Rentals</h1>

@foreach($rentals as $rental)
    <div>
        <h3>{{ $rental->book->title }}</h3>
        <p>Email: {{ $rental->email }}</p>
        <p>Rental Date: {{ $rental->rental_date }}</p>
        <p>Return Date: {{ $rental->return_date }}</p>
    </div>
@endforeach
</body>
</html>
