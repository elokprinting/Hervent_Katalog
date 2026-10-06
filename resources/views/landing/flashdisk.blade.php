<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <!-- Google Tag Manager / Google Tag -->
  <script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ event: 'flashdisk_landing_view' });
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-PG99TCB8');
  </script>
  <!-- End Google Tag Manager / Google Tag -->
  <title>Flashdisk Custom untuk Corporate Gift | HERVENT</title>
  <meta name="description" content="Flashdisk custom dengan logo perusahaan untuk corporate gift, souvenir kantor, event, dan apresiasi klien. Konsultasikan model, kapasitas, dan branding bersama HERVENT.">
  <meta name="theme-color" content="#B81A1F">
  <link rel="canonical" href="{{ route('landing.flashdisk') }}">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="id_ID">
  <meta property="og:title" content="Flashdisk Custom untuk Corporate Gift | HERVENT">
  <meta property="og:description" content="Flashdisk custom yang membawa identitas brand perusahaan Anda ke setiap meja kerja dan aktivitas bisnis.">
  @vite(['resources/css/landing.css', 'resources/js/app.js'])
  <link rel="icon" type="image/png" href="{{ asset('images/Icon Logo.png') }}">
  <script type="application/ld+json"><?php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => 'Flashdisk Custom Corporate Gift',
    'brand' => ['@type' => 'Brand', 'name' => 'HERVENT'],
    'description' => 'Flashdisk custom dengan logo perusahaan untuk corporate gift, souvenir kantor, dan merchandise perusahaan.',
    'manufacturer' => ['@type' => 'Organization', 'name' => 'PT Aventama Hervent Solusindo'],
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
</head>
<body class="seminar-kit-page flashdisk-page">
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PG99TCB8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  @php
    $whatsapp = 'https://wa.me/62811912502?text='.urlencode('[FD] Halo HERVENT, saya ingin konsultasi flashdisk custom untuk corporate gift perusahaan saya.');
    $googleMaps = 'https://maps.app.goo.gl/u8hkuc9RgapZTaak8';
    $logos = glob(public_path('images/Logo Client Hervent/*.png')) ?: [];
    sort($logos, SORT_NATURAL | SORT_FLAG_CASE);
    $logoRows = array_chunk($logos, (int) ceil(count($logos) / 2));
    $portfolioImages = [
      'images/products/Testimoni/Flashdisk.jpg',
      'images/products/Product/Tech And Gadgets/Falshdrive Orbit.png',
      'images/products/Corporate Gift/Corporate gift 1.png',
      'images/products/Corporate Gift/Corporate gift produk.png',
      'images/products/Event & Exhibition/Event .png',
      'images/products/Client Appreciation/client appreciation.png',
    ];
    $productOptions = [
      ['Flashdisk Custom 01', 'Flashdisk corporate dengan bentuk yang simpel dan mudah dipadukan dengan identitas brand.'],
      ['Flashdisk Custom 02', 'Pilihan praktis untuk seminar, onboarding, gathering, dan hadiah apresiasi klien.'],
      ['Flashdisk Custom 03', 'Model dan kapasitas dapat disesuaikan dengan kebutuhan program perusahaan Anda.'],
      ['Flashdisk Custom 04', 'Media penyimpanan yang fungsional sekaligus menjadi pengingat brand setiap hari.'],
      ['Flashdisk Custom 05', 'Cocok untuk menyimpan materi presentasi, company profile, katalog, atau file event.'],
      ['Flashdisk Custom 06', 'Dapat dikembangkan dengan kemasan custom agar pengalaman menerima hadiah lebih berkesan.'],
      ['Flashdisk Custom 07', 'Referensi awal untuk merchandise teknologi yang rapi, modern, dan mudah dibagikan.'],
      ['Flashdisk Custom 08', 'Solusi corporate gift yang terasa personal karena hadir dengan logo perusahaan Anda.'],
    ];
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
          <span class="trust"><span class="dot"></span> Vendor Corporate Gift Sejak 2015 · 10000+ Customer Perusahaan</span>
          <h1 class="h1">Flashdisk Custom yang Membuat <span class="hl">Brand Anda Selalu Diingat</span></h1>
          <p class="lede">Bukan sekadar tempat menyimpan data. Flashdisk custom HERVENT menjadi corporate gift yang berguna, terasa personal, dan membawa identitas perusahaan Anda ke setiap aktivitas kerja.</p>
          <div class="hero-cta">
            <a href="{{ $whatsapp }}" class="btn b-red" target="_blank" rel="noopener noreferrer">
              <i data-lucide="whatsapp" class="wa-consult-icon" aria-hidden="true"></i>
              Konsultasi Gratis
            </a>
            <a href="#produk-flashdisk" class="btn b-line">Lihat Pilihan Flashdisk</a>
          </div>
          <ul class="hero-mini" aria-label="Keunggulan HERVENT">
            <li><b>Sejak 2015</b>11 tahun berpengalaman</li>
            <li><b>10000+</b>Customer perusahaan</li>
            <li><b>Custom</b>Logo dan kemasan</li>
            <li><b>PPN</b>Faktur pajak tersedia</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="wall sk-proof" aria-label="Klien HERVENT">
      <p>Dipercaya 10000+ customer perusahaan, BUMN, dan instansi pemerintah</p>
      @foreach($logoRows as $rowIndex => $row)
        <div class="rail {{ $rowIndex === 0 ? 'a' : 'b' }}" aria-hidden="true">
          @foreach(array_merge($row, $row) as $logo)
            <span class="slot"><img src="{{ asset('images/Logo Client Hervent/' . rawurlencode(basename($logo))) }}" alt=""></span>
          @endforeach
        </div>
      @endforeach
    </section>

    <section class="s sk-packages" id="produk-flashdisk">
      <div class="wrap">
        <div class="center sk-heading">
          <p class="eyebrow">Pilihan produk</p>
          <h2 class="h2">Pilih Flashdisk Custom Sesuai <span class="hl">Kebutuhan Brand Anda</span></h2>
          <p class="lede">Gunakan pilihan berikut sebagai referensi awal. Model, kapasitas, warna, logo, dan kemasan dapat disesuaikan bersama tim HERVENT.</p>
        </div>
        <div class="sk-package-grid">
          @foreach($productOptions as $index => [$title, $description])
            <article class="sk-package-card">
              <div class="flashdisk-product-placeholder" role="img" aria-label="Placeholder gambar {{ $title }}">
                <span class="flashdisk-placeholder-icon" aria-hidden="true"><i data-lucide="save"></i></span>
                <strong>Gambar produk menyusul</strong>
                <small>Placeholder flashdisk custom HERVENT</small>
              </div>
              <span class="sk-custom-badge">Custom By Request</span>
              <div>
                <p class="eyebrow">Flashdisk Corporate</p>
                <h3 class="h3">{{ $title }}</h3>
                <p>{{ $description }}</p>
              </div>
            </article>
          @endforeach
        </div>
        <div class="center cg-section-cta"><a href="{{ $whatsapp }}" class="btn b-red" target="_blank" rel="noopener noreferrer">Konsultasikan Model yang Cocok</a></div>
      </div>
    </section>

    <section class="s sk-benefits">
      <div class="wrap cg-two-col">
        <div><p class="eyebrow">Keunggulan HERVENT</p><h2 class="h2">Flashdisk yang Membawa <span class="hl">Cerita Brand Anda</span></h2><p class="lede">Kami membantu dari pemilihan model hingga proses produksi agar corporate gift Anda tampil relevan, fungsional, dan berkesan.</p></div>
        <div class="cg-benefit-list">
          @foreach([
            ['Bebas Pilih Model dan Kapasitas', 'Pilih model, kapasitas, warna, material, dan finishing yang sesuai dengan karakter perusahaan Anda.'],
            ['Logo Tampil Profesional', 'Logo dapat diaplikasikan pada produk atau kemasan untuk menjaga identitas brand tetap terlihat rapi.'],
            ['Gratis Desain dan Mockup', 'Lihat visual penempatan logo dan konsep kemasan terlebih dahulu sebelum produksi dimulai.'],
            ['Cocok untuk Berbagai Momen', 'Ideal untuk seminar, onboarding, gathering, anniversary, apresiasi klien, dan hadiah akhir tahun.'],
            ['Legalitas Resmi', 'Dokumen vendor dan faktur pajak tersedia untuk kebutuhan pengadaan perusahaan maupun instansi.'],
          ] as $index => [$title, $text])
            <article><span>0{{ $index + 1 }}</span><div><h3 class="h3">{{ $title }}</h3><p>{{ $text }}</p></div></article>
          @endforeach
        </div>
      </div>
    </section>

    <section class="s sk-gallery">
      <div class="wrap"><div class="center"><p class="eyebrow">Portofolio</p><h2 class="h2">Inspirasi Merchandise Custom untuk <span class="hl">Berbagai Kebutuhan</span></h2><p class="lede">Lihat beberapa hasil produksi dan referensi merchandise yang dapat dikembangkan bersama tim HERVENT.</p></div>
        <div class="sk-gallery-grid">
          @foreach($portfolioImages as $image)
            <img src="{{ asset($image) }}" alt="Portofolio merchandise custom HERVENT" loading="lazy">
          @endforeach
        </div>
      </div>
    </section>

    <section class="s cg-reviews sk-reviews">
      <div class="wrap"><div class="center"><p class="eyebrow">Testimoni</p><h2 class="h2">Kami Tidak Mengatakan Kami Terbaik, <span class="hl">Merekalah yang Mengatakannya</span></h2><p class="lede">Dipercaya lebih dari 10000 customer perusahaan dan instansi.</p></div>
        <div class="cg-review-grid sk-testimonial-grid">
          @foreach([
            ['Asraini Audia Hardarinata', 'Custom souvenir ke Bandung karena di Karawang harganya jauh lebih tinggi. HERVENT terbaik dari pelayanan, harga, dan kualitasnya.', '4 ulasan · 9 foto'],
            ['Sri Suci Wijayanti', 'Produk bagus sesuai yang ditawarkan. Pelayanannya ramah dan baik, jadi untuk yang mencari merchandise jangan ragu pesan di HERVENT.', '2 ulasan · 3 foto'],
            ['Nabila Rifda', 'Pertama kali pesan dan sangat puas dengan servicenya. Admin ramah, helpful, sabar saat revisi desain, dan waktu pengerjaan sesuai ekspektasi.', 'Local Guide · 77 ulasan'],
          ] as [$name, $quote, $meta])
            <blockquote><span class="cg-stars" aria-label="5 dari 5 bintang">★★★★★</span><p>“{{ $quote }}”</p><footer><strong>{{ $name }}</strong><span>{{ $meta }}</span></footer></blockquote>
          @endforeach
        </div>
        <p class="cg-review-disclaimer">*Ulasan nyata klien HERVENT yang dirangkum dari Google Reviews.</p>
        <h3 class="cg-google-title">Review Google Kami</h3>
        <div class="cg-google-grid">
          @foreach(['images/products/Testimoni/Hampers.jpg', 'images/products/Testimoni/Giftset.jpg', 'images/products/Testimoni/Flashdisk.jpg'] as $image)
            <a class="cg-google-card" href="{{ $googleMaps }}" target="_blank" rel="noopener noreferrer" aria-label="Lihat ulasan HERVENT di Google Maps"><img class="cg-google-review-image" src="{{ asset($image) }}" alt="Review klien HERVENT" loading="lazy"><div class="cg-google-card-foot"><span>Lihat review asli di Google Maps</span><span aria-hidden="true">→</span></div></a>
          @endforeach
        </div>
      </div>
    </section>

    <section class="s cg-guarantee"><div class="wrap cg-guarantee-box"><div class="cg-guarantee-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.75 20 6v5.7c0 4.75-3.4 8.1-8 9.55-4.6-1.45-8-4.8-8-9.55V6l8-3.25Z"/><path d="m8.7 12 2.15 2.15 4.45-4.45"/></svg></div><div><p class="eyebrow">Garansi HERVENT</p><h2 class="h2">Garansi yang Membuat Anda Tenang</h2><p>Hasil tidak sesuai mockup atau ada cacat produksi? Laporkan maksimal 7 hari setelah barang diterima dengan foto, dan unit akan kami ganti.</p></div></div></section>

    <section class="s cg-faq" id="faq"><div class="wrap"><div class="center"><p class="eyebrow">Pertanyaan</p><h2 class="h2">Pertanyaan Seputar Flashdisk Custom</h2></div><div class="cg-faq-list">
      @foreach([
        ['Apakah bisa custom logo dan warna?', 'Bisa. Logo, warna, model, kapasitas, dan penempatan desain dapat disesuaikan dengan identitas brand perusahaan Anda.'],
        ['Apakah tersedia kemasan custom?', 'Bisa. Kemasan dapat dibicarakan sesuai kebutuhan acara, jumlah, dan pengalaman penerima yang ingin dibangun.'],
        ['Apakah bisa dibuatkan mockup terlebih dahulu?', 'Bisa. Tim desain HERVENT membantu membuat visual penempatan logo sebelum produksi dimulai.'],
        ['Berapa lama waktu produksinya?', 'Estimasi bergantung pada jumlah, model, spesifikasi, dan jadwal produksi. Tim kami akan mengonfirmasi timeline setelah brief diterima.'],
        ['Apakah tersedia faktur pajak?', 'Tersedia. HERVENT dapat menyiapkan faktur pajak serta dokumen vendor untuk kebutuhan administrasi perusahaan dan instansi.'],
      ] as [$question, $answer])<details><summary>{{ $question }} <span aria-hidden="true">+</span></summary><p>{{ $answer }}</p></details>@endforeach
    </div></div></section>

    <section class="s cg-closing" id="konsultasi"><div class="wrap cg-closing-grid"><div><p class="eyebrow">Mulai konsultasi</p><h2 class="h2">Berikan Brand Anda Media untuk <span>Selalu Diingat.</span></h2><p class="lede">Ceritakan jumlah kebutuhan, model yang disukai, tanggal acara, dan perkiraan budget. Kami akan bantu pilihkan opsi yang realistis.</p><div class="cg-closing-actions"><a href="{{ $whatsapp }}" class="btn b-light" target="_blank" rel="noopener noreferrer">WhatsApp 0811-912-502</a><a href="mailto:cs@hervent.co.id" class="btn b-outline-light">cs@hervent.co.id</a></div></div><address class="cg-address-card"><strong>Kantor pusat — Bandung</strong><span>Komplek Istana Kawaluyaan RW04, Jl. Kawaluyaan Indah XVII No.11, Jatisari, Buahbatu, Kota Bandung 40286</span></address></div></section>
  </main>

  <footer class="cg-footer"><div class="wrap cg-footer-grid"><div class="cg-footer-brand"><img src="{{ asset('images/Logo Hervent Footer Website.png') }}" alt="HERVENT"><p>PT Aventama Hervent Solusindo. Corporate gift, promotional merchandise, dan souvenir kantor custom sejak 2009.</p><a class="cg-footer-site" href="https://hervent.co.id">Kunjungi hervent.co.id <span aria-hidden="true">↗</span></a></div><nav class="cg-footer-links" aria-label="Tautan cepat"><h2>Tautan cepat</h2><a href="https://hervent.co.id">Beranda</a><a href="#produk-flashdisk">Pilihan flashdisk</a><a href="#faq">FAQ</a><a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">Konsultasi gratis</a></nav><address class="cg-footer-contact"><h2>Kontak</h2><a href="tel:+622287324188">(022) 87324188</a><a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">0811-912-502</a><a href="mailto:cs@hervent.co.id">cs@hervent.co.id</a><span>Bandung, Indonesia</span></address></div><div class="wrap cg-footer-bottom"><span>© {{ date('Y') }} HERVENT. All rights reserved.</span><span>Flashdisk custom untuk corporate gift dan souvenir kantor.</span></div></footer>

  <a class="cg-floating-wa" href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer" aria-label="Ingin penawaran terbaik? Chat WhatsApp HERVENT" title="Chat WhatsApp">
    <i data-lucide="whatsapp" class="wa-floating-icon" aria-hidden="true"></i>
    <div class="cg-floating-wa-copy" aria-hidden="true"><b>Ingin Penawaran Terbaik?</b><strong>Chat WhatsApp</strong></div>
  </a>
</body>
</html>
