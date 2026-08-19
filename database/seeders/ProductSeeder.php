<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Essential Work Kit', 'slug' => 'essential-work-kit', 'category' => 'starter-kit', 'description' => 'Notebook, tumbler, pouch, dan kartu ucapan dalam satu paket yang siap dibagikan.', 'price_min' => 85000, 'price_max' => 185000, 'minimum_order' => 50, 'image_url' => 'https://images.unsplash.com/photo-1589998059171-988d887df646?auto=format&fit=crop&w=900&q=85', 'is_featured' => true],
            ['name' => 'Aluminium Tumbler', 'slug' => 'aluminium-tumbler', 'category' => 'tumbler', 'description' => 'Tumbler ringan dengan laser engraving logo yang presisi dan tahan lama.', 'price_min' => 65000, 'price_max' => 135000, 'minimum_order' => 50, 'image_url' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=900&q=85', 'is_featured' => true],
            ['name' => 'Daily Carry Pouch', 'slug' => 'daily-carry-pouch', 'category' => 'fashion', 'description' => 'Pouch kanvas premium untuk onboarding, event, atau hadiah apresiasi tim.', 'price_min' => 45000, 'price_max' => 110000, 'minimum_order' => 100, 'image_url' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=900&q=85', 'is_featured' => true],
            ['name' => 'Desk Ritual Set', 'slug' => 'desk-ritual-set', 'category' => 'desk-set', 'description' => 'Perlengkapan meja kerja yang rapi untuk membuat brand Anda hadir setiap hari.', 'price_min' => 125000, 'price_max' => 275000, 'minimum_order' => 50, 'image_url' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&w=900&q=85', 'is_featured' => true],
            ['name' => 'Executive Leather Set', 'slug' => 'executive-leather-set', 'category' => 'premium', 'description' => 'Set eksklusif berbahan kulit sintetis untuk klien dan partner strategis.', 'price_min' => 275000, 'price_max' => 650000, 'minimum_order' => 25, 'image_url' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=900&q=85', 'is_featured' => false],
            ['name' => 'Hampers Nusantara', 'slug' => 'hampers-nusantara', 'category' => 'hampers', 'description' => 'Rangkaian kudapan lokal pilihan dengan kemasan yang mewakili identitas perusahaan.', 'price_min' => 185000, 'price_max' => 450000, 'minimum_order' => 25, 'image_url' => 'https://images.unsplash.com/photo-1601050690597-df0568f70950?auto=format&fit=crop&w=900&q=85', 'is_featured' => false],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product);
        }
    }
}
