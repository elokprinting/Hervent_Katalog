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
        $group = $request->string('group')->trim()->toString();
        if (! array_key_exists($group, Product::PRODUCT_GROUPS)) {
            $group = '';
        }
        $catalogCategory = $request->string('catalog')->trim()->toString();
        if (! array_key_exists($catalogCategory, Product::OCCASION_CATEGORIES)) {
            $catalogCategory = '';
        }
        $type = $request->string('type')->trim()->toString();
        $search = $request->string('q')->trim()->toString();
        $sort = $request->string('sort')->toString();
        $products = Product::query()
            ->select(['id', 'name', 'slug', 'category', 'product_type', 'description', 'price_min', 'price_max', 'minimum_order', 'image_url', 'is_featured'])
            ->when($category, fn($query) => $query->where('category', $category))
            ->when($group, fn($query) => $query->whereIn('category', Product::PRODUCT_GROUPS[$group]['categories']))
            ->when(array_key_exists($catalogCategory, Product::OCCASION_CATEGORIES), fn($query) => $query->where('catalog_category', $catalogCategory))
            ->when(in_array($type, ['package', 'single'], true), fn($query) => $query->where('product_type', $type))
            ->when($search !== '', function ($query) use ($search) {
                $search = trim($search);
                $normalizedSearch = strtolower($search);

                $query->where(function ($query) use ($search, $normalizedSearch) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('catalog_category', 'like', "%{$search}%");

                    foreach (array_merge(Product::PRODUCT_CATEGORIES, Product::OCCASION_CATEGORIES) as $key => $label) {
                        $normalizedLabel = strtolower((string) $label);
                        $normalizedKey = strtolower((string) $key);

                        if (str_contains($normalizedLabel, $normalizedSearch) || str_contains($normalizedKey, $normalizedSearch)) {
                            $query->orWhere('category', $key)
                                ->orWhere('catalog_category', $key);
                        }
                    }
                });
            })
            ->when($sort === 'price_asc', fn($query) => $query->orderBy('price_min'))
            ->when($sort === 'price_desc', fn($query) => $query->orderByDesc('price_min'))
            ->when(!in_array($sort, ['price_asc', 'price_desc'], true), fn($query) => $query->orderByDesc('is_featured')->orderBy('name'))
            ->paginate(18)
            ->withQueryString();

        $categories = Cache::remember('products.categories.v4', now()->addHour(), fn() => Product::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->all());
        $categoryCounts = Product::query()
            ->selectRaw('category, count(*) as product_count')
            ->groupBy('category')
            ->pluck('product_count', 'category');

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'categoryCounts' => $categoryCounts,
            'activeCategory' => $category,
            'activeGroup' => $group,
            'productGroups' => Product::PRODUCT_GROUPS,
            'activeCatalogCategory' => $catalogCategory,
            'catalogCategories' => Product::OCCASION_CATEGORIES,
            'activeType' => $type,
            'search' => $search,
            'sort' => $sort,
        ]);
    }
    public function show(Product $product)
    {
        $recommendedProducts = Product::where('id', '!=', $product->id)
            ->where('category', $product->category)
            ->inRandomOrder()
            ->limit(4)
            ->get(['id', 'name', 'slug', 'image_url']);

        return view('products.show', compact('product', 'recommendedProducts'));
    }
}
