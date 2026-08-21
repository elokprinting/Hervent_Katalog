<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} | HERVENT</title>
    <meta name="description" content="{{ Str::limit($product->description, 150) }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Using Alpine.js for the simple gallery component -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="product-detail-page">
    @include('partials.header')

    <main class="pd-container">
        <!-- Breadcrumbs -->
        <nav class="pd-breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">{{ __('messages.catalog.home') }}</a>
            <span aria-hidden="true">/</span>
            <a href="{{ route('products.index') }}">{{ __('messages.product.products') }}</a>
            <span aria-hidden="true">/</span>
            <a href="{{ route('products.index', ['category' => $product->category]) }}">{{ $product->category_label }}</a>
            <span aria-hidden="true">/</span>
            <strong>{{ strtoupper($product->name) }}</strong>
        </nav>

        <div class="pd-layout">
            <!-- Left Side: Gallery -->
            <div class="pd-gallery" x-data="{
                images: {{ json_encode($product->gallery_images ?: [$product->image_url]) }},
                active: 0,
                next() {
                    this.active = this.active === this.images.length - 1 ? 0 : this.active + 1;
                },
                prev() {
                    this.active = this.active === 0 ? this.images.length - 1 : this.active - 1;
                }
            }">
                <div class="pd-gallery-main">
                    <!-- Nav Arrows -->
                    <button class="pd-gallery-arrow pd-prev" @click="prev()" aria-label="Previous image">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </button>
                    
                    <img :src="images[active]" alt="{{ $product->name }}" class="pd-main-img">
                    
                    <button class="pd-gallery-arrow pd-next" @click="next()" aria-label="Next image">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </button>

                    <!-- Dots -->
                    <div class="pd-gallery-dots">
                        <template x-for="(img, index) in images" :key="index">
                            <button @click="active = index" :class="{'active': active === index}" class="pd-dot" :aria-label="'Go to image ' + (index + 1)"></button>
                        </template>
                    </div>
                </div>

                <!-- Thumbnails -->
                <div class="pd-gallery-thumbs">
                    <template x-for="(img, index) in images" :key="index">
                        <button @click="active = index" :class="{'active': active === index}" class="pd-thumb">
                            <img :src="img" alt="Thumbnail">
                        </button>
                    </template>
                </div>
            </div>

            <!-- Right Side: Info -->
            <div class="pd-info">
                <h1 class="pd-title">{{ strtoupper($product->name) }}</h1>
                @if($product->subtitle)
                    <p class="pd-subtitle">{{ $product->subtitle }}</p>
                @endif

                @if($product->colors && count($product->colors) > 0)
                    <div class="pd-colors-section" style="margin-bottom: 1.5rem;">
                        <h3>{{ __('messages.product.colors') }}</h3>
                        <div class="pd-color-swatches">
                            @foreach($product->colors as $color)
                                <div class="pd-swatch" style="background-color: {{ $color }};" title="{{ $color }}"></div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="pd-description-section" style="margin-bottom: 1.5rem;">
                    <h3>Deskripsi</h3>
                    <p style="font-size: 0.9rem; line-height: 1.5; color: #4b5563; margin-top: 0.5rem;">{{ $product->description }}</p>
                </div>

                <div class="pd-stock-section" style="margin-bottom: 1.5rem;">
                    <p style="font-size: 0.95rem; color: #374151;"><strong>Stok:</strong> {{ $product->stock ?? 'Tersedia' }}</p>
                </div>

                <hr class="pd-divider">

                <div class="pd-details-section">
                    <h3>{{ __('messages.product.details') }}</h3>
                    <div class="pd-details-grid">
                        <div class="pd-detail-item">
                            <span class="pd-detail-label">{{ __('messages.product.dimension') }}</span>
                            <span class="pd-detail-value">{{ $product->dimensions ?: '-' }}</span>
                        </div>
                        <div class="pd-detail-item">
                            <span class="pd-detail-label">{{ __('messages.product.custom_method') }}</span>
                            <span class="pd-detail-value">{{ $product->custom_method ?: '-' }}</span>
                        </div>
                    </div>
                </div>

                <div class="pd-action">
                    @php
                        $waText = urlencode(__('messages.catalog.wa_interested').$product->name);
                    @endphp
                    <a href="https://wa.me/62811912502?text={{ $waText }}" class="btn b-black pd-btn-order" target="_blank" rel="noopener">
                        {{ __('messages.product.order_contact') }}
                    </a>
                    <p class="pd-action-note">{{ __('messages.product.order_note') }}</p>
                </div>
            </div>
        </div>

        @if(isset($recommendedProducts) && $recommendedProducts->isNotEmpty())
            <div class="pd-recommendations" style="margin-top: 4rem;">
                <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem;">Produk Rekomendasi</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem;">
                    @foreach($recommendedProducts as $recProduct)
                        <a href="{{ route('products.show', $recProduct->slug) }}" style="text-decoration: none; color: inherit; display: block; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; transition: transform 0.2s;">
                            <img src="{{ $recProduct->image_url }}" alt="{{ $recProduct->name }}" style="width: 100%; aspect-ratio: 1; object-fit: cover; background: #f9fafb;">
                            <div style="padding: 1rem;">
                                <h4 style="font-size: 1rem; font-weight: 600; margin: 0;">{{ $recProduct->name }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </main>

    @include('partials.footer')
    
    <!-- Floating WA -->
    <a href="https://wa.me/62811912502" class="pd-floating-wa" target="_blank" rel="noopener" aria-label="Konsultasi Gratis">
        <span class="pd-wa-text">{{ __('messages.product.free_consultation') }}</span>
        <div class="pd-wa-icon">
            <svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
        </div>
    </a>
</body>
</html>
