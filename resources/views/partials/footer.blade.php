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
          <li>Bandung</li>
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

<a class="mobile-floating-wa" href="https://wa.me/62811912502" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp HERVENT" title="Chat WhatsApp">
  <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
    <path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.5 0 .2 5.3.2 11.9c0 2.1.5 4.1 1.6 5.9L.1 24l6.3-1.7a11.9 11.9 0 0 0 5.7 1.4h.1c6.5 0 11.8-5.3 11.8-11.9a11.8 11.8 0 0 0-3.5-8.3zM12.1 21.7h-.1a9.8 9.8 0 0 1-5-1.4l-.4-.2-3.7 1 1-3.6-.2-.4a9.9 9.9 0 0 1-1.5-5.2c0-5.5 4.4-9.9 9.9-9.9 2.6 0 5.1 1 7 2.9a9.8 9.8 0 0 1 2.9 7c0 5.4-4.4 9.8-9.9 9.8zM17.5 14.5c-.3-.1-1.8-.9-2.1-1-.3-.1-.5-.1-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-1.7-.9-2.8-1.6-3.9-3.5-.3-.5.3-.5.8-1.7.1-.2.1-.4 0-.5-.1-.1-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.2.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.8-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.1-.3-.2-.6-.3z"/>
  </svg>
</a>
