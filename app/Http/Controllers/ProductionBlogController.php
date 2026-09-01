<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductionBlogController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Blog::orderBy('created_at', 'desc')->get();
        $products = Product::orderBy('created_at', 'desc')
            ->paginate(10, ['*'], 'product_page')
            ->withQueryString();
        $categories = collect(array_keys(Product::PRODUCT_GROUPS));
        $catalogCategories = Product::OCCASION_CATEGORIES;

        return view('production.blog-editor', compact('blogs', 'products', 'categories', 'catalogCategories'));
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
            'category' => 'required|in:'.implode(',', array_keys(Product::PRODUCT_GROUPS)),
            'catalog_category' => 'required|in:'.implode(',', array_keys(Product::OCCASION_CATEGORIES)),
            'product_type' => 'required|in:package,single',
            'stock' => 'required|integer|min:0|max:4294967295',
            'description' => 'required|string|max:65535',
            'image' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);
        if ($validated['category'] !== 'gift-sets') {
            $validated['catalog_category'] = 'produk-biasa';
        }

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

        Cache::forget('products.categories.v3');
        Cache::forget('home.categories.v1');
        Cache::forget('home.best-sellers.v1');

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function updateProduct(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::in(array_merge(array_keys(Product::PRODUCT_GROUPS), array_keys(Product::PRODUCT_CATEGORIES)))],
            'catalog_category' => ['required', 'in:'.implode(',', array_keys(Product::OCCASION_CATEGORIES))],
            'product_type' => ['required', 'in:package,single'],
            'stock' => ['required', 'integer', 'min:0', 'max:4294967295'],
            'description' => ['required', 'string', 'max:65535'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);
        if ($validated['category'] !== 'gift-sets') {
            $validated['catalog_category'] = 'produk-biasa';
        }

        $slug = Str::slug($validated['name']) ?: 'product';
        $baseSlug = $slug;
        $suffix = 1;
        while (Product::where('slug', $slug)->where('id', '!=', $product->getKey())->exists()) {
            $slug = $baseSlug.'-'. $suffix++;
        }

        $productData = [
            'name' => $validated['name'],
            'slug' => $slug,
            'category' => $validated['category'],
            'catalog_category' => $validated['catalog_category'],
            'product_type' => $validated['product_type'],
            'stock' => $validated['stock'],
            'description' => $validated['description'],
        ];

        if ($request->hasFile('image')) {
            $oldImage = $product->image_url;
            $filename = $request->file('image')->hashName();
            $request->file('image')->move(public_path('images/products'), $filename);
            $productData['image_url'] = 'images/products/'.$filename;

            $this->deleteManagedProductImage($oldImage);
        }

        $product->update($productData);
        Cache::forget('products.categories.v3');
        Cache::forget('home.categories.v1');
        Cache::forget('home.best-sellers.v1');

        return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroyProduct(Product $product)
    {
        $this->deleteManagedProductImage($product->image_url);

        $product->delete();
        Cache::forget('products.categories.v3');
        Cache::forget('home.categories.v1');
        Cache::forget('home.best-sellers.v1');

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }

    public function destroy(Blog $blog)
    {
        $this->deleteManagedBlogImage($blog->image);

        $blog->delete();

        return redirect()->back()->with('success', 'Blog berhasil dihapus.');
    }

    private function deleteManagedProductImage(?string $path): void
    {
        if (! is_string($path) || ! Str::startsWith($path, 'images/products/')) {
            return;
        }

        $filename = Str::after($path, 'images/products/');
        if ($filename === '' || basename($filename) !== $filename) {
            return;
        }

        File::delete(public_path('images/products/'.$filename));
    }

    private function deleteManagedBlogImage(?string $path): void
    {
        if (! is_string($path) || ! Str::startsWith($path, 'images/Blogs/')) {
            return;
        }

        $filename = Str::after($path, 'images/Blogs/');
        if ($filename === '' || basename($filename) !== $filename) {
            return;
        }

        File::delete(public_path('images/Blogs/'.$filename));
    }
}
