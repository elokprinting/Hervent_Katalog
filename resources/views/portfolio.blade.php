<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <title>Portofolio HERVENT | Corporate Gift &amp; Promotional Product</title>
  <meta name="description" content="Lihat hasil produksi corporate gift dan promotional product custom dari HERVENT untuk berbagai kebutuhan perusahaan.">
  <meta name="theme-color" content="#B81A1F">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="icon" type="image/png" href="{{ asset('images/Icon Logo.png') }}">
</head>
<body class="portfolio-page">
  @include('partials.header')

  @php
    $portfolioImages = glob(public_path('images/Portofolio/*')) ?: [];
    natsort($portfolioImages);
    // Lima gambar per blok: satu kartu utama + empat kartu pendamping.
    $portfolioGroups = array_chunk(array_values($portfolioImages), 5);
  @endphp

  <main>
    <section class="portfolio-hero on-red">
      <div class="wrap portfolio-hero-in">
        <p class="eyebrow">Portofolio HERVENT</p>
        <h1 class="h1">Hasil karya yang membuat <span class="hl">brand lebih berkesan.</span></h1>
        <p class="lede">Setiap proyek dirancang agar pesan, identitas, dan pengalaman brand klien tampil kuat dalam setiap detailnya.</p>
      </div>
    </section>

    <section class="portfolio-showcase s" aria-labelledby="portfolio-gallery-title">
      <div class="wrap">
        <div class="portfolio-heading rv">
          <p class="eyebrow">Hasil produksi</p>
          <h2 class="h2" id="portfolio-gallery-title">Cerita brand dalam setiap <span class="hl">produk.</span></h2>
          <p class="lede">Jelajahi pilihan corporate gift, souvenir, dan merchandise custom yang telah kami produksi.</p>
        </div>

        @foreach($portfolioGroups as $group)
          @php
            $featuredRight = $loop->iteration % 2 === 0;
          @endphp
          <div class="portfolio-gallery {{ $featuredRight ? 'portfolio-gallery-featured-right' : '' }} rv" aria-label="Koleksi portofolio {{ $loop->iteration }}">
            @foreach($group as $image)
              @php
                $filename = basename($image);
                $number = preg_replace('/\D+/', '', pathinfo($filename, PATHINFO_FILENAME));
              @endphp
              <figure class="portfolio-card {{ $loop->first ? 'portfolio-card-featured' : '' }}">
                <img
                  src="{{ asset('images/Portofolio/' . rawurlencode($filename)) }}"
                  alt="Portofolio produk custom HERVENT {{ $number }}"
                  loading="lazy"
                >
              </figure>
            @endforeach
          </div>
        @endforeach
      </div>
    </section>
  </main>

  @include('partials.footer')
</body>
</html>
