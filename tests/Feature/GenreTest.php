<?php

// tests/Feature/GenreTest.php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use RefreshDatabase;

    public function test_genre_creation_page_loads()
    {
        $response = $this->get(route('genres.create'));
        $response->assertStatus(200);
    }

    public function test_genre_can_be_created()
    {
        $response = $this->post(route('genres.store'), [
            'name' => 'New Genre'
        ]);
        $response->assertRedirect(route('genres.create'));
        $this->assertDatabaseHas('genres', ['name' => 'New Genre']);
    }
}
