@php
  $currentPath = request()->path();
  $defaultPromoCode = 'HG';
  $defaultProduct = 'Corporate Gift';

  if (request()->is('*souvenir-kantor-perusahaan*')) {
    $defaultPromoCode = 'HG';
    $defaultProduct = 'Corporate Gift';
  } elseif (request()->is('*lp-paket-souvenir*')) {
    $defaultPromoCode = 'HP';
    $defaultProduct = 'Paket Souvenir';
  } elseif (request()->is('*seminar-kit*')) {
    $defaultPromoCode = 'HS';
    $defaultProduct = 'Seminar Kit';
  } elseif (request()->is('*thumbler*') || request()->is('*tumbler*')) {
    $defaultPromoCode = 'HT';
    $defaultProduct = 'Tumbler';
  } elseif (request()->is('*buku-agenda*')) {
    $defaultPromoCode = 'HA';
    $defaultProduct = 'Buku Agenda';
  } elseif (request()->is('*flashdisk*')) {
    $defaultPromoCode = 'FD';
    $defaultProduct = 'Flashdisk';
  }
@endphp

<!-- WA BANNER MODAL COMPONENT (SHELLY CS HERVENT) -->
<div id="waBannerModal" class="wa-modal-backdrop" aria-hidden="true" style="display:none;">
  <div class="wa-modal-card" role="dialog" aria-modal="true" aria-labelledby="waModalTitle">
    
    <!-- Top Green Header -->
    <div class="wa-modal-header">
      <div class="wa-modal-cs">
        <div class="wa-modal-avatar-box">
          <img src="{{ asset('images/Teman Diskusi.png') }}" alt="Shelly CS Hervent" class="wa-modal-avatar">
          <span class="wa-modal-online-dot" title="Online"></span>
        </div>
        <div class="wa-modal-cs-info">
          <div class="wa-modal-cs-badge">
            <span class="wa-modal-cs-name">Shelly</span>
            <span class="wa-modal-cs-role">Customer Support</span>
          </div>
          <h3 id="waModalTitle" class="wa-modal-title">Konsultasi Gratis Via Whatsapp</h3>
          <p class="wa-modal-sub">Minta Penawaran Hari Ini ⚡ <span class="wa-modal-speed">Respon &lt; 1 menit</span></p>
        </div>
      </div>
      <button type="button" class="wa-modal-close" id="waModalClose" aria-label="Tutup formulir">&times;</button>
    </div>

    <!-- Body Form -->
    <div class="wa-modal-body">
      <form id="waModalForm" onsubmit="return false;">
        
        <!-- Kolom 1: Nama Anda / Perusahaan -->
        <div class="wa-form-group">
          <label for="waInputName" class="wa-form-label">Nama Anda / Perusahaan <span class="wa-req">*</span></label>
          <input type="text" 
                 id="waInputName" 
                 class="wa-form-control" 
                 placeholder="Contoh: Budi - PT Maju Jaya" 
                 required 
                 autocomplete="name">
        </div>

        <!-- Kolom 2: Perkiraan Budget -->
        <div class="wa-form-group">
          <label for="waSelectBudget" class="wa-form-label">Perkiraan Budget</label>
          <div class="wa-select-wrap">
            <select id="waSelectBudget" class="wa-form-control">
              <option value="< Rp5 jt">&lt; Rp5 jt</option>
              <option value="Rp5 – 10 jt">Rp5 – 10 jt</option>
              <option value="Rp10 – 25 jt" selected>Rp10 – 25 jt</option>
              <option value="Rp25 – 50 jt">Rp25 – 50 jt</option>
              <option value="Rp50 – 100 jt">Rp50 – 100 jt</option>
              <option value="> Rp100 jt">&gt; Rp100 jt</option>
            </select>
          </div>
        </div>

        <!-- Kolom 3: Produk yang Anda Cari -->
        <div class="wa-form-group">
          <label for="waSelectProduct" class="wa-form-label">Produk yang Anda Cari</label>
          <div class="wa-select-wrap">
            <select id="waSelectProduct" class="wa-form-control" data-page-code="{{ $defaultPromoCode }}">
              <option value="Tumbler" data-code="HT" {{ $defaultProduct === 'Tumbler' ? 'selected' : '' }}>Tumbler</option>
              <option value="Corporate Gift" data-code="HG" {{ $defaultProduct === 'Corporate Gift' ? 'selected' : '' }}>Corporate Gift</option>
              <option value="Paket Souvenir" data-code="HP" {{ $defaultProduct === 'Paket Souvenir' ? 'selected' : '' }}>Paket Souvenir</option>
              <option value="Seminar Kit" data-code="HS" {{ $defaultProduct === 'Seminar Kit' ? 'selected' : '' }}>Seminar Kit</option>
              <option value="Buku Agenda" data-code="HA" {{ $defaultProduct === 'Buku Agenda' ? 'selected' : '' }}>Buku Agenda</option>
              <option value="Flashdisk" data-code="FD" {{ $defaultProduct === 'Flashdisk' ? 'selected' : '' }}>Flashdisk</option>
              <option value="Produk lainnya" data-code="{{ $defaultPromoCode }}" {{ $defaultProduct === 'Produk lainnya' ? 'selected' : '' }}>Produk lainnya</option>
              <option value="Beberapa produk sekaligus" data-code="{{ $defaultPromoCode }}" {{ $defaultProduct === 'Beberapa produk sekaligus' ? 'selected' : '' }}>Beberapa produk sekaligus</option>
            </select>
          </div>
        </div>

        <!-- Hidden Input Promo Code -->
        <input type="hidden" id="waCurrentPromoCode" value="{{ $defaultPromoCode }}">

        <!-- Tombol Kirim Chat WhatsApp -->
        <button type="submit" id="waSubmitBtn" class="wa-modal-submit-btn">
          <svg class="wa-btn-svg" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.086 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
          </svg>
          <span>Chat WhatsApp</span>
        </button>

      </form>
    </div>

  </div>
</div>

