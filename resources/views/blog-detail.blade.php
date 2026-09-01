<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>7 Souvenir yang Cocok untuk Perayaan Ulang Tahun Perusahaan | HERVENT</title>
<meta name="theme-color" content="#B81A1F">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
  .blog-detail-meta {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.75rem 1.25rem;
  }
  .blog-detail-meta-item {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    line-height: 1.4;
    white-space: nowrap;
  }
  .blog-detail-meta-item svg {
    width: 1rem;
    height: 1rem;
    flex: 0 0 1rem;
  }
</style>
<link rel="icon" type="image/png" href="{{ asset('images/Icon Logo.png') }}">
</head><body class="blog-page">

@include('partials.header')

<main id="top">
  <section class="s" style="padding-top: 60px;">
    <div class="wrap" style="max-width: 100%; padding: 0 5%; margin: 0 auto;">
      
      <!-- HEADER ARTIKEL -->
      <div class="center rv" style="margin-bottom: 2rem;">
        <h1 class="h2" style="margin-bottom: 1rem; color: #222;">{{ $blog->title }}</h1>
        <div class="blog-detail-meta" style="font-size: 0.9rem; color: #888;">
          <span class="blog-detail-meta-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 4px;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            By {{ $blog->author }}
          </span>
          <span class="blog-detail-meta-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 4px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            {{ $blog->published_at ? $blog->published_at->format('d F Y') : '' }}
          </span>
        </div>
      </div>

      <!-- MAIN IMAGE -->
      @if($blog->image)
      <div class="rv" style="margin-bottom: 3rem;">
        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; max-height: 600px; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
      </div>
      @endif

      <!-- ARTIKEL KONTEN -->
      <div class="rv" style="font-size: 1.1rem; line-height: 1.8; color: #444; max-width: 900px; margin: 0 auto;">
        {!! nl2br(e(strip_tags($blog->content))) !!}
      </div>

      <hr style="border: 0; border-top: 1px solid #eaeaea; margin: 3rem 0;">

      <!-- POST NAVIGATION -->
      <div class="post-nav rv" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem; gap: 1rem; max-width: 900px; margin-left: auto; margin-right: auto;">
        <!-- Newer (Previous) -->
        @if($previous)
        <a href="{{ route('blog.show', $previous->slug) }}" style="display: flex; align-items: center; gap: 1rem; text-decoration: none; color: inherit; flex: 1;">
          <div style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid #ddd; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: background 0.3s;" onmouseover="this.style.background='#f0f0f0'" onmouseout="this.style.background='transparent'">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
          </div>
          <div>
            <div style="font-size: 0.85rem; color: #888; text-transform: uppercase; margin-bottom: 4px;">Newer</div>
            <div style="font-weight: 600; font-size: 1rem; color: #222; max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $previous->title }}</div>
          </div>
        </a>
        @else
        <div style="flex: 1;"></div>
        @endif

        <!-- Grid Icon -->
        <a href="{{ route('blog.index') }}" style="color: #999; flex-shrink: 0; transition: color 0.3s;" onmouseover="this.style.color='#b81a1f'" onmouseout="this.style.color='#999'" aria-label="Semua Artikel">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
        </a>

        <!-- Older (Next) -->
        @if($next)
        <a href="{{ route('blog.show', $next->slug) }}" style="display: flex; align-items: center; gap: 1rem; text-decoration: none; color: inherit; flex: 1; text-align: right; justify-content: flex-end;">
          <div>
            <div style="font-size: 0.85rem; color: #888; text-transform: uppercase; margin-bottom: 4px;">Older</div>
            <div style="font-weight: 600; font-size: 1rem; color: #222; max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $next->title }}</div>
          </div>
          <div style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid #ddd; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: background 0.3s;" onmouseover="this.style.background='#f0f0f0'" onmouseout="this.style.background='transparent'">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
          </div>
        </a>
        @else
        <div style="flex: 1;"></div>
        @endif
      </div>

      <hr style="border: 0; border-top: 1px solid #eaeaea; margin: 3rem 0;">

      <!-- REKOMENDASI -->
      @if($recommendations->count() > 0)
      <div class="rv" style="margin-bottom: 4rem; max-width: 900px; margin-left: auto; margin-right: auto;">
        <h3 class="h3" style="margin-bottom: 1.5rem;">Rekomendasi Untuk Anda</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
          @foreach($recommendations as $rec)
          <a href="{{ route('blog.show', $rec->slug) }}" style="text-decoration: none; color: inherit; border: 1px solid #eaeaea; display: block; border-radius: 8px; overflow: hidden; transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'" onmouseout="this.style.boxShadow='none'">
            <img src="{{ $rec->image ? asset($rec->image) : 'https://placehold.co/400x300' }}" style="width: 100%; height: 200px; object-fit: cover;">
            <div style="padding: 1rem;">
              <h4 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem; color: #222; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $rec->title }}</h4>
              <p style="font-size: 0.9rem; color: #666; line-height: 1.4;">{{ Str::limit(strip_tags($rec->excerpt ?? $rec->content), 80) }}</p>
            </div>
          </a>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </section>
</main>

@include('partials.footer')

</body>
</html>
