<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-PG99TCB8');</script>
  <!-- End Google Tag Manager -->
  <title>Buku Agenda Custom untuk Corporate Gift | HERVENT</title>
  <meta name="description" content="Buku agenda custom untuk corporate gift, souvenir kantor, dan merchandise perusahaan. Sesuaikan desain, logo, material, dan isi agenda bersama HERVENT.">
  <meta name="theme-color" content="#B81A1F">
  <link rel="canonical" href="{{ route('landing.buku-agenda') }}">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="id_ID">
  <meta property="og:title" content="Buku Agenda Custom untuk Corporate Gift | HERVENT">
  <meta property="og:description" content="Buku agenda custom yang dapat disesuaikan dengan identitas brand perusahaan Anda.">
  @vite(['resources/css/landing.css', 'resources/js/app.js'])
  <link rel="icon" type="image/png" href="{{ asset('images/Icon Logo.png') }}">
  <script type="application/ld+json"><?php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => 'Buku Agenda Custom Corporate Gift',
    'brand' => ['@type' => 'Brand', 'name' => 'HERVENT'],
    'description' => 'Buku agenda custom untuk corporate gift, souvenir kantor, dan merchandise perusahaan.',
    'manufacturer' => ['@type' => 'Organization', 'name' => 'PT Aventama Hervent Solusindo'],
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
</head>
<body class="seminar-kit-page agenda-page">
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PG99TCB8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  @php
    $whatsapp = 'https://wa.me/62811912502?text='.urlencode('[HA] Halo HERVENT, saya ingin konsultasi buku agenda custom untuk corporate gift perusahaan saya.');
    $agendaFiles = glob(public_path('images/products/Buku Agenda/*')) ?: [];
    $agendaFiles = array_values(array_filter($agendaFiles, fn ($path) => is_file($path) && preg_match('/\.(?:jpe?g|png|webp)$/i', $path)));
    sort($agendaFiles, SORT_NATURAL | SORT_FLAG_CASE);
    $featuredAgendaNames = [
      '6248982291477017656.jpg',
      '6125055433967249936.jpg',
      '6136378651386687326.jpg',
      '6170001429201267267.jpg',
      '6190416632824834536.jpg',
      '6224049164510148118.jpg',
      '6240280820879313379.jpg',
      '6298447782012368435.jpg',
    ];
    $hiddenAgendaNames = [
      '6136378651386687327.jpg',
      '6237849628871608600.jpg',
      '6240254707478151910.jpg',
      '6303246548972189061.jpg',
    ];
    $newPortfolioAgendaNames = [
      '6332183225409059717.jpg',
      '6336684424149712887.jpg',
      '6136454281465808501.jpg',
      '6145422967752559540.jpg',
      '6161330427105316494.jpg',
      '6240254707478151910.jpg',
      '6244503873242907157.jpg',
    ];
    $agendaByName = [];
    foreach ($agendaFiles as $image) {
      $agendaByName[basename($image)] = $image;
    }
    $featuredAgendas = array_values(array_filter(array_map(fn ($name) => $agendaByName[$name] ?? null, $featuredAgendaNames)));
    $newPortfolioAgendas = array_values(array_filter(
      array_map(fn ($name) => $agendaByName[$name] ?? null, $newPortfolioAgendaNames),
      fn ($path) => $path && !in_array(basename($path), $hiddenAgendaNames, true)
    ));
    $remainingGalleryAgendas = array_values(array_filter($agendaFiles, fn ($path) => !in_array(basename($path), array_merge($featuredAgendaNames, $hiddenAgendaNames, $newPortfolioAgendaNames), true)));
    $galleryAgendas = array_values(array_unique(array_merge($newPortfolioAgendas, $remainingGalleryAgendas)));
    $logos = glob(public_path('images/Logo Client Hervent/*.png')) ?: [];
    sort($logos, SORT_NATURAL | SORT_FLAG_CASE);
    $logoRows = array_chunk($logos, (int) ceil(count($logos) / 2));
  @endphp

  <a class="cg-skip" href="#konten">Lewati ke konten</a>
  <header class="cg-nav" aria-label="Navigasi landing page">
    <div class="wrap cg-nav-in">
      <a class="cg-logo" href="{{ url('/') }}" aria-label="HERVENT"><img src="{{ asset('images/Logo Landscape.png') }}" alt="HERVENT"></a>
      <a class="btn b-red cg-nav-cta" href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">Konsultasi Gratis</a>
    </div>
  </header>

  <main id="konten">
    <section class="hero on-red sk-hero">
      <div class="wrap hero-in">
        <div class="sk-hero-copy">
          <span class="trust"><span class="dot"></span> Vendor Corporate Gift Sejak 2009 · 4.500+ Klien BUMN &amp; Korporasi</span>
          <h1 class="h1">Buku Agenda Custom dengan Logo Perusahaan untuk <span class="hl">Souvenir Eksklusif</span></h1>
          <p class="lede">Buku agenda custom yang menemani aktivitas kerja sekaligus memperkuat identitas brand perusahaan. Pilih material, warna, isi, dan cetak logo sesuai kebutuhan kantor, event, maupun apresiasi klien.</p>
          <div class="hero-cta">
            <a href="{{ $whatsapp }}" class="btn b-red" target="_blank" rel="noopener noreferrer">
              <svg class="whatsapp-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.198.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.871.118.571-.086 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
              <i data-lucide="whatsapp" class="agenda-whatsapp-icon" aria-hidden="true"></i>
              Konsultasi Gratis
            </a>
            <a href="#produk-agenda" class="btn b-line">Lihat Pilihan Agenda</a>
          </div>
          <ul class="hero-mini" aria-label="Keunggulan HERVENT">
            <li><b>Sejak 2009</b>17 tahun pengalaman</li>
            <li><b>4500+</b>Klien perusahaan</li>
            <li><b>Custom</b>Logo dan isi agenda</li>
            <li><b>PPN</b>Faktur pajak tersedia</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="wall sk-proof" aria-label="Klien HERVENT">
      <p>Dipercaya 4.500+ klien korporasi, BUMN, dan instansi pemerintah</p>
      @foreach($logoRows as $rowIndex => $row)
        <div class="rail {{ $rowIndex === 0 ? 'a' : 'b' }}" aria-hidden="true">
          @foreach(array_merge($row, $row) as $logo)
            <span class="slot"><img src="{{ asset('images/Logo Client Hervent/' . rawurlencode(basename($logo))) }}" alt=""></span>
          @endforeach
        </div>
      @endforeach
    </section>

    <section class="s sk-packages" id="produk-agenda">
      <div class="wrap">
        <div class="center sk-heading">
          <p class="eyebrow">Pilihan produk</p>
          <h2 class="h2">Pilih Buku Agenda Custom Sesuai <span class="hl">Kebutuhan Brand Anda</span></h2>
          <p class="lede">Gunakan koleksi ini sebagai referensi awal. Sampul, material, ukuran, isi halaman, dan teknik cetak dapat disesuaikan dengan kebutuhan perusahaan.</p>
        </div>
        <div class="sk-package-grid">
          @foreach($featuredAgendas as $index => $image)
            <article class="sk-package-card">
              <img src="{{ asset('images/products/Buku Agenda/' . rawurlencode(basename($image))) }}" alt="Buku agenda custom HERVENT {{ $index + 1 }}" loading="lazy">
              <span class="sk-custom-badge">Custom By Request</span>
              <div>
                <p class="eyebrow">Agenda Corporate</p>
                <h3 class="h3">Pilihan Agenda {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</h3>
                <p>Cocok untuk kebutuhan kantor, onboarding, event, hadiah klien, dan program branding perusahaan.</p>
              </div>
            </article>
          @endforeach
        </div>
        <div class="center cg-section-cta"><a href="{{ $whatsapp }}" class="btn b-red" target="_blank" rel="noopener noreferrer">Konsultasikan Model yang Cocok</a></div>
      </div>
    </section>

    <section class="s sk-benefits">
      <div class="wrap cg-two-col">
        <div><p class="eyebrow">Keunggulan HERVENT</p><h2 class="h2">Agenda yang Membawa <span class="hl">Identitas Brand Anda</span></h2><p class="lede">Kami membantu dari pemilihan model hingga proses produksi agar buku agenda custom Anda tampil rapi, fungsional, dan siap dibagikan.</p></div>
        <div class="cg-benefit-list">
          @foreach([
            ['Bebas Pilih Material', 'Pilih material sampul, ukuran, warna, dan finishing yang sesuai dengan karakter perusahaan Anda.'],
            ['Isi Bisa Disesuaikan', 'Atur isi halaman, kalender, notes, divider, dan elemen informasi sesuai kebutuhan penggunaan.'],
            ['Gratis Desain & Mockup', 'Lihat visual penempatan logo serta desain sampul terlebih dahulu sebelum produksi dimulai.'],
            ['Cocok untuk Berbagai Acara', 'Ideal untuk onboarding, seminar, gathering, anniversary, apresiasi klien, dan hadiah akhir tahun.'],
            ['Legalitas Resmi', 'Dokumen vendor dan faktur pajak tersedia untuk kebutuhan pengadaan perusahaan maupun instansi.'],
          ] as $index => [$title, $text])
            <article><span>0{{ $index + 1 }}</span><div><h3 class="h3">{{ $title }}</h3><p>{{ $text }}</p></div></article>
          @endforeach
        </div>
      </div>
    </section>

    <section class="s sk-gallery">
      <div class="wrap"><div class="center"><p class="eyebrow">Portofolio</p><h2 class="h2">Inspirasi Buku Agenda Custom untuk <span class="hl">Berbagai Kebutuhan</span></h2><p class="lede">Lihat beberapa hasil dan referensi buku agenda yang dapat dikembangkan bersama tim HERVENT.</p></div>
        <div class="sk-gallery-grid">
          @foreach($galleryAgendas as $image)
            <img src="{{ asset('images/products/Buku Agenda/' . rawurlencode(basename($image))) }}" alt="Inspirasi buku agenda custom HERVENT" loading="lazy">
          @endforeach
        </div>
      </div>
    </section>

    <section class="s cg-faq" id="faq"><div class="wrap"><div class="center"><p class="eyebrow">Pertanyaan</p><h2 class="h2">Pertanyaan Seputar Buku Agenda Custom</h2></div><div class="cg-faq-list">
      @foreach([
        ['Apakah bisa custom logo dan warna?', 'Bisa. Logo, warna, material, finishing, dan penempatan desain dapat disesuaikan dengan identitas brand perusahaan Anda.'],
        ['Apakah isi agenda bisa disesuaikan?', 'Bisa. Isi halaman, kalender, notes, divider, dan informasi perusahaan dapat dirancang sesuai kebutuhan.'],
        ['Apakah bisa dibuatkan mockup terlebih dahulu?', 'Bisa. Tim desain HERVENT membantu membuat visual sampul dan penempatan logo sebelum produksi dimulai.'],
        ['Berapa lama waktu produksinya?', 'Estimasi bergantung pada jumlah, model, spesifikasi, dan jadwal produksi. Tim kami akan mengonfirmasi timeline setelah brief diterima.'],
        ['Apakah tersedia faktur pajak?', 'Tersedia. HERVENT dapat menyiapkan faktur pajak serta dokumen vendor untuk kebutuhan administrasi perusahaan dan instansi.'],
      ] as [$question, $answer])<details><summary>{{ $question }} <span aria-hidden="true">+</span></summary><p>{{ $answer }}</p></details>@endforeach
    </div></div></section>

    <section class="s cg-closing" id="konsultasi"><div class="wrap cg-closing-grid"><div><p class="eyebrow">Mulai konsultasi</p><h2 class="h2">Siapkan Buku Agenda yang <span>Mewakili Brand Anda.</span></h2><p class="lede">Ceritakan jumlah kebutuhan, model yang disukai, tanggal acara, dan perkiraan budget. Kami akan bantu pilihkan opsi yang realistis.</p><div class="cg-closing-actions"><a href="{{ $whatsapp }}" class="btn b-light" target="_blank" rel="noopener noreferrer">WhatsApp 0811-912-502</a><a href="mailto:cs@hervent.co.id" class="btn b-outline-light">cs@hervent.co.id</a></div></div><address class="cg-address-card"><strong>Kantor pusat — Bandung</strong><span>Komplek Istana Kawaluyaan RW04, Jl. Kawaluyaan Indah XVII No.11, Jatisari, Buahbatu, Kota Bandung 40286</span></address></div></section>
  </main>

  <footer class="cg-footer"><div class="wrap cg-footer-grid"><div class="cg-footer-brand"><img src="{{ asset('images/Logo Hervent Footer Website.png') }}" alt="HERVENT"><p>PT Aventama Hervent Solusindo. Corporate gift, promotional merchandise, dan souvenir kantor custom sejak 2009.</p><a class="cg-footer-site" href="https://hervent.co.id">Kunjungi hervent.co.id <span aria-hidden="true">↗</span></a></div><nav class="cg-footer-links" aria-label="Tautan cepat"><h2>Tautan cepat</h2><a href="https://hervent.co.id">Beranda</a><a href="#produk-agenda">Pilihan agenda</a><a href="#faq">FAQ</a><a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">Konsultasi gratis</a></nav><address class="cg-footer-contact"><h2>Kontak</h2><a href="tel:+622287324188">(022) 87324188</a><a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">0811-912-502</a><a href="mailto:cs@hervent.co.id">cs@hervent.co.id</a><span>Bandung, Indonesia</span></address></div><div class="wrap cg-footer-bottom"><span>© {{ date('Y') }} HERVENT. All rights reserved.</span><span>Buku agenda custom untuk corporate gift dan souvenir kantor.</span></div></footer>

  <a class="cg-floating-wa" href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp HERVENT" title="Chat WhatsApp HERVENT">
    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.198.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.871.118.571-.086 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
    <i data-lucide="whatsapp" class="agenda-whatsapp-icon" aria-hidden="true"></i>
    <div class="cg-floating-wa-copy" aria-hidden="true"><b>Ingin Promo Menarik?</b><strong>Chat Kami Sekarang!</strong></div>
  </a>
</body>
</html>
