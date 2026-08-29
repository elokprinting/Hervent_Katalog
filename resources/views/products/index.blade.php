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
        @php($activeCategoryLabel = \App\Models\Product::PRODUCT_CATEGORIES[$activeCategory] ?? \Illuminate\Support\Str::headline($activeCategory))
        <section class="catalog-shop">
            <div class="catalog-container">
                <nav class="catalog-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}#top">{{ __('messages.catalog.home') }}</a>
                    <span aria-hidden="true">›</span>
                    <a href="{{ route('products.index') }}">{{ __('messages.catalog.shop') }}</a>
                    <span aria-hidden="true">›</span>
                    <strong>{{ $activeCatalogCategory ? $catalogCategories[$activeCatalogCategory] : ($activeCategory ? $activeCategoryLabel : __('messages.catalog.all_products')) }}</strong>
                </nav>

                <header class="catalog-heading">
                    <p class="catalog-kicker">{{ __('messages.catalog.kicker') }}</p>
                    <h1>{{ $activeCatalogCategory ? $catalogCategories[$activeCatalogCategory] : ($activeCategory ? $activeCategoryLabel : __('messages.catalog.title')) }}</h1>
                    <p>{{ $search ? __('messages.catalog.available_search', ['total' => $products->total(), 'search' => $search]) : __('messages.catalog.available', ['total' => $products->total()]) }}</p>
                </header>

                <div class="shop-layout">
                    <aside class="catalog-sidebar">
                        <div class="sidebar-heading"><strong>{{ __('messages.catalog.filter_category') }}</strong><span aria-hidden="true">⌄</span></div>
                        <a class="sidebar-category {{ !$activeCategory && !$activeCatalogCategory ? 'active' : '' }}" href="{{ route('products.index', array_filter(['q' => $search, 'sort' => $sort, 'type' => $activeType])) }}">
                            <i class="category-icon" data-lucide="layout-grid" aria-hidden="true"></i><span>{{ __('messages.catalog.all_products') }}</span><small>{{ $products->total() }}</small>
                        </a>
                        <div class="sidebar-heading"><strong>Katalog Momen</strong></div>
                        @foreach($catalogCategories as $catalogKey => $catalogLabel)
                            <a class="sidebar-category {{ $activeCatalogCategory === $catalogKey ? 'active' : '' }}" href="{{ route('products.index', array_filter(['catalog' => $catalogKey, 'q' => $search, 'sort' => $sort, 'type' => $activeType])) }}">
                                <i class="category-icon" data-lucide="package" aria-hidden="true"></i><span>{{ $catalogLabel }}</span>
                            </a>
                        @endforeach
                        <div class="sidebar-heading"><strong>Jenis Produk</strong></div>
                        @foreach($categories as $category)
                            @php($categoryIcon = ['gift-set' => 'gift', 'tumbler' => 'cup-soda', 'bottle' => 'bottle', 'lunch-box' => 'utensils', 'card-holder' => 'credit-card', 'table-clock' => 'alarm-clock', 'clock' => 'clock', 'calender' => 'calendar', 'thermos' => 'thermometer', 'tas' => 'shopping-bag', 'mug' => 'coffee', 'umbrella' => 'umbrella', 'headset' => 'headphones', 'flashdrive' => 'save', 'mouse' => 'mouse', 'power-bank' => 'battery-charging', 'speaker' => 'speaker', 'travel-adapter' => 'plug', 'agenda-custom' => 'notebook', 'stationary' => 'pencil'] [$category] ?? 'package')
                            <a class="sidebar-category {{ $activeCategory === $category ? 'active' : '' }}" href="{{ route('products.index', array_filter(['category' => $category, 'q' => $search, 'sort' => $sort, 'type' => $activeType])) }}">
                                <i class="category-icon" data-lucide="{{ $categoryIcon }}" aria-hidden="true"></i><span>{{ \App\Models\Product::PRODUCT_CATEGORIES[$category] ?? \Illuminate\Support\Str::headline($category) }}</span><small>{{ $categoryCounts[$category] ?? 0 }}</small>
                            </a>
                        @endforeach
                    </aside>

                    <div class="shop-results">
                        <div class="results-toolbar">
                            <form class="catalog-search" method="GET" action="{{ route('products.index') }}">
                                <input type="search" name="q" value="{{ $search }}" placeholder="{{ __('messages.catalog.search_placeholder') }}" aria-label="Cari produk">
                                @if($activeCategory)<input type="hidden" name="category" value="{{ $activeCategory }}">@endif
                                @if($activeCatalogCategory)<input type="hidden" name="catalog" value="{{ $activeCatalogCategory }}">@endif
                                @if($activeType)<input type="hidden" name="type" value="{{ $activeType }}">@endif
                                @if($sort)<input type="hidden" name="sort" value="{{ $sort }}">@endif
                                <button type="submit" aria-label="Cari">⌕</button>
                            </form>
                            <span class="result-count">{{ __('messages.catalog.items_found', ['total' => $products->total()]) }}</span>
                            <form class="catalog-sort" method="GET" action="{{ route('products.index') }}">
                                <input type="hidden" name="q" value="{{ $search }}"><input type="hidden" name="category" value="{{ $activeCategory }}"><input type="hidden" name="catalog" value="{{ $activeCatalogCategory }}"><input type="hidden" name="type" value="{{ $activeType }}">
                                <label class="sr-only" for="catalogSort">{{ __('messages.catalog.sort_products') }}</label>
                                <select id="catalogType" name="type" onchange="this.form.submit()">
                                    <option value="" {{ !$activeType ? 'selected' : '' }}>Semua jenis</option>
                                    <option value="package" {{ $activeType === 'package' ? 'selected' : '' }}>Paketan</option>
                                    <option value="single" {{ $activeType === 'single' ? 'selected' : '' }}>Barang satuan</option>
                                </select>
                                <select id="catalogSort" name="sort" onchange="this.form.submit()">
                                    <option value="" {{ !$sort ? 'selected' : '' }}>{{ __('messages.catalog.sort_latest') }}</option>
                                    <option value="price_asc" {{ $sort === 'price_asc' ? 'selected' : '' }}>{{ __('messages.catalog.sort_price_low') }}</option>
                                    <option value="price_desc" {{ $sort === 'price_desc' ? 'selected' : '' }}>{{ __('messages.catalog.sort_price_high') }}</option>
                                </select>
                            </form>
                        </div>

                        <div class="catalog-type-summary">
                            <a class="{{ !$activeType ? 'active' : '' }}" href="{{ route('products.index', array_filter(['category' => $activeCategory, 'catalog' => $activeCatalogCategory, 'q' => $search, 'sort' => $sort])) }}">Semua Produk</a>
                            <a class="{{ $activeType === 'package' ? 'active' : '' }}" href="{{ route('products.index', array_filter(['category' => $activeCategory, 'catalog' => $activeCatalogCategory, 'q' => $search, 'sort' => $sort, 'type' => 'package'])) }}">Set Hadiah</a>
                            <a class="{{ $activeType === 'single' ? 'active' : '' }}" href="{{ route('products.index', array_filter(['category' => $activeCategory, 'catalog' => $activeCatalogCategory, 'q' => $search, 'sort' => $sort, 'type' => 'single'])) }}">Produk Satuan</a>
                        </div>
                        <div class="catalog-grid marketplace-grid">
                            @forelse($products as $product)
                                <article id="product-{{ $product->id }}" class="market-product">
                                    <a href="{{ route('products.show', $product->slug) }}" style="text-decoration: none; color: inherit; display: block;">
                                        <div class="market-image">
                                            @if($product->is_featured)<span class="market-badge">{{ __('messages.catalog.featured_badge') }}</span>@endif
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy">
                                        </div>
                                        <div class="market-body" style="padding-top: 1rem;">
                                            <span class="market-category" style="font-size: 0.8rem; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">{{ $product->category_label }}</span>
                                            <span class="market-type market-type-{{ $product->product_type }}">{{ $product->product_type_label }}</span>
                                            <h2 style="font-size: 1.1rem; font-weight: 600; margin-top: 0.25rem;">{{ $product->name }}</h2>
                                        </div>
                                    </a>
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
</body>
</html>
