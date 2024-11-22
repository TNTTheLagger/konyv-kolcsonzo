<?php

// app/Http/Controllers/RentalController.php
namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Rental;
use App\Models\Book;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('rentals.create', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'email' => 'required|email|max:255',
            'rental_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:rental_date',
        ]);

        Rental::create($request->all());

        return redirect()->route('rentals.create', $request->book_id)->with('success', 'Book rented successfully.');
    }

    public function index(Request $request)
    {
        $query = Rental::query();

        if ($request->filled('book_title')) {
            $query->whereHas('book', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->book_title . '%');
            });
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('genre_id')) {
            $query->whereHas('book.genre', function ($q) use ($request) {
                $q->where('id', $request->genre_id);
            });
        }

        if ($request->filled('start_date')) {
            $query->whereDate('rental_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('rental_date', '<=', $request->end_date);
        }

        $rentals = $query->with('book.genre')->get();
        $genres = Genre::all();

        return view('rentals.index', compact('rentals', 'genres'));
    }

    public function active()
    {
        $rentals = Rental::with('book')->whereNull('return_date')->get();
        return view('rentals.active', compact('rentals'));
    }

    public function updateReturnDate(Request $request)
    {
        $validatedData = $request->validate([
            'return_dates.*' => 'required|date|after_or_equal:today',
        ]);

        foreach ($request->input('return_dates') as $rentalId => $returnDate) {
            $rental = Rental::findOrFail($rentalId);
            if ($returnDate >= $rental->rental_date) {
                $rental->update(['return_date' => $returnDate]);
            }
        }

        return redirect()->route('rentals.active')->with('success', 'Return dates updated successfully.');
    }
}
