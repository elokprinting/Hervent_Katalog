(function(){
"use strict";
var $=function(id){return document.getElementById(id);};

/* ---------- Menu ---------- */
var mega=$('mega'),megaBtn=$('megaBtn'),drawer=$('drawer'),burger=$('burger');
if(megaBtn) {
    megaBtn.addEventListener('click',function(){
      var o=mega.classList.toggle('open');
      this.setAttribute('aria-expanded',String(o));
    });
}
if(mega) {
    mega.addEventListener('click',function(e){
      if(e.target.tagName==='A'){mega.classList.remove('open');megaBtn.setAttribute('aria-expanded','false');}
    });
}
document.addEventListener('click',function(e){
  if(mega && !mega.contains(e.target)&&e.target!==megaBtn&&!megaBtn.contains(e.target)){
    mega.classList.remove('open');megaBtn.setAttribute('aria-expanded','false');
  }
});
if(burger) {
    burger.addEventListener('click',function(){
      var o=drawer.classList.toggle('open');
      this.setAttribute('aria-expanded',String(o));
      this.setAttribute('aria-label',o?'Tutup menu':'Buka menu');
    });
}
if(drawer) {
    drawer.addEventListener('click',function(e){
      if(e.target.tagName==='A'){drawer.classList.remove('open');burger.setAttribute('aria-expanded','false');}
    });
}
document.addEventListener('keydown',function(e){
  if(e.key==='Escape'){
      if(mega) mega.classList.remove('open');
      if(drawer) drawer.classList.remove('open');
      if(megaBtn) megaBtn.setAttribute('aria-expanded','false');
      if(burger) burger.setAttribute('aria-expanded','false');
  }
});

/* ---------- Logo wall ---------- */
var railA = $('railA');
var railB = $('railB');
if(railA && railB) {
    var sektor=['Perbankan','BUMN Energi','Rumah Sakit','Perguruan Tinggi','FMCG','Pemerintah Daerah',
                'Asuransi','Manufaktur','Telekomunikasi','Startup Teknologi','Konstruksi','Logistik'];
    function rail(el,arr){
      el.innerHTML=arr.concat(arr).map(function(s){return '<span class="slot">'+s+'</span>';}).join('');
    }
    rail(railA,sektor.slice(0,6));
    rail(railB,sektor.slice(6));
}

/* ---------- Kalkulator ---------- */
var cQty = $('cQty');
if(cQty) {
    var fmt=new Intl.NumberFormat('id-ID',{style:'currency',currency:'IDR',maximumFractionDigits:0});
    var num=new Intl.NumberFormat('id-ID');
    function kelas(h){
      if(h<100000)return'Essential';
      if(h<300000)return'Signature';
      if(h<750000)return'Executive';
      return'Luxury';
    }
    function hitung(){
      var q=Math.max(1,parseInt($('cQty').value,10)||0);
      var p=parseInt($('cPer').value,10);
      var t=q*p, k=kelas(p);
      $('cTot').textContent=fmt.format(t);
      var dockTot = $('dockTot');
      if (dockTot) {
          dockTot.textContent=fmt.format(t);
      }
      $('cKelas').textContent=k;
      var msg='Halo HERVENT, saya mau minta penawaran.\n\n'+
        '• Momen: '+$('cMomen').value+'\n'+
        '• Jumlah penerima: '+num.format(q)+' orang\n'+
        '• Budget per orang: '+fmt.format(p)+'\n'+
        '• Estimasi total: '+fmt.format(t)+'\n'+
        '• Kelas: '+k+'\n\nBoleh dikirim opsi paketnya? Terima kasih.';
      $('cWa').href='https://wa.me/62811912502?text='+encodeURIComponent(msg);
    }
    ['cQty','cPer','cMomen'].forEach(function(id){
      var el = $(id);
      if(el) {
          el.addEventListener('input',hitung); 
          el.addEventListener('change',hitung);
      }
    });
    hitung();
}

/* ---------- Reveal + counter ---------- */
var reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
var numFormat = new Intl.NumberFormat('id-ID');
function hitungAngka(el){
  var to=parseInt(el.dataset.to,10),suf=el.dataset.suf||'',dur=1300,t0=null;
  if(reduce){el.textContent=numFormat.format(to)+suf;return;}
  function tick(t){
    if(!t0)t0=t;
    var p=Math.min((t-t0)/dur,1),e=1-Math.pow(1-p,3);
    el.textContent=numFormat.format(Math.round(to*e))+suf;
    if(p<1)requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
}
var rv=document.querySelectorAll('.rv');
if(reduce||!('IntersectionObserver'in window)){
  Array.prototype.forEach.call(rv,function(e){e.classList.add('in');});
  Array.prototype.forEach.call(document.querySelectorAll('[data-to]'),hitungAngka);
}else{
  var io=new IntersectionObserver(function(en){
    en.forEach(function(x,i){
      if(!x.isIntersecting)return;
      setTimeout(function(){x.target.classList.add('in');},i*65);
      var n=x.target.querySelector('[data-to]');
      if(n&&!n._done){n._done=1;hitungAngka(n);}
      io.unobserve(x.target);
    });
  },{rootMargin:'0px 0px -8% 0px',threshold:.08});
  Array.prototype.forEach.call(rv,function(e){io.observe(e);});
}
})();

const translations = {
    'en': {
        'Konsultasi Gratis': 'Free Consultation',
        'Kategori produk': 'Product Categories',
        'Hitung estimasi budget': 'Calculate Budget Estimate',
        'Minimum order 50 pcs · Desain dan mockup gratis · Faktur pajak PPN tersedia': 'Minimum order 50 pcs · Free design & mockup · VAT invoice available',
        'Kategori': 'Category',
        'Produk': 'Products',
        'Jelajahi': 'Explore',
        'koleksi tersedia': 'collections available',
        'Lihat semua kategori': 'View all categories',
        'Alat bantu': 'Budget tool',
        'Hitung estimasi budget sebelum menghubungi kami': 'Calculate budget estimate before contacting us',
        'Isi jumlah penerima dan budget per orang. Kami tunjukkan estimasi anggaran dan kelas produk yang masuk — supaya obrolan langsung ke inti.': 'Enter the number of recipients and budget per person. We\'ll show you the estimated budget and product class — so we can get straight to the point.',
        'Momen': 'Occasion',
        'Jumlah penerima': 'Number of recipients',
        'Budget per orang (Rp)': 'Budget per person (Rp)',
        'Estimasi total anggaran': 'Estimated total budget',
        'Kirim brief via WhatsApp': 'Send brief via WhatsApp',
        'Estimasi, bukan penawaran resmi. Harga final menyesuaikan spesifikasi, jumlah, dan tanggal kirim.': 'Estimation, not an official offer. Final price depends on specifications, quantity, and delivery date.',
        'Cara kerja': 'How it works',
        'Empat langkah, tanpa bolak-balik.': 'Four steps, no back-and-forth.',
        'Urutannya tetap: tidak ada produksi sebelum mockup Anda setujui, dan tidak ada mockup sebelum kami paham penerimanya siapa.': 'The order remains: no production before mockup approval, and no mockup before we understand the recipients.',
        'Hari ke-0': 'Day 0',
        'Rekomendasi': 'Recommendation',
        '1 hari kerja': '1 working day',
        '1–3 hari kerja': '1–3 working days',
        '7–21 hari kerja': '7–21 working days',
        'Produksi & kirim': 'Production & delivery',
        'Empat pilar': 'Four pillars',
        'Ornamen kami punya arti.': 'Our ornaments have meaning.',
        'Pertanyaan': 'Questions',
        'Testimoni': 'Testimonials',
        'Dengar apa kata klien kami': 'Hear what our clients say',
        'Jadi partner kami': 'Become our partner',
        'Reputasi brand Anda adalah prioritas kami.': 'Your brand reputation is our priority.',
        'Kirim tanggal acara dan jumlah penerima. Kami balas dengan opsi yang masih realistis dikerjakan sampai tanggal itu.': 'Send the event date and number of recipients. We will reply with options that can realistically be completed by that date.',
        'Kantor pusat — Bandung': 'Head Office — Bandung',
        'Cabang — Surabaya': 'Branch — Surabaya',
        'Tautan cepat': 'Quick links',
        'Kontak': 'Contact',
        'Koleksi unggulan': 'Featured collections',
        'Kantor & kontak': 'Office & contact'
    }
};

const originalTextNodes = new WeakMap();

function translatePage(language) {
    const dictionary = translations[language] || {};
    
    // Using TreeWalker to translate all text nodes without modifying HTML tags
    const textWalker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT);
    const textNodes = [];
    let textNode;
    while ((textNode = textWalker.nextNode())) textNodes.push(textNode);
    
    textNodes.forEach((node) => {
        const text = node.nodeValue.trim();
        if (!text || node.parentElement?.closest('script, style')) return;
        
        // Save the original Indonesian text
        const original = originalTextNodes.get(node) || text;
        if (!originalTextNodes.has(node)) {
            originalTextNodes.set(node, original);
        }
        
        // Replace if translation exists, otherwise restore original
        const targetText = dictionary[original] || original;
        if (node.nodeValue.trim() !== targetText) {
            node.nodeValue = node.nodeValue.replace(text, targetText);
        }
    });

    document.documentElement.lang = language;
    localStorage.setItem('hervent-lang', language);
}

// Bind language switcher buttons
document.addEventListener('DOMContentLoaded', function() {
    const langBtns = document.querySelectorAll('[data-lang-btn]');
    langBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.getAttribute('data-lang-btn');
            translatePage(lang);
        });
    });

    // Auto-load saved language
    const savedLang = localStorage.getItem('hervent-lang');
    if (savedLang === 'en') {
        translatePage('en');
    }
});
