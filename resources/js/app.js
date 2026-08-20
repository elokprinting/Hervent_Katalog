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
