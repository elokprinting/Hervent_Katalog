<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Tentang HERVENT | Corporate Gift &amp; Promotional Product</title>
    <meta name="description" content="Tentang HERVENT, konsultan dan penyedia promotional product serta corporate gift sejak 2009.">
    <meta name="theme-color" content="#B81A1F">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="about-page">
    <svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
        <defs>
            <pattern id="aboutPattern" width="120" height="120" patternUnits="userSpaceOnUse">
                <path d="M0 0 L60 0 A60 60 0 0 1 0 60 Z" fill="currentColor"/>
                <path d="M60 60 L60 45 L75 45 L75 30 L90 30 L90 15 L105 15 L105 0 L120 0 L120 60 Z" fill="currentColor"/>
                <path d="M0 90 A30 30 0 0 1 60 90 L60 120 L0 120 Z" fill="currentColor"/>
                <circle cx="92" cy="80" r="8" fill="currentColor"/>
                <path d="M78 118 A26 26 0 0 1 78 66" fill="none" stroke="currentColor" stroke-width="11"/>
            </pattern>
        </defs>
    </svg>

    @include('partials.header')

    <main>
        <section class="about-hero on-red">
            <svg class="pat pat-w" aria-hidden="true"><rect width="100%" height="100%" fill="url(#aboutPattern)"/></svg>
            <div class="wrap about-hero-inner">
                <p class="eyebrow">Tentang HERVENT</p>
                <h1 class="h1">Membantu brand Anda <span class="hl">lebih diingat.</span></h1>
                <p class="lede">Konsultan dan penyedia promotional product serta corporate gift untuk membantu mengoptimalkan program promosi dan meningkatkan brand awareness perusahaan Anda.</p>
            </div>
        </section>

        <section class="s about-intro">
            <div class="wrap about-intro-grid">
                <div class="about-intro-title rv">
                    <p class="eyebrow">Siapa kami</p>
                    <h2 class="h2">Promosi yang punya <span class="hl">arah.</span></h2>
                </div>
                <div class="about-copy rv">
                    <p>HERVENT adalah sebuah perusahaan konsultan dan penyedia <b>promotional product &amp; corporate gift</b> yang berkomitmen untuk membantu mengoptimalisasi program promosi dan membantu meningkatkan brand awareness perusahaan Anda.</p>
                    <p>Kami telah berpengalaman lebih dari 10 tahun dalam menyediakan berbagai macam promotional product &amp; corporate gift untuk kebutuhan acara promosi, branding, product launching, gathering, workshop, seminar, pelatihan, serta kebutuhan kantor atau perusahaan lainnya.</p>
                </div>
            </div>
        </section>

        <section class="about-promise s">
            <div class="wrap about-promise-grid">
                <div class="about-promise-media rv">
                    <img src="{{ asset('images/Super Graphic.png') }}" alt="Pattern identitas HERVENT">
                </div>
                <div class="about-copy rv">
                    <p class="eyebrow">Cara kami membantu</p>
                    <h2 class="h2">Teman diskusi untuk pilihan yang <span class="hl">tepat.</span></h2>
                    <p>Tim HERVENT akan memandu dan menjadi teman diskusi Anda dalam memilih media barang promosi yang tepat untuk program yang Anda miliki. Kami menawarkan ratusan pilihan produk inovatif dan berkualitas yang dapat disesuaikan dengan kebutuhan promosi dan anggaran yang ada.</p>
                    <div class="about-stats">
                        <div><strong>2009</strong><span>Mulai mendampingi brand</span></div>
                        <div><strong>100+</strong><span>Pilihan produk promosi</span></div>
                        <div><strong>On-time</strong><span>Delivery yang terjaga</span></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-pillars s" id="pilar">
    <img
        class="pat n"
        src="/images/Super%20Graphic.png"
        alt=""
        aria-hidden="true",
        opacity="0.02"
    >

    <div class="wrap about-pillars-inner">
        <div class="about-pillars-heading rv">
            <p class="eyebrow">Empat pilar</p>
            <h2 class="h2">Pola di latar ini <span class="hl">punya arti.</span></h2>
            <p class="lede">
                Ornamen HERVENT disusun dari empat pilar yang jadi pegangan kerja seluruh tim —
                dan yang menentukan cara kami memperlakukan pesanan Anda.
            </p>
        </div>

        <div class="pillar-grid">
            <article class="pillar-card rv">
                <img class="pillar-mark" src="{{ asset('images/Icons/Supergraphic Hervent - Religius.png') }}" alt="Ikon Religius">
                <h3>Religius</h3>
                <p>Jujur soal harga, bahan, dan tanggal kirim — termasuk saat kabarnya kurang enak didengar.</p>
            </article>

            <article class="pillar-card rv">
                <img class="pillar-mark" src="{{ asset('images/Icons/Supergraphic Hervent - Integrity.png') }}" alt="Ikon Integrity">
                <h3>Integrity</h3>
                <p>Yang keluar dari produksi sama dengan yang ada di mockup yang Anda setujui.</p>
            </article>

            <article class="pillar-card rv">
                <img class="pillar-mark" src="{{ asset('images/Icons/Supergraphic Hervent - Commitment.png') }}" alt="Ikon Commitment for Excellent">
                <h3>Commitment for Excellent</h3>
                <p>Setiap batch lewat QC dan difoto sebelum dikemas, bukan diambil sampelnya saja.</p>
            </article>

            <article class="pillar-card rv">
                <img class="pillar-mark" src="{{ asset('images/Icons/Supergraphic Hervent - Happiness.png') }}" alt="Ikon Happiness">
                <h3>Happiness</h3>
                <p>Hadiah ini akhirnya dibuka orang. Kami rancang supaya momen bukanya terasa.</p>
            </article>
        </div>
    </div>
</section>
    </main>

    @include('partials.footer')
</body>
</html>
