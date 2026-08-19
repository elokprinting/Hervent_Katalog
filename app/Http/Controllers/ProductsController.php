<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->string('category')->trim()->toString();
        $search = $request->string('q')->trim()->toString();
        $sort = $request->string('sort')->toString();
        $products = Product::query()
            ->select(['id', 'name', 'slug', 'category', 'description', 'price_min', 'price_max', 'minimum_order', 'image_url', 'is_featured'])
            ->when($category, fn ($query) => $query->where('category', $category))
            ->when($search, fn ($query) => $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            }))
            ->when($sort === 'price_asc', fn ($query) => $query->orderBy('price_min'))
            ->when($sort === 'price_desc', fn ($query) => $query->orderByDesc('price_min'))
            ->when(!in_array($sort, ['price_asc', 'price_desc'], true), fn ($query) => $query->orderByDesc('is_featured')->orderBy('name'))
            ->paginate(12)
            ->withQueryString();

        $categories = Cache::remember('products.categories.v2', now()->addHour(), fn () => Product::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->all());

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'activeCategory' => $category,
            'search' => $search,
            'sort' => $sort,
        ]);
    }
}
