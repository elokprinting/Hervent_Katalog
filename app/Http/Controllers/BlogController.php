<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Blog::where('is_published', true)->orderBy('published_at', 'desc')->get();
        return view('blog', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = \App\Models\Blog::where('slug', $slug)->firstOrFail();

        // Using id as fallback if published_at is the same, but let's just use id for simpler nav
        $previous = \App\Models\Blog::where('is_published', true)->where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $next = \App\Models\Blog::where('is_published', true)->where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        $recommendations = \App\Models\Blog::where('is_published', true)->where('id', '!=', $blog->id)->inRandomOrder()->take(3)->get();

        return view('blog-detail', compact('blog', 'previous', 'next', 'recommendations'));
    }
}
