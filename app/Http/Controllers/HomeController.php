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
            ->when($category, fn ($query) => $query->where('category', $category))
            ->orderByDesc('is_featured')
            ->orderBy('name')
            ->get();

        return view('welcome', [
            'products' => $products->take(4),
            'bestSellers' => Product::query()->where('is_featured', true)->orderBy('name')->take(3)->get(),
            'categories' => Product::query()->select('category')->distinct()->orderBy('category')->pluck('category'),
            'categoryCounts' => Product::query()->selectRaw('category, count(*) as product_count')->groupBy('category')->pluck('product_count', 'category'),
            'activeCategory' => $category,
        ]);
    }
}
