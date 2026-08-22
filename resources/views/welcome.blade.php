<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Souvenir Kantor &amp; Corporate Gift Custom | HERVENT</title>
<meta name="description" content="Vendor corporate gift &amp; souvenir kantor custom sejak 2009. Desain gratis, faktur pajak PPN, kantor Bandung &amp;. Dipercaya 4.500+ klien korporasi.">
<meta name="theme-color" content="#B81A1F">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="home-page">

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
  <div class="wrap hero-in">
    <span class="trust"><span class="dot"></span> {{ __('messages.welcome.hero_trust') }}</span>
    <h1 class="h1">{{ __('messages.welcome.hero_title_1') }} <span class="hl">{{ __('messages.welcome.hero_title_hl') }}</span></h1>
    <p class="lede">{{ __('messages.welcome.hero_desc') }}</p>
    <div class="hero-cta">
      <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">
        <svg class="whatsapp-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.086 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495.001.16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
        {{ __('messages.welcome.btn_consultation') }}
      </a>
      <button class="btn b-line js-catalog-open" type="button">
        <svg viewBox="0 0 24 24"><path d="M12 3v12M7 10l5 5 5-5M5 21h14"/></svg>
        {{ __('messages.welcome.btn_catalog') }}
      </button>
    </div>

    <ul class="hero-mini">
      <li><b>{{ __('messages.welcome.hero_mini_1_t') }}</b>{{ __('messages.welcome.hero_mini_1_d') }}</li>
      <li><b>{{ __('messages.welcome.hero_mini_2_t') }}</b>{{ __('messages.welcome.hero_mini_2_d') }}</li>
      <li><b>{{ __('messages.welcome.hero_mini_3_t') }}</b>{{ __('messages.welcome.hero_mini_3_d') }}</li>
      <li><b>{{ __('messages.welcome.hero_mini_4_t') }}</b>{{ __('messages.welcome.hero_mini_4_d') }}</li>
    </ul>
  </div>
</section>

<!-- LOGO WALL -->
<section class="wall" aria-label="{{ __('messages.welcome.client_title') }}">
  <p>{{ __('messages.welcome.client_title') }}</p>
  <div class="rail a" id="railA" aria-hidden="true"></div>
  <div class="rail b" id="railB" aria-hidden="true"></div>
</section>

<!-- PROBLEM -->
<section class="s">
  <div class="wrap split">
    <div class="rv">
      <p class="eyebrow">{{ __('messages.welcome.problem_eyebrow') }}</p>
      <h2 class="h2">{{ __('messages.welcome.problem_title') }} <span class="hl">{{ __('messages.welcome.problem_title_hl') }}</span></h2>
      <p class="lede">{{ __('messages.welcome.problem_desc') }}</p>
      <div class="hero-cta" style="justify-content:flex-start;margin-top:1.5rem">
        <a class="btn b-red" href="#proses">{{ __('messages.welcome.btn_how_it_works') }}</a>
        <a class="btn b-line" href="#faq">{{ __('messages.welcome.btn_faq') }}</a>
      </div>
    </div>
    <div class="shot rv">
      <img src="{{ asset('images/Kenapa pilih HERVENT.png') }}" alt="Tim HERVENT menyiapkan mockup dan merchandise">
    </div>
  </div>
</section>

<!-- KEUNGGULAN -->
<section class="s" style="padding-top:0">
  <div class="wrap center">
    <p class="eyebrow rv" style="justify-content:center">{{ __('messages.welcome.feat_eyebrow') }}</p>
    <h2 class="h2 rv">{{ __('messages.welcome.feat_title') }} <span class="hl">{{ __('messages.welcome.feat_title_hl') }}</span></h2>
    <p class="lede rv">{{ __('messages.welcome.feat_desc') }}</p>
    <div class="feat">
      <div class="f-card rv" style="text-align:left">
        <div class="f-ico"><svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg></div>
        <h3 class="h3">{{ __('messages.welcome.feat_1_t') }}</h3>
        <p>{{ __('messages.welcome.feat_1_d') }}</p>
      </div>
      <div class="f-card rv" style="text-align:left">
        <div class="f-ico"><svg viewBox="0 0 24 24"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M14 3v6h6M9 14h6M9 17h4"/></svg></div>
        <h3 class="h3">{{ __('messages.welcome.feat_2_t') }}</h3>
        <p>{{ __('messages.welcome.feat_2_d') }}</p>
      </div>
      <div class="f-card rv" style="text-align:left">
        <div class="f-ico"><svg viewBox="0 0 24 24"><path d="M12 3l8 3v6c0 4.5-3.2 7.9-8 9-4.8-1.1-8-4.5-8-9V6z"/><path d="M9 12l2 2 4-4"/></svg></div>
        <h3 class="h3">{{ __('messages.welcome.feat_3_t') }}</h3>
        <p>{{ __('messages.welcome.feat_3_d') }}</p>
      </div>
    </div>
  </div>
</section>

<!-- KOLEKSI -->
<section class="s" id="koleksi" style="padding-top:0">
  <div class="wrap">
    <div class="center">
      <p class="eyebrow rv" style="justify-content:center">{{ __('messages.welcome.cat_eyebrow') }}</p>
      <h2 class="h2 rv">{{ __('messages.welcome.cat_title') }} <span class="hl">{{ __('messages.welcome.cat_title_hl') }}</span></h2>
      <p class="lede rv">{{ __('messages.welcome.cat_desc') }}</p>
    </div>
    <div class="prods" id="prods">
        @foreach($bestSellers as $product)
        <a class="prod rv" href="{{ route('products.show', $product->slug) }}" style="text-decoration: none; color: inherit; display: block;">
            <div class="ph">
                @if($loop->first)
                    <span class="badge">{{ __('messages.welcome.prod_badge_1') }}</span>
                @elseif($loop->last)
                    <span class="badge">{{ __('messages.welcome.prod_badge_2') }}</span>
                @endif
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
            </div>
            <div class="prod-bd" style="padding-top: 1rem;">
                <span class="cat" style="font-size: 0.8rem; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">{{ $product->category_label }}</span>
                <h3 style="font-size: 1.1rem; font-weight: 600; margin-top: 0.25rem;">{{ $product->name }}</h3>
            </div>
        </a>
        @endforeach
    </div>
    <div class="center" style="margin-top:1.8rem">
      <a class="btn b-dark" href="#kategori">{{ __('messages.welcome.btn_all_cat') }}</a>
    </div>
  </div>
</section>

<!-- KATEGORI -->
<section class="s" id="kategori" style="padding-top:0">
  <div class="wrap">
    <div class="center">
      <p class="eyebrow rv" style="justify-content:center">{{ __('messages.welcome.jelajah_eyebrow') }}</p>
      <h2 class="h2 rv">{{ __('messages.welcome.jelajah_title') }} <span class="hl">{{ __('messages.welcome.jelajah_title_hl') }}</span></h2>
    </div>
    <div class="cats" id="cats">
        @foreach($categories as $category)
        <a class="cat-t rv" href="{{ route('products.index', ['category' => $category]) }}">
            <svg class="pat pat-w" style="opacity:.12"><rect width="100%" height="100%" fill="url(#hvPat)"/></svg>
            <b>{{ \Illuminate\Support\Str::headline($category) }}</b>
            <small>{{ $categoryCounts[$category] ?? 0 }} {{ __('messages.welcome.jelajah_avail') }}</small>
        </a>
        @endforeach
    </div>
  </div>
</section>

<!-- KALKULATOR -->
<section class="calc s" id="kalkulator">
  <div class="wrap center">
    <p class="eyebrow rv" style="justify-content:center">{{ __('messages.welcome.calc_eyebrow') }}</p>
    <h2 class="h2 rv">{{ __('messages.welcome.calc_title') }} <span class="hl">{{ __('messages.welcome.calc_title_hl') }}</span></h2>
    <p class="lede rv">{{ __('messages.welcome.calc_desc') }}</p>

    <div class="calc-box rv">
      <div class="calc-bd">
        <div class="fld">
          <label for="cMomen">{{ __('messages.welcome.c_momen') }}</label>
          <select id="cMomen">
            <option>{{ __('messages.welcome.c_momen_1') }}</option>
            <option>{{ __('messages.welcome.c_momen_2') }}</option>
            <option>{{ __('messages.welcome.c_momen_3') }}</option>
            <option>{{ __('messages.welcome.c_momen_4') }}</option>
            <option>{{ __('messages.welcome.c_momen_5') }}</option>
            <option>{{ __('messages.welcome.c_momen_6') }}</option>
          </select>
        </div>
        <div class="fld">
          <label for="cQty">{{ __('messages.welcome.c_qty') }}</label>
          <input id="cQty" type="number" min="25" max="50000" step="25" value="250" inputmode="numeric">
        </div>
        <div class="fld">
          <label for="cPer">{{ __('messages.welcome.c_per') }}</label>
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
          <small>{{ __('messages.welcome.c_est') }}</small>
          <div class="tot" id="cTot">Rp37.500.000</div>
        </div>
        <span class="kelas" id="cKelas">Signature</span>
        <a class="btn b-red" id="cWa" href="#" target="_blank" rel="noopener" style="background:var(--red);color:#fff;border-color:var(--red)">{{ __('messages.welcome.c_btn_wa') }}</a>
      </div>
    </div>
    <p style="margin:1rem auto 0;font-size:.75rem;color:var(--g1);max-width:60ch">{{ __('messages.welcome.c_note') }}</p>
  </div>
</section>

<!-- PROSES -->
<section class="s on-dark" id="proses" style="background:var(--black);color:var(--white)">
  <div class="wrap">
    <p class="eyebrow rv">{{ __('messages.welcome.step_eyebrow') }}</p>
    <h2 class="h2 rv" style="max-width:18ch">{{ __('messages.welcome.step_title') }} <span class="hl">{{ __('messages.welcome.step_title_hl') }}</span></h2>
    <p class="lede rv">{{ __('messages.welcome.step_desc') }}</p>
    <div class="steps rv">
      <div class="step"><b>01</b><h3>{{ __('messages.welcome.step_1_t') }}</h3><p>{{ __('messages.welcome.step_1_d') }}</p><span class="d">{{ __('messages.welcome.step_1_time') }}</span></div>
      <div class="step"><b>02</b><h3>{{ __('messages.welcome.step_2_t') }}</h3><p>{{ __('messages.welcome.step_2_d') }}</p><span class="d">{{ __('messages.welcome.step_2_time') }}</span></div>
      <div class="step"><b>03</b><h3>{{ __('messages.welcome.step_3_t') }}</h3><p>{{ __('messages.welcome.step_3_d') }}</p><span class="d">{{ __('messages.welcome.step_3_time') }}</span></div>
      <div class="step"><b>04</b><h3>{{ __('messages.welcome.step_4_t') }}</h3><p>{{ __('messages.welcome.step_4_d') }}</p><span class="d">{{ __('messages.welcome.step_4_time') }}</span></div>
    </div>
  </div>
</section>
<!-- FAQ -->
<section class="s" id="faq" style="padding-top:0">
  <div class="wrap">
    <div class="center">
      <p class="eyebrow rv" style="justify-content:center">{{ __('messages.welcome.faq_eyebrow') }}</p>
      <h2 class="h2 rv">{{ __('messages.welcome.faq_title') }} <span class="hl">{{ __('messages.welcome.faq_title_hl') }}</span></h2>
    </div>
    <div class="faq rv">
      <details open>
        <summary>{{ __('messages.welcome.f_1_q') }}</summary>
        <p>{{ __('messages.welcome.f_1_a') }}</p>
      </details>
      <details>
        <summary>{{ __('messages.welcome.f_2_q') }}</summary>
        <p>{{ __('messages.welcome.f_2_a') }}</p>
      </details>
      <details>
        <summary>{{ __('messages.welcome.f_3_q') }}</summary>
        <p>{{ __('messages.welcome.f_3_a') }}</p>
      </details>
      <details>
        <summary>{{ __('messages.welcome.f_4_q') }}</summary>
        <p>{{ __('messages.welcome.f_4_a') }}</p>
      </details>
      <details>
        <summary>{{ __('messages.welcome.f_5_q') }}</summary>
        <p>{{ __('messages.welcome.f_5_a') }}</p>
      </details>
      <details>
        <summary>{{ __('messages.welcome.f_6_q') }}</summary>
        <p>{{ __('messages.welcome.f_6_a') }}</p>
      </details>
      <details>
        <summary>{{ __('messages.welcome.f_7_q') }}</summary>
        <p>{{ __('messages.welcome.f_7_a') }}</p>
      </details>
      <details>
        <summary>{{ __('messages.welcome.f_8_q') }}</summary>
        <p>{{ __('messages.welcome.f_8_a') }}</p>
      </details>
    </div>
  </div>
</section>

<!-- TESTIMONI -->
<section class="s" style="padding-top:0">
  <div class="wrap">
    <div class="center">
      <p class="eyebrow rv" style="justify-content:center">{{ __('messages.welcome.tst_eyebrow') }}</p>
      <h2 class="h2 rv">{{ __('messages.welcome.tst_title') }} <span class="hl">{{ __('messages.welcome.tst_title_hl') }}</span></h2>
    </div>
    <div class="tst">
      <blockquote class="t-card rv">
        <p>{{ __('messages.welcome.t_1_q') }}</p>
        <footer><span class="av">HR</span><div><b>HR Manager</b>{{ __('messages.welcome.t_1_p') }}</div></footer>
      </blockquote>
      <blockquote class="t-card rv">
        <p>{{ __('messages.welcome.t_2_q') }}</p>
        <footer><span class="av">GA</span><div><b>GA Supervisor</b>{{ __('messages.welcome.t_2_p') }}</div></footer>
      </blockquote>
      <blockquote class="t-card rv">
        <p>{{ __('messages.welcome.t_3_q') }}</p>
        <footer><span class="av">ML</span><div><b>Marketing Lead</b>{{ __('messages.welcome.t_3_p') }}</div></footer>
      </blockquote>
    </div>
  </div>
</section>

<!-- SEO -->
<section class="seo s">
  <div class="wrap center">
    <h2 class="h2 rv" style="font-size:clamp(1.25rem,2.6vw,1.6rem)">{{ __('messages.welcome.seo_title') }}</h2>
    <p class="rv">{{ __('messages.welcome.seo_desc') }}</p>
  </div>
</section>

<!-- CTA -->
<section class="cta s on-red" id="kontak">
  <svg class="pat pat-w" aria-hidden="true"><rect width="100%" height="100%" fill="url(#hvPat)"/></svg>
  <div class="wrap cta-in">
    <div class="rv">
      <p class="eyebrow">{{ __('messages.welcome.cta_eyebrow') }}</p>
      <h2 class="h2">{{ __('messages.welcome.cta_title') }} <span class="hl">{{ __('messages.welcome.cta_title_hl') }}</span></h2>
      <p class="lede">{{ __('messages.welcome.cta_desc') }}</p>
      <div class="hero-cta" style="justify-content:flex-start;margin-top:1.5rem">
        <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">WhatsApp 0811-912-502</a>
        <a class="btn b-line" href="mailto:cs@hervent.co.id">cs@hervent.co.id</a>
      </div>
    </div>
    <div class="offices rv">
      <div class="office">
        <b>{{ __('messages.welcome.cta_off_1_t') }}</b>
        <span>{{ __('messages.welcome.cta_off_1_d') }}</span>
      </div>
    </div>
  </div>
</section>
</main>

<!-- CATALOG DOWNLOAD MODAL -->
<div class="catalog-modal" id="catalogModal" @if(!$errors->any()) hidden @endif>
  <div class="catalog-modal-backdrop js-catalog-close" aria-hidden="true"></div>
  <section class="catalog-dialog" role="dialog" aria-modal="true" aria-labelledby="catalogTitle">
    <button class="catalog-close js-catalog-close" type="button" aria-label="Tutup">&times;</button>
    <h2 class="h2" id="catalogTitle">{{ __('messages.welcome.modal_title') }}</h2>
    <p class="catalog-intro">{{ __('messages.welcome.modal_desc') }}</p>
    <form method="POST" action="{{ route('catalog.download', absolute: false) }}" class="catalog-form">
      @csrf
      <div class="catalog-field">
        <label for="catalogName">{{ __('messages.welcome.m_name') }} <span>*</span></label>
        <div class="catalog-name-row">
          <select id="catalogSalutation" name="salutation" aria-label="Sapaan">
            <option value="Bapak" @selected(old('salutation', 'Bapak') === 'Bapak')>Bapak</option>
            <option value="Ibu" @selected(old('salutation', 'Ibu') === 'Ibu')>Ibu</option>
          </select>
          <input id="catalogName" name="name" type="text" value="{{ old('name') }}" placeholder="Nama lengkap" required maxlength="100">
        </div>
        @error('name')<small class="catalog-error">{{ $message }}</small>@enderror
      </div>
      <div class="catalog-field">
        <label for="catalogEmail">{{ __('messages.welcome.m_email') }} <span>*</span></label>
        <input id="catalogEmail" name="email" type="email" value="{{ old('email') }}" placeholder="testing@gmail.com" required maxlength="255">
        @error('email')<small class="catalog-error">{{ $message }}</small>@enderror
      </div>
      <div class="catalog-field">
        <label for="catalogWhatsapp">{{ __('messages.welcome.m_wa') }} <span>*</span></label>
        <input id="catalogWhatsapp" name="whatsapp" type="tel" value="{{ old('whatsapp') }}" placeholder="+628xxxxxxxxxx" required maxlength="30">
        @error('whatsapp')<small class="catalog-error">{{ $message }}</small>@enderror
      </div>
      <div class="catalog-field">
        <label for="catalogJobTitle">{{ __('messages.welcome.m_job') }} <em>{{ __('messages.welcome.m_opt') }}</em></label>
        <input id="catalogJobTitle" name="job_title" type="text" value="{{ old('job_title') }}" placeholder="Business Owner" maxlength="100">
      </div>
      <div class="catalog-field">
        <label for="catalogCompany">{{ __('messages.welcome.m_comp') }} <span>*</span></label>
        <input id="catalogCompany" name="company" type="text" value="{{ old('company') }}" placeholder="Nama perusahaan" required maxlength="150">
        @error('company')<small class="catalog-error">{{ $message }}</small>@enderror
      </div>
      <button class="btn b-red catalog-submit" type="submit">
        {{ __('messages.welcome.m_btn') }}
        <svg viewBox="0 0 24 24"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M14 3v6h6M8 14h8M8 17h5"/></svg>
      </button>
    </form>
    <button class="catalog-back js-catalog-close" type="button">{{ __('messages.welcome.m_back') }}</button>
  </section>
</div>

<!-- FOOTER -->
@include('partials.footer')

<!-- DOCK -->
<div class="dock">
  <div class="m">
    <small>{{ __('messages.welcome.dock_est') }}</small>
    <b id="dockTot">Rp37.500.000</b>
  </div>
  <a class="btn b-red" href="https://wa.me/62811912502" target="_blank" rel="noopener">{{ __('messages.welcome.dock_btn') }}</a>
</div>

</body>
</html>
