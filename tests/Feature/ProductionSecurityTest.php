<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use Tests\TestCase;

class ProductionSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_production_login_requires_a_configured_password_hash(): void
    {
        config(['production.password_hash' => null]);

        $this->post(route('production.login.submit'), ['password' => 'any-password'])
            ->assertSessionHasErrors('password');
    }

    public function test_production_login_accepts_only_the_configured_password(): void
    {
        config(['production.password_hash' => Hash::make('correct-password')]);

        $this->post(route('production.login.submit'), ['password' => 'correct-password'])
            ->assertRedirect(route('production.blog.index'))
            ->assertSessionHas('production_authenticated', true);
    }

    public function test_public_pages_send_security_headers(): void
    {
        $this->get(route('home'))
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'DENY')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->assertHeader('Content-Security-Policy');
    }

    public function test_authenticated_production_user_can_update_and_delete_a_product(): void
    {
        $product = Product::create([
            'name' => 'Produk Lama',
            'slug' => 'produk-lama',
            'category' => 'gift-set',
            'description' => 'Deskripsi lama',
            'stock' => 10,
            'price_min' => 1000,
            'price_max' => 2000,
            'minimum_order' => 1,
            'image_url' => 'https://example.com/image.jpg',
        ]);

        $session = ['production_authenticated' => true];
        $this->withSession($session)->put(route('production.product.update', $product), [
            'name' => 'Produk Baru',
            'category' => 'bottle',
            'catalog_category' => 'seminar-training',
            'product_type' => 'single',
            'stock' => 25,
            'description' => 'Deskripsi baru',
        ])->assertSessionHas('success', 'Produk berhasil diperbarui.');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Produk Baru',
            'slug' => 'produk-baru',
            'stock' => 25,
        ]);

        $this->withSession($session)->delete(route('production.product.destroy', $product))
            ->assertSessionHas('success', 'Produk berhasil dihapus.');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
