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
      'onboarding' => [
        ['name' => 'Corporate Gift', 'image' => asset('images/products/Corporate Gift/Corporate gift 1.png')],
        ['name' => 'Corporate Gift', 'image' => asset('images/products/Corporate Gift/Corporate gift produk.png')],
        ['name' => 'Corporate Gift', 'image' => asset('images/products/Corporate Gift/Corporate gift 2.png')],
        ['name' => 'Corporate Gift', 'image' => asset('images/products/Corporate Gift/Corporate gift produk 2.png')],
      ],
      'seminar' => [
        ['name' => 'Seminar', 'image' => asset('images/products/Seminar & Training/Seminar.png')],
        ['name' => 'Seminar Produk', 'image' => asset('images/products/Seminar & Training/Produk Seminar.png')],
        ['name' => 'Training', 'image' => asset('images/products/Seminar & Training/training rame.png')],
        ['name' => 'Training Produk', 'image' => asset('images/products/Seminar & Training/produk training.png')],
      ],
      'gathering' => [
        ['name' => 'Gathering Vibes', 'image' => asset('images/products/Gathering & Anniversary/Selamat Datang Dikawasan Wisata.png')],
        ['name' => 'Gathering Products', 'image' => asset('images/products/Gathering & Anniversary/Kumpulan Produk.png')],
        ['name' => 'Anniversary Vibes', 'image' => asset('images/products/Gathering & Anniversary/rame rame.png')],
        ['name' => 'Anniversary Products', 'image' => asset('images/products/Gathering & Anniversary/produk setengah.png')],
      ],
      'vip' => [
        ['name' => 'Client Appreciation', 'image' => asset('images/products/Client Appreciation/client appreciation.png')],
        ['name' => 'Client Appreciation', 'image' => asset('images/products/Client Appreciation/client produk.png')],
        ['name' => 'Client Appreciation', 'image' => asset('images/products/Client Appreciation/client appreciation 2.png')],
        ['name' => 'Client Appreciation', 'image' => asset('images/products/Client Appreciation/client produk 2.png')],
      ],
      'events' => [
        ['name' => 'Event', 'image' => asset('images/products/Event & Exhibition/Event .png')],
        ['name' => 'Event Produk', 'image' => asset('images/products/Event & Exhibition/event produk.png')],
        ['name' => 'Exhibition', 'image' => asset('images/products/Event & Exhibition/Exhibition.png')],
        ['name' => 'Exhibition Produk', 'image' => asset('images/products/Event & Exhibition/exhibition produk.png')],
      ],
      'holidays' => [
        ['name' => 'Holiday Vibes', 'image' => asset('images/products/Holiday & Hampers/holiday rame.png')],
        ['name' => 'Holiday Products', 'image' => asset('images/products/Holiday & Hampers/barang holiday.png')],
        ['name' => 'Hamper Vibes', 'image' => asset('images/products/Holiday & Hampers/hampers rame.png')],
        ['name' => 'Hamper Products', 'image' => asset('images/products/Holiday & Hampers/hampers produk.png')],
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
