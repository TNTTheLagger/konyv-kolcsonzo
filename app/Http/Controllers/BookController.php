<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Existing methods...

    public function main()
    {
        $books = Book::with('genre')->get();
        return view('main', compact('books'));
    }
}
