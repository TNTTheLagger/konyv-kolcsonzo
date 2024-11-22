<?php

// tests/Feature/BookTest.php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Genre;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'GenreSeeder']);
    }

    public function test_book_creation_page_loads()
    {
        $response = $this->get(route('books.create'));
        $response->assertStatus(200);
    }

    public function test_book_can_be_created()
    {
        $genre = Genre::first();
        $response = $this->post(route('books.store'), [
            'title' => 'New Book',
            'author' => 'Author Name',
            'genre_id' => $genre->id,
            'publication_year' => 2020
        ]);
        $response->assertRedirect(route('books.create'));
        $this->assertDatabaseHas('books', ['title' => 'New Book']);
    }

    public function test_books_can_be_listed()
    {
        $response = $this->get(route('books.index'));
        $response->assertStatus(200);
        $response->assertSee('Available Books');
    }

    public function test_book_can_be_shown()
    {
        $response = $this->get(route('books.show', 1));
        $response->assertStatus(200);
    }

    public function test_book_can_be_deleted()
    {
        $response = $this->delete(route('books.destroy', 1));
        $response->assertRedirect(route('books.index'));
    }
}
