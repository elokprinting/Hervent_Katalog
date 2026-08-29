<header class="nav">
  <div class="wrap">
    <div class="nav-in">
      <a class="logo" href="{{ route('home') }}#top" aria-label="HERVENT beranda">
        <img src="{{ asset('images/Logo Landscape.png') }}" alt="HERVENT" style="height: 42px; width: auto;">
      </a>
      <nav class="menu" aria-label="Navigasi utama">
        <a href="{{ route('giftsets.index') }}">{{ __('messages.header.giftset_package') }}</a>
        <div class="nav-item has-mega">
          <a href="{{ route('products.index') }}" style="cursor:pointer">{{ __('messages.header.products') }} <svg class="nav-chevron" viewBox="0 0 12 8" aria-hidden="true"><path d="M1 1l5 5 5-5"/></svg></a>
          <div class="mega-wrap">
            <div class="mega-inner-box">
              
              @php
                $productMenuCategories = [
                  [
                    'label' => 'Apparel & Lifestyle',
                    'items' => [
                      ['label' => 'Baseball Hat', 'category' => 'baseball-hat', 'icon' => 'shirt'],
                      ['label' => 'Jacket', 'category' => 'jacket', 'icon' => 'shirt'],
                      ['label' => 'Polo Shirt', 'category' => 'polo-shirt', 'icon' => 'shirt'],
                      ['label' => 'T-Shirt', 'category' => 't-shirt', 'icon' => 'shirt'],
                      ['label' => 'Umbrella', 'category' => 'umbrella', 'icon' => 'umbrella'],
                    ],
                  ],
                  [
                    'label' => 'Bags & Pouch',
                    'items' => [
                      ['label' => 'Backpack', 'category' => 'backpack', 'icon' => 'shopping-bag'],
                      ['label' => 'Pouch', 'category' => 'pouch', 'icon' => 'shopping-bag'],
                      ['label' => 'Sling Bag', 'category' => 'sling-bag', 'icon' => 'shopping-bag'],
                      ['label' => 'Tote Bag', 'category' => 'tote-bag', 'icon' => 'shopping-bag'],
                      ['label' => 'Waist Bag', 'category' => 'waist-bag', 'icon' => 'shopping-bag'],
                    ],
                  ],
                  [
                    'label' => 'Drinkware & Dining',
                    'items' => [
                      ['label' => 'Lunch Box', 'category' => 'lunch-box', 'icon' => 'utensils'],
                      ['label' => 'Tumbler', 'category' => 'tumbler', 'icon' => 'cup-soda'],
                    ],
                  ],
                  [
                    'label' => 'Gift Sets',
                    'items' => [
                      ['label' => 'Ethnic Echo', 'category' => 'ethnic-echo', 'icon' => 'gift'],
                      ['label' => 'Supreme Spectra', 'category' => 'supreme-spectra', 'icon' => 'gift'],
                      ['label' => 'Synergi Seminar Package', 'category' => 'synergi-seminar-package', 'icon' => 'gift'],
                    ],
                  ],
                  [
                    'label' => 'Office & Stationery',
                    'items' => [
                      ['label' => 'Agenda Custom', 'category' => 'agenda-custom', 'icon' => 'notebook'],
                      ['label' => 'Card Holder', 'category' => 'card-holder', 'icon' => 'credit-card'],
                      ['label' => 'Desk Calendar', 'category' => 'desk-calendar', 'icon' => 'calendar'],
                      ['label' => 'Pen Pinnacle', 'category' => 'pen-pinnacle', 'icon' => 'pencil'],
                      ['label' => 'Table Clock', 'category' => 'table-clock', 'icon' => 'alarm-clock'],
                    ],
                  ],
                  [
                    'label' => 'Tech & Gadgets',
                    'items' => [
                      ['label' => 'Bluetooth Speaker', 'category' => 'bluetooth-speaker', 'icon' => 'speaker'],
                      ['label' => 'Flashdrive', 'category' => 'flashdrive', 'icon' => 'save'],
                      ['label' => 'Mouse', 'category' => 'mouse', 'icon' => 'mouse'],
                      ['label' => 'Powerbank', 'category' => 'powerbank', 'icon' => 'battery-charging'],
                      ['label' => 'Travel Adaptor', 'category' => 'travel-adaptor', 'icon' => 'plug'],
                    ],
                  ],
                ];
              @endphp

              {{-- Kategori momen --}}
              <div class="mega-top-section">
                <div class="mega-section-title">Solusi untuk setiap momen</div>
                <div class="mega-moment-row">
                  @foreach([
                    ['label' => 'Corporate Gift', 'category' => 'onboarding-karyawan', 'icon' => 'gift'],
                    ['label' => 'Seminar & Training', 'category' => 'seminar-training', 'icon' => 'briefcase'],
                    ['label' => 'Gathering & Anniversary', 'category' => 'gathering-anniversary', 'icon' => 'sparkles'],
                    ['label' => 'Client Appreciation', 'category' => 'apresiasi-klien-vip', 'icon' => 'crown'],
                    ['label' => 'Events & Exhibition', 'category' => 'event-pameran', 'icon' => 'layout-grid'],
                    ['label' => 'Holiday & Hampers', 'category' => 'holidays-hampers', 'icon' => 'gift'],
                  ] as $moment)
                    <a href="{{ route('products.index', ['catalog' => $moment['category']]) }}" class="mega-moment-item">
                      <i data-lucide="{{ $moment['icon'] }}" class="m-ic"></i>
                      <span>{{ $moment['label'] }}</span>
                    </a>
                  @endforeach
                </div>
              </div>

              {{-- Jenis produk --}}
              <div class="mega-bottom-section">
                <div class="mega-cat-row">
                  @foreach($productMenuCategories as $menuCategory)
                  <div class="mega-cat-hover-item">
                    <div class="mega-cat-head">{{ $menuCategory['label'] }} <svg viewBox="0 0 12 8" class="cat-arrow"><path d="M1 1l5 5 5-5"/></svg></div>
                    <div class="mega-cat-dropdown">
                      @foreach($menuCategory['items'] as $item)
                        <a href="{{ route('products.index', ['category' => $item['category']]) }}" class="m-link"><i data-lucide="{{ $item['icon'] }}" class="m-ic"></i><span>{{ $item['label'] }}</span></a>
                      @endforeach
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

            </div>
          </div>
        </div>
        <a href="{{ route('services') }}">{{ __('messages.header.services') }}</a>
        <a href="{{ route('giftsets.index') }}">{{ __('messages.header.portfolios') }}</a>
        <a href="{{ route('about') }}">{{ __('messages.header.about') }}</a>
        <a href="{{ route('blog.index') }}">{{ __('messages.header.blog') }}</a>
        <div class="nav-item has-dropdown">
          <button style="cursor:pointer">ID / EN <svg viewBox="0 0 12 8"><path d="M1 1l5 5 5-5"/></svg></button>
          <div class="dropdown-wrap">
             <div class="dropdown">
               <a href="{{ route('lang.switch', 'id') }}" data-lang-btn="id">ID - Indonesia</a>
               <a href="{{ route('lang.switch', 'en') }}" data-lang-btn="en">EN - English</a>
             </div>
          </div>
        </div>
      </nav>
      <div class="nav-cta">
        <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener" style="border-radius:15px;padding:0.6rem 1.4rem;">{{ __('messages.header.free_consultation') }} <svg style="width:15px;height:16px;fill:currentColor;display:inline-block;margin-left:4px;vertical-align:-3px;" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.086 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg></a>
      </div>
      <button class="burger" id="burger" aria-expanded="false" aria-controls="drawer" aria-label="Buka menu"><i></i></button>
    </div>

    <!-- Drawer -->
    <div class="drawer" id="drawer">
      <a href="{{ route('giftsets.index') }}">{{ __('messages.header.giftset_package') }}</a>
      <a href="{{ route('products.index') }}">{{ __('messages.header.products') }}</a>
      <a href="{{ route('services') }}">{{ __('messages.header.services') }}</a>
      <a href="{{ route('giftsets.index') }}">{{ __('messages.header.portfolios') }}</a>
      <a href="{{ route('about') }}">{{ __('messages.header.about') }}</a>
      <a href="{{ route('blog.index') }}">{{ __('messages.header.blog') }}</a>
      <div class="drawer-lang" aria-label="Pilih bahasa">
        <a href="{{ route('lang.switch', 'id') }}" data-lang-btn="id">ID - Indonesia</a>
        <a href="{{ route('lang.switch', 'en') }}" data-lang-btn="en">EN - English</a>
      </div>
      <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">{{ __('messages.header.free_consultation') }}</a>
    </div>
  </div>
</header>
