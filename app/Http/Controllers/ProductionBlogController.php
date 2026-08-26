<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProductionBlogController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Blog::orderBy('created_at', 'desc')->get();
        $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Product::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('production.blog-editor', compact('blogs', 'products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->only(['title', 'category']);

        // Handle slug uniqueness
        $slug = Str::slug($request->title);
        $count = \App\Models\Blog::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . time();
        }
        $data['slug'] = $slug;
        $data['published_at'] = now();
        // Blog entries are rendered as text to prevent stored XSS through the editor.
        $data['content'] = strip_tags($request->string('content')->toString());
        $data['excerpt'] = Str::limit($data['content'], 150);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('images/Blogs'), $filename);
            $data['image'] = 'images/Blogs/' . $filename;
        }

        \App\Models\Blog::create($data);

        return redirect()->back()->with('success', 'Blog created successfully.');
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100|exists:products,category',
            'stock' => 'required|integer|min:0|max:4294967295',
            'description' => 'required|string|max:65535',
            'image' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:5120|dimensions:max_width=3000,max_height=3000',
        ]);

        $slug = Str::slug($validated['name']);
        $baseSlug = $slug ?: 'product';
        $suffix = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $suffix++;
        }

        $productData = [
            ...$validated,
            'slug' => $slug,
            'price_min' => 0,
            'price_max' => 0,
            'image_url' => '/images/Logo Landscape.png',
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('images/products'), $filename);
            $productData['image_url'] = 'images/products/' . $filename;
        }

        Product::create($productData);

        Cache::forget('products.categories.v2');

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }
}
