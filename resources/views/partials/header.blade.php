<header class="nav">
  <div class="wrap">
    <div class="nav-in">
      <a class="logo" href="{{ route('home') }}#top" aria-label="HERVENT beranda">
        <svg viewBox="0 0 100 96"><use href="#hvMark"/></svg>
        <span><b>HERVENT</b><i>REPRESENT YOUR VALUE</i></span>
      </a>
      <nav class="menu" aria-label="Navigasi utama">
        <a href="{{ route('home') }}#top">Beranda</a>
        <button id="megaBtn" aria-expanded="false" aria-controls="mega">
          Produk <svg viewBox="0 0 12 8"><path d="M1 1l5 5 5-5"/></svg>
        </button>
        <a href="{{ route('home') }}#koleksi">Koleksi</a>
        <a href="{{ route('home') }}#proses">Layanan</a>
        <a href="{{ route('home') }}#faq">FAQ</a>
        <a href="{{ route('home') }}#kontak">Kontak</a>
      </nav>
      <div class="nav-cta">
        <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">Konsultasi Gratis</a>
      </div>
      <button class="burger" id="burger" aria-expanded="false" aria-controls="drawer" aria-label="Buka menu"><i></i></button>
    </div>

    <!-- Mega menu -->
    <div class="mega" id="mega">
      <p class="eyebrow">Kategori produk</p>
      <div class="mega-g">
        <a href="{{ route('products.index', ['category' => 'drinkware']) }}"><span class="sq"></span>Drinkware</a>
        <a href="{{ route('products.index', ['category' => 'tas-totebag']) }}"><span class="sq"></span>Tas &amp; Totebag</a>
        <a href="{{ route('products.index', ['category' => 'apparel']) }}"><span class="sq"></span>Apparel</a>
        <a href="{{ route('products.index', ['category' => 'gadget-tech']) }}"><span class="sq"></span>Gadget &amp; Tech</a>
        <a href="{{ route('products.index', ['category' => 'powerbank']) }}"><span class="sq"></span>Powerbank</a>
        <a href="{{ route('products.index', ['category' => 'flashdisk']) }}"><span class="sq"></span>Flashdisk</a>
        <a href="{{ route('products.index', ['category' => 'agenda-notebook']) }}"><span class="sq"></span>Agenda &amp; Notebook</a>
        <a href="{{ route('products.index', ['category' => 'seminar-kit']) }}"><span class="sq"></span>Seminar Kit</a>
        <a href="{{ route('products.index', ['category' => 'payung']) }}"><span class="sq"></span>Payung</a>
        <a href="{{ route('products.index', ['category' => 'dompet-kulit']) }}"><span class="sq"></span>Dompet &amp; Kulit</a>
        <a href="{{ route('products.index', ['category' => 'plakat-trofi']) }}"><span class="sq"></span>Plakat &amp; Trofi</a>
        <a href="{{ route('products.index', ['category' => 'gift-set-hampers']) }}"><span class="sq"></span>Gift Set &amp; Hampers</a>
      </div>
      <div class="mega-ft">
        <p>Minimum order 50 pcs · Desain dan mockup gratis · Faktur pajak PPN tersedia</p>
        <a class="btn b-line" href="{{ route('home') }}#kalkulator">Hitung estimasi budget</a>
      </div>
    </div>

    <!-- Drawer -->
    <div class="drawer" id="drawer">
      <a href="{{ route('home') }}#kategori">Kategori produk</a>
      <a href="{{ route('home') }}#koleksi">Koleksi unggulan</a>
      <a href="{{ route('home') }}#kalkulator">Hitung estimasi budget</a>
      <a href="{{ route('home') }}#proses">Cara kerja</a>
      <a href="{{ route('home') }}#faq">FAQ</a>
      <a href="{{ route('home') }}#kontak">Kantor &amp; kontak</a>
      <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">Konsultasi Gratis</a>
    </div>
  </div>
</header>
