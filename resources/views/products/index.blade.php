<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.catalog.seo_title') }}</title>
    <meta name="description" content="{{ __('messages.catalog.seo_desc') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="catalog-page">
    @include('partials.header')

    <main>
        <section class="catalog-shop">
            <div class="catalog-container">
                <nav class="catalog-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}#top">{{ __('messages.catalog.home') }}</a>
                    <span aria-hidden="true">›</span>
                    <a href="{{ route('products.index') }}">{{ __('messages.catalog.shop') }}</a>
                    <span aria-hidden="true">›</span>
                    <strong>{{ $activeCategory ? \Illuminate\Support\Str::headline($activeCategory) : __('messages.catalog.all_products') }}</strong>
                </nav>

                <header class="catalog-heading">
                    <p class="catalog-kicker">{{ __('messages.catalog.kicker') }}</p>
                    <h1>{{ $activeCategory ? \Illuminate\Support\Str::headline($activeCategory) : __('messages.catalog.title') }}</h1>
                    <p>{{ $search ? __('messages.catalog.available_search', ['total' => $products->total(), 'search' => $search]) : __('messages.catalog.available', ['total' => $products->total()]) }}</p>
                </header>

                <div class="shop-layout">
                    <aside class="catalog-sidebar">
                        <div class="sidebar-heading"><strong>{{ __('messages.catalog.filter_category') }}</strong><span aria-hidden="true">⌄</span></div>
                        <a class="sidebar-category {{ !$activeCategory ? 'active' : '' }}" href="{{ route('products.index', array_filter(['q' => $search, 'sort' => $sort])) }}">
                            <i class="category-icon" data-lucide="layout-grid" aria-hidden="true"></i><span>{{ __('messages.catalog.all_products') }}</span><small>{{ $products->total() }}</small>
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
                                <input type="search" name="q" value="{{ $search }}" placeholder="{{ __('messages.catalog.search_placeholder') }}" aria-label="Cari produk">
                                @if($activeCategory)<input type="hidden" name="category" value="{{ $activeCategory }}">@endif
                                @if($sort)<input type="hidden" name="sort" value="{{ $sort }}">@endif
                                <button type="submit" aria-label="Cari">⌕</button>
                            </form>
                            <span class="result-count">{{ __('messages.catalog.items_found', ['total' => $products->total()]) }}</span>
                            <form class="catalog-sort" method="GET" action="{{ route('products.index') }}">
                                <input type="hidden" name="q" value="{{ $search }}"><input type="hidden" name="category" value="{{ $activeCategory }}">
                                <label class="sr-only" for="catalogSort">{{ __('messages.catalog.sort_products') }}</label>
                                <select id="catalogSort" name="sort" onchange="this.form.submit()">
                                    <option value="" {{ !$sort ? 'selected' : '' }}>{{ __('messages.catalog.sort_latest') }}</option>
                                    <option value="price_asc" {{ $sort === 'price_asc' ? 'selected' : '' }}>{{ __('messages.catalog.sort_price_low') }}</option>
                                    <option value="price_desc" {{ $sort === 'price_desc' ? 'selected' : '' }}>{{ __('messages.catalog.sort_price_high') }}</option>
                                </select>
                            </form>
                        </div>

                        <div class="catalog-grid marketplace-grid">
                            @forelse($products as $product)
                                <article id="product-{{ $product->id }}" class="market-product">
                                    <a class="market-image" href="#product-{{ $product->id }}" aria-label="Lihat {{ $product->name }}">
                                        @if($product->is_featured)<span class="market-badge">{{ __('messages.catalog.featured_badge') }}</span>@endif
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy">
                                    </a>
                                    <div class="market-body">
                                        <span class="market-category">{{ $product->category_label }}</span>
                                        <h2>{{ $product->name }}</h2>
                                        <p>{{ $product->description }}</p>
                                        <div class="market-meta"><strong>{{ __('messages.catalog.price_from') }} {{ $product->price_min ? 'Rp '.number_format($product->price_min, 0, ',', '.') : $product->price_label }}</strong><span>{{ __('messages.catalog.min_order', ['min' => $product->minimum_order]) }}</span></div>
                                        <a class="market-link" href="https://wa.me/62811912502?text={{ urlencode(__('messages.catalog.wa_interested').$product->name) }}" target="_blank" rel="noopener">{{ __('messages.catalog.ask_product') }} <span aria-hidden="true">→</span></a>
                                    </div>
                                </article>
                            @empty
                                <div class="catalog-empty"><h2>{{ __('messages.catalog.no_products') }}</h2><p>{{ __('messages.catalog.try_other') }}</p><a class="btn b-dark" href="{{ route('products.index') }}">{{ __('messages.catalog.reset_catalog') }}</a></div>
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

    @include('partials.footer')
    <a class="catalog-floating-wa" href="https://wa.me/62811912502" target="_blank" rel="noopener" aria-label="Chat WhatsApp">⌕</a>
</body>
</html>
