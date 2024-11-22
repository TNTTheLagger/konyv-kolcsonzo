<?php

// tests/Feature/RentalTest.php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use Tests\TestCase;

class RentalTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'BookSeeder']);
    }

    public function test_rental_creation_page_loads()
    {
        $book = Book::first();
        $response = $this->get(route('rentals.create', $book->id));
        $response->assertStatus(200);
    }

    public function test_rental_can_be_created()
    {
        $book = Book::first();
        $response = $this->post(route('rentals.store'), [
            'book_id' => $book->id,
            'email' => 'test@example.com',
            'rental_date' => '2023-10-01',
        ]);
        $response->assertRedirect(route('rentals.create', $book->id));
        $this->assertDatabaseHas('rentals', ['email' => 'test@example.com']);
    }

    public function test_rentals_can_be_listed()
    {
        $response = $this->get(route('rentals.index'));
        $response->assertStatus(200);
        $response->assertSee('All Rentals');
    }

    public function test_active_rentals_can_be_listed()
    {
        $response = $this->get(route('rentals.active'));
        $response->assertStatus(200);
        $response->assertSee('Active Rentals');
    }

    public function test_return_date_can_be_updated()
    {
        $rental = Rental::first();
        $response = $this->patch(route('rentals.updateReturnDate', $rental->id), [
            'return_date' => '2023-10-10',
        ]);
        $response->assertRedirect(route('rentals.active'));
        $this->assertDatabaseHas('rentals', ['return_date' => '2023-10-10']);
    }
}
