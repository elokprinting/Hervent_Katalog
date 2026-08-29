<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $category = $request->string('category')->toString();
        $products = Product::query()
            ->when($category, fn($query) => $query->where('category', $category))
            ->orderByDesc('is_featured')
            ->orderBy('name')
            ->get();

        return view('welcome', [
            'products' => $products->take(4),
            'bestSellers' => Product::query()->orderByDesc('is_featured')->orderBy('name')->take(6)->get(),
            'categories' => collect(Product::PRODUCT_GROUPS)->map(function (array $group, string $key) {
                $representative = Product::query()
                    ->whereIn('category', $group['categories'])
                    ->orderByDesc('is_featured')
                    ->orderBy('name')
                    ->first(['image_url']);

                return [
                    'key' => $key,
                    'label' => $group['label'],
                    'image' => $representative?->image_url ?? '/images/Logo Landscape.png',
                    'count' => Product::query()->whereIn('category', $group['categories'])->count(),
                ];
            })->values(),
            'activeCategory' => $category,
        ]);
    }
}
