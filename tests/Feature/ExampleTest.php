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

    public function test_catalog_download_requires_contact_information(): void
    {
        $this->post(route('catalog.download'), [])
            ->assertRedirect()
            ->assertSessionHasErrors(['name'])
            ->assertSessionDoesntHaveErrors(['email', 'whatsapp']);
    }

    public function test_catalog_download_only_requires_a_name(): void
    {
        $this->post(route('catalog.download'), ['name' => 'Budi Santoso'])
            ->assertDownload('Brand Identity HERVENT.pdf');
    }

    public function test_catalog_download_returns_the_company_catalog_pdf(): void
    {
        $response = $this->post(route('catalog.download'), [
            'salutation' => 'Bapak',
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'whatsapp' => '+628123456789',
            'job_title' => 'Business Owner',
            'company' => 'PT Contoh',
        ]);

        $response->assertDownload('Brand Identity HERVENT.pdf');
    }
}
