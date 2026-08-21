<footer class="foot">
  <div class="wrap">
    <div class="foot-g">
      <div>
        <a class="logo" href="{{ route('home') }}#top">
          <img src="{{ asset('images/Logo Hervent Footer Website.png') }}" alt="HERVENT" style="height: 42px; width: auto; background: black; padding: 4px; border-radius: 4px;">
        </a>
        <p style="margin:0 0 1.1rem;font-size:.85rem;font-weight:300;max-width:40ch">{{ __('messages.footer.desc') }}</p>
        <div class="foot-socials" aria-label="Sosial media HERVENT">
          <a class="foot-social" href="https://wa.me/62811912502" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp HERVENT" title="WhatsApp">
            <i data-lucide="whatsapp" aria-hidden="true"></i>
          </a>
          <a class="foot-social" href="https://www.instagram.com/hervent.co.id/" target="_blank" rel="noopener noreferrer" aria-label="Instagram HERVENT" title="Instagram">
            <i data-lucide="instagram" aria-hidden="true"></i>
          </a>
          <a class="foot-social" href="https://www.tiktok.com/@hervent.co.id" target="_blank" rel="noopener noreferrer" aria-label="TikTok HERVENT" title="TikTok">
            <i data-lucide="tiktok" aria-hidden="true"></i>
          </a>
          <a class="foot-social" href="https://www.linkedin.com/in/hervent/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn HERVENT" title="LinkedIn">
            <i data-lucide="linkedin" aria-hidden="true"></i>
          </a>
          <a class="foot-social" href="https://www.youtube.com/@Hervent" target="_blank" rel="noopener noreferrer" aria-label="YouTube HERVENT" title="YouTube">
            <i data-lucide="youtube" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div>
        <h4>{{ __('messages.footer.quick_links') }}</h4>
        <ul>
          <li><a href="{{ route('home') }}#top">{{ __('messages.footer.home') }}</a></li>
          <li><a href="{{ route('products.index') }}">{{ __('messages.footer.product_category') }}</a></li>
          <li><a href="{{ route('home') }}#koleksi">{{ __('messages.footer.featured_collection') }}</a></li>
          <li>
            @if(request()->routeIs('home'))
              <button class="footer-catalog js-catalog-open" type="button">{{ __('messages.footer.download_catalog') }}</button>
            @else
              <a href="{{ route('home') }}#top">{{ __('messages.footer.download_catalog') }}</a>
            @endif
          </li>
          <li><a href="{{ route('home') }}#proses">{{ __('messages.footer.how_it_works') }}</a></li>
          <li><a href="{{ route('home') }}#faq">{{ __('messages.footer.faq') }}</a></li>
        </ul>
      </div>
      <div>
        <h4>{{ __('messages.footer.contact') }}</h4>
        <ul>
          <li><a href="tel:02287324188">(022) 87324188</a></li>
          <li><a href="https://wa.me/62811912502">0811-912-502</a></li>
          <li><a href="mailto:cs@hervent.co.id">cs@hervent.co.id</a></li>
          <li>Bandung &amp; Surabaya</li>
          <li>{{ __('messages.footer.work_hours') }}</li>
        </ul>
      </div>
    </div>
    <div class="foot-b">
      <span>© {{ date('Y') }} HERVENT · PT Aventama Hervent Solusindo</span>
      <span>{{ __('messages.footer.wa_active') }}</span>
    </div>
  </div>
</footer>
