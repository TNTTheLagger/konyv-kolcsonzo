<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;

Route::get('new-genre', [GenreController::class, 'create'])->name('genres.create');
Route::post('genres', [GenreController::class, 'store'])->name('genres.store');

Route::get('new-book', [BookController::class, 'create'])->name('books.create');
Route::post('books', [BookController::class, 'store'])->name('books.store');
Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::get('books/{id}', [BookController::class, 'show'])->name('books.show');
Route::delete('books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('books/book/{bookId}', [RentalController::class, 'create'])->name('rentals.create');
Route::post('rentals', [RentalController::class, 'store'])->name('rentals.store');
Route::get('rentals', [RentalController::class, 'index'])->name('rentals.index');

Route::get('back', [RentalController::class, 'active'])->name('rentals.active');
Route::patch('rentals/updateReturnDate', [RentalController::class, 'updateReturnDate'])->name('rentals.updateReturnDate');

Route::get('/', [BookController::class, 'index'])->name('home');
