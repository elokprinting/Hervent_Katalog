<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.catalog.seo_title') }}</title>
    <meta name="description" content="{{ __('messages.catalog.seo_desc') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('images/Icon Logo.png') }}">
</head>
<body class="catalog-page">
    @include('partials.header')

    <main>
        @php($activeCategoryLabel = \App\Models\Product::PRODUCT_CATEGORIES[$activeCategory] ?? ($activeGroup ? $productGroups[$activeGroup]['label'] : \Illuminate\Support\Str::headline($activeCategory)))
        <section class="catalog-shop">
            <div class="catalog-container">
                <nav class="catalog-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">{{ __('messages.catalog.home') }}</a>
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
                        @foreach($productGroups as $groupKey => $group)
                            @php($groupCount = \App\Models\Product::where(function ($query) use ($groupKey, $group) { $query->whereIn('category', $group['categories'])->orWhere('category', $groupKey); })->count())
                            <a class="sidebar-category {{ $activeGroup === $groupKey ? 'active' : '' }}" href="{{ route('products.index', array_filter(['group' => $groupKey, 'catalog' => $activeCatalogCategory, 'q' => $search, 'sort' => $sort, 'type' => $activeType])) }}">
                                <i class="category-icon" data-lucide="{{ ['apparel-lifestyle' => 'shirt', 'bags-pouch' => 'shopping-bag', 'drinkware-dining' => 'cup-soda', 'gift-sets' => 'gift', 'office-stationery' => 'notebook', 'tech-gadgets' => 'speaker'][$groupKey] }}" aria-hidden="true"></i><span>{{ $group['label'] }}</span><small>{{ $groupCount }}</small>
                            </a>
                        @endforeach
                    </aside>

                    <div class="shop-results">
                        <div class="results-toolbar">
                            <form class="catalog-search" method="GET" action="{{ route('products.index') }}">
                                <input type="search" name="q" value="{{ $search }}" placeholder="{{ __('messages.catalog.search_placeholder') }}" aria-label="Cari produk">
                                @if($activeCategory)<input type="hidden" name="category" value="{{ $activeCategory }}">@endif
                                @if($activeGroup)<input type="hidden" name="group" value="{{ $activeGroup }}">@endif
                                @if($activeCatalogCategory)<input type="hidden" name="catalog" value="{{ $activeCatalogCategory }}">@endif
                                @if($activeType)<input type="hidden" name="type" value="{{ $activeType }}">@endif
                                @if($sort)<input type="hidden" name="sort" value="{{ $sort }}">@endif
                                <button type="submit" aria-label="Cari">⌕</button>
                            </form>
                            <span class="result-count">{{ __('messages.catalog.items_found', ['total' => $products->total()]) }}</span>
                            <form class="catalog-sort" method="GET" action="{{ route('products.index') }}">
                                <input type="hidden" name="q" value="{{ $search }}"><input type="hidden" name="category" value="{{ $activeCategory }}"><input type="hidden" name="group" value="{{ $activeGroup }}"><input type="hidden" name="catalog" value="{{ $activeCatalogCategory }}">
                                <div class="catalog-control">
                                    <label for="catalogType">Tampilkan</label>
                                    <div class="catalog-custom-select" data-custom-select>
                                        <select id="catalogType" name="type" tabindex="-1" aria-hidden="true">
                                            <option value="" {{ !$activeType ? 'selected' : '' }}>Semua produk</option>
                                            <option value="package" {{ $activeType === 'package' ? 'selected' : '' }}>Set hadiah</option>
                                            <option value="single" {{ $activeType === 'single' ? 'selected' : '' }}>Produk satuan</option>
                                        </select>
                                        <button type="button" class="catalog-select-trigger" aria-haspopup="listbox" aria-expanded="false">
                                            <span>{{ !$activeType ? 'Semua produk' : ($activeType === 'package' ? 'Set hadiah' : 'Produk satuan') }}</span>
                                        </button>
                                        <div class="catalog-select-menu" role="listbox" tabindex="-1">
                                            <button type="button" role="option" data-value="" aria-selected="{{ !$activeType ? 'true' : 'false' }}">Semua produk</button>
                                            <button type="button" role="option" data-value="package" aria-selected="{{ $activeType === 'package' ? 'true' : 'false' }}">Set hadiah</button>
                                            <button type="button" role="option" data-value="single" aria-selected="{{ $activeType === 'single' ? 'true' : 'false' }}">Produk satuan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="catalog-control">
                                    <label for="catalogSort">Urutkan</label>
                                    <div class="catalog-custom-select" data-custom-select>
                                        <select id="catalogSort" name="sort" tabindex="-1" aria-hidden="true">
                                            <option value="" {{ !$sort ? 'selected' : '' }}>{{ __('messages.catalog.sort_latest') }}</option>
                                            <option value="price_asc" {{ $sort === 'price_asc' ? 'selected' : '' }}>{{ __('messages.catalog.sort_price_low') }}</option>
                                            <option value="price_desc" {{ $sort === 'price_desc' ? 'selected' : '' }}>{{ __('messages.catalog.sort_price_high') }}</option>
                                        </select>
                                        <button type="button" class="catalog-select-trigger" aria-haspopup="listbox" aria-expanded="false">
                                            <span>{{ !$sort ? __('messages.catalog.sort_latest') : ($sort === 'price_asc' ? __('messages.catalog.sort_price_low') : __('messages.catalog.sort_price_high')) }}</span>
                                        </button>
                                        <div class="catalog-select-menu" role="listbox" tabindex="-1">
                                            <button type="button" role="option" data-value="" aria-selected="{{ !$sort ? 'true' : 'false' }}">{{ __('messages.catalog.sort_latest') }}</button>
                                            <button type="button" role="option" data-value="price_asc" aria-selected="{{ $sort === 'price_asc' ? 'true' : 'false' }}">{{ __('messages.catalog.sort_price_low') }}</button>
                                            <button type="button" role="option" data-value="price_desc" aria-selected="{{ $sort === 'price_desc' ? 'true' : 'false' }}">{{ __('messages.catalog.sort_price_high') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

                        @if($products->total() > 0)
                            <div class="catalog-pagination">
                                <p class="catalog-pagination-summary">
                                    Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }} dari {{ $products->total() }} produk
                                </p>
                                @if($products->hasPages())
                                    <nav class="catalog-pagination-nav" aria-label="Pagination">
                                        @if($products->onFirstPage())
                                            <span class="catalog-pagination-control is-disabled" aria-disabled="true">Previous</span>
                                        @else
                                            <a class="catalog-pagination-control" href="{{ $products->previousPageUrl() }}" rel="prev">Previous</a>
                                        @endif

                                        <div class="catalog-pagination-pages">
                                            @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                                @if($page == $products->currentPage())
                                                    <span class="catalog-pagination-page is-current" aria-current="page">{{ $page }}</span>
                                                @else
                                                    <a class="catalog-pagination-page" href="{{ $url }}">{{ $page }}</a>
                                                @endif
                                            @endforeach
                                        </div>

                                        @if($products->hasMorePages())
                                            <a class="catalog-pagination-control" href="{{ $products->nextPageUrl() }}" rel="next">Next</a>
                                        @else
                                            <span class="catalog-pagination-control is-disabled" aria-disabled="true">Next</span>
                                        @endif
                                    </nav>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
</body>
</html>
