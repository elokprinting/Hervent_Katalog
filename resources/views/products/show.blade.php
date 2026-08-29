<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} | HERVENT</title>
    <meta name="description" content="{{ Str::limit($product->description, 150) }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .pd-page { background: #fff; min-height: 100vh; }

        /* Breadcrumb */
        .pd-breadcrumb {
            display: flex; align-items: center; gap: 0.4rem; flex-wrap: wrap;
            padding: 1.5rem 2rem; font-size: 0.8rem; color: #6b7280;
            border-bottom: 1px solid #f3f4f6;
        }
        .pd-breadcrumb a { color: #6b7280; text-decoration: none; }
        .pd-breadcrumb a:hover { color: #111; }
        .pd-breadcrumb strong { color: #111; font-weight: 500; }

        /* Main layout */
        .pd-layout {
            display: grid;
            grid-template-columns: 420px 1fr;
            gap: 3rem;
            max-width: 1100px;
            margin: 0 auto;
            padding: 2.5rem 2rem 3rem;
            align-items: start;
        }

        /* Gallery - Left */
        .pd-gallery { position: sticky; top: 5rem; }
        .pd-gallery-main {
            position: relative;
            background: #f8f9fa;
            border-radius: 12px;
            overflow: hidden;
            aspect-ratio: 4/5;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pd-main-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            mix-blend-mode: multiply;
        }
        .pd-gallery-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 2;
            width: 36px; height: 36px;
            border-radius: 50%;
            border: 1px solid #e5e7eb;
            background: rgba(255,255,255,0.9);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            color: #374151;
            transition: background 0.2s;
        }
        .pd-gallery-arrow:hover { background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.12); }
        .pd-prev { left: 0.75rem; }
        .pd-next { right: 0.75rem; }
        .pd-gallery-dots {
            display: flex; justify-content: center; gap: 0.4rem;
            margin-top: 0.75rem;
        }
        .pd-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            border: 1px solid #9ca3af;
            background: transparent;
            cursor: pointer; padding: 0;
            transition: background 0.2s;
        }
        .pd-dot.active { background: #111; border-color: #111; }
        .pd-gallery-thumbs {
            display: flex; gap: 0.5rem; margin-top: 0.75rem; flex-wrap: wrap;
        }
        .pd-thumb {
            width: 64px; height: 64px;
            border-radius: 6px;
            border: 2px solid #e5e7eb;
            background: #f8f9fa;
            overflow: hidden;
            cursor: pointer; padding: 0;
            transition: border-color 0.2s;
        }
        .pd-thumb.active { border-color: #111; }
        .pd-thumb img { width: 100%; height: 100%; object-fit: contain; mix-blend-mode: multiply; }

        /* Info - Right */
        .pd-info { padding-top: 0.5rem; }
        .pd-title {
            font-size: 1.6rem; font-weight: 700;
            letter-spacing: -0.01em; line-height: 1.2;
            margin: 0 0 0.5rem; color: #111;
        }
        .pd-subtitle {
            font-size: 0.95rem; color: #6b7280; margin: 0 0 1.5rem;
        }

        /* Colors */
        .pd-section-label {
            font-size: 0.85rem; font-weight: 600; color: #374151;
            margin-bottom: 0.6rem;
        }
        .pd-color-swatches {
            display: flex; gap: 0.5rem; flex-wrap: wrap;
            margin-bottom: 1.75rem;
        }
        .pd-swatch {
            width: 30px; height: 30px;
            border-radius: 4px;
            border: 2px solid transparent;
            box-shadow: 0 0 0 1px #d1d5db;
            cursor: pointer;
            transition: box-shadow 0.2s;
        }
        .pd-swatch:hover, .pd-swatch.active {
            box-shadow: 0 0 0 2px #111;
        }

        /* Divider */
        .pd-hr { border: 0; border-top: 1px solid #e5e7eb; margin: 1.5rem 0; }

        /* Detail Produk */
        .pd-detail-heading {
            font-size: 1rem; font-weight: 700; color: #111;
            margin: 0 0 1rem;
        }
        .pd-details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem 2rem;
        }
        .pd-detail-label {
            display: block; font-size: 0.8rem;
            color: #9ca3af; margin-bottom: 0.2rem;
        }
        .pd-detail-value {
            display: block; font-size: 0.92rem;
            color: #111; font-weight: 500;
        }

        /* Action Button */
        .pd-action { margin-top: 2rem; }
        .pd-btn-order {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.85rem 2.5rem;
            border-radius: 8px;
            background: #111;
            color: #fff;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s;
            white-space: nowrap;
        }
        .pd-btn-order:hover { background: #333; transform: translateY(-1px); }

        /* Floating WA */
        .pd-floating-wa {
            position: fixed;
            right: 1.5rem; bottom: 1.5rem;
            z-index: 70;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: #25d366;
            color: #fff;
            border-radius: 50px;
            padding: 0.65rem 1.1rem;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
            transition: transform 0.2s;
        }
        .pd-floating-wa:hover { transform: scale(1.04); }

        /* Recommendations */
        .pd-recommendations {
            max-width: 1100px; margin: 3rem auto 2rem;
            padding: 0 2rem;
            border-top: 1px solid #f3f4f6;
            padding-top: 2.5rem;
        }
        .pd-rec-heading {
            font-size: 1.15rem; font-weight: 700; color: #111;
            margin: 0 0 1.5rem;
        }
        .pd-rec-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }
        .pd-rec-card {
            text-decoration: none; color: inherit;
            border: 1px solid #f3f4f6;
            border-radius: 8px;
            overflow: hidden;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .pd-rec-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.08); transform: translateY(-2px); }
        .pd-rec-img {
            width: 100%; aspect-ratio: 1;
            background: #f8f9fa;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
        }
        .pd-rec-img img { width: 100%; height: 100%; object-fit: contain; mix-blend-mode: multiply; }
        .pd-rec-body { padding: 0.75rem; }
        .pd-rec-name { font-size: 0.85rem; font-weight: 600; margin: 0; color: #111; line-height: 1.3; }

        /* Responsive */
        @media (max-width: 900px) {
            .pd-layout { grid-template-columns: 1fr; gap: 1.5rem; }
            .pd-gallery { position: static; }
            .pd-rec-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 640px) {
            .pd-breadcrumb { padding: 1rem; }
            .pd-layout { padding: 1.5rem 1rem; }
            .pd-title { font-size: 1.3rem; }
            .pd-recommendations { padding: 0 1rem; padding-top: 2rem; }
        }
    </style>
</head>
<body class="pd-page">
    @include('partials.header')

    <nav class="pd-breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <a href="{{ route('products.index') }}">Produk</a>
        <span>/</span>
        <a href="{{ route('products.index', ['category' => $product->category]) }}">{{ $product->category_label }}</a>
        <span>/</span>
        <strong>{{ $product->name }}</strong>
    </nav>

    <main>
        <div class="pd-layout">
            <!-- Left: Gallery -->
            @php
                $galleryImages = collect($product->gallery_images ?: [$product->image_url])->values();
            @endphp
            <div class="pd-gallery" data-product-gallery>
                <div class="pd-gallery-main">
                    <button class="pd-gallery-arrow pd-prev" data-gallery-prev aria-label="Sebelumnya">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><polyline points="15 18 9 12 15 6"/></svg>
                    </button>
                    <img src="{{ $galleryImages->first() }}" alt="{{ $product->name }}" class="pd-main-img" data-gallery-main>
                    <button class="pd-gallery-arrow pd-next" data-gallery-next aria-label="Berikutnya">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                    <div class="pd-gallery-dots">
                        @foreach($galleryImages as $index => $image)
                            <button class="pd-dot {{ $index === 0 ? 'active' : '' }}" data-gallery-index="{{ $index }}" aria-label="Gambar {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                </div>
                <div class="pd-gallery-thumbs">
                    @foreach($galleryImages as $index => $image)
                        <button class="pd-thumb {{ $index === 0 ? 'active' : '' }}" data-gallery-index="{{ $index }}">
                            <img src="{{ $image }}" alt="Thumbnail {{ $index + 1 }}">
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Right: Info -->
            <div class="pd-info">
                <h1 class="pd-title">{{ $product->name }}</h1>
                @if($product->subtitle)
                    <p class="pd-subtitle">{{ $product->subtitle }}</p>
                @endif

                @if($product->description)
                    <p style="font-size: 0.9rem; color: #4b5563; line-height: 1.6; margin: 0 0 1.75rem;">{{ $product->description }}</p>
                @endif

                @if($product->colors && count($product->colors) > 0)
                    <div style="margin-bottom: 1.75rem;">
                        <p class="pd-section-label">Warna</p>
                        <div class="pd-color-swatches">
                            @foreach($product->colors as $index => $color)
                                <div class="pd-swatch {{ $index === 0 ? 'active' : '' }}"
                                     style="background-color: {{ $color }};"
                                     title="{{ $color }}"
                                     onclick="this.closest('.pd-color-swatches').querySelectorAll('.pd-swatch').forEach(s=>s.classList.remove('active')); this.classList.add('active');">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <hr class="pd-hr">

                <div>
                    <h3 class="pd-detail-heading">Detail Produk</h3>
                    <div class="pd-details-grid">
                        <div>
                            <span class="pd-detail-label">Dimensi</span>
                            <span class="pd-detail-value">{{ $product->dimensions ?: '-' }}</span>
                        </div>
                        <div>
                            <span class="pd-detail-label">Cara Custom</span>
                            <span class="pd-detail-value">{{ $product->custom_method ?: '-' }}</span>
                        </div>
                        @if($product->minimum_order)
                        <div>
                            <span class="pd-detail-label">Min. Pemesanan</span>
                            <span class="pd-detail-value">{{ $product->minimum_order }} pcs</span>
                        </div>
                        @endif
                        @if($product->price_min)
                        <div>
                            <span class="pd-detail-label">Harga Mulai</span>
                            <span class="pd-detail-value">Rp {{ number_format($product->price_min, 0, ',', '.') }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="pd-action">
                    @php
                        $waText = urlencode('Halo HERVENT, saya tertarik dengan produk ' . $product->name);
                    @endphp
                    <a href="https://wa.me/62811912502?text={{ $waText }}" class="pd-btn-order" target="_blank" rel="noopener">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" style="flex-shrink:0"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.126 1.535 5.861L.057 23.736a.5.5 0 0 0 .609.61l6.007-1.458A11.94 11.94 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22a9.95 9.95 0 0 1-5.12-1.41l-.36-.214-3.742.907.938-3.651-.232-.374A9.96 9.96 0 0 1 2 12C2 6.486 6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z"/></svg>
                        Hubungi Kami untuk Pemesanan
                    </a>
                </div>
            </div>
        </div>

        @if(isset($recommendedProducts) && $recommendedProducts->isNotEmpty())
            <div class="pd-recommendations">
                <h3 class="pd-rec-heading">Produk Rekomendasi</h3>
                <div class="pd-rec-grid">
                    @foreach($recommendedProducts as $recProduct)
                        <a href="{{ route('products.show', $recProduct->slug) }}" class="pd-rec-card">
                            <div class="pd-rec-img">
                                <img src="{{ $recProduct->image_url }}" alt="{{ $recProduct->name }}">
                            </div>
                            <div class="pd-rec-body">
                                <h4 class="pd-rec-name">{{ $recProduct->name }}</h4>
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
        <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.126 1.535 5.861L.057 23.736a.5.5 0 0 0 .609.61l6.007-1.458A11.94 11.94 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22a9.95 9.95 0 0 1-5.12-1.41l-.36-.214-3.742.907.938-3.651-.232-.374A9.96 9.96 0 0 1 2 12C2 6.486 6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z"/></svg>
        Konsultasi Gratis!
    </a>
</body>
</html>
