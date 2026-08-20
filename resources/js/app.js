const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');
const dropdowns = document.querySelectorAll('.nav-dropdown');

menuToggle?.addEventListener('click', () => {
    const isOpen = navLinks.classList.toggle('is-open');
    menuToggle.setAttribute('aria-expanded', String(isOpen));
});

dropdowns.forEach((dropdown) => {
    const trigger = dropdown.querySelector('.nav-dropdown-trigger');
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
        'Beranda': 'Home', 'Gift Set & Paket': 'Gift Set & Package', 'Produk': 'Products', 'Portofolio': 'Portfolio', 'Tentang kami': 'About', 'Blog': 'Blog',
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

function translatePage(language) {
    const dictionary = translations[language] || {};
    document.querySelectorAll('[data-i18n]').forEach((element) => {
        const key = element.dataset.i18n;
        element.textContent = dictionary[key] || key;
    });
    document.querySelectorAll('body *:not(script):not(style)').forEach((element) => {
        if (element.children.length || element.hasAttribute('data-i18n')) return;
        const currentText = element.textContent.trim();
        const original = element.dataset.translationKey || currentText;
        element.dataset.translationKey = original;
        element.textContent = dictionary[original] || original;
    });
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
