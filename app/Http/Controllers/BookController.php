<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display a listing of the books.
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Show the form for creating a new book.
    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    // Store a newly created book in the database.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Display the specified book.
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Remove the specified book from the database.
    public function destroy(int $id)
    {
        $book = $this->findBookOrFail($id);

        $book->delete();

        return redirect()->route('books.index')->with('success', $this->getBookDeletedMessage($id));
    }

    private function findBookOrFail(int $id): Book
    {
        $book = Book::find($id);
        if (!$book) {
            throw new ModelNotFoundException("Book with ID $id not found.");
        }
        return $book;
    }

    private function getBookDeletedMessage(int $id): string
    {
        return "Book with ID $id deleted successfully.";
    }
}
