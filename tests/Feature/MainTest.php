<?php

// tests/Feature/MainTest.php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MainTest extends TestCase
{
    use RefreshDatabase;

    public function test_main_page_displays_books()
    {
        // Seeding the database first
        $this->artisan('db:seed');

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Available Books');
    }
}
