(function(){
"use strict";
var $=function(id){return document.getElementById(id);};

/* ---------- Local catalog icons ---------- */
var catalogIconPaths={
  gift:'<path d="M20 12v8H4v-8M2 7h20v5H2zM12 7v13M12 7H7.5a2.5 2.5 0 1 1 2.5-2.5C10 6 12 7 12 7zm0 0h4.5A2.5 2.5 0 1 0 14 4.5C14 6 12 7 12 7z"/>',
  'layout-grid':'<rect x="4" y="4" width="6" height="6" rx="1"/><rect x="14" y="4" width="6" height="6" rx="1"/><rect x="4" y="14" width="6" height="6" rx="1"/><rect x="14" y="14" width="6" height="6" rx="1"/>',
  'credit-card':'<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18M7 15h3"/>',
  'alarm-clock':'<circle cx="12" cy="13" r="7"/><path d="M12 10v3l2 2M5 4 3 6m16-2 2 2"/>',
  clock:'<circle cx="12" cy="12" r="8"/><path d="M12 8v4l3 2"/>',
  briefcase:'<rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5h8v2M3 12h18M10 12v2h4v-2"/>',
  calendar:'<rect x="4" y="5" width="16" height="15" rx="2"/><path d="M8 3v4m8-4v4M4 10h16M8 14h.01m4 0h.01m4 0h.01m-8 3h.01m4 0h.01"/>',
  'glass-water':'<path d="M5 4h14l-1 16H6zM7 13h10"/>',
  'cup-soda':'<path d="m6 3 2 18h8l2-18zM7 8h10"/>',
  thermometer:'<path d="M14 14.8V5a2 2 0 0 0-4 0v9.8a5 5 0 1 0 4 0zM12 17v-6"/>',
  package:'<path d="m3 7 9 5 9-5-9-4zM3 7v10l9 5 9-5V7M12 12v10"/>',
  pin:'<path d="M12 21s6-5.3 6-11a6 6 0 1 0-12 0c0 5.7 6 11 6 11z"/><circle cx="12" cy="10" r="2"/>',
  wind:'<path d="M3 8h11a2 2 0 1 0-2-2M3 12h15a2 2 0 1 1-2 2M3 16h8a2 2 0 1 0-2 2"/>',
  notebook:'<path d="M6 4h12v16H6zM9 4v16M4 8h2m-2 4h2m-2 4h2"/>',
  sparkles:'<path d="m12 3 1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5zM19 15l.7 2.3L22 18l-2.3.7L19 21l-.7-2.3L16 18l2.3-.7z"/>',
  leaf:'<path d="M20 4C10 4 5 8 5 14c0 3 2 5 5 5 6 0 10-5 10-15zM4 21c2-4 5-7 10-9"/>',
  'shopping-bag':'<path d="M5 8h14l-1 12H6zM9 8a3 3 0 0 1 6 0"/>',
  umbrella:'<path d="M4 13a8 8 0 0 1 16 0zM12 13v6a2 2 0 0 1-4 0"/>',
  coffee:'<path d="M5 8h11v6a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4zM16 10h2a2 2 0 0 1 0 4h-2M8 21h8"/>',
  utensils:'<path d="M6 3v8m3-8v8M6 11a3 3 0 0 0 3-3V3M7.5 11v10M17 3v18m0-18c-3 3-3 7 0 8"/>',
  tag:'<path d="M4 5v6l9 9 7-7-9-9z"/><circle cx="8.5" cy="8.5" r="1"/>',
  headphones:'<path d="M4 14v-2a8 8 0 0 1 16 0v2M4 14h3v5H5a1 1 0 0 1-1-1zm16 0h-3v5h2a1 1 0 0 0 1-1z"/>',
  save:'<path d="M5 3h12l2 2v16H5zM8 3v6h8V3M8 21v-7h8v7"/>',
  'shopping-cart':'<path d="M3 4h2l2 12h10l3-8H6M9 20h.01M17 20h.01"/>',
  'battery-charging':'<rect x="4" y="6" width="16" height="12" rx="2"/><path d="M20 10h2v4h-2M12 8l-3 5h3l-1 3 4-5h-3z"/>',
  mouse:'<rect x="7" y="3" width="10" height="18" rx="5"/><path d="M12 3v5"/>',
  wifi:'<path d="M3 9a14 14 0 0 1 18 0M6 13a9 9 0 0 1 12 0M9 17a4 4 0 0 1 6 0M12 20h.01"/>',
  speaker:'<path d="M5 9h4l5-4v14l-5-4H5zM18 9a5 5 0 0 1 0 6M20 7a8 8 0 0 1 0 10"/>',
  plug:'<path d="M8 12h8M10 4v4m4-4v4M7 8h10v4a5 5 0 0 1-10 0zM12 17v4"/>',
  pencil:'<path d="m4 16-1 5 5-1L20 8l-4-4zM14 6l4 4"/>',
  shirt:'<path d="m8 4 4 3 4-3 5 4-3 4v9H6v-9L3 8z"/>',
  basket:'<path d="M4 10h16l-2 10H6zM7 10a5 5 0 0 1 10 0M9 14v3m3-3v3m3-3v3"/>',
  crown:'<path d="m3 6 4 4 5-6 5 6 4-4-2 14H5zM5 17h14"/>',
  bottle:'<path d="M10 3h4v3l2 3v11H8V9l2-3zM10 6h4M8 13h8"/>',
  whatsapp:'<path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.5 0 .2 5.3.2 11.9c0 2.1.5 4.1 1.6 5.9L.1 24l6.3-1.7a11.9 11.9 0 0 0 5.7 1.4h.1c6.5 0 11.8-5.3 11.8-11.9a11.8 11.8 0 0 0-3.5-8.3zM12.1 21.7h-.1a9.8 9.8 0 0 1-5-1.4l-.4-.2-3.7 1 1-3.6-.2-.4a9.9 9.9 0 0 1-1.5-5.2c0-5.5 4.4-9.9 9.9-9.9 2.6 0 5.1 1 7 2.9a9.8 9.8 0 0 1 2.9 7c0 5.4-4.4 9.8-9.9 9.8zM17.5 14.5c-.3-.1-1.8-.9-2.1-1-.3-.1-.5-.1-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-1.7-.9-2.8-1.6-3.9-3.5-.3-.5.3-.5.8-1.7.1-.2.1-.4 0-.5-.1-.1-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.2.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.8-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.1-.3-.2-.6-.3z"/>',
  instagram:'<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none"/>',
  tiktok:'<path d="M15 4v10.5a4.5 4.5 0 1 1-4-4.5M15 4c.7 2.2 2.2 3.5 4.5 3.7"/>',
  linkedin:'<path d="M5 8v11M5 5.5v.01M9 19v-6a3 3 0 0 1 6 0v6M9 11a4 4 0 0 1 8 0v8M3 8h4"/>',
  youtube:'<path d="M21.6 7.2a2.7 2.7 0 0 0-1.9-1.9C18 4.8 12 4.8 12 4.8s-6 0-7.7.5a2.7 2.7 0 0 0-1.9 1.9C1.9 8.9 1.9 12 1.9 12s0 3.1.5 4.8a2.7 2.7 0 0 0 1.9 1.9c1.7.5 7.7.5 7.7.5s6 0 7.7-.5a2.7 2.7 0 0 0 1.9-1.9c.5-1.7.5-4.8.5-4.8s0-3.1-.5-4.8zM10 15.5v-7l6 3.5z"/>'
};
document.querySelectorAll('[data-lucide]').forEach(function(icon){
  var name=icon.getAttribute('data-lucide');
  var svg=document.createElementNS('http://www.w3.org/2000/svg','svg');
  svg.setAttribute('viewBox','0 0 24 24');
  svg.setAttribute('aria-hidden','true');
  svg.setAttribute('class',icon.getAttribute('class')||'');
  svg.innerHTML=catalogIconPaths[name]||catalogIconPaths.package;
  icon.replaceWith(svg);
});

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

  /* ---------- Catalog download modal ---------- */
  var catalogModal = $('catalogModal');
  if (catalogModal) {
    var catalogOpeners = document.querySelectorAll('.js-catalog-open');
    var catalogClosers = document.querySelectorAll('.js-catalog-close');
    Array.prototype.forEach.call(catalogOpeners, function (button) {
      button.addEventListener('click', function () {
        catalogModal.hidden = false;
        document.body.style.overflow = 'hidden';
        var firstField = catalogModal.querySelector('input, select');
        if (firstField) firstField.focus();
      });
    });
    Array.prototype.forEach.call(catalogClosers, function (button) {
      button.addEventListener('click', function () {
        catalogModal.hidden = true;
        document.body.style.overflow = '';
      });
    });
    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && !catalogModal.hidden) {
        catalogModal.hidden = true;
        document.body.style.overflow = '';
      }
    });
  }

  /* ---------- Product gallery ---------- */
  document.querySelectorAll('[data-product-gallery]').forEach(function (gallery) {
    var main = gallery.querySelector('[data-gallery-main]');
    var images = Array.prototype.map.call(gallery.querySelectorAll('[data-gallery-index]'), function (control) {
      var image = control.querySelector('img');
      return image ? image.getAttribute('src') : null;
    }).filter(Boolean);
    var active = 0;
    var controls = gallery.querySelectorAll('[data-gallery-index]');

    function show(index) {
      if (!images.length) return;
      active = (index + images.length) % images.length;
      main.src = images[active];
      Array.prototype.forEach.call(controls, function (control) {
        control.classList.toggle('active', control.getAttribute('data-gallery-index') === String(active));
      });
    }

    gallery.querySelector('[data-gallery-prev]').addEventListener('click', function () {
      show(active - 1);
    });
    gallery.querySelector('[data-gallery-next]').addEventListener('click', function () {
      show(active + 1);
    });
    Array.prototype.forEach.call(controls, function (control) {
      control.addEventListener('click', function () {
        show(parseInt(control.getAttribute('data-gallery-index'), 10));
      });
    });
  });

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

