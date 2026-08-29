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
            'categories' => [
                'Apparel & Lifestyle',
                'Bags & Pouch',
                'Drinkware & Dining',
                'Gift Sets',
                'Office & Stationery',
                'Tech & Gadgets',
            ],
            'activeCategory' => $category,
        ]);
    }
}
