<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <title>Corporate Gift &amp; Paket Souvenir Kantor Custom | HERVENT</title>
  <meta name="description" content="Gift set corporate dan paket souvenir kantor yang bisa Anda susun sendiri. Desain gratis, legalitas resmi, dan pengiriman ke seluruh Indonesia.">
  <meta name="theme-color" content="#B81A1F">
  <link rel="canonical" href="https://corporategift.hervent.co.id/">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="id_ID">
  <meta property="og:title" content="Corporate Gift &amp; Paket Souvenir Kantor Custom | HERVENT">
  <meta property="og:description" content="Susun sendiri gift set dan souvenir kantor sesuai kebutuhan perusahaan Anda.">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="icon" type="image/png" href="{{ asset('images/Icon Logo.png') }}">
  <script type="application/ld+json"><?php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => 'Corporate Gift & Paket Souvenir Kantor Custom',
    'brand' => ['@type' => 'Brand', 'name' => 'HERVENT'],
    'description' => 'Gift set corporate dan paket souvenir kantor custom untuk kebutuhan perusahaan.',
    'manufacturer' => ['@type' => 'Organization', 'name' => 'PT Aventama Hervent Solusindo'],
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
</head>
<body class="corporate-gift-page home-page">
  @php
    $whatsapp = 'https://wa.me/62811912502?text='.urlencode('Halo HERVENT, saya ingin konsultasi corporate gift untuk perusahaan saya.');
    $mixItems = ['E-Money Custom', 'Mouse & Speaker', 'Tas Custom', 'Kalender', 'Flashdisk Kartu', 'Wood Series', 'Bolpoin', 'Jam Custom', 'Tumbler', 'Pouch Custom', 'Powerbank Custom', 'ID Card', 'Alat Kesehatan', 'Agenda & Notebook', 'Packaging', 'Leather Series'];
    $tiers = [
      ['name' => 'Corporate Gift', 'image' => 'images/products/Corporate Gift/Corporate gift produk.png'],
      ['name' => 'Seminar & Training', 'image' => 'images/products/Seminar & Training/Produk Seminar.png'],
      ['name' => 'Gathering & Anniversary', 'image' => 'images/products/Gathering & Anniversary/produk setengah.png'],
      ['name' => 'Client Appreciation', 'image' => 'images/products/Client Appreciation/client produk.png'],
      ['name' => 'Events & Exhibition', 'image' => 'images/products/Event & Exhibition/event produk.png'],
      ['name' => 'Holiday & Hampers', 'image' => 'images/products/Holiday & Hampers/hampers produk.png'],
    ];
    $giftSets = [
      ['name' => 'Supreme Prestige', 'tag' => 'Executive gift', 'text' => 'Hardbox hitam · Agenda kulit · Tumbler · Pulpen', 'image' => 'images/products/Corporate Gift/Gift Set - Supreme Prestige.png'],
      ['name' => 'Supreme Spectra', 'tag' => 'Signature gift', 'text' => 'Hardbox · Pouch kulit · Agenda · Pulpen', 'image' => 'images/products/Corporate Gift/Gift Set - Supreme Spectra.png'],
      ['name' => 'Optimum Pulse', 'tag' => 'Business set', 'text' => 'Hardbox · Card holder · Gantungan kunci · Pulpen', 'image' => 'images/products/Corporate Gift/Gift Set - Optimum Pulse.png'],
      ['name' => 'Optimum Vibe', 'tag' => 'Business set', 'text' => 'Hardbox · Card holder · Gantungan kunci · Pulpen', 'image' => 'images/products/Corporate Gift/Gift Set - Optimum Vibe.png'],
      ['name' => 'Deluxe Aura', 'tag' => 'Executive set', 'text' => 'Hardbox · Agenda kulit · Flashdisk kayu · Pulpen · Jam meja', 'image' => 'images/products/Corporate Gift/Gift Set - Deluxe Aura.png'],
      ['name' => 'Deluxe Glow', 'tag' => 'Executive set', 'text' => 'Hardbox · Agenda kulit · Flashdisk · Pulpen · Jam meja', 'image' => 'images/products/Corporate Gift/Gift Set - Deluxe Glow.png'],
      ['name' => 'Ethnic Echo', 'tag' => 'Local character', 'text' => 'Totebag goni · Agenda kulit · Pulpen · Tumbler', 'image' => 'images/products/Corporate Gift/Gift Set - Ethnic Echo.png'],
      ['name' => 'Ethnic Rhythms', 'tag' => 'Local character', 'text' => 'Tas kain motif · Pouch · Card holder · Gantungan kartu', 'image' => 'images/products/Corporate Gift/Gift Set - Ethnic Rhythms.png'],
    ];
    $clientLogos = glob(public_path('images/Logo Client Hervent/*.png')) ?: [];
    sort($clientLogos, SORT_NATURAL | SORT_FLAG_CASE);
    $logoRows = array_chunk($clientLogos, (int) ceil(count($clientLogos) / 2));
    $googleMaps = 'https://maps.app.goo.gl/u8hkuc9RgapZTaak8';
  @endphp

  <a class="cg-skip" href="#konten">Lewati ke konten</a>

  @include('partials.header')

  <main id="konten">
    <section class="hero on-red cg-home-hero">
      <div class="wrap hero-in">
        <span class="trust"><span class="dot"></span> Vendor Corporate Gift Sejak 2009 · 4.500+ Klien BUMN &amp; Korporasi</span>
        <h1 class="h1">Corporate Gift &amp; Paket Souvenir Kantor <span class="hl">untuk Kebutuhan Perusahaan Anda</span></h1>
        <p class="lede">Gift set corporate yang bisa Anda susun sendiri — dari souvenir kantor harian sampai kebutuhan acara khusus perusahaan. Desain gratis, legalitas resmi, siap kirim ke seluruh Indonesia.</p>
        <div class="hero-cta">
          <a href="{{ $whatsapp }}" class="btn b-red" target="_blank" rel="noopener noreferrer">
            <svg class="whatsapp-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.086 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495.001.16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
            Konsultasi Gratis
          </a>
          <a href="{{ route('landing.corporate-gift') }}" class="btn b-line" data-scroll-target="susun-paket">Lihat Pilihan Paket</a>
        </div>
        <ul class="hero-mini" aria-label="Keunggulan HERVENT">
          <li><b>Sejak 2009</b>17 tahun pengalaman</li>
          <li><b>4500+</b>Klien perusahaan</li>
          <li><b>Kantor</b>Kota Bandung</li>
          <li><b>PPN</b>Faktur pajak tersedia</li>
        </ul>
      </div>
    </section>

    <section class="wall cg-proof" aria-label="Trusted By 4,500+ Great Companies">
      <p>Trusted By 4,500+ Great Companies</p>
      @foreach($logoRows as $rowIndex => $logos)
        <div class="rail {{ $rowIndex === 0 ? 'a' : 'b' }}" aria-hidden="true">
          @foreach(array_merge($logos, $logos) as $logo)
            <span class="slot">
              <img src="{{ asset('images/Logo Client Hervent/'.rawurlencode(basename($logo))) }}" alt="">
            </span>
          @endforeach
        </div>
      @endforeach
    </section>

    <section class="s cg-mix" id="susun-paket" data-gift-builder>
      <div class="wrap">
        <p class="eyebrow">Lini souvenir kantor</p>
        <h2 class="h2">Susun Sendiri Isi Paket Merchandise Perusahaan Anda</h2>
        <p class="lede">Setiap perusahaan punya kebutuhan <strong>souvenir kantor</strong> yang berbeda. Karena itu, isi paket <strong>merchandise perusahaan</strong> Anda bisa disusun bebas — pilih kombinasi item yang paling pas dengan budget dan momen acara.</p>
        <div class="cg-pills" aria-label="Pilih item untuk paket Anda">
          @foreach($mixItems as $item)
            <button type="button" class="cg-pill" data-gift-item="{{ $item }}" aria-pressed="false">{{ $item }}</button>
          @endforeach
        </div>
        <div class="cg-builder-note">
          <p>Kombinasi item dapat disesuaikan dengan tim kami saat konsultasi.</p>
          <a class="btn b-red" data-gift-wa href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">Konsultasikan pilihan</a>
        </div>
      </div>
    </section>

    <section class="s cg-tiers" id="varian">
      <div class="wrap">
        <div class="center">
          <p class="eyebrow">Pilihan paket</p>
          <h2 class="h2">Varian Paket Souvenir Kantor <span class="hl">Eksklusif</span></h2>
          <p class="lede">Setiap paket dapat diubah jumlah item, warna, branding, dan kemasannya sesuai kebutuhan Anda.</p>
        </div>
        <div class="cg-card-grid cg-card-grid-three">
          @foreach($tiers as $tier)
            <article class="cg-product-card cg-category-card">
              <img src="{{ asset($tier['image']) }}" alt="{{ $tier['name'] }} HERVENT" loading="lazy">
              <div><h3 class="h3">{{ $tier['name'] }}</h3></div>
            </article>
          @endforeach
        </div>
        <div class="center cg-section-cta"><a href="{{ $whatsapp }}" class="btn b-red" target="_blank" rel="noopener noreferrer">Minta rekomendasi paket</a></div>
      </div>
    </section>

    <section class="s cg-signature">
      <div class="wrap">
        <div class="center"><p class="eyebrow">Untuk momen istimewa</p><h2 class="h2">Gift Set Premium untuk Momen yang Lebih <span class="hl">Personal</span></h2><p class="lede">Untuk apresiasi klien VIP, hadiah eksekutif, atau souvenir perusahaan yang membutuhkan kesan lebih eksklusif.</p></div>
        <div class="cg-card-grid">
          @foreach($giftSets as $gift)
            <article class="cg-product-card cg-gift-card"><img src="{{ asset($gift['image']) }}" alt="Gift set {{ $gift['name'] }}" loading="lazy"><div><p class="eyebrow">{{ $gift['tag'] }}</p><h3 class="h3">{{ $gift['name'] }}</h3><p>{{ $gift['text'] }}</p></div></article>
          @endforeach
        </div>
      </div>
    </section>

    <section class="s cg-benefits">
      <div class="wrap cg-two-col">
        <div><p class="eyebrow">Keunggulan</p><h2 class="h2">Kenapa Perusahaan Memilih <span class="hl">HERVENT</span></h2><p class="lede">Kami membantu prosesnya dari rekomendasi produk sampai produk selesai dikirim, supaya Anda tidak perlu koordinasi dengan banyak vendor.</p></div>
        <div class="cg-benefit-list">
          @foreach([
            ['Bebas Custom Request', 'Pilih produk, kombinasi isi, dan branding yang sesuai kebutuhan acara maupun brand Anda.'],
            ['Legalitas Resmi', 'PT Aventama Hervent Solusindo siap dengan dokumen vendor dan faktur pajak untuk pengadaan perusahaan.'],
            ['Desain & Mockup Gratis', 'Tim kami membantu visual penempatan logo sebelum produksi dimulai.'],
            ['QC sebelum Kirim', 'Setiap batch dikontrol sebelum dikemas dan dikirim ke alamat tujuan Anda.'],
          ] as $index => [$title, $text])
            <article><span>0{{ $index + 1 }}</span><div><h3 class="h3">{{ $title }}</h3><p>{{ $text }}</p></div></article>
          @endforeach
        </div>
      </div>
    </section>

    <section class="s cg-gallery">
      <div class="wrap"><div class="center"><p class="eyebrow">Portofolio</p><h2 class="h2">Hasil Produksi untuk Berbagai <span class="hl">Perusahaan</span></h2></div>
        <div class="cg-gallery-grid">
          @php
            $portfolioPreviewImages = glob(public_path('images/Portofolio/*')) ?: [];
            natsort($portfolioPreviewImages);
          @endphp
          @foreach(array_slice(array_values($portfolioPreviewImages), 0, 4) as $image)
            @php
              $filename = basename($image);
            @endphp
            <img src="{{ asset('images/Portofolio/' . rawurlencode($filename)) }}" alt="Portofolio corporate gift HERVENT" loading="lazy">
          @endforeach
        </div>
      </div>
    </section>

    <section class="s cg-reviews">
      <div class="wrap"><div class="center"><p class="eyebrow">Testimoni</p><h2 class="h2">Kami Tidak Mengatakan Kami Terbaik, <span class="hl">Merekalah yang Mengatakannya</span></h2></div>
        <div class="cg-review-grid">
          @foreach([
            ['Asraini Audia Hardarinata', 'Custom souvenir ke Bandung karena di Karawang harganya jauh lebih tinggi. HERVENT terbaik dari pelayanan, harga, dan kualitasnya. Sangat sabar mengikuti keinginan customer.', '4 ulasan · 9 foto'],
            ['Yusuf Elok', 'Produsen hardbox gift dan custom tumbler terlengkap di Bandung.', 'Local Guide · 51 ulasan'],
            ['Wisni Pratistari', 'Pesanan tumbler mini dengan nama individual hasilnya bagus dan tepat waktu sesuai jadwal. Pelayanan baik, pengiriman paket juga lancar.', '1 ulasan · 1 foto'],
            ['Sri Suci Wijayanti', 'Produk bagus sesuai yang ditawarkan. Pelayanannya ramah dan baik, jadi untuk yang mencari merchandise jangan ragu pesan di HERVENT.', '2 ulasan · 3 foto'],
            ['HARI', 'Tempat membuat berbagai macam suvenir hingga seragam. Harga flashdisk terjangkau, pelayanan ramah dan baik, tempatnya juga nyaman.', 'Local Guide · 355 ulasan'],
            ['Nabila Rifda', 'Pertama kali pesan dan sangat puas dengan servicenya. Admin ramah, helpful, sabar saat revisi desain, dan waktu pengerjaan sesuai ekspektasi.', 'Local Guide · 77 ulasan'],
          ] as [$name, $quote, $meta])
            <blockquote>
              <span class="cg-stars" aria-label="5 dari 5 bintang">★★★★★</span>
              <p>“{{ $quote }}”</p>
              <footer><strong>{{ $name }}</strong><span>{{ $meta }}</span></footer>
            </blockquote>
          @endforeach
        </div>
        <p class="cg-review-disclaimer">*Ulasan nyata klien HERVENT yang dirangkum dari Google Reviews.</p>
        <h3 class="cg-google-title">Review Google Kami</h3>
        <div class="cg-google-grid">
          @foreach([
            ['images/products/Testimoni/Hampers.jpg', 'Hasil produksi hampers custom HERVENT'],
            ['images/products/Testimoni/Giftset.jpg', 'Hasil produksi gift set custom HERVENT'],
            ['images/products/Testimoni/Flashdisk.jpg', 'Hasil produksi flashdisk custom HERVENT'],
          ] as [$image, $alt])
            <a class="cg-google-card" href="{{ $googleMaps }}" target="_blank" rel="noopener noreferrer" aria-label="Lihat ulasan HERVENT di Google Maps">
              <img class="cg-google-review-image" src="{{ asset($image) }}" alt="{{ $alt }}" loading="lazy">
              <div class="cg-google-card-foot"><span>Lihat review asli di Google Maps</span><span aria-hidden="true">→</span></div>
            </a>
          @endforeach
        </div>
      </div>
    </section>

    <section class="s cg-guarantee"><div class="wrap cg-guarantee-box"><div class="cg-guarantee-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.75 20 6v5.7c0 4.75-3.4 8.1-8 9.55-4.6-1.45-8-4.8-8-9.55V6l8-3.25Z"/><path d="m8.7 12 2.15 2.15 4.45-4.45"/></svg></div><div><p class="eyebrow">Garansi HERVENT</p><h2 class="h2">Garansi yang Membuat Anda Tenang</h2><p>Hasil tidak sesuai mockup atau ada cacat produksi? Laporkan maksimal 7 hari setelah barang diterima dengan foto, dan unit akan kami ganti.</p></div></div></section>

    <section class="s cg-faq" id="faq"><div class="wrap"><div class="center"><p class="eyebrow">Pertanyaan</p><h2 class="h2">Pertanyaan yang Sering Ditanyakan</h2></div>
      <div class="cg-faq-list">
        @foreach([
          ['Bagaimana cara mendapatkan harga corporate gift?', 'Kirim jumlah penerima, kebutuhan acara, dan perkiraan budget melalui WhatsApp. Tim kami akan menyusun opsi dan penawaran yang relevan.'],
          ['Berapa minimum order pemesanan?', 'Minimum order umumnya 50 pcs untuk item satuan dan 25 set untuk gift set. Kebutuhan khusus dapat dikonsultasikan lebih dahulu.'],
          ['Apakah desain dan mockup dikenakan biaya?', 'Tidak. Desain serta mockup untuk approval sebelum produksi disediakan tanpa biaya tambahan.'],
          ['Berapa lama waktu pengerjaan?', 'Estimasi mengikuti jumlah, spesifikasi, dan jadwal produksi. Tim akan mengonfirmasi jadwal setelah kebutuhan Anda dipahami.'],
          ['Apakah tersedia faktur pajak?', 'Tersedia. HERVENT dapat menyiapkan faktur pajak dan dokumen vendor untuk kebutuhan administrasi perusahaan.'],
        ] as [$question, $answer])
          <details><summary>{{ $question }} <span aria-hidden="true">+</span></summary><p>{{ $answer }}</p></details>
        @endforeach
      </div>
    </div></section>

    <section class="s cg-closing" id="konsultasi">
      <div class="wrap cg-closing-grid">
        <div>
          <p class="eyebrow">Jadi partner kami</p>
          <h2 class="h2">Reputasi brand Anda adalah <span>prioritas kami.</span></h2>
          <p class="lede">Kirim tanggal acara dan jumlah penerima. Kami balas dengan opsi yang masih realistis dikerjakan sampai tanggal itu.</p>
          <div class="cg-closing-actions">
            <a href="{{ $whatsapp }}" class="btn b-light" data-gift-wa target="_blank" rel="noopener noreferrer">WhatsApp 0811-912-502</a>
            <a href="mailto:cs@hervent.co.id" class="btn b-outline-light">cs@hervent.co.id</a>
          </div>
        </div>
        <address class="cg-address-card">
          <strong>Kantor pusat — Bandung</strong>
          <span>Komplek Istana Kawaluyaan RW04, Jl. Kawaluyaan Indah XVII No.11, Jatisari, Buahbatu, Kota Bandung 40286</span>
        </address>
      </div>
    </section>
  </main>

  <footer class="cg-footer">
    <div class="wrap cg-footer-grid">
      <div class="cg-footer-brand">
        <img src="{{ asset('images/Logo Hervent Footer Website.png') }}" alt="HERVENT">
        <p>PT Aventama Hervent Solusindo. Corporate gift, promotional merchandise, dan souvenir kantor custom sejak 2009.</p>
        <a class="cg-footer-site" href="https://hervent.co.id">Kunjungi hervent.co.id <span aria-hidden="true">↗</span></a>
      </div>
      <nav class="cg-footer-links" aria-label="Tautan cepat">
        <h2>Tautan cepat</h2>
        <a href="https://hervent.co.id">Beranda</a>
        <a href="{{ route('landing.corporate-gift') }}" data-scroll-target="susun-paket">Kategori produk</a>
        <a href="#varian">Koleksi unggulan</a>
        <a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">Konsultasi gratis</a>
      </nav>
      <address class="cg-footer-contact">
        <h2>Kontak</h2>
        <a href="tel:+622287324188">(022) 87324188</a>
        <a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">0811-912-502</a>
        <a href="mailto:cs@hervent.co.id">cs@hervent.co.id</a>
        <span>Bandung, Indonesia</span>
      </address>
    </div>
    <div class="wrap cg-footer-bottom"><span>© {{ date('Y') }} HERVENT. All rights reserved.</span><span>Corporate gift &amp; souvenir kantor custom.</span></div>
  </footer>
</body>
</html>
