<footer class="foot">
  <div class="wrap">
    <div class="foot-g">
      <div>
        <a class="logo" href="{{ route('home') }}#top">
          <img src="{{ asset('images/Logo Hervent Footer Website.png') }}" alt="HERVENT" style="height: 42px; width: auto; background: black; padding: 4px; border-radius: 4px;">
        </a>
        <p style="margin:0 0 1.1rem;font-size:.85rem;font-weight:300;max-width:40ch">PT Aventama Hervent Solusindo. Corporate gift, promotional merchandise, dan souvenir kantor custom sejak 2009.</p>
        <div style="display:flex;gap:.5rem;flex-wrap:wrap">
          <a class="btn b-line" style="padding:.5rem 1rem;font-size:.78rem" href="https://wa.me/62811912502" target="_blank" rel="noopener">WhatsApp</a>
          <a class="btn b-line" style="padding:.5rem 1rem;font-size:.78rem" href="https://www.instagram.com/hervent.co.id/" target="_blank" rel="noopener">Instagram</a>
          <a class="btn b-line" style="padding:.5rem 1rem;font-size:.78rem" href="https://www.tiktok.com/@hervent.co.id" target="_blank" rel="noopener">TikTok</a>
        </div>
      </div>
      <div>
        <h4>Tautan cepat</h4>
        <ul>
          <li><a href="{{ route('home') }}#top">Beranda</a></li>
          <li><a href="{{ route('products.index') }}">Kategori produk</a></li>
          <li><a href="{{ route('home') }}#koleksi">Koleksi unggulan</a></li>
          <li>
            @if(request()->routeIs('home'))
              <button class="footer-catalog js-catalog-open" type="button">Download PDF Katalog</button>
            @else
              <a href="{{ route('home') }}#top">Download PDF Katalog</a>
            @endif
          </li>
          <li><a href="{{ route('home') }}#proses">Cara kerja</a></li>
          <li><a href="{{ route('home') }}#faq">FAQ</a></li>
        </ul>
      </div>
      <div>
        <h4>Kontak</h4>
        <ul>
          <li><a href="tel:02287324188">(022) 87324188</a></li>
          <li><a href="https://wa.me/62811912502">0811-912-502</a></li>
          <li><a href="mailto:cs@hervent.co.id">cs@hervent.co.id</a></li>
          <li>Bandung &amp; Surabaya</li>
          <li>Sen–Jum 09.00–17.00 · Sab 09.00–12.00</li>
        </ul>
      </div>
    </div>
    <div class="foot-b">
      <span>© {{ date('Y') }} HERVENT · PT Aventama Hervent Solusindo</span>
      <span>WhatsApp aktif 24/7</span>
    </div>
  </div>
</footer>
