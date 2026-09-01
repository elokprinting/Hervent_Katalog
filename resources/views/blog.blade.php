<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Blog - Berita & Tips | HERVENT</title>
<meta name="theme-color" content="#B81A1F">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
  .blog-page {
    padding: 60px 0;
    background-color: #f9f9f9;
  }
  .blog-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }
  .blog-header {
    text-align: center;
    margin-bottom: 40px;
  }
  .blog-header h1 {
    font-size: 2.5rem;
    color: #333;
  }
  .blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
  }
  .blog-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    position: relative;
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
  }
  .blog-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
  }
  .blog-date {
    position: absolute;
    top: 15px;
    left: 15px;
    background: #fff;
    padding: 5px 10px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  .blog-date-day {
    display: block;
    font-size: 1.5rem;
    font-weight: bold;
    line-height: 1;
    color: #333;
  }
  .blog-date-month {
    display: block;
    font-size: 0.8rem;
    color: #666;
    margin-top: 2px;
    text-transform: uppercase;
  }
  .blog-cat {
    background: #9b2226;
    color: #fff;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 5px 15px;
    border-radius: 6px;
    position: absolute;
    top: 235px;
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    text-transform: uppercase;
  }
  .blog-body {
    padding: 30px 20px 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }
  .blog-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #222;
    line-height: 1.4;
  }
  .blog-meta {
    font-size: 0.85rem;
    color: #888;
    margin-bottom: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
  }
  .blog-meta span {
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .blog-excerpt {
    font-size: 0.95rem;
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
  }
  .blog-readmore {
    font-size: 0.85rem;
    font-weight: 700;
    color: #9b2226;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }
  .blog-readmore:hover {
    text-decoration: underline;
  }
</style>
<link rel="icon" type="image/png" href="{{ asset('images/Icon Logo.png') }}">
</head><body>

@include('partials.header')

<main id="top">
  <section class="blog-page">
    <div class="blog-container">
      <div class="blog-header">
        <h1>Blog Hervent</h1>
      </div>
      
      <div class="blog-grid">
        @foreach($blogs as $blog)
        <article class="blog-card">
          <img src="{{ $blog->image ? asset($blog->image) : 'https://placehold.co/600x400?text=No+Image' }}" alt="{{ $blog->title }}" class="blog-image">
          
          @if($blog->published_at)
          <div class="blog-date">
            <span class="blog-date-day">{{ $blog->published_at->format('d') }}</span>
            <span class="blog-date-month">{{ $blog->published_at->format('M') }}</span>
          </div>
          @endif
          
          <span class="blog-cat">{{ $blog->category ?? 'Corporate' }}</span>
          
          <div class="blog-body">
            <h2 class="blog-title">{{ $blog->title }}</h2>
            
            <div class="blog-meta">
              <span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                By {{ $blog->author ?? '' }}
              </span>
              <span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                0
              </span>
            </div>
            
            <p class="blog-excerpt">{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 120) }}</p>
            
            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-readmore">Continue Reading</a>
          </div>
        </article>
        @endforeach
      </div>

      @if($blogs->isEmpty())
      <div style="text-align: center; padding: 3rem; color: #666; width: 100%;">
        <p>Belum ada artikel blog.</p>
      </div>
      @endif
    </div>
  </section>
</main>

@include('partials.footer')

</body>
</html>
