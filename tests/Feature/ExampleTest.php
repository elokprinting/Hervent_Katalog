<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_products_page_supports_category_filtering(): void
    {
        $response = $this->get('/products?category=tumbler');

        $response->assertOk()
            ->assertSee('Aluminium Tumbler')
            ->assertDontSee('Essential Work Kit');
    }

    public function test_products_page_loads_without_query_parameters(): void
    {
        $response = $this->get('/products');

        $response->assertOk()->assertSeeInOrder(['Koleksi', 'Corporate Gift']);
        $this->assertSame(10, $response->viewData('products')->perPage());
    }
}
