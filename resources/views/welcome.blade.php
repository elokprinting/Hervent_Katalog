<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Souvenir Kantor &amp; Corporate Gift Custom | HERVENT</title>
<meta name="description" content="Vendor corporate gift &amp; souvenir kantor custom sejak 2009. Desain gratis, faktur pajak PPN, kantor Bandung &amp; Surabaya. Dipercaya 4.500+ klien korporasi.">
<meta name="theme-color" content="#B81A1F">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<!-- Pattern 4 pilar -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
  <defs>
    <pattern id="hvPat" width="120" height="120" patternUnits="userSpaceOnUse">
      <path d="M0 0 L60 0 A60 60 0 0 1 0 60 Z" fill="currentColor"/>
      <path d="M60 60 L60 45 L75 45 L75 30 L90 30 L90 15 L105 15 L105 0 L120 0 L120 60 Z" fill="currentColor"/>
      <path d="M0 90 A30 30 0 0 1 60 90 L60 120 L0 120 Z" fill="currentColor"/>
      <circle cx="92" cy="80" r="8" fill="currentColor"/>
      <path d="M78 118 A26 26 0 0 1 78 66" fill="none" stroke="currentColor" stroke-width="11"/>
    </pattern>
    <g id="hvMark">
      <path d="M50 44 L96 68 L50 92 L4 68 Z" fill="#8B1417"/>
      <path d="M4 56 L4 68 L50 92 L50 80 Z" fill="#A2171B"/>
      <path d="M96 56 L96 68 L50 92 L50 80 Z" fill="#8B1417"/>
      <path d="M50 32 L96 56 L50 80 L4 56 Z" fill="#B81A1F"/>
      <path d="M31 47 L45 54 L45 46 L55 51 L55 59 L69 66 L59 71 L45 64 L45 72 L35 67 L35 59 L21 52 Z" fill="#FEFEFE"/>
      <path d="M50 8 L96 32 L50 56 L4 32 Z" fill="#B81A1F"/>
      <path d="M31 23 L45 30 L45 22 L55 27 L55 35 L69 42 L59 47 L45 40 L45 48 L35 43 L35 35 L21 28 Z" fill="#FEFEFE"/>
    </g>
  </defs>
</svg>

<!-- NAV -->
@include('partials.header')

<main id="top">

<!-- HERO -->
<section class="hero on-red">
  <svg class="pat pat-w" aria-hidden="true"><rect width="100%" height="100%" fill="url(#hvPat)"/></svg>
  <div class="wrap hero-in">
    <span class="trust"><span class="dot"></span> Dipercaya 4.500+ klien korporasi &amp; instansi</span>
    <h1 class="h1">Souvenir Kantor &amp; Corporate Gift Custom <span class="hl">untuk Perusahaan Anda</span></h1>
    <p class="lede">HERVENT membuat hadiah korporat yang mewakili nama baik perusahaan Anda — dari seminar kit sampai luxury hampers. Desain gratis, produksi terkontrol, kirim ke seluruh Indonesia.</p>
    <div class="hero-cta">
      <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        Konsultasi Gratis
      </a>
      <a class="btn b-line" href="#kalkulator">
        <svg viewBox="0 0 24 24"><path d="M12 3v12M7 10l5 5 5-5M5 21h14"/></svg>
        Hitung Estimasi Budget
      </a>
    </div>
    <ul class="hero-mini">
      <li><b>Sejak 2009</b>17 tahun pengalaman</li>
      <li><b>50 pcs</b>Minimum order</li>
      <li><b>Gratis</b>Desain &amp; mockup</li>
      <li><b>PPN</b>Faktur pajak tersedia</li>
    </ul>
  </div>
</section>

<!-- LOGO WALL -->
<section class="wall" aria-label="Klien HERVENT">
  <p>Klien kami</p>
  <div class="rail a" id="railA" aria-hidden="true"></div>
  <div class="rail b" id="railB" aria-hidden="true"></div>
</section>

<!-- COUNTER -->
<section class="count s">
  <svg class="pat pat-w" style="opacity:.05" aria-hidden="true"><rect width="100%" height="100%" fill="url(#hvPat)"/></svg>
  <div class="wrap count-g">
    <div class="rv"><b data-to="4500" data-suf="+">0</b><small>Klien korporasi dilayani</small></div>
    <div class="rv"><b data-to="17" data-suf=" thn">0</b><small>Pengalaman sejak 2009</small></div>
    <div class="rv"><b data-to="34" data-suf=" provinsi">0</b><small>Jangkauan pengiriman</small></div>
    <div class="rv"><b data-to="2" data-suf=" kota">0</b><small>Kantor: Bandung &amp; Surabaya</small></div>
  </div>
</section>

<!-- PROBLEM -->
<section class="s">
  <div class="wrap split">
    <div class="rv">
      <p class="eyebrow">Kenapa pilih HERVENT</p>
      <h2 class="h2">Acara tinggal tiga minggu, <span class="hl">vendor belum kirim mockup?</span></h2>
      <p class="lede">Itu masalah yang paling sering kami dengar dari tim HR dan GA. Di HERVENT prosesnya dikunci: brief dibalas dalam 1 hari kerja, mockup keluar sebelum produksi jalan, dan setiap batch difoto sebelum dikemas. Tidak ada kejutan menjelang hari-H.</p>
      <div class="hero-cta" style="justify-content:flex-start;margin-top:1.5rem">
        <a class="btn b-red" href="#proses">Lihat cara kerja</a>
        <a class="btn b-line" href="#faq">Baca FAQ</a>
      </div>
    </div>
    <div class="shot rv">
      <img src="{{ asset('images/Background.png') }}" alt="Workshop / Proses QC">
    </div>
  </div>
</section>

<!-- KEUNGGULAN -->
<section class="s" style="padding-top:0">
  <div class="wrap center">
    <p class="eyebrow rv" style="justify-content:center">Keunggulan</p>
    <h2 class="h2 rv">Mengapa <span class="hl">HERVENT</span>?</h2>
    <p class="lede rv">Tiga hal yang paling menentukan saat Anda harus mempertanggungjawabkan pilihan vendor ke atasan.</p>
    <div class="feat">
      <div class="f-card rv" style="text-align:left">
        <div class="f-ico"><svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg></div>
        <h3 class="h3">Desain &amp; Mockup Gratis</h3>
        <p>Tim desain menyesuaikan logo dan warna ke identitas perusahaan Anda. Revisi tanpa biaya tambahan, dan file mockup-nya Anda pegang untuk approval internal.</p>
      </div>
      <div class="f-card rv" style="text-align:left">
        <div class="f-ico"><svg viewBox="0 0 24 24"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M14 3v6h6M9 14h6M9 17h4"/></svg></div>
        <h3 class="h3">Legalitas &amp; Faktur Pajak</h3>
        <p>Badan hukum PT Aventama Hervent Solusindo dengan faktur pajak PPN dan dokumen vendor lengkap. Aman untuk proses registrasi di BUMN dan instansi pemerintah.</p>
      </div>
      <div class="f-card rv" style="text-align:left">
        <div class="f-ico"><svg viewBox="0 0 24 24"><path d="M12 3l8 3v6c0 4.5-3.2 7.9-8 9-4.8-1.1-8-4.5-8-9V6z"/><path d="M9 12l2 2 4-4"/></svg></div>
        <h3 class="h3">Garansi Cacat Produksi</h3>
        <p>Kalau hasil tidak sesuai mockup atau ada cacat produksi, unitnya kami ganti. Laporkan maksimal 7 hari setelah barang diterima, sertakan foto.</p>
      </div>
    </div>
  </div>
</section>

<!-- KOLEKSI -->
<section class="s" id="koleksi" style="padding-top:0">
  <div class="wrap">
    <div class="center">
      <p class="eyebrow rv" style="justify-content:center">Katalog</p>
      <h2 class="h2 rv">Koleksi <span class="hl">Unggulan</span></h2>
      <p class="lede rv">Paket yang paling sering diambil klien korporasi. Semua bisa disusun ulang isinya sesuai budget dan momen Anda.</p>
    </div>
    <div class="prods" id="prods">
        @foreach($bestSellers as $product)
        <a class="prod rv" href="{{ route('products.index') }}#product-{{ $product->id }}">
            <div class="ph">
                @if($loop->first)
                    <span class="badge">Terlaris</span>
                @elseif($loop->last)
                    <span class="badge">Favorit HR</span>
                @endif
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
            </div>
            <div class="prod-bd">
                <span class="cat">{{ $product->category_label }}</span>
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <span class="price">Mulai {{ $product->price_min ? 'Rp '.number_format($product->price_min, 0, ',', '.') : $product->price_label }} <span>/ pcs</span></span>
            </div>
        </a>
        @endforeach
    </div>
    <div class="center" style="margin-top:1.8rem">
      <a class="btn b-dark" href="#kategori">Lihat semua kategori</a>
    </div>
  </div>
</section>

<!-- KATEGORI -->
<section class="s" id="kategori" style="padding-top:0">
  <div class="wrap">
    <div class="center">
      <p class="eyebrow rv" style="justify-content:center">Jelajahi</p>
      <h2 class="h2 rv">Kategori <span class="hl">Produk</span></h2>
    </div>
    <div class="cats" id="cats">
        @foreach($categories as $category)
        <a class="cat-t rv" href="{{ route('products.index', ['category' => $category]) }}">
            <svg class="pat pat-w" style="opacity:.12"><rect width="100%" height="100%" fill="url(#hvPat)"/></svg>
            <b>{{ \Illuminate\Support\Str::headline($category) }}</b>
            <small>{{ $categoryCounts[$category] ?? 0 }} koleksi tersedia</small>
        </a>
        @endforeach
    </div>
  </div>
</section>

<!-- KALKULATOR -->
<section class="calc s" id="kalkulator">
  <div class="wrap center">
    <p class="eyebrow rv" style="justify-content:center">Alat bantu</p>
    <h2 class="h2 rv">Hitung estimasi budget <span class="hl">sebelum menghubungi kami</span></h2>
    <p class="lede rv">Isi jumlah penerima dan budget per orang. Kami tunjukkan estimasi anggaran dan kelas produk yang masuk — supaya obrolan langsung ke inti.</p>

    <div class="calc-box rv">
      <div class="calc-bd">
        <div class="fld">
          <label for="cMomen">Momen</label>
          <select id="cMomen">
            <option>Gathering &amp; anniversary</option>
            <option>Seminar &amp; training</option>
            <option>Hari raya &amp; hampers</option>
            <option>Onboarding karyawan</option>
            <option>Apresiasi klien &amp; VIP</option>
            <option>Event &amp; pameran</option>
          </select>
        </div>
        <div class="fld">
          <label for="cQty">Jumlah penerima</label>
          <input id="cQty" type="number" min="25" max="50000" step="25" value="250" inputmode="numeric">
        </div>
        <div class="fld">
          <label for="cPer">Budget per orang (Rp)</label>
          <select id="cPer">
            <option value="50000">50.000</option>
            <option value="75000">75.000</option>
            <option value="100000">100.000</option>
            <option value="150000" selected>150.000</option>
            <option value="250000">250.000</option>
            <option value="500000">500.000</option>
            <option value="750000">750.000</option>
            <option value="1000000">1.000.000</option>
          </select>
        </div>
      </div>
      <div class="calc-out">
        <div style="text-align:left">
          <small>Estimasi total anggaran</small>
          <div class="tot" id="cTot">Rp37.500.000</div>
        </div>
        <span class="kelas" id="cKelas">Signature</span>
        <a class="btn b-red" id="cWa" href="#" target="_blank" rel="noopener" style="background:var(--red);color:#fff;border-color:var(--red)">Kirim brief via WhatsApp</a>
      </div>
    </div>
    <p style="margin:1rem auto 0;font-size:.75rem;color:var(--g1);max-width:60ch">Estimasi, bukan penawaran resmi. Harga final menyesuaikan spesifikasi, jumlah, dan tanggal kirim.</p>
  </div>
</section>

<!-- PROSES -->
<section class="s on-dark" id="proses" style="background:var(--black);color:var(--white)">
  <div class="wrap">
    <p class="eyebrow rv">Cara kerja</p>
    <h2 class="h2 rv" style="max-width:18ch">Empat langkah, tanpa <span class="hl">bolak-balik</span>.</h2>
    <p class="lede rv">Urutannya tetap: tidak ada produksi sebelum mockup Anda setujui, dan tidak ada mockup sebelum kami paham penerimanya siapa.</p>
    <div class="steps rv">
      <div class="step"><b>01</b><h3>Brief</h3><p>Anda kirim momen, jumlah penerima, dan budget lewat WhatsApp, email, atau kalkulator di atas.</p><span class="d">Hari ke-0</span></div>
      <div class="step"><b>02</b><h3>Rekomendasi</h3><p>Kami kirim 3–5 opsi paket lengkap dengan rincian harga, MOQ, dan estimasi kirim.</p><span class="d">1 hari kerja</span></div>
      <div class="step"><b>03</b><h3>Mockup</h3><p>Desain penempatan logo dan kemasan, gratis. Revisi sampai Anda dan atasan Anda setuju.</p><span class="d">1–3 hari kerja</span></div>
      <div class="step"><b>04</b><h3>Produksi &amp; kirim</h3><p>Produksi berjalan dengan update foto QC, lalu dikirim ke satu atau banyak alamat cabang.</p><span class="d">7–21 hari kerja</span></div>
    </div>
  </div>
</section>

<!-- 4 PILAR -->
<section class="s" style="position:relative;overflow:hidden">
  <svg class="pat pat-r" aria-hidden="true"><rect width="100%" height="100%" fill="url(#hvPat)"/></svg>
  <div class="wrap split" style="position:relative;z-index:2">
    <div class="shot plain rv" style="order:2">
      <img src="{{ asset('images/Super Graphic.png') }}" alt="Implementasi pattern pada produk">
    </div>
    <div class="rv">
      <p class="eyebrow">Empat pilar</p>
      <h2 class="h2">Ornamen kami <span class="hl">punya arti</span>.</h2>
      <p class="lede">Pola geometris pada kemasan dan merchandise HERVENT disusun dari empat pilar yang jadi pegangan kerja seluruh tim: <b style="font-weight:600;color:var(--ink)">Religius</b> — jujur soal harga, bahan, dan tanggal kirim. <b style="font-weight:600;color:var(--ink)">Integrity</b> — hasil produksi sama dengan mockup yang Anda setujui. <b style="font-weight:600;color:var(--ink)">Commitment for Excellent</b> — setiap batch lewat QC dan difoto sebelum dikemas. <b style="font-weight:600;color:var(--ink)">Happiness</b> — hadiah ini akhirnya dibuka orang, dan momen bukanya kami rancang supaya terasa.</p>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="s" id="faq" style="padding-top:0">
  <div class="wrap">
    <div class="center">
      <p class="eyebrow rv" style="justify-content:center">Pertanyaan</p>
      <h2 class="h2 rv">Frequently Asked <span class="hl">Questions</span></h2>
    </div>
    <div class="faq rv">
      <details open>
        <summary>Bagaimana cara memesan di HERVENT?</summary>
        <p>Pilih kategori atau paket yang Anda minati, lalu hubungi tim kami lewat WhatsApp. Sebutkan momen acara, jumlah penerima, dan budget per orang. Tim kami membalas dengan 3–5 opsi paket beserta rincian harga dalam 1 hari kerja.</p>
      </details>
      <details>
        <summary>Berapa minimum order pemesanan?</summary>
        <p>Minimum order 50 pcs untuk item satuan, dan 25 set untuk gift set maupun hampers. Angka ini menjaga kualitas produksi sekaligus harga yang tetap kompetitif.</p>
      </details>
      <details>
        <summary>Apakah jasa desain dikenakan biaya?</summary>
        <p>Tidak. Semua pesanan sudah termasuk jasa desain dan mockup gratis, termasuk revisi sampai Anda setuju. File mockup diserahkan ke Anda untuk keperluan approval internal.</p>
      </details>
      <details>
        <summary>Berapa lama waktu pengerjaannya?</summary>
        <p>Sekitar 7–10 hari kerja untuk di bawah 100 pcs, 10–14 hari kerja untuk 500 pcs, dan 21–30 hari kerja untuk di atas 1.000 pcs. Perhitungan dimulai sejak mockup disetujui, bukan sejak PO masuk.</p>
      </details>
      <details>
        <summary>Apakah HERVENT menerbitkan faktur pajak?</summary>
        <p>Ya. HERVENT beroperasi sebagai PT Aventama Hervent Solusindo dan menerbitkan faktur pajak PPN. Dokumen vendor lengkap tersedia untuk proses registrasi di BUMN maupun instansi pemerintah.</p>
      </details>
      <details>
        <summary>Bagaimana ketentuan pembayarannya?</summary>
        <p>DP 50% saat PO diterbitkan, pelunasan sebelum pengiriman. Untuk instansi dan BUMN, termin pembayaran bisa menyesuaikan dokumen pengadaan Anda.</p>
      </details>
      <details>
        <summary>Bagaimana jika ada cacat produksi?</summary>
        <p>Unit yang cacat kami ganti tanpa biaya tambahan. Laporkan maksimal 7 hari setelah barang diterima dan sertakan foto sebagai bukti.</p>
      </details>
      <details>
        <summary>Apakah bisa kirim ke banyak alamat cabang?</summary>
        <p>Bisa. Pesanan dapat dipecah ke beberapa alamat sekaligus. Gratis ongkir berlaku untuk pengiriman dalam kapasitas 10 ton.</p>
      </details>
    </div>
  </div>
</section>

<!-- TESTIMONI -->
<section class="s" style="padding-top:0">
  <div class="wrap">
    <div class="center">
      <p class="eyebrow rv" style="justify-content:center">Testimoni</p>
      <h2 class="h2 rv">Dengar apa kata <span class="hl">klien kami</span></h2>
    </div>
    <div class="tst">
      <blockquote class="t-card rv">
        <p>“Saya kasih budget dan jumlah orang, besoknya sudah ada tiga opsi lengkap dengan harganya.”</p>
        <footer><span class="av">HR</span><div><b>HR Manager</b>Perusahaan asuransi</div></footer>
      </blockquote>
      <blockquote class="t-card rv">
        <p>“Mockup-nya membantu banget waktu saya harus presentasi ke direksi.”</p>
        <footer><span class="av">GA</span><div><b>GA Supervisor</b>Manufaktur</div></footer>
      </blockquote>
      <blockquote class="t-card rv">
        <p>“Kirim ke sembilan cabang, semuanya sampai sebelum acara.”</p>
        <footer><span class="av">ML</span><div><b>Marketing Lead</b>Jaringan klinik</div></footer>
      </blockquote>
    </div>
  </div>
</section>

<!-- QUOTE -->
<section class="quote s">
  <svg class="pat pat-w" style="opacity:.06" aria-hidden="true"><rect width="100%" height="100%" fill="url(#hvPat)"/></svg>
  <div class="wrap">
    <blockquote>“Kami tidak sekadar membuat souvenir. Kami memastikan hadiah Anda mewakili nama baik perusahaan.”</blockquote>
    <cite>HERVENT · Represent Your Value</cite>
  </div>
</section>

<!-- SEO -->
<section class="seo s">
  <div class="wrap center">
    <h2 class="h2 rv" style="font-size:clamp(1.25rem,2.6vw,1.6rem)">Solusi Corporate Gift &amp; Souvenir Kantor Custom Premium</h2>
    <p class="rv">HERVENT adalah mitra perusahaan untuk kebutuhan souvenir kantor custom, corporate gift, seminar kit, dan luxury hampers eksklusif. Beroperasi sejak 2009 di bawah PT Aventama Hervent Solusindo dengan kantor pusat di Bandung dan cabang di Surabaya, HERVENT telah melayani lebih dari 4.500 klien korporasi, BUMN, dan instansi pemerintah. Setiap produk — mulai dari tumbler branded, totebag custom, flashdisk kartu, agenda eksklusif, hingga gift set premium — dirancang menyesuaikan identitas brand perusahaan Anda. Tersedia jasa desain dan mockup gratis, faktur pajak PPN, garansi cacat produksi, serta pengiriman ke seluruh Indonesia.</p>
  </div>
</section>

<!-- CTA -->
<section class="cta s on-red" id="kontak">
  <svg class="pat pat-w" aria-hidden="true"><rect width="100%" height="100%" fill="url(#hvPat)"/></svg>
  <div class="wrap cta-in">
    <div class="rv">
      <p class="eyebrow">Jadi partner kami</p>
      <h2 class="h2">Reputasi brand Anda <span class="hl">adalah prioritas kami.</span></h2>
      <p class="lede">Kirim tanggal acara dan jumlah penerima. Kami balas dengan opsi yang masih realistis dikerjakan sampai tanggal itu.</p>
      <div class="hero-cta" style="justify-content:flex-start;margin-top:1.5rem">
        <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">WhatsApp 0811-912-502</a>
        <a class="btn b-line" href="mailto:cs@hervent.co.id">cs@hervent.co.id</a>
      </div>
    </div>
    <div class="offices rv">
      <div class="office">
        <b>Kantor pusat — Bandung</b>
        <span>Komplek Istana Kawaluyaan RW04, Jl. Kawaluyaan Indah XVII No.11, Jatisari, Buahbatu, Kota Bandung 40286</span>
      </div>
      <div class="office">
        <b>Cabang — Surabaya</b>
        <span>Graha Virto, Ruko Galaxi Bumi Permai Blok J-1 No. 23A, Jl. Raya Sukosemolo, Sukolilo, Surabaya 60119</span>
      </div>
    </div>
  </div>
</section>
</main>

<!-- FOOTER -->
<footer class="foot">
  <div class="wrap">
    <div class="foot-g">
      <div>
        <a class="logo" href="#top">
          <img src="{{ asset('images/Logo Landscape.png') }}" alt="HERVENT" style="height: 42px; width: auto; background: white; padding: 4px; border-radius: 4px;">
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
          <li><a href="#top">Beranda</a></li>
          <li><a href="#kategori">Kategori produk</a></li>
          <li><a href="#koleksi">Koleksi unggulan</a></li>
          <li><a href="#kalkulator">Hitung estimasi budget</a></li>
          <li><a href="#proses">Cara kerja</a></li>
          <li><a href="#faq">FAQ</a></li>
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

<!-- DOCK -->
<div class="dock">
  <div class="m">
    <small>Estimasi anggaran</small>
    <b id="dockTot">Rp37.500.000</b>
  </div>
  <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">Konsultasi</a>
</div>

</body>
</html>
