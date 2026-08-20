<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk | HERVENT</title>
    <meta name="description" content="Katalog corporate gift dan souvenir kantor custom HERVENT.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="catalog-page">
    @include('partials.header')

    <main>
        <section class="catalog-shop">
            <div class="catalog-container">
                <nav class="catalog-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}#top">Home</a>
                    <span aria-hidden="true">›</span>
                    <a href="{{ route('products.index') }}">Shop</a>
                    <span aria-hidden="true">›</span>
                    <strong>{{ $activeCategory ? \Illuminate\Support\Str::headline($activeCategory) : 'Semua Produk' }}</strong>
                </nav>

                <header class="catalog-heading">
                    <p class="catalog-kicker">Koleksi Corporate Gift</p>
                    <h1>{{ $activeCategory ? \Illuminate\Support\Str::headline($activeCategory) : 'Katalog Produk' }}</h1>
                    <p>{{ $products->total() }} produk tersedia{{ $search ? ' untuk pencarian “'.$search.'”' : '' }}</p>
                </header>

                <div class="shop-layout">
                    <aside class="catalog-sidebar">
                        <div class="sidebar-heading"><strong>Filter Kategori</strong><span aria-hidden="true">⌄</span></div>
                        <a class="sidebar-category {{ !$activeCategory ? 'active' : '' }}" href="{{ route('products.index', array_filter(['q' => $search, 'sort' => $sort])) }}">
                            <i class="category-icon" data-lucide="layout-grid" aria-hidden="true"></i><span>Semua produk</span><small>{{ $products->total() }}</small>
                        </a>
                        @foreach($categories as $category)
                            @php($categoryIcon = ['gift-set-hampers' => 'gift', 'desk-set' => 'briefcase', 'fashion' => 'shirt', 'hampers' => 'basket', 'premium' => 'crown', 'starter-kit' => 'package', 'tumbler' => 'cup-soda', 'bottle' => 'bottle', 'card-holder' => 'credit-card', 'table-clock' => 'alarm-clock', 'clock' => 'clock', 'seminar-kit' => 'briefcase', 'calender' => 'calendar', 'thermos' => 'thermometer', 'tas' => 'shopping-bag', 'mug' => 'coffee', 'umbrella' => 'umbrella', 'eco-friendly' => 'leaf', 'headset' => 'headphones', 'flashdrive' => 'device-usb'] [$category] ?? 'package')
                            <a class="sidebar-category {{ $activeCategory === $category ? 'active' : '' }}" href="{{ route('products.index', array_filter(['category' => $category, 'q' => $search, 'sort' => $sort])) }}">
                                <i class="category-icon" data-lucide="{{ $categoryIcon }}" aria-hidden="true"></i><span>{{ \Illuminate\Support\Str::headline($category) }}</span>
                            </a>
                        @endforeach
                    </aside>

                    <div class="shop-results">
                        <div class="results-toolbar">
                            <form class="catalog-search" method="GET" action="{{ route('products.index') }}">
                                <input type="search" name="q" value="{{ $search }}" placeholder="Cari produk..." aria-label="Cari produk">
                                @if($activeCategory)<input type="hidden" name="category" value="{{ $activeCategory }}">@endif
                                @if($sort)<input type="hidden" name="sort" value="{{ $sort }}">@endif
                                <button type="submit" aria-label="Cari">⌕</button>
                            </form>
                            <span class="result-count">{{ $products->total() }} item ditemukan</span>
                            <form class="catalog-sort" method="GET" action="{{ route('products.index') }}">
                                <input type="hidden" name="q" value="{{ $search }}"><input type="hidden" name="category" value="{{ $activeCategory }}">
                                <label class="sr-only" for="catalogSort">Urutkan produk</label>
                                <select id="catalogSort" name="sort" onchange="this.form.submit()">
                                    <option value="" {{ !$sort ? 'selected' : '' }}>Terbaru</option>
                                    <option value="price_asc" {{ $sort === 'price_asc' ? 'selected' : '' }}>Harga terendah</option>
                                    <option value="price_desc" {{ $sort === 'price_desc' ? 'selected' : '' }}>Harga tertinggi</option>
                                </select>
                            </form>
                        </div>

                        <div class="catalog-grid marketplace-grid">
                            @forelse($products as $product)
                                <article id="product-{{ $product->id }}" class="market-product">
                                    <a class="market-image" href="#product-{{ $product->id }}" aria-label="Lihat {{ $product->name }}">
                                        @if($product->is_featured)<span class="market-badge">Pilihan</span>@endif
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy">
                                    </a>
                                    <div class="market-body">
                                        <span class="market-category">{{ $product->category_label }}</span>
                                        <h2>{{ $product->name }}</h2>
                                        <p>{{ $product->description }}</p>
                                        <div class="market-meta"><strong>Mulai {{ $product->price_min ? 'Rp '.number_format($product->price_min, 0, ',', '.') : $product->price_label }}</strong><span>Min. {{ $product->minimum_order }} pcs</span></div>
                                        <a class="market-link" href="https://wa.me/62811912502?text={{ urlencode('Halo HERVENT, saya tertarik dengan '.$product->name) }}" target="_blank" rel="noopener">Tanya produk <span aria-hidden="true">→</span></a>
                                    </div>
                                </article>
                            @empty
                                <div class="catalog-empty"><h2>Produk tidak ditemukan</h2><p>Coba kata kunci atau kategori yang berbeda.</p><a class="btn b-dark" href="{{ route('products.index') }}">Reset katalog</a></div>
                            @endforelse
                        </div>

                        @if($products->hasPages())
                            <nav class="catalog-pagination" aria-label="Pagination">{{ $products->links() }}</nav>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="catalog-footer">
        <div class="catalog-container catalog-footer-grid">
            <div><a class="catalog-footer-brand" href="{{ route('home') }}#top"><img src="{{ asset('images/Logo Landscape.png') }}" alt="HERVENT"></a><p>PT Aventama Hervent Solusindo. Corporate gift, promotional merchandise, dan souvenir kantor custom sejak 2009.</p></div>
            <div><h2>Tautan cepat</h2><a href="{{ route('home') }}#top">Beranda</a><a href="{{ route('products.index') }}">Katalog produk</a><a href="{{ route('home') }}#proses">Cara kerja</a></div>
            <div><h2>Hubungi kami</h2><a href="https://wa.me/62811912502">0811-912-502</a><a href="mailto:cs@hervent.co.id">cs@hervent.co.id</a><span>Bandung &amp; Surabaya</span></div>
            <div><h2>Jam operasional</h2><span>Sen-Jum 09.00-17.00</span><span>Sab 09.00-12.00</span></div>
        </div>
        <div class="catalog-container catalog-footer-bottom"><span>&copy; {{ date('Y') }} HERVENT - PT Aventama Hervent Solusindo</span><span>Represent your value.</span></div>
    </footer>
    <a class="catalog-floating-wa" href="https://wa.me/62811912502" target="_blank" rel="noopener" aria-label="Chat WhatsApp">⌕</a>
</body>
</html>
