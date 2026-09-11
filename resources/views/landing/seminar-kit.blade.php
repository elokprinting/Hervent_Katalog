<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <title>Seminar Kit Custom untuk Training & Workshop | HERVENT</title>
  <meta name="description" content="Paket seminar kit custom untuk training, workshop, dan acara perusahaan. Produksi Bandung, desain gratis, legalitas resmi, dan pengiriman ke seluruh Indonesia.">
  <meta name="theme-color" content="#B81A1F">
  <link rel="canonical" href="{{ route('landing.seminar-kit') }}">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="id_ID">
  <meta property="og:title" content="Seminar Kit Custom untuk Training & Workshop | HERVENT">
  <meta property="og:description" content="Paket seminar kit lengkap yang dapat disesuaikan untuk acara perusahaan Anda.">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="icon" type="image/png" href="{{ asset('images/Icon Logo.png') }}">
  <script type="application/ld+json"><?php echo json_encode([
    '@context' => 'https://schema.org', '@type' => 'Product', 'name' => 'Seminar Kit Custom',
    'brand' => ['@type' => 'Brand', 'name' => 'HERVENT'],
    'description' => 'Paket seminar kit custom untuk training, workshop, dan acara perusahaan.',
    'manufacturer' => ['@type' => 'Organization', 'name' => 'PT Aventama Hervent Solusindo'],
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
</head>
<body class="seminar-kit-page home-page">
  @php
    $whatsapp = 'https://wa.me/62811912502?text='.urlencode('Halo HERVENT, saya ingin konsultasi seminar kit untuk acara saya.');
    $consultPackage = 'https://wa.me/62811912502?text='.urlencode('Halo HERVENT, saya ingin konsultasi paket seminar kit yang cocok untuk acara saya.');
    $logos = glob(public_path('images/Logo Client Hervent/*.png')) ?: [];
    sort($logos, SORT_NATURAL | SORT_FLAG_CASE);
    $logoRows = array_chunk($logos, (int) ceil(count($logos) / 2));
    $seminarPortfolioFiles = glob(public_path('images/products/Seminar & Training/*')) ?: [];
    $seminarPortfolioFiles = array_values(array_filter($seminarPortfolioFiles, function ($path) {
      if (!preg_match('/^seminar-kit-(\d+)$/i', pathinfo($path, PATHINFO_FILENAME))) {
        return false;
      }

      $dimensions = @getimagesize($path);
      if (!$dimensions || empty($dimensions[0]) || empty($dimensions[1])) {
        return false;
      }

      $ratio = $dimensions[0] / $dimensions[1];
      return abs($ratio - (3 / 4)) < 0.01 || abs($ratio - (9 / 16)) < 0.01;
    }));
    usort($seminarPortfolioFiles, fn ($a, $b) => (int) preg_replace('/\D+/', '', pathinfo($a, PATHINFO_FILENAME)) <=> (int) preg_replace('/\D+/', '', pathinfo($b, PATHINFO_FILENAME)));
    // Susun pseudo-acak secara konsisten, sambil menjauhkan nomor berurutan
    // agar foto dari seri yang sama tidak berdampingan.
    $portfolioNumber = fn ($path) => (int) preg_replace('/\D+/', '', pathinfo($path, PATHINFO_FILENAME));
    $portfolioSeed = 20260911;
    mt_srand($portfolioSeed);
    for ($attempt = 0; $attempt < 200; $attempt++) {
      $candidate = $seminarPortfolioFiles;
      shuffle($candidate);
      $separated = true;
      for ($index = 1, $count = count($candidate); $index < $count; $index++) {
        if (abs($portfolioNumber($candidate[$index]) - $portfolioNumber($candidate[$index - 1])) <= 1) {
          $separated = false;
          break;
        }
      }
      if ($separated || count($candidate) < 2) {
        $seminarPortfolioFiles = $candidate;
        break;
      }
    }
    $packages = [
      ['group' => 'Paket Ekonomis', 'label' => 'Grup A', 'name' => 'Reguler 1 (Varian Merah)', 'tag' => 'Totebag Blacu', 'text' => 'Totebag Blacu · Notes A6 tebal · Pulpen', 'image' => 'images/products/Seminar & Training/Seminar Kit - Eko 1.png'],
      ['group' => 'Paket Ekonomis', 'label' => 'Grup A', 'name' => 'Reguler 1 (Varian Biru)', 'tag' => 'Totebag Blacu', 'text' => 'Totebag Blacu · Notes A6 tebal · Pulpen · Pin Gantungan', 'image' => 'images/products/Seminar & Training/Seminar Kit - Eko 2.png'],
      ['group' => 'Paket Ekonomis', 'label' => 'Grup A', 'name' => 'Reguler 2', 'tag' => 'Totebag Blacu', 'text' => 'Totebag Blacu · Notes A6 tebal · Pulpen · Pin Gantungan · Mug', 'image' => 'images/products/Seminar & Training/Seminar Kit - Eko 3.png'],
      ['group' => 'Paket Ekonomis', 'label' => 'Grup A', 'name' => 'Premium (Varian Biru Muda)', 'tag' => 'Totebag Blacu Premium', 'text' => 'Totebag Blacu Premium · Notes A6 tebal · Pulpen · Name Tag · Mug · Pin Gantungan', 'image' => 'images/products/Seminar & Training/Seminar Kit - Eko 4.png'],
      ['group' => 'Paket Reguler', 'label' => 'Grup B', 'name' => 'Premium (Varian Putih)', 'tag' => 'Totebag Canvas', 'text' => 'Totebag Canvas · Notes A6 tebal · Pulpen · Name Tag · Mug · Pin Gantungan', 'image' => 'images/products/Seminar & Training/Seminar Kit - Reg 1.png'],
      ['group' => 'Paket Reguler', 'label' => 'Grup B', 'name' => 'Eksekutif', 'tag' => 'Totebag Canvas', 'text' => 'Totebag Canvas · Notes A6 tebal · Pulpen · Name Tag · Mug · Flashdisk · Pin Gantungan', 'image' => 'images/products/Seminar & Training/Seminar Kit - Reg 2.png'],
      ['group' => 'Paket Reguler', 'label' => 'Grup B', 'name' => 'Elit', 'tag' => 'Totebag Canvas', 'text' => 'Totebag Canvas · Agenda Kulit A5 · Pulpen · Tumbler · Name Tag · Pin Gantungan', 'image' => 'images/products/Seminar & Training/Seminar Kit - Reg 3.png'],
      ['group' => 'Paket Reguler', 'label' => 'Grup B', 'name' => 'Elit Lengkap', 'tag' => 'Totebag Canvas', 'text' => 'Totebag Canvas · Agenda Kulit A5 · Pulpen · Tumbler · Name Tag · Flashdisk · Pin Gantungan', 'image' => 'images/products/Seminar & Training/Seminar Kit - Reg 4.png'],
    ];
    $googleMaps = 'https://maps.app.goo.gl/u8hkuc9RgapZTaak8';
  @endphp

  <a class="cg-skip" href="{{ route('landing.seminar-kit') }}" data-scroll-target="konten">Lewati ke konten</a>
  @include('partials.header')

  <main id="konten">
    <section class="hero on-red sk-hero">
      <div class="wrap hero-in">
        <div class="sk-hero-copy">
          <span class="trust"><span class="dot"></span> Vendor Corporate Gift Sejak 2009 · 4.500+ Klien BUMN &amp; Korporasi</span>
          <h1 class="h1">Seminar Kit Custom untuk <span class="hl">Training, Workshop, dan Acara Perusahaan</span></h1>
          <p class="lede">Paket seminar kit lengkap dari tas, notes, sampai tumbler—diproduksi langsung dari Bandung dan siap dikirim ke seluruh Indonesia.</p>
          <div class="hero-cta">
            <a href="{{ $whatsapp }}" class="btn b-red" target="_blank" rel="noopener noreferrer">Konsultasi &amp; Dapatkan Harga</a>
            <a href="{{ route('landing.seminar-kit') }}" class="btn b-line" data-scroll-target="paket-seminar">Lihat Pilihan Paket</a>
          </div>
          <ul class="hero-mini" aria-label="Keunggulan HERVENT">
            <li><b>Sejak 2009</b>17 tahun pengalaman</li>
            <li><b>4500+</b>Klien perusahaan</li>
            <li><b>Kantor</b>Kota Bandung</li>
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
            <span class="slot"><img src="{{ asset('images/Logo Client Hervent/'.rawurlencode(basename($logo))) }}" alt=""></span>
          @endforeach
        </div>
      @endforeach
    </section>

    <section class="s sk-packages" id="paket-seminar">
      <div class="wrap">
        <div class="center sk-heading">
          <p class="eyebrow">Pilihan paket</p>
          <h2 class="h2">Pilih Paket Seminar Kit Sesuai <span class="hl">Kebutuhan dan Budget</span> Acara Anda</h2>
          <p class="lede">Delapan varian ini adalah referensi awal yang siap disesuaikan dengan jumlah peserta, identitas brand, dan anggaran acara Anda.</p>
        </div>
        @foreach(collect($packages)->groupBy('group') as $group => $items)
          <div class="sk-package-group"><p class="eyebrow">{{ $items->first()['label'] }}</p><h3 class="h3">{{ $group }}</h3></div>
          <div class="sk-package-grid">
            @foreach($items as $package)
              <article class="sk-package-card">
                <img src="{{ asset($package['image']) }}" alt="Paket seminar kit {{ $package['name'] }}" loading="lazy">
                <span class="sk-custom-badge">Custom By Request</span>
                <div>
                  <p class="eyebrow">{{ $package['tag'] }}</p>
                  <h4 class="h3">{{ $package['name'] }}</h4>
                  <p>{{ $package['text'] }}</p>
                </div>
              </article>
            @endforeach
          </div>
        @endforeach
        <div class="center cg-section-cta"><a href="{{ $consultPackage }}" class="btn b-red" target="_blank" rel="noopener noreferrer">Konsultasikan Paket yang Cocok</a></div>
      </div>
    </section>

    <section class="s sk-benefits">
      <div class="wrap cg-two-col">
        <div><p class="eyebrow">Keunggulan HERVENT</p><h2 class="h2">Seminar Kit yang Siap Menunjang <span class="hl">Acara Anda</span></h2><p class="lede">Kami membantu dari pemilihan item hingga pengiriman, agar kebutuhan acara Anda rapi dalam satu koordinasi.</p></div>
        <div class="cg-benefit-list">
          @foreach([
            ['Express Service', 'Tanggal seminar sudah ditetapkan? Kami menyesuaikan proses produksi dengan deadline acara Anda.'],
            ['Pengiriman Sampel Mudah', 'Cek kualitas produk lebih dahulu melalui sampel yang dapat dikirim atau diantar ke kantor Anda.'],
            ['Bebas Custom Request', 'Pilih isi, warna, logo, dan kemasan sesuai konsep acara atau identitas brand.'],
            ['Gratis Desain & Mockup', 'Tim kami membantu visualisasi penempatan logo sebelum produksi dimulai.'],
            ['Legalitas Resmi', 'Dokumen vendor dan faktur pajak tersedia untuk kebutuhan pengadaan perusahaan maupun instansi.'],
          ] as $index => [$title, $text])
            <article><span>0{{ $index + 1 }}</span><div><h3 class="h3">{{ $title }}</h3><p>{{ $text }}</p></div></article>
          @endforeach
        </div>
      </div>
    </section>

    <section class="s sk-gallery">
      <div class="wrap"><div class="center"><p class="eyebrow">Portofolio</p><h2 class="h2">Hasil Produksi Seminar Kit untuk <span class="hl">Berbagai Acara</span></h2></div>
        <div class="sk-gallery-grid">
          @foreach($seminarPortfolioFiles as $image)
            <img src="{{ asset('images/products/Seminar & Training/' . rawurlencode(basename($image))) }}" alt="Hasil produksi seminar kit HERVENT">
          @endforeach
        </div>
      </div>
    </section>

    <section class="s cg-reviews sk-reviews">
      <div class="wrap"><div class="center"><p class="eyebrow">Testimoni</p><h2 class="h2">Kami Tidak Mengatakan Kami Terbaik, <span class="hl">Merekalah yang Mengatakannya</span></h2><p class="lede">Dipercaya lebih dari 4.500 klien korporasi dan instansi.</p></div>
        <div class="cg-review-grid sk-testimonial-grid">
          @foreach([
            ['Mr. Febrika Adhi', 'BPN RI', 'Pesanan datang sesuai deadline meskipun waktu pengerjaannya sangat mepet. Kualitas barang dan finishing-nya bagus.'],
            ['Ms. Margaretha', 'PT Honda Prospect Motor', 'HERVENT respons cepat dan support penuh untuk kebutuhan mendesak kami. Layak direkomendasikan untuk pemesanan berulang.'],
            ['Bapak Mario Senjaya', 'PT Isuzu Astra Motor Indonesia', 'Dari H-10 sebelum acara kantor, semua selesai tepat waktu sebelum hari acara meski ada beberapa kali revisi PO.'],
          ] as [$name, $company, $quote])
            <blockquote><span class="cg-stars" aria-label="5 dari 5 bintang">★★★★★</span><p>“{{ $quote }}”</p><footer><strong>{{ $name }}</strong><span>{{ $company }}</span></footer></blockquote>
          @endforeach
        </div>
        <h3 class="cg-google-title">Review Google Kami</h3>
        <div class="cg-google-grid">
          @foreach(['images/products/Testimoni/Hampers.jpg', 'images/products/Testimoni/Giftset.jpg', 'images/products/Testimoni/Flashdisk.jpg'] as $image)
            <a class="cg-google-card" href="{{ $googleMaps }}" target="_blank" rel="noopener noreferrer" aria-label="Lihat ulasan HERVENT di Google Maps"><img class="cg-google-review-image" src="{{ asset($image) }}" alt="Review klien HERVENT" loading="lazy"><div class="cg-google-card-foot"><span>Lihat review asli di Google Maps</span><span aria-hidden="true">→</span></div></a>
          @endforeach
        </div>
      </div>
    </section>

    <section class="s cg-guarantee"><div class="wrap cg-guarantee-box"><div class="cg-guarantee-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.75 20 6v5.7c0 4.75-3.4 8.1-8 9.55-4.6-1.45-8-4.8-8-9.55V6l8-3.25Z"/><path d="m8.7 12 2.15 2.15 4.45-4.45"/></svg></div><div><p class="eyebrow">Garansi HERVENT</p><h2 class="h2">Garansi yang Membuat Anda Tenang</h2><p>Hasil tidak sesuai mockup atau ada cacat produksi? Laporkan maksimal 7 hari setelah barang diterima dengan foto, dan unit akan kami ganti.</p></div></div></section>

    <section class="s cg-faq" id="faq"><div class="wrap"><div class="center"><p class="eyebrow">Pertanyaan</p><h2 class="h2">Pertanyaan yang Sering Ditanyakan</h2></div><div class="cg-faq-list">
      @foreach([
        ['Apakah isi paket harus sama persis?', 'Tidak. Paket di atas adalah referensi awal; isi dan kombinasinya dapat disesuaikan dengan kebutuhan dan budget acara Anda.'],
        ['Kenapa harga tidak dicantumkan?', 'Harga menyesuaikan jumlah, jenis item, dan tingkat custom. Konsultasikan brief Anda untuk mendapatkan penawaran yang relevan.'],
        ['Berapa minimum order-nya?', 'Minimum order umumnya 50 pcs untuk item satuan dan 25 set untuk paket gift set.'],
        ['Berapa lama waktu pengerjaan?', 'Estimasi tergantung jumlah dan spesifikasi produk. Tim kami akan mengonfirmasi jadwal setelah kebutuhan Anda dipahami.'],
        ['Apakah tersedia faktur pajak?', 'Tersedia. HERVENT dapat menyiapkan faktur pajak serta dokumen vendor untuk kebutuhan administrasi perusahaan dan instansi.'],
      ] as [$question, $answer])<details><summary>{{ $question }} <span aria-hidden="true">+</span></summary><p>{{ $answer }}</p></details>@endforeach
    </div></div></section>

    <section class="s cg-closing" id="konsultasi"><div class="wrap cg-closing-grid"><div><p class="eyebrow">Mulai konsultasi</p><h2 class="h2">Siapkan Seminar Kit yang <span>Mewakili Acara Anda.</span></h2><p class="lede">Ceritakan jumlah peserta, tanggal acara, dan perkiraan budget. Kami akan bantu pilihkan paket yang realistis dikerjakan.</p><div class="cg-closing-actions"><a href="{{ $whatsapp }}" class="btn b-light" target="_blank" rel="noopener noreferrer">WhatsApp 0811-912-502</a><a href="mailto:cs@hervent.co.id" class="btn b-outline-light">cs@hervent.co.id</a></div></div><address class="cg-address-card"><strong>Kantor pusat — Bandung</strong><span>Komplek Istana Kawaluyaan RW04, Jl. Kawaluyaan Indah XVII No.11, Jatisari, Buahbatu, Kota Bandung 40286</span></address></div></section>
  </main>

  <footer class="cg-footer"><div class="wrap cg-footer-grid"><div class="cg-footer-brand"><img src="{{ asset('images/Logo Hervent Footer Website.png') }}" alt="HERVENT"><p>PT Aventama Hervent Solusindo. Corporate gift, promotional merchandise, dan souvenir kantor custom sejak 2009.</p><a class="cg-footer-site" href="https://hervent.co.id">Kunjungi hervent.co.id <span aria-hidden="true">↗</span></a></div><nav class="cg-footer-links" aria-label="Tautan cepat"><h2>Tautan cepat</h2><a href="https://hervent.co.id">Beranda</a><a href="{{ route('landing.seminar-kit') }}" data-scroll-target="paket-seminar">Pilihan paket</a><a href="#faq">FAQ</a><a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">Konsultasi gratis</a></nav><address class="cg-footer-contact"><h2>Kontak</h2><a href="tel:+622287324188">(022) 87324188</a><a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">0811-912-502</a><a href="mailto:cs@hervent.co.id">cs@hervent.co.id</a><span>Bandung, Indonesia</span></address></div><div class="wrap cg-footer-bottom"><span>© {{ date('Y') }} HERVENT. All rights reserved.</span><span>Seminar kit custom untuk acara perusahaan.</span></div></footer>
</body>
</html>
