<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->string('category')->toString();
        $products = Product::query()
            ->when($category, fn ($query) => $query->where('category', $category))
            ->orderByDesc('is_featured')
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('products.index', [
            'products' => $products,
            'categories' => Product::query()->select('category')->distinct()->orderBy('category')->pluck('category'),
            'activeCategory' => $category,
        ]);
    }
}
