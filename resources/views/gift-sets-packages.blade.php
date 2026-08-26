<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ __('messages.giftsets.seo_title') }}</title>
  <meta name="description" content="{{ __('messages.giftsets.seo_desc') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="giftsets-page">
  @include('partials.header')

  @php
    $categories = [
      'gathering' => [
        ['name' => 'Gathering Vibes', 'image' => asset('images/products/Gathering & Anniversary/Selamat Datang Dikawasan Wisata.png')],
        ['name' => 'Gathering Products', 'image' => asset('images/products/Gathering & Anniversary/Kumpulan Produk.png')],
        ['name' => 'Anniversary Vibes', 'image' => asset('images/products/Gathering & Anniversary/rame rame.png')],
        ['name' => 'Anniversary Products', 'image' => asset('images/products/Gathering & Anniversary/produk setengah.png')],
      ],
      'seminar' => [
        ['name' => 'Seminar Essentials', 'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=700&q=85'],
        ['name' => 'Training Kit', 'image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=700&q=85'],
      ],
      'holidays' => [
        ['name' => 'Seasonal Hamper', 'image' => 'https://images.unsplash.com/photo-1512909006721-3d6018887383?auto=format&fit=crop&w=700&q=85'],
        ['name' => 'Festive Gift Box', 'image' => 'https://images.unsplash.com/photo-1549465220-1a8b9238f760?auto=format&fit=crop&w=700&q=85'],
      ],
      'onboarding' => [
        ['name' => 'Welcome Kit', 'image' => 'https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?auto=format&fit=crop&w=700&q=85'],
        ['name' => 'First Day Set', 'image' => 'https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?auto=format&fit=crop&w=700&q=85'],
      ],
      'vip' => [
        ['name' => 'Executive Gift Set', 'image' => 'https://images.unsplash.com/photo-1549465220-1a8b9238f760?auto=format&fit=crop&w=700&q=85'],
        ['name' => 'Signature Appreciation', 'image' => 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?auto=format&fit=crop&w=700&q=85'],
      ],
      'events' => [
        ['name' => 'Exhibition Pack', 'image' => 'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=700&q=85'],
        ['name' => 'Event Merchandise Set', 'image' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=700&q=85'],
      ],
    ];
  @endphp

  <main>
    <section class="giftsets-hero on-dark">
      <div class="wrap">
        <div class="giftsets-hero-in">
          <p class="eyebrow">{{ __('messages.giftsets.eyebrow') }}</p>
          <h1 class="h1">{!! __('messages.giftsets.title') !!}</h1>
          <p class="lede">{{ __('messages.giftsets.intro') }}</p>
        </div>
      </div>
    </section>

    <section class="giftsets-list" aria-label="{{ __('messages.header.giftset_package') }}">
      <div class="wrap">
        @foreach($categories as $key => $products)
          <article class="giftset-row rv">
            <div class="giftset-copy">
              <span class="giftset-number">0{{ $loop->iteration }}</span>
              <h2 class="h2">{{ __('messages.giftsets.categories.' . $key . '.title') }}</h2>
              <p>{{ __('messages.giftsets.categories.' . $key . '.description') }}</p>
              <a class="giftset-link" href="https://wa.me/62811912502?text={{ rawurlencode(__('messages.giftsets.whatsapp_message', ['occasion' => __('messages.giftsets.categories.' . $key . '.title')])) }}" target="_blank" rel="noopener">
                {{ __('messages.giftsets.consultation') }} <span aria-hidden="true">→</span>
              </a>
            </div>
            <div class="giftset-cards {{ count($products) > 2 ? 'is-carousel' : '' }}">
              <div class="giftset-track">
                @foreach($products as $product)
                  <a class="giftset-card" href="https://wa.me/62811912502?text={{ rawurlencode(__('messages.giftsets.whatsapp_message', ['occasion' => __('messages.giftsets.categories.' . $key . '.title')])) }}" target="_blank" rel="noopener">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" loading="lazy">
                    <span>{{ $product['name'] }}</span>
                  </a>
                @endforeach
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </section>
  </main>

  @include('partials.footer')
</body>
</html>
