<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $category = $request->string('category')->toString();
        $products = Product::query()
            ->select(['id', 'name', 'slug', 'category', 'image_url', 'is_featured'])
            ->when($category, fn($query) => $query->where('category', $category))
            ->orderByDesc('is_featured')
            ->orderBy('name')
            ->limit(4)
            ->get();

        $bestSellers = Cache::remember('home.best-sellers.v1', now()->addMinutes(5), fn() => Product::query()
            ->select(['id', 'name', 'slug', 'category', 'image_url', 'is_featured'])
            ->orderByDesc('is_featured')
            ->orderBy('name')
            ->limit(6)
            ->get());

        $bestSellers = collect($bestSellers)
            ->filter(fn ($product) => $product instanceof Product || is_array($product) || is_object($product))
            ->map(function ($product) {
                if (is_array($product)) {
                    return (object) $product;
                }

                return $product;
            })
            ->values();

        $categories = Cache::remember('home.categories.v1', now()->addMinutes(5), fn() => collect(Product::PRODUCT_GROUPS)->map(function (array $group, string $key) {
            $representative = Product::query()
                ->where(function ($query) use ($key, $group) {
                    $query->whereIn('category', $group['categories'])->orWhere('category', $key);
                })
                ->orderByDesc('is_featured')
                ->orderBy('name')
                ->first(['image_url']);

            return [
                'key' => $key,
                'label' => $group['label'],
                'image' => $representative?->image_url ?? '/images/Logo Landscape.png',
                'count' => Product::query()->where(function ($query) use ($key, $group) {
                    $query->whereIn('category', $group['categories'])->orWhere('category', $key);
                })->count(),
            ];
        })->values());

        return view('welcome', [
            'products' => $products,
            'bestSellers' => $bestSellers,
            'categories' => $categories,
            'activeCategory' => $category,
        ]);
    }
}
