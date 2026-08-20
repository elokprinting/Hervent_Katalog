@php
    $productMenu = [
        'Card Holder', 'Table Clock', 'Clock', 'Seminar Kit', 'Calender', 'Bottle', 'Tumbler', 'Thermos',
        'Packaging & Accesoris', 'Pin', 'Straw Set', 'Agenda Custom', 'Other', 'Eco-Friendly', 'Tas',
        'Umbrella', 'Mug', 'Lunch Box', 'Special Price', 'Headset', 'Flashdrive', 'Paket Souvenir',
        'Power Bank', 'Mouse', 'Bluetooth', 'Speaker', 'Travel Adapter', 'Stationary',
    ];
@endphp
<header class="site-header">
    <div class="container nav">
        <a class="brand" href="{{ route('home') }}#beranda" aria-label="Hervent Beranda"><span class="brand-mark">H</span><span>HERVENT<small>REPRESENT YOUR VALUE</small></span></a>
        <button class="menu-toggle" aria-label="Buka menu" aria-expanded="false">&#9776;</button>
        <nav class="nav-links">
            <a href="{{ route('products.index') }}" data-i18n="Set Hadiah">Set Hadiah</a>
            <div class="nav-dropdown nav-products">
                <button class="nav-dropdown-trigger" type="button" aria-expanded="false"><span data-i18n="Produk">Produk</span><span class="nav-chevron">&#8964;</span></button>
                <div class="mega-menu" role="menu">
                    <div class="mega-menu-intro"><span class="mega-menu-kicker" data-i18n="Koleksi Produk">Koleksi Produk</span><strong data-i18n="Temukan produk yang tepat">Temukan produk yang tepat</strong><a href="{{ route('products.index') }}" data-i18n="Lihat semua produk">Lihat semua produk &#8594;</a></div>
                    <div class="mega-menu-list">
                        @foreach($productMenu as $menuProduct)
                            <a role="menuitem" href="{{ route('products.index', ['category' => \Illuminate\Support\Str::slug($menuProduct)]) }}">{{ $menuProduct }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ route('home') }}#portfolio" data-i18n="Portofolio">Portofolio</a>
            <a href="{{ route('home') }}#about" data-i18n="Tentang kami">Tentang kami</a>
            <a href="{{ route('home') }}#blog" data-i18n="Blog">Blog</a>
            <div class="language-menu nav-dropdown">
                <button class="language-trigger nav-dropdown-trigger" type="button" aria-expanded="false" aria-label="Pilih bahasa"><span class="language-globe">文</span><span class="language-current">ID</span><span class="nav-chevron">&#8964;</span></button>
                <div class="language-options" role="menu">
                    <button type="button" data-language="id" role="menuitem"><span class="flag-dot flag-id">ID</span><span><strong>Bahasa Indonesia</strong><small>Indonesia</small></span></button>
                    <button type="button" data-language="en" role="menuitem"><span class="flag-dot flag-en">EN</span><span><strong>English</strong><small>United States</small></span></button>
                </div>
            </div>
            <a class="button consultation-button" href="https://wa.me/62811912502" target="_blank"><span class="button-icon">&#9993;</span><span data-i18n="Konsultasi Gratis">Konsultasi Gratis</span></a>
        </nav>
    </div>
</header>
