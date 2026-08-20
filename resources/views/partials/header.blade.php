<header class="nav">
  <div class="wrap">
    <div class="nav-in">
      <a class="logo" href="{{ route('home') }}#top" aria-label="HERVENT beranda">
        <img src="{{ asset('images/Logo Landscape.png') }}" alt="HERVENT" style="height: 42px; width: auto;">
      </a>
      <nav class="menu" aria-label="Navigasi utama">
        <a href="{{ route('home') }}#setgift">Setgift &amp; Package</a>
        <div class="nav-item has-mega">
          <a href="{{ route('home') }}#products" style="cursor:pointer">Products <svg viewBox="0 0 12 8"><path d="M1 1l5 5 5-5"/></svg></a>
          <div class="mega-wrap">
            <div class="mega-new">
              <div class="mega-col" style="flex:0 0 200px">
                <p class="eyebrow" style="color:var(--g1);font-size:0.75rem;letter-spacing:0.1em;margin-bottom:1rem">GIFT SETS</p>
                <a href="{{ route('products.index', ['category' => 'gift-set-hampers']) }}" class="m-link"><span class="m-ic">🎁</span> Gift Sets</a>
              </div>
              <div class="mega-col" style="flex:1">
                <p class="eyebrow" style="color:var(--g1);font-size:0.75rem;letter-spacing:0.1em;margin-bottom:1rem">PRODUCTS</p>
                <div class="mega-grid">
                  <a href="{{ route('products.index', ['category' => 'card-holder']) }}" class="m-link"><span class="m-ic">💳</span> Card Holder</a>
                  <a href="{{ route('products.index', ['category' => 'table-clock']) }}" class="m-link"><span class="m-ic">🕰️</span> Table Clock</a>
                  <a href="{{ route('products.index', ['category' => 'clock']) }}" class="m-link"><span class="m-ic">⏱️</span> Clock</a>
                  <a href="{{ route('products.index', ['category' => 'seminar-kit']) }}" class="m-link"><span class="m-ic">💼</span> Seminar Kit</a>
                  <a href="{{ route('products.index', ['category' => 'calender']) }}" class="m-link"><span class="m-ic">📅</span> Calender</a>
                  <a href="{{ route('products.index', ['category' => 'bottle']) }}" class="m-link"><span class="m-ic">🍼</span> Bottle</a>
                  <a href="{{ route('products.index', ['category' => 'tumbler']) }}" class="m-link"><span class="m-ic">🥤</span> Tumbler</a>
                  <a href="{{ route('products.index', ['category' => 'thermos']) }}" class="m-link"><span class="m-ic">🌡️</span> Thermos</a>
                  <a href="{{ route('products.index', ['category' => 'packaging-accesoris']) }}" class="m-link"><span class="m-ic">📦</span> Packaging &amp; Accesoris</a>
                  <a href="{{ route('products.index', ['category' => 'pin']) }}" class="m-link"><span class="m-ic">📌</span> Pin</a>
                  <a href="{{ route('products.index', ['category' => 'straw-set']) }}" class="m-link"><span class="m-ic">🥤</span> Straw Set</a>
                  <a href="{{ route('products.index', ['category' => 'agenda-custom']) }}" class="m-link"><span class="m-ic">📓</span> Agenda Custom</a>
                  <a href="{{ route('products.index', ['category' => 'other']) }}" class="m-link"><span class="m-ic">✨</span> Other</a>
                  <a href="{{ route('products.index', ['category' => 'eco-friendly']) }}" class="m-link"><span class="m-ic">🌱</span> Eco-Friendly</a>
                  <a href="{{ route('products.index', ['category' => 'tas']) }}" class="m-link"><span class="m-ic">👜</span> Tas</a>
                  <a href="{{ route('products.index', ['category' => 'umbrella']) }}" class="m-link"><span class="m-ic">☂️</span> Umbrella</a>
                  <a href="{{ route('products.index', ['category' => 'mug']) }}" class="m-link"><span class="m-ic">☕</span> Mug</a>
                  <a href="{{ route('products.index', ['category' => 'lunch-box']) }}" class="m-link"><span class="m-ic">🍱</span> Lunch Box</a>
                  <a href="{{ route('products.index', ['category' => 'special-price']) }}" class="m-link"><span class="m-ic">🏷️</span> Special Price</a>
                  <a href="{{ route('products.index', ['category' => 'headset']) }}" class="m-link"><span class="m-ic">🎧</span> Headset</a>
                  <a href="{{ route('products.index', ['category' => 'flashdrive']) }}" class="m-link"><span class="m-ic">💾</span> Flashdrive</a>
                  <a href="{{ route('products.index', ['category' => 'paket-souvenir']) }}" class="m-link"><span class="m-ic">🛍️</span> Paket Souvenir</a>
                  <a href="{{ route('products.index', ['category' => 'power-bank']) }}" class="m-link"><span class="m-ic">🔋</span> Power Bank</a>
                  <a href="{{ route('products.index', ['category' => 'mouse']) }}" class="m-link"><span class="m-ic">🖱️</span> Mouse</a>
                  <a href="{{ route('products.index', ['category' => 'bluetooth']) }}" class="m-link"><span class="m-ic">📶</span> Bluetooth</a>
                  <a href="{{ route('products.index', ['category' => 'speaker']) }}" class="m-link"><span class="m-ic">🔊</span> Speaker</a>
                  <a href="{{ route('products.index', ['category' => 'travel-adapter']) }}" class="m-link"><span class="m-ic">🔌</span> Travel Adapter</a>
                  <a href="{{ route('products.index', ['category' => 'stationary']) }}" class="m-link"><span class="m-ic">✏️</span> Stationary</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="{{ route('home') }}#services">Services</a>
        <a href="{{ route('home') }}#portfolios">Portfolios</a>
        <a href="{{ route('home') }}#abouts">Abouts</a>
        <a href="{{ route('home') }}#blog">Blog</a>
        <div class="nav-item has-dropdown">
          <button style="cursor:pointer">ID / EN <svg viewBox="0 0 12 8"><path d="M1 1l5 5 5-5"/></svg></button>
          <div class="dropdown-wrap">
             <div class="dropdown">
               <a href="#">ID - Indonesia</a>
               <a href="#">EN - English</a>
             </div>
          </div>
        </div>
      </nav>
      <div class="nav-cta">
        <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener" style="border-radius:24px;padding:0.6rem 1.4rem;">Konsultasi Gratis <svg style="width:16px;height:16px;fill:currentColor;display:inline-block;margin-left:4px;vertical-align:-3px;" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.086 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg></a>
      </div>
      <button class="burger" id="burger" aria-expanded="false" aria-controls="drawer" aria-label="Buka menu"><i></i></button>
    </div>

    <!-- Drawer -->
    <div class="drawer" id="drawer">
      <a href="{{ route('home') }}#setgift">Setgift &amp; Package</a>
      <a href="{{ route('home') }}#products">Products</a>
      <a href="{{ route('home') }}#services">Services</a>
      <a href="{{ route('home') }}#portfolios">Portfolios</a>
      <a href="{{ route('home') }}#abouts">Abouts</a>
      <a href="{{ route('home') }}#blog">Blog</a>
      <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">Konsultasi Gratis</a>
    </div>
  </div>
</header>
