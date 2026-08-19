<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk | Hervent</title>
    <meta name="description" content="Katalog corporate gift dan souvenir kantor custom Hervent.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="site-header">
        <div class="container nav">
            <a class="brand" href="{{ route('home') }}#beranda" aria-label="Hervent Beranda"><span class="brand-mark">H</span><span>HERVENT<small>REPRESENT YOUR VALUE</small></span></a>
            <button class="menu-toggle" aria-label="Buka menu" aria-expanded="false">&#9776;</button>
            <nav class="nav-links">
                <a href="{{ route('home') }}#beranda">Beranda</a><a href="{{ route('products.index') }}">Produk</a><a href="{{ route('home') }}#keunggulan">Keunggulan</a><a href="{{ route('home') }}#proses">Cara kerja</a><a href="{{ route('home') }}#faq">FAQ</a><a href="{{ route('home') }}#kontak">Kontak</a>
                <label class="language-switcher" for="language-select"><span aria-hidden="true">文</span><select id="language-select" aria-label="Pilih bahasa"><option value="id">ID</option><option value="en">EN</option></select></label><a class="button consultation-button" href="https://wa.me/62811912502" target="_blank"><span class="button-icon">&#9993;</span>Konsultasi Gratis</a>
            </nav>
        </div>
    </header>
    <main>
        <section class="catalog-hero"><div class="container catalog-hero-inner"><p class="kicker">Katalog produk</p><h1>Produk yang membuat brand Anda <em>diingat.</em></h1><p class="hero-copy">Jelajahi koleksi corporate gift dan merchandise custom kami. Semua bisa disesuaikan dengan identitas, momen, dan budget perusahaan Anda.</p></div></section>
        <section class="section catalog-section"><div class="container"><div class="catalog-toolbar"><div><p class="kicker">Koleksi Hervent</p><h2>Temukan produk pilihan Anda.</h2></div><span class="catalog-count">{{ $products->total() }} produk tersedia</span></div><div class="filter"><a class="{{ !$activeCategory ? 'active' : '' }}" href="{{ route('products.index') }}">Semua</a>@foreach($categories as $category)<a class="{{ $activeCategory === $category ? 'active' : '' }}" href="{{ route('products.index', ['category' => $category]) }}">{{ \Illuminate\Support\Str::headline($category) }}</a>@endforeach</div><div class="product-grid catalog-grid">@forelse($products as $product)<article id="product-{{ $product->id }}" class="product-card"><div class="product-image"><img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy"><span class="product-tag">{{ $product->is_featured ? 'Best seller' : $product->category_label }}</span></div><div class="product-info"><h3>{{ $product->name }}</h3><p>{{ $product->description }}</p><div class="product-meta"><span class="price">{{ $product->price_label }}</span><span class="moq">Mulai {{ $product->minimum_order }} pcs</span></div><a class="product-cta" href="https://wa.me/62811912502?text=Saya%20tertarik%20dengan%20{{ urlencode($product->name) }}" target="_blank">Tanya produk &#8594;</a></div></article>@empty<p class="muted">Belum ada produk di kategori ini.</p>@endforelse</div><div class="pagination-wrap">{{ $products->links() }}</div></div></section>
        <section class="cta"><div class="container cta-inner"><h2>Sudah menemukan yang cocok?</h2><a class="button button-light consultation-button" href="https://wa.me/62811912502" target="_blank"><span class="button-icon">&#9993;</span>Konsultasi Gratis</a></div></section>
    </main>
    <footer id="kontak"><div class="container"><div class="footer-grid"><div><a class="brand" href="{{ route('home') }}#beranda"><span class="brand-mark">H</span><span>HERVENT<small>REPRESENT YOUR VALUE</small></span></a><p>PT Aventama Hervent Solusindo. Corporate gift, promotional merchandise, dan souvenir kantor custom sejak 2009.</p><p><a href="https://wa.me/62811912502">WhatsApp</a> &nbsp; <a href="https://www.instagram.com/hervent.co.id/">Instagram</a> &nbsp; <a href="https://www.tiktok.com/@hervent.co.id">TikTok</a></p></div><div><h3>Tautan cepat</h3><ul><li><a href="{{ route('home') }}#beranda">Beranda</a></li><li><a href="{{ route('products.index') }}">Katalog produk</a></li><li><a href="{{ route('home') }}#keunggulan">Keunggulan</a></li><li><a href="{{ route('home') }}#proses">Cara kerja</a></li></ul></div><div><h3>Hubungi kami</h3><ul><li><a href="tel:02287324188">(022) 87324188</a></li><li><a href="https://wa.me/62811912502">0811-912-502</a></li><li><a href="mailto:cs@hervent.co.id">cs@hervent.co.id</a></li><li>Bandung & Surabaya</li></ul></div><div><h3>Jam operasional</h3><p>Sen-Jum 09.00-17.00<br>Sab 09.00-12.00</p><p>WhatsApp aktif 24/7</p></div></div><div class="footer-bottom"><span>&copy; {{ date('Y') }} HERVENT - PT Aventama Hervent Solusindo</span><span>Represent your value.</span></div></div></footer>
    <a class="floating-wa" href="https://wa.me/62811912502" target="_blank" aria-label="Chat WhatsApp">&#9742;</a>
</body>
</html>
