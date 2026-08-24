<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class ProductionBlogController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Blog::orderBy('created_at', 'desc')->get();
        return view('production.blog-editor', compact('blogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->except('image');

        // Handle slug uniqueness
        $slug = Str::slug($request->title);
        $count = \App\Models\Blog::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . time();
        }
        $data['slug'] = $slug;
        $data['published_at'] = now();
        $data['excerpt'] = Str::limit(strip_tags($request->content), 150);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/Blogs'), $filename);
            $data['image'] = 'images/Blogs/' . $filename;
        }

        \App\Models\Blog::create($data);

        return redirect()->back()->with('success', 'Blog created successfully.');
    }
}
