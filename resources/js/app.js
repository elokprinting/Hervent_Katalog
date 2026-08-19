const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');

menuToggle?.addEventListener('click', () => {
	const isOpen = navLinks.classList.toggle('is-open');
	menuToggle.setAttribute('aria-expanded', String(isOpen));
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
	estimate.textContent = `Rp ${total.toLocaleString('id-ID')}`;
}

quantity?.addEventListener('input', updateEstimate);
budget?.addEventListener('change', updateEstimate);

const languageSelect = document.querySelector('#language-select');
const translations = {
	'en': {
		'Beranda': 'Home', 'Produk': 'Products', 'Keunggulan': 'Why Hervent', 'Cara kerja': 'How it works', 'Kontak': 'Contact',
		'Konsultasi Gratis': 'Free Consultation', 'Dipercaya 4.500+ klien korporasi & instansi': 'Trusted by 4,500+ corporate and institutional clients',
		'untuk Perusahaan Anda': 'for Your Company', 'Katalog pilihan': 'Featured catalog', 'Kenapa Hervent': 'Why Hervent',
		'Alat bantu': 'Budget tool', 'Cara kerja': 'How it works', 'FAQ': 'FAQ', 'Tautan cepat': 'Quick links', 'Hubungi kami': 'Contact us',
		'Jam operasional': 'Opening hours', 'Kategori produk': 'Product categories', 'Koleksi unggulan': 'Featured collection',
		'Hitung estimasi budget': 'Calculate budget estimate', 'Mulai konsultasi →': 'Start consultation →', 'Represent your value.': 'Represent your value.',
		'Pertanyaan yang biasanya muncul sebelum mulai.': 'Questions that usually come up before we start.',
		'Empat langkah, tanpa bolak-balik.': 'Four steps, no back and forth.', 'Mulai dari angka yang Anda punya.': 'Start with the number you have.',
		'Hadiah yang terasa personal, bukan sekadar merchandise.': 'Gifts that feel personal, not just merchandise.',
		'Pengadaan gift tanpa drama dan tanpa kejutan biaya.': 'Corporate gifting without the drama or surprise costs.',
		'Belum ada produk di kategori ini.': 'There are no products in this category yet.', 'Semua': 'All', 'Jumlah penerima': 'Number of recipients',
		'Budget per orang': 'Budget per person', 'Estimasi total paket': 'Estimated package total', 'Kirim kebutuhan via WhatsApp': 'Send your needs via WhatsApp',
		'Sejak 2009': 'Since 2009', 'Minimum order': 'Minimum order', 'Desain & mockup': 'Design & mockup', 'Faktur pajak tersedia': 'Tax invoice available',
		'Brief': 'Brief', 'Rekomendasi': 'Recommendation', 'Mockup': 'Mockup', 'Produksi & kirim': 'Production & delivery',
		'WhatsApp aktif 24/7': 'WhatsApp active 24/7'
	}
};

function translatePage(language) {
	const dictionary = translations[language] || {};
	document.querySelectorAll('body *').forEach((element) => {
		if (element.children.length) return;
		const original = element.textContent.trim();
		if (dictionary[original]) element.textContent = dictionary[original];
	});
	document.documentElement.lang = language;
}

const savedLanguage = localStorage.getItem('hervent-language') || 'id';
if (languageSelect) {
	languageSelect.value = savedLanguage;
	languageSelect.addEventListener('change', (event) => {
		localStorage.setItem('hervent-language', event.target.value);
		window.location.reload();
	});
}
if (savedLanguage === 'en') translatePage('en');

const counters = document.querySelectorAll('.counter');
const counterObserver = new IntersectionObserver((entries, observer) => {
	entries.forEach((entry) => {
		if (!entry.isIntersecting) return;
		const counter = entry.target;
		const target = Number(counter.dataset.target || 0);
		const duration = 1400;
		const start = performance.now();
		const tick = (now) => {
			const progress = Math.min((now - start) / duration, 1);
			counter.textContent = Math.floor(progress * target).toLocaleString('id-ID');
			if (progress < 1) requestAnimationFrame(tick);
		};
		requestAnimationFrame(tick);
		observer.unobserve(counter);
	});
}, { threshold: 0.35 });

counters.forEach((counter) => counterObserver.observe(counter));
