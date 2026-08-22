<?php
$blogs = [
    [
        'date_day' => '25',
        'date_month' => 'AUG',
        'image' => '25-Agus.png',
        'category' => 'REKOMENDASI UNTUK ANDA',
        'title' => 'Year End Gift, Hadiah Akhir Tahun',
        'slug' => '#',
        'excerpt' => 'Year End Gift, Hadiah Akhir Tahun Akhir tahun selalu menjadi momen spesial. Perusahaan maupun individu biasanya memberi...',
        'author' => 'Productdevelopment',
    ],
    [
        'date_day' => '22',
        'date_month' => 'AUG',
        'image' => '22-Agus.png',
        'category' => 'REKOMENDASI UNTUK ANDA, UNCATEGORIZED',
        'title' => '7 Souvenir Yang Cocok Untuk Perayaan Ulang Tahun Perusahaan',
        'slug' => '7-souvenir-yang-cocok-untuk-perayaan-ulang-tahun-perusahaan',
        'excerpt' => '7 Souvenir yang Cocok untuk Perayaan Ulang Tahun Perusahaan Perayaan ulang tahun perusahaan adalah momen penting untuk ...',
        'author' => 'Productdevelopment',
    ],
    [
        'date_day' => '04',
        'date_month' => 'AUG',
        'image' => '04-Agus.png',
        'category' => 'REKOMENDASI UNTUK ANDA',
        'title' => 'Merchandise Ulang Tahun Perusahaan, Strategi Branding Yang Efektif Dan Berkesan',
        'slug' => '#',
        'excerpt' => 'Merchandise Ulang Tahun Perusahaan, Strategi Branding yang Efektif dan Berkesan Merayakan ulang tahun perusahaan bukan ...',
        'author' => 'Productdevelopment',
    ],
    [
        'date_day' => '25',
        'date_month' => 'JUL',
        'image' => '25-Jul.jpg',
        'category' => 'SUKSES PROMOSI, TIPS',
        'title' => '5 Momen Yang Tepat Untuk Membuat Corporate Gift',
        'slug' => '#',
        'excerpt' => '5 Momen yang Tepat untuk Membuat Corporate Gift Corporate seouvenir gift bukan sekedar hadiah biasa. Lebih da...',
        'author' => 'Productdevelopment',
    ],
    [
        'date_day' => '24',
        'date_month' => 'JUL',
        'image' => '24-Jul.png',
        'category' => 'REKOMENDASI UNTUK ANDA, UNCATEGORIZED',
        'title' => 'Noise Cancelling Earbuds & Headpones, Souvenir Corporate Mewah Yang Meningkatkan Reputasi Brand',
        'slug' => '#',
        'excerpt' => 'Noise Cancelling Earbuds & Headpones, Souvenir Corporate Mewah yang Meningkatkan Reputasi Brand  Kenyamanan ...',
        'author' => 'Productdevelopment',
    ],
    [
        'date_day' => '23',
        'date_month' => 'JUL',
        'image' => '23-Jul.png',
        'category' => 'REKOMENDASI UNTUK ANDA, UNCATEGORIZED',
        'title' => 'Travel Router / Wifi Extender, Souvenir Eksklusif Untuk Klien Dan Karyawan Anda',
        'slug' => '#',
        'excerpt' => 'Travel Router / Wifi Extender, Souvenir Eksklusif untuk Klien dan Karyawan Anda  Mengapa Memilih Travel Router a...',
        'author' => 'Productdevelopment',
    ],
];
?>
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
  }
  .blog-cat {
    background: #9b2226;
    color: #fff;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 5px 15px;
    position: absolute;
    top: 235px; /* Half overlapping image and body */
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
</head>
<body>

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
          <img src="{{ asset('images/Blogs/' . $blog['image']) }}" alt="{{ $blog['title'] }}" class="blog-image">
          
          <div class="blog-date">
            <span class="blog-date-day">{{ $blog['date_day'] }}</span>
            <span class="blog-date-month">{{ $blog['date_month'] }}</span>
          </div>
          
          <span class="blog-cat">{{ $blog['category'] }}</span>
          
          <div class="blog-body">
            <h2 class="blog-title">{{ $blog['title'] }}</h2>
            
            <div class="blog-meta">
              <span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                By {{ $blog['author'] }}
              </span>
              <span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                0
              </span>
            </div>
            
            <p class="blog-excerpt">{{ $blog['excerpt'] }}</p>
            
            <a href="{{ $blog['slug'] !== '#' ? url('/blog/' . $blog['slug']) : '#' }}" class="blog-readmore">Continue Reading</a>
          </div>
        </article>
        @endforeach
      </div>
    </div>
  </section>
</main>

@include('partials.footer')

</body>
</html>
