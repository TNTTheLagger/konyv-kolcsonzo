<?php

// app/Http/Controllers/RentalController.php
namespace App\Http\Controllers;

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

    public function index()
    {
        $rentals = Rental::with('book')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function active()
    {
        $rentals = Rental::with('book')->whereNull('return_date')->get();
        return view('rentals.active', compact('rentals'));
    }

    public function updateReturnDate(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        $request->validate([
            'return_date' => 'required|date|after_or_equal:' . $rental->rental_date,
        ]);

        $rental->update($request->all());

        return redirect()->route('rentals.active')->with('success', 'Return date updated successfully.');
    }
}
