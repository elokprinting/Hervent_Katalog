<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Gift Set (2 produk)
            [
                'name' => 'Executive Gift Set',
                'slug' => 'executive-gift-set',
                'category' => 'gift-set',
                'description' => 'Paket eksklusif berisi tumbler, notebook kulit, dan pulpen premium dalam box custom — cocok untuk apresiasi klien VIP dan direksi.',
                'price_min' => 185000,
                'price_max' => 450000,
                'minimum_order' => 25,
                'image_url' => 'https://images.unsplash.com/photo-1549465220-1a8b9238f760?auto=format&fit=crop&w=900&q=85',
                'is_featured' => true,
                'subtitle' => 'Sudah Include Logo',
                'colors' => ['#000000', '#ffffff', '#c7c7c7', '#3f4f63'],
                'dimensions' => '25 x 20 x 10 cm',
                'custom_method' => 'UV Print / Laser Engraving',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1549465220-1a8b9238f760?auto=format&fit=crop&w=900&q=85',
                    'https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?auto=format&fit=crop&w=900&q=85',
                    'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=900&q=85'
                ]
            ],
            [
                'name' => 'Welcome Kit Gift Set',
                'slug' => 'welcome-kit-gift-set',
                'category' => 'gift-set',
                'description' => 'Set onboarding karyawan baru: pouch, lanyard, tumbler mini, dan kartu ucapan dalam kemasan branded perusahaan.',
                'price_min' => 95000,
                'price_max' => 225000,
                'minimum_order' => 50,
                'image_url' => 'https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?auto=format&fit=crop&w=900&q=85',
                'is_featured' => true,
                'subtitle' => 'Cocok untuk Onboarding',
                'colors' => ['#2f3542', '#747d8c', '#a4b0be'],
                'dimensions' => '20 x 15 x 8 cm',
                'custom_method' => 'Screen Print',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?auto=format&fit=crop&w=900&q=85',
                    'https://images.unsplash.com/photo-1549465220-1a8b9238f760?auto=format&fit=crop&w=900&q=85'
                ]
            ],

            // Bottle (2 produk)
            [
                'name' => 'Stainless Steel Bottle',
                'slug' => 'stainless-steel-bottle',
                'category' => 'bottle',
                'description' => 'Botol stainless steel 500ml vacuum insulated, tahan panas 12 jam & dingin 24 jam. Logo custom dengan laser engraving.',
                'price_min' => 75000,
                'price_max' => 165000,
                'minimum_order' => 50,
                'image_url' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=900&q=85',
                'is_featured' => true,
                'subtitle' => 'Double Wall Vacuum Insulated',
                'colors' => ['#000000', '#ffffff', '#e1b12c'],
                'dimensions' => '6.5 x 6.5 x 23 cm',
                'custom_method' => 'Laser Engraving',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=900&q=85',
                    'https://images.unsplash.com/photo-1523362628745-0c100150b504?auto=format&fit=crop&w=900&q=85'
                ]
            ],
            [
                'name' => 'Glass Infuser Bottle',
                'slug' => 'glass-infuser-bottle',
                'category' => 'bottle',
                'description' => 'Botol kaca borosilikat 450ml dengan infuser teh, sleeve silikon, dan tutup bamboo. Cetak logo UV printing.',
                'price_min' => 55000,
                'price_max' => 120000,
                'minimum_order' => 50,
                'image_url' => 'https://images.unsplash.com/photo-1523362628745-0c100150b504?auto=format&fit=crop&w=900&q=85',
                'is_featured' => false,
                'subtitle' => 'Eco Friendly Material',
                'colors' => ['#2ed573', '#1e90ff', '#ff4757'],
                'dimensions' => '7 x 7 x 20 cm',
                'custom_method' => 'UV Print',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1523362628745-0c100150b504?auto=format&fit=crop&w=900&q=85',
                    'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=900&q=85'
                ]
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product);
        }
    }
}
