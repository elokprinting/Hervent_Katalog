const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');
const dropdowns = document.querySelectorAll('.nav-dropdown');

menuToggle?.addEventListener('click', () => {
    const isOpen = navLinks.classList.toggle('is-open');
    menuToggle.setAttribute('aria-expanded', String(isOpen));
});

function openDropdown(dropdown) {
    dropdowns.forEach((other) => {
        const isCurrent = other === dropdown;
        other.classList.toggle('is-open', isCurrent);
        other.querySelector('.nav-dropdown-trigger')?.setAttribute('aria-expanded', String(isCurrent));
    });
}

dropdowns.forEach((dropdown) => {
    const trigger = dropdown.querySelector('.nav-dropdown-trigger');
    dropdown.addEventListener('mouseenter', () => openDropdown(dropdown));
    trigger?.addEventListener('click', (event) => {
        event.stopPropagation();
        const isOpen = dropdown.classList.toggle('is-open');
        trigger.setAttribute('aria-expanded', String(isOpen));
        dropdowns.forEach((other) => {
            if (other === dropdown) return;
            other.classList.remove('is-open');
            other.querySelector('.nav-dropdown-trigger')?.setAttribute('aria-expanded', 'false');
        });
    });
});

document.addEventListener('click', () => {
    dropdowns.forEach((dropdown) => {
        dropdown.classList.remove('is-open');
        dropdown.querySelector('.nav-dropdown-trigger')?.setAttribute('aria-expanded', 'false');
    });
});

navLinks?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
    navLinks.classList.remove('is-open');
    menuToggle?.setAttribute('aria-expanded', 'false');
}));

const quantity = document.querySelector('#quantity');
const budget = document.querySelector('#budget');
const estimate = document.querySelector('#estimate');

function updateEstimate() {
    const total = Math.max(1, Number(quantity?.value || 1)) * Number(budget?.value || 100000);
    if (estimate) estimate.textContent = `Rp ${total.toLocaleString('id-ID')}`;
}

quantity?.addEventListener('input', updateEstimate);
budget?.addEventListener('change', updateEstimate);

const translations = {
    en: {
        'Beranda': 'Home', 'Set Hadiah': 'Gift Set & Package', 'Produk': 'Products', 'Portofolio': 'Portfolio', 'Tentang kami': 'About', 'Blog': 'Blog',
        'Souvenir Kantor & Corporate Gift Custom': 'Custom Office Souvenirs & Corporate Gifts', 'untuk Perusahaan Anda': 'for Your Company',
        'Konsultasi Gratis': 'Free Consultation', 'PDF Katalog': 'PDF Catalog', 'Hitung Estimasi Budget': 'Calculate Your Budget', 'Gratis': 'Free', 'PPN': 'VAT',
        'Brand & Perusahaan Indonesia': 'Indonesian Brands & Companies', 'Produk favorit untuk momen yang tidak boleh biasa.': 'Favorite products for moments that should never feel ordinary.',
        'Paket yang paling sering dipilih klien korporasi. Semua bisa disusun ulang isinya sesuai budget dan momen Anda.': 'The packages most often chosen by corporate clients. Contents can be customized to fit your budget and occasion.',
        'Dari gift set eksekutif sampai perlengkapan event, pilih koleksi yang paling sesuai dengan cerita brand Anda.': 'From executive gift sets to event essentials, choose the collection that best fits your brand story.',
        'Kami membantu Anda terlihat siap di setiap momen penting. Dari brief pertama sampai paket tiba, semua bergerak dengan satu tim.': 'We help you look prepared for every important moment. From the first brief until delivery, one team handles it all.',
        'Kurasi yang relevan': 'Relevant curation', '3-5 opsi paket disusun berdasarkan penerima, momen, dan budget Anda.': '3-5 package options curated around your recipients, occasion, and budget.',
        'Mockup gratis': 'Free mockup', 'Logo dan kemasan divisualkan sebelum produksi berjalan.': 'Your logo and packaging are visualized before production begins.',
        'QC terkontrol': 'Controlled QC', 'Foto quality check dikirim sebelum paket meninggalkan gudang kami.': 'Quality check photos are sent before your packages leave our warehouse.',
        'Distribusi nasional': 'Nationwide distribution', 'Kirim ke satu alamat atau banyak cabang di seluruh Indonesia.': 'Ship to one address or multiple branches across Indonesia.',
        'Dapatkan kisaran budget dalam hitungan detik. Angka ini menjadi titik awal diskusi, bukan harga final.': 'Get a budget range in seconds. This is a starting point for discussion, not the final price.',
        'Tidak ada produksi sebelum mockup Anda setujui, dan tidak ada mockup sebelum kami paham penerimanya siapa.': 'Production never starts before you approve the mockup, and we never create a mockup before understanding its recipients.',
        'Anda kirim momen, jumlah penerima, dan budget lewat WhatsApp, email, atau kalkulator di atas.': 'Send us the occasion, number of recipients, and budget via WhatsApp, email, or the calculator above.',
        'Hari ke-0': 'Day 0', 'Rekomendasi': 'Recommendation', 'Kami kirim 3-5 opsi paket lengkap dengan rincian harga, MOQ, dan estimasi kirim.': 'We send 3-5 complete package options with pricing, MOQ, and delivery estimates.',
        '1 hari kerja': '1 business day', '1-3 hari kerja': '1-3 business days', '+ Brand & Perusahaan Indonesia': '+ Indonesian Brands & Companies',
        'Desain penempatan logo dan kemasan, gratis. Revisi sampai Anda dan atasan Anda setuju.': 'We design the logo placement and packaging for free. Revise until you and your manager approve.',
        'Produksi berjalan dengan update foto QC, lalu dikirim ke satu atau banyak alamat cabang.': 'Production continues with QC photo updates, then ships to one or multiple branch addresses.',
        '7-21 hari kerja': '7-21 business days', 'Berapa minimum order Hervent?': 'What is Hervent\'s minimum order?',
        'Minimum order mulai dari 50 pcs, namun beberapa produk premium tersedia mulai 25 pcs. Tim kami akan memberi opsi terbaik untuk kebutuhan Anda.': 'Minimum orders start at 50 pieces, while some premium products are available from 25 pieces. Our team will recommend the best option for your needs.',
        'Apakah bisa kirim ke banyak alamat?': 'Can you ship to multiple addresses?', 'Bisa. Kami mendukung pengiriman ke kantor pusat, cabang, maupun alamat penerima individual di seluruh Indonesia.': 'Yes. We ship to head offices, branches, and individual recipient addresses across Indonesia.',
        'Berapa lama proses produksinya?': 'How long does production take?', 'Estimasi produksi 7-21 hari kerja setelah mockup disetujui, tergantung produk dan jumlah pesanan.': 'Production takes an estimated 7-21 business days after mockup approval, depending on the product and order quantity.',
        'Apakah desain dan mockup dikenakan biaya?': 'Are design and mockups charged?', 'Tidak. Desain penempatan logo dan mockup kemasan kami berikan gratis sebelum Anda memutuskan produksi.': 'No. We provide logo placement designs and packaging mockups for free before you decide to produce.',
        'Become our partner': 'Become our partner', 'Reputasi brand Anda adalah prioritas kami.': 'Your brand reputation is our priority.',
        'Kirim tanggal acara dan jumlah penerima. Kami balas dengan opsi yang masih realistis dikerjakan sampai tanggal itu.': 'Send us your event date and number of recipients. We will reply with options that can realistically be completed by then.',
        'Kantor pusat — Bandung': 'Head office — Bandung', 'Corporate gift, promotional merchandise, dan souvenir kantor custom sejak 2009.': 'Corporate gifts, promotional merchandise, and custom office souvenirs since 2009.',
        'Sen-Jum 09.00-17.00': 'Mon-Fri 09:00-17:00', 'Sab 09.00-12.00': 'Sat 09:00-12:00',
        'Konsultasi Gratis': 'Free Consultation', 'Koleksi Produk': 'Product Collection', 'Temukan produk yang tepat': 'Find the right product',
        'Lihat semua produk': 'View all products', 'Dipercaya oleh': 'Trusted by', 'Dipercaya 4.500+ klien korporasi & instansi': 'Trusted by 4,500+ corporate and institutional clients',
        'untuk Perusahaan Anda': 'for Your Company', 'Katalog pilihan': 'Featured catalog', 'Kategori produk': 'Product categories',
        'Temukan paket yang pas untuk penerima Anda.': 'Find the right package for your recipients.', 'Buka katalog →': 'Open catalog →',
        'Kenapa Hervent': 'Why Hervent', 'Alat bantu': 'Budget tool', 'Cara kerja': 'How it works', 'Tautan cepat': 'Quick links',
        'Hubungi kami': 'Contact us', 'Jam operasional': 'Opening hours', 'Koleksi unggulan': 'Featured collection',
        'Hitung estimasi budget': 'Calculate budget estimate', 'Pertanyaan yang biasanya muncul sebelum mulai.': 'Questions that usually come up before we start.',
        'Empat langkah, tanpa bolak-balik.': 'Four steps, no back and forth.', 'Mulai dari angka yang Anda punya.': 'Start with the number you have.',
        'Pengadaan gift tanpa drama dan tanpa kejutan biaya.': 'Corporate gifting without the drama or surprise costs.',
        'Jumlah penerima': 'Number of recipients', 'Budget per orang': 'Budget per person', 'Estimasi total paket': 'Estimated package total',
        'Kirim kebutuhan via WhatsApp': 'Send your needs via WhatsApp', 'Sejak 2009': 'Since 2009', 'Minimum order': 'Minimum order',
        'Desain & mockup': 'Design & mockup', 'Faktur pajak tersedia': 'Tax invoice available', 'Brief': 'Brief', 'Rekomendasi': 'Recommendation',
        'Produksi & kirim': 'Production & delivery', 'WhatsApp aktif 24/7': 'WhatsApp active 24/7', 'Butuh paket custom?': 'Need a custom package?',
        'Konsultasi': 'Consultation', 'Semua produk': 'All products', 'Koleksi pilihan': 'Featured collection', 'Hasil pencarian': 'Search results',
        'Terbaru': 'Newest', 'Harga terendah': 'Lowest price', 'Harga tertinggi': 'Highest price', 'Tampilkan': 'Show', 'produk ditemukan': 'products found',
        'Tanya produk →': 'Ask about product →', 'Produk tidak ditemukan': 'No products found', 'Reset katalog': 'Reset catalog',
        'Sudah menemukan yang cocok?': 'Found what you need?', 'Jadi partner kami': 'Become our partner', 'Bandung': 'Bandung',
    },
};
const originalTextNodes = new WeakMap();

function translatePage(language) {
    const dictionary = translations[language] || {};
    document.querySelectorAll('[data-i18n]').forEach((element) => {
        const key = element.dataset.i18n;
        element.textContent = dictionary[key] || key;
    });
    const textWalker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT);
    const textNodes = [];
    let textNode;
    while ((textNode = textWalker.nextNode())) textNodes.push(textNode);
    textNodes.forEach((node) => {
        if (!node.nodeValue.trim() || node.parentElement?.closest('script, style')) return;
        const original = originalTextNodes.get(node) || node.nodeValue.trim();
        originalTextNodes.set(node, original);
        if (dictionary[original]) {
            node.nodeValue = node.nodeValue.replace(node.nodeValue.trim(), dictionary[original]);
        }
    });
    const title = document.querySelector('title');
    const description = document.querySelector('meta[name="description"]');
    if (title) title.textContent = language === 'en' ? 'Hervent | Custom Corporate Gifts for Companies' : 'Hervent | Corporate Gift Custom untuk Perusahaan';
    if (description) description.setAttribute('content', language === 'en' ? 'Custom corporate gifts, promotional merchandise, and office souvenirs since 2009.' : 'Corporate gift, promotional merchandise, dan souvenir kantor custom sejak 2009.');
    document.documentElement.lang = language;
}

function setLanguage(language) {
    const selectedLanguage = language === 'en' ? 'en' : 'id';
    localStorage.setItem('hervent-language', selectedLanguage);
    const current = document.querySelector('.language-current');
    if (current) current.textContent = selectedLanguage.toUpperCase();
    document.querySelectorAll('[data-language]').forEach((button) => button.classList.toggle('is-active', button.dataset.language === selectedLanguage));
    translatePage(selectedLanguage);
}

const savedLanguage = localStorage.getItem('hervent-language') || 'id';
document.querySelectorAll('[data-language]').forEach((button) => button.addEventListener('click', (event) => {
    event.stopPropagation();
    setLanguage(button.dataset.language);
    button.closest('.nav-dropdown')?.classList.remove('is-open');
}));
setLanguage(savedLanguage);

const counters = document.querySelectorAll('.counter');
if ('IntersectionObserver' in window) {
    const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const counter = entry.target;
            const target = Number(counter.dataset.target || 0);
            const start = performance.now();
            const tick = (now) => {
                const progress = Math.min((now - start) / 1400, 1);
                counter.textContent = Math.floor(progress * target).toLocaleString('id-ID');
                if (progress < 1) requestAnimationFrame(tick);
            };
            requestAnimationFrame(tick);
            observer.unobserve(counter);
        });
    }, { threshold: 0.35 });
    counters.forEach((counter) => counterObserver.observe(counter));
}
