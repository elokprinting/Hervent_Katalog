<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $root = public_path('images/products');
        $files = File::allFiles($root);
        $managedPrefixes = [
            'images/products/Product/',
            'images/products/Corporate Gift/',
            'images/products/Seminar & Training/',
            'images/products/Gathering & Anniversary/',
            'images/products/Client Appreciation/',
            'images/products/Holiday & Hampers/',
        ];

        Product::query()
            ->where(function ($query) use ($managedPrefixes) {
                $query->where('image_url', 'like', '%unsplash.com%');
                foreach ($managedPrefixes as $prefix) {
                    $query->orWhere('image_url', 'like', $prefix . '%');
                    $query->orWhere('image_url', 'like', '/' . $prefix . '%');
                }
            })
            ->delete();

        foreach ($files as $index => $file) {
            $relativePath = str_replace('\\', '/', $file->getRelativePathname());
            $parts = explode('/', $relativePath);
            $topFolder = $parts[0] ?? '';
            $isProductFolder = $topFolder === 'Product';
            $isGiftSet = $isProductFolder
                ? ($parts[1] ?? '') === 'Gift Sets'
                : in_array($topFolder, [
                    'Corporate Gift',
                    'Seminar & Training',
                    'Gathering & Anniversary',
                    'Client Appreciation',
                    'Holiday & Hampers',
                ], true);

            $category = $isGiftSet
                ? 'gift-set'
                : $this->categoryFromPath($parts, $file->getFilename());
            $catalogCategory = $this->catalogCategoryFromFolder($topFolder);
            $name = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $slug = Str::slug($relativePath);

            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'category' => $category,
                    'catalog_category' => $catalogCategory,
                    'product_type' => $isGiftSet ? 'package' : 'single',
                    'description' => $isGiftSet
                        ? 'Paket hadiah korporat yang dapat disesuaikan untuk kebutuhan dan momen perusahaan.'
                        : 'Produk promosi berkualitas yang dapat dikustomisasi dengan identitas brand perusahaan.',
                    'price_min' => $isGiftSet ? 150000 : 25000,
                    'price_max' => $isGiftSet ? 750000 : 250000,
                    'minimum_order' => $isGiftSet ? 25 : 50,
                    'image_url' => '/images/products/' . $relativePath,
                    'is_featured' => $index < 6,
                ]
            );
        }
    }

    private function categoryFromPath(array $parts, string $filename): string
    {
        if (strtolower($parts[0] ?? '') === 'product' && isset($parts[2])) {
            return Str::slug(pathinfo($parts[2], PATHINFO_FILENAME));
        }

        $category = Str::slug(pathinfo($filename, PATHINFO_FILENAME));
        if (Str::startsWith($category, ['falshdrive', 'flashdrive'])) {
            return 'flashdrive';
        }

        return $category;
    }

    private function catalogCategoryFromFolder(string $folder): string
    {
        return [
            'Corporate Gift' => 'onboarding-karyawan',
            'Seminar & Training' => 'seminar-training',
            'Gathering & Anniversary' => 'gathering-anniversary',
            'Client Appreciation' => 'apresiasi-klien-vip',
            'Holiday & Hampers' => 'holidays-hampers',
        ][$folder] ?? 'gathering-anniversary';
    }
}
