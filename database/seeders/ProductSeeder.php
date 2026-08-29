<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
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
            $includedItems = $isGiftSet ? $this->includedItems($name) : null;

            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'category' => $category,
                    'catalog_category' => $catalogCategory,
                    'product_type' => $isGiftSet ? 'package' : 'single',
                    'description' => $isGiftSet
                        ? 'Giftset Premium dengan ' . count($includedItems) . ' produk.'
                        : 'Produk promosi berkualitas yang dapat dikustomisasi dengan identitas brand perusahaan.',
                    'included_items' => $includedItems,
                    'price_min' => $isGiftSet ? 150000 : 25000,
                    'price_max' => $isGiftSet ? 750000 : 250000,
                    'minimum_order' => $isGiftSet ? 25 : 50,
                    'image_url' => '/images/products/' . $relativePath,
                    'is_featured' => $index < 6,
                ]
            );
        }

        Cache::forget('products.categories.v4');
    }

    private function categoryFromPath(array $parts, string $filename): string
    {
        if (strtolower($parts[0] ?? '') === 'product') {
            if (($parts[1] ?? '') === 'drinkware and dinning' && isset($parts[2])) {
                return Str::slug($parts[2]);
            }

            return Str::slug(pathinfo($filename, PATHINFO_FILENAME));
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

    private function includedItems(string $name): array
    {
        return match (Str::slug($name)) {
            'ethnic-echo' => ['Notebook custom', 'Pulpen premium', 'Keychain', 'Gift box'],
            'supreme-spectra' => ['Tumbler custom', 'Notebook custom', 'Pulpen premium', 'Gift box'],
            'synergi-seminar-package' => ['Seminar kit', 'Notebook custom', 'Pulpen', 'Lanyard', 'Gift box'],
            default => ['Produk custom pilihan', 'Packaging eksklusif'],
        };
    }
}
