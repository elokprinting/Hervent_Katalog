<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Blog Management | HERVENT</title>
<meta name="theme-color" content="#B81A1F">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
  .editor-page {
    padding: 80px 0 60px;
    background: #f9f9f9;
    min-height: 100vh;
  }
  .editor-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }
  .editor-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
  }
  .alert-success {
    background: #d4edda;
    color: #155724;
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 1rem;
  }
  .alert-error {
    background: #f8d7da;
    color: #721c24;
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 1rem;
  }
  .blog-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07);
  }
  .blog-table th {
    padding: 1rem 1.2rem;
    border-bottom: 2px solid #eaeaea;
    font-weight: 600;
    color: #333;
    background: #fff;
  }
  .blog-table td {
    padding: 1rem 1.2rem;
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
    color: #444;
  }
  .blog-table tr:last-child td {
    border-bottom: none;
  }
  .badge-published {
    background: #e6f4ea;
    color: #1e8e3e;
    padding: 0.25rem 0.6rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
  }
  .badge-draft {
    background: #f1f3f4;
    color: #5f6368;
    padding: 0.25rem 0.6rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
  }
  /* FAB */
  .fab {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #b81a1f;
    color: white;
    border: none;
    font-size: 28px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(184, 26, 31, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 100;
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .fab:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 18px rgba(184, 26, 31, 0.5);
  }
  /* Modal */
  .modal-overlay {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 1000;
    align-items: center;
    justify-content: center;
  }
  .modal-box {
    background: #fff;
    width: 100%;
    max-width: 640px;
    padding: 2rem;
    border-radius: 16px;
    position: relative;
    max-height: 90vh;
    overflow-y: auto;
  }
  .modal-close {
    position: absolute;
    top: 12px; right: 16px;
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #666;
  }
  .form-group {
    margin-bottom: 1.25rem;
  }
  .form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    font-size: 0.95rem;
    color: #333;
  }
  .form-group input,
  .form-group textarea,
  .form-group select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #ddd;
    border-radius: 10px;
    appearance: none;
    background: #fff;
    background-image: none;
    font-family: inherit;
    font-size: 1rem;
    transition: border-color 0.2s;
  }
  .form-group select {
    background: #fff;
  }
  .form-group input[type="number"] {
    appearance: textfield;
    -moz-appearance: textfield;
  }
  .form-group input[type="number"]::-webkit-inner-spin-button,
  .form-group input[type="number"]::-webkit-outer-spin-button {
    appearance: none;
    margin: 0;
  }
  .form-group input:focus,
  .form-group textarea:focus,
  .form-group select:focus {
    outline: none;
    border-color: #b81a1f;
  }
  .btn-add-product {
    background: #b81a1f;
    color: #fff;
    border: 0;
    padding: 0.65rem 1rem;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
  }
  .btn-add-blog {
    background: transparent;
    color: #b81a1f;
    border: 1.5px solid #b81a1f;
    padding: 0.65rem 1rem;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
  }
  .btn-edit-product,
  .btn-delete-product {
    border: 0;
    border-radius: 7px;
    padding: 0.45rem 0.7rem;
    font-size: 0.82rem;
    font-weight: 600;
    cursor: pointer;
  }
  .btn-edit-product {
    background: #edf4ff;
    color: #235e8d;
    margin-right: 0.35rem;
  }
  .btn-delete-product {
    background: #fff0f0;
    color: #a2171b;
  }
  .product-type-badge {
    display: inline-block;
    padding: 0.25rem 0.55rem;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 600;
    white-space: nowrap;
  }
  .product-type-package { background: #fff2d8; color: #8a5a00; }
  .product-type-single { background: #eaf5ed; color: #24713d; }
  .section-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 2.5rem 0 1rem;
  }
  .product-thumb {
    width: 52px;
    height: 52px;
    object-fit: cover;
    border-radius: 10px;
    background: #f1f1f1;
  }
  .upload-help {
    display: block;
    margin-top: 0.45rem;
    color: #888;
    font-size: 0.8rem;
  }
  .product-pagination {
    margin-top: 1.25rem;
  }
  @media (max-width: 760px) {
    .editor-header {
      align-items: flex-start;
      flex-direction: column;
      gap: 1rem;
    }
    .editor-header > div:last-child {
      flex-wrap: wrap;
      gap: 0.75rem !important;
    }
    .blog-table {
      display: block;
      overflow-x: auto;
    }
    .modal-box {
      width: calc(100% - 2rem);
      padding: 1.5rem;
    }
  }
</style>
</head>
<body>

@include('partials.header')

<main>
  <section class="editor-page">
    <div class="editor-container">

      <div class="editor-header">
        <div>
          <h1 class="h2" style="margin-bottom: 0.25rem;">Blog Management</h1>
          <p style="color: #888; font-size: 0.9rem;">Production Area — Kelola semua artikel blog Hervent</p>
        </div>
        <div style="display: flex; align-items: center; gap: 1.5rem;">
          <a href="{{ route('blog.index') }}" target="_blank" style="color: #b81a1f; font-weight: 500; text-decoration: none; font-size: 0.95rem;">
            ← Lihat Blog Publik
          </a>
          <form action="{{ route('production.logout', absolute: false) }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" style="background: transparent; border: 1.5px solid #b81a1f; color: #b81a1f; padding: 0.6rem 1.2rem; border-radius: 8px; font-weight: 600; font-size: 0.95rem; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 0.5rem;" onmouseover="this.style.background='#b81a1f';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#b81a1f'">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
              Logout
            </button>
          </form>
          <button class="btn-add-blog" type="button" onclick="document.getElementById('blogModal').style.display='flex'">+ Blog</button>
          <button class="btn-add-product" type="button" onclick="document.getElementById('productModal').style.display='flex'">+ Produk</button>
        </div>
      </div>

      @if(session('success'))
        <div class="alert-success">✅ {{ session('success') }}</div>
      @endif

      @if ($errors->any())
        <div class="alert-error">
          <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <table class="blog-table">
        <thead>
          <tr>
            <th style="width: 56px;">No.</th>
            <th style="width: 60px;">Image</th>
            <th>Title</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($blogs as $blog)
          <tr>
            <td style="color: #888; font-weight: 600;">{{ $loop->iteration }}</td>
            <td>
              @if($blog->image)
                <img src="{{ asset($blog->image) }}" alt="image" style="width: 52px; height: 52px; object-fit: cover; border-radius: 6px;">
              @else
                <div style="width: 52px; height: 52px; background: #eee; border-radius: 6px;"></div>
              @endif
            </td>
            <td style="max-width: 320px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
              <strong>{{ $blog->title }}</strong>
            </td>
            <td style="white-space: nowrap; color: #666;">{{ $blog->published_at ? $blog->published_at->format('d M Y') : 'Draft' }}</td>
            <td>
              @if($blog->is_published)
                <span class="badge-published">Published</span>
              @else
                <span class="badge-draft">Draft</span>
              @endif
            </td>
            <td>
              <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" style="color: #4285f4; text-decoration: none; font-weight: 500; font-size: 0.9rem;">View →</a>
            </td>
          </tr>
          @endforeach

          @if($blogs->isEmpty())
          <tr>
            <td colspan="6" style="padding: 3rem; text-align: center; color: #aaa;">
              Belum ada artikel. Klik tombol <strong>+</strong> untuk menambah.
            </td>
          </tr>
          @endif
        </tbody>
      </table>

      <div class="section-heading">
        <h2 class="h3" style="margin: 0;">Katalog Produk</h2>
        <span style="color: #888; font-size: 0.9rem;">{{ $products->total() }} produk</span>
      </div>

      <table class="blog-table">
        <thead>
          <tr>
            <th style="width: 56px;">No.</th>
            <th style="width: 60px;">Image</th>
            <th>Nama</th>
            <th>Jenis Produk</th>
            <th>Katalog</th>
            <th>Satuan / Paketan</th>
            <th>Stok</th>
            <th>Spesifikasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $product)
            <tr>
              <td style="color: #888; font-weight: 600;">{{ $products->firstItem() + $loop->index }}</td>
              <td>
                <img class="product-thumb" src="{{ str_starts_with($product->image_url, 'http') ? $product->image_url : asset($product->image_url) }}" alt="{{ $product->name }}" loading="lazy">
              </td>
              <td><strong>{{ $product->name }}</strong></td>
              <td>{{ $product->category_label }}</td>
              <td>{{ $product->catalog_category_label }}</td>
              <td><span class="product-type-badge product-type-{{ $product->product_type }}">{{ $product->product_type_label }}</span></td>
              <td>{{ number_format($product->stock) }}</td>
              <td style="max-width: 420px; color: #666;">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</td>
              <td style="white-space: nowrap;">
                <button type="button" class="btn-edit-product" data-edit-product
                  data-action="{{ route('production.product.update', $product, absolute: false) }}"
                  data-name="{{ $product->name }}" data-category="{{ $product->category }}"
                  data-catalog-category="{{ $product->catalog_category }}"
                  data-product-type="{{ $product->product_type }}"
                  data-stock="{{ $product->stock }}" data-description="{{ $product->description }}">Edit</button>
                <form action="{{ route('production.product.destroy', $product, absolute: false) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus produk ini? Tindakan ini tidak dapat dibatalkan.');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-delete-product">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="9" style="padding: 2rem; text-align: center; color: #aaa;">Belum ada produk.</td></tr>
          @endforelse
        </tbody>
      </table>

      @if($products->total() > 0)
        <div class="catalog-pagination product-pagination">
          <p class="catalog-pagination-summary">
            Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }} dari {{ $products->total() }} produk
          </p>
          @if($products->hasPages())
            <nav class="catalog-pagination-nav" aria-label="Navigasi katalog produk">
              @if($products->onFirstPage())
                <span class="catalog-pagination-control is-disabled" aria-disabled="true">Previous</span>
              @else
                <a class="catalog-pagination-control" href="{{ $products->previousPageUrl() }}" rel="prev">Previous</a>
              @endif

              <div class="catalog-pagination-pages">
                @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                  @if($page == $products->currentPage())
                    <span class="catalog-pagination-page is-current" aria-current="page">{{ $page }}</span>
                  @else
                    <a class="catalog-pagination-page" href="{{ $url }}">{{ $page }}</a>
                  @endif
                @endforeach
              </div>

              @if($products->hasMorePages())
                <a class="catalog-pagination-control" href="{{ $products->nextPageUrl() }}" rel="next">Next</a>
              @else
                <span class="catalog-pagination-control is-disabled" aria-disabled="true">Next</span>
              @endif
            </nav>
          @endif
        </div>
      @endif

    </div>
  </section>
</main>

<!-- Modal Add Blog -->
<div id="blogModal" class="modal-overlay">
  <div class="modal-box">
    <button class="modal-close" onclick="document.getElementById('blogModal').style.display='none'">&times;</button>
    <h2 class="h3" style="margin-bottom: 1.5rem;">Tambah Blog Baru</h2>

    <form action="{{ route('production.blog.store', absolute: false) }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label>Judul <span style="color: #b81a1f;">*</span></label>
        <input type="text" name="title" required placeholder="Masukkan judul artikel...">
      </div>

      <div class="form-group">
        <label>Kategori</label>
        <input type="text" name="category" placeholder="Contoh: Corporate, Tips, Rekomendasi">
      </div>

      <div class="form-group">
        <label>Gambar Utama</label>
        <input type="file" name="image" accept="image/*">
      </div>

      <div class="form-group">
        <label>Excerpt (ringkasan singkat)</label>
        <textarea name="excerpt" rows="2" placeholder="Tulis ringkasan singkat artikel ini..."></textarea>
      </div>

      <div class="form-group">
        <label>Konten Artikel <span style="color: #b81a1f;">*</span> <span style="font-size: 0.8rem; color: #888;">(HTML didukung)</span></label>
        <textarea name="content" rows="10" required placeholder="Tulis konten artikel di sini...&#10;&#10;Contoh HTML:&#10;&lt;p&gt;Paragraf pertama...&lt;/p&gt;&#10;&lt;h3&gt;Sub Judul&lt;/h3&gt;&#10;&lt;p&gt;Konten lanjutan...&lt;/p&gt;"></textarea>
      </div>

      <div style="text-align: right; margin-top: 1.5rem;">
        <button type="button" onclick="document.getElementById('blogModal').style.display='none'" style="background: #f0f0f0; color: #333; border: none; padding: 0.75rem 1.5rem; border-radius: 6px; cursor: pointer; margin-right: 0.75rem; font-size: 0.95rem;">Batal</button>
        <button type="submit" style="background: #b81a1f; color: #fff; border: none; padding: 0.75rem 2rem; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 0.95rem;">Publish Blog</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit Product -->
<div id="editProductModal" class="modal-overlay">
  <div class="modal-box">
    <button class="modal-close" type="button" onclick="document.getElementById('editProductModal').style.display='none'">&times;</button>
    <h2 class="h3" style="margin-bottom: 1.5rem;">Edit Produk</h2>

    <form id="editProductForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="edit-product-name">Nama <span style="color: #b81a1f;">*</span></label>
        <input id="edit-product-name" type="text" name="name" required maxlength="255">
      </div>

      <div class="form-group">
        <label for="edit-product-category">Jenis Produk <span style="color: #b81a1f;">*</span></label>
        <div class="catalog-custom-select" data-custom-select>
          <select id="edit-product-category" name="category" required>
            @foreach(\App\Models\Product::PRODUCT_GROUPS as $category => $group)
              <option value="{{ $category }}">{{ $group['label'] }}</option>
            @endforeach
          </select>
          <button type="button" class="catalog-select-trigger" aria-haspopup="listbox" aria-expanded="false"><span>Pilih jenis produk</span></button>
          <div class="catalog-select-menu" role="listbox" tabindex="-1">
            @foreach(\App\Models\Product::PRODUCT_GROUPS as $category => $group)
              <button type="button" role="option" data-value="{{ $category }}" aria-selected="false">{{ $group['label'] }}</button>
            @endforeach
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="edit-product-catalog">Katalog / Kategori <span style="color: #b81a1f;">*</span></label>
        <div class="catalog-custom-select" data-custom-select>
          <select id="edit-product-catalog" name="catalog_category" required>
            @foreach($catalogCategories as $value => $label)
              <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
          </select>
          <button type="button" class="catalog-select-trigger" aria-haspopup="listbox" aria-expanded="false"><span>Pilih momen katalog</span></button>
          <div class="catalog-select-menu" role="listbox" tabindex="-1">
            @foreach($catalogCategories as $value => $label)
              <button type="button" role="option" data-value="{{ $value }}" aria-selected="false">{{ $label }}</button>
            @endforeach
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="edit-product-type">Satuan / Paketan <span style="color: #b81a1f;">*</span></label>
        <div class="catalog-custom-select" data-custom-select>
          <select id="edit-product-type" name="product_type" required>
            @foreach(\App\Models\Product::PRODUCT_TYPES as $value => $label)
              <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
          </select>
          <button type="button" class="catalog-select-trigger" aria-haspopup="listbox" aria-expanded="false"><span>Pilih satuan / paketan</span></button>
          <div class="catalog-select-menu" role="listbox" tabindex="-1">
            @foreach(\App\Models\Product::PRODUCT_TYPES as $value => $label)
              <button type="button" role="option" data-value="{{ $value }}" aria-selected="false">{{ $label }}</button>
            @endforeach
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="edit-product-stock">Jumlah (stok) <span style="color: #b81a1f;">*</span></label>
        <input id="edit-product-stock" type="number" name="stock" required min="0" max="4294967295" step="1">
      </div>

      <div class="form-group">
        <label for="edit-product-description">Spesifikasi Produk <span style="color: #b81a1f;">*</span></label>
        <textarea id="edit-product-description" name="description" rows="6" required maxlength="65535" placeholder="Isi detail spesifikasi sesuai jenis produk..."></textarea>
      </div>

      <div class="form-group">
        <label for="edit-product-image">Ganti Gambar</label>
        <input id="edit-product-image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
        <small class="upload-help">Kosongkan jika gambar tidak ingin diganti. Maksimal 5 MB dan 3000 x 3000 piksel.</small>
      </div>

      <div style="text-align: right; margin-top: 1.5rem;">
        <button type="button" onclick="document.getElementById('editProductModal').style.display='none'" style="background: #f0f0f0; color: #333; border: none; padding: 0.75rem 1.5rem; border-radius: 6px; cursor: pointer; margin-right: 0.75rem; font-size: 0.95rem;">Batal</button>
        <button type="submit" style="background: #b81a1f; color: #fff; border: none; padding: 0.75rem 2rem; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 0.95rem;">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Add Product -->
<div id="productModal" class="modal-overlay">
  <div class="modal-box">
    <button class="modal-close" type="button" onclick="document.getElementById('productModal').style.display='none'">&times;</button>
    <h2 class="h3" style="margin-bottom: 1.5rem;">Tambah Produk Baru</h2>

    <form action="{{ route('production.product.store', absolute: false) }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="product-name">Nama <span style="color: #b81a1f;">*</span></label>
        <input id="product-name" type="text" name="name" value="{{ old('name') }}" required maxlength="255" placeholder="Masukkan nama produk...">
      </div>

      <div class="form-group">
        <label for="product-category">Jenis Produk <span style="color: #b81a1f;">*</span></label>
        <div class="catalog-custom-select" data-custom-select>
          <select id="product-category" name="category" required>
            <option value="">Pilih jenis produk</option>
            @foreach(\App\Models\Product::PRODUCT_GROUPS as $category => $group)
              <option value="{{ $category }}" {{ old('category') === $category ? 'selected' : '' }}>{{ $group['label'] }}</option>
            @endforeach
          </select>
          <button type="button" class="catalog-select-trigger" aria-haspopup="listbox" aria-expanded="false"><span>{{ old('category') ? \App\Models\Product::PRODUCT_GROUPS[old('category')]['label'] : 'Pilih jenis produk' }}</span></button>
          <div class="catalog-select-menu" role="listbox" tabindex="-1">
            @foreach(\App\Models\Product::PRODUCT_GROUPS as $category => $group)
              <button type="button" role="option" data-value="{{ $category }}" aria-selected="{{ old('category') === $category ? 'true' : 'false' }}">{{ $group['label'] }}</button>
            @endforeach
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="product-catalog">Katalog / Kategori <span style="color: #b81a1f;">*</span></label>
        <div class="catalog-custom-select" data-custom-select>
          <select id="product-catalog" name="catalog_category" required>
            <option value="">Pilih momen katalog</option>
            @foreach($catalogCategories as $value => $label)
              <option value="{{ $value }}" {{ old('catalog_category') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
          </select>
          <button type="button" class="catalog-select-trigger" aria-haspopup="listbox" aria-expanded="false"><span>{{ old('catalog_category') ? ($catalogCategories[old('catalog_category')] ?? 'Pilih momen katalog') : 'Pilih momen katalog' }}</span></button>
          <div class="catalog-select-menu" role="listbox" tabindex="-1">
            @foreach($catalogCategories as $value => $label)
              <button type="button" role="option" data-value="{{ $value }}" aria-selected="{{ old('catalog_category') === $value ? 'true' : 'false' }}">{{ $label }}</button>
            @endforeach
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="product-type">Satuan / Paketan <span style="color: #b81a1f;">*</span></label>
        <div class="catalog-custom-select" data-custom-select>
          <select id="product-type" name="product_type" required>
            @foreach(\App\Models\Product::PRODUCT_TYPES as $value => $label)
              <option value="{{ $value }}" {{ old('product_type', 'single') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
          </select>
          <button type="button" class="catalog-select-trigger" aria-haspopup="listbox" aria-expanded="false"><span>{{ \App\Models\Product::PRODUCT_TYPES[old('product_type', 'single')] ?? 'Barang Satuan' }}</span></button>
          <div class="catalog-select-menu" role="listbox" tabindex="-1">
            @foreach(\App\Models\Product::PRODUCT_TYPES as $value => $label)
              <button type="button" role="option" data-value="{{ $value }}" aria-selected="{{ old('product_type', 'single') === $value ? 'true' : 'false' }}">{{ $label }}</button>
            @endforeach
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="product-stock">Jumlah (stok) <span style="color: #b81a1f;">*</span></label>
        <input id="product-stock" type="number" name="stock" value="{{ old('stock', 0) }}" required min="0" max="4294967295" step="1">
      </div>

      <div class="form-group">
        <label for="product-description">Spesifikasi Produk <span style="color: #b81a1f;">*</span></label>
        <textarea id="product-description" name="description" rows="6" required maxlength="65535" placeholder="Pilih jenis produk untuk menampilkan template spesifikasi...">{{ old('description') }}</textarea>
      </div>

      <div class="form-group">
        <label for="product-image">Gambar Produk</label>
        <input id="product-image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
        <small class="upload-help">JPG, PNG, atau WebP. Maksimal 5 MB dan 3000 x 3000 piksel.</small>
      </div>

      <div style="text-align: right; margin-top: 1.5rem;">
        <button type="button" onclick="document.getElementById('productModal').style.display='none'" style="background: #f0f0f0; color: #333; border: none; padding: 0.75rem 1.5rem; border-radius: 6px; cursor: pointer; margin-right: 0.75rem; font-size: 0.95rem;">Batal</button>
        <button type="submit" style="background: #b81a1f; color: #fff; border: none; padding: 0.75rem 2rem; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 0.95rem;">Simpan Produk</button>
      </div>
    </form>
  </div>
</div>

@include('partials.footer')

<script>
  const specificationTemplates = {
    'apparel-lifestyle': "- Model yang tersedia :\n- Bahan :\n- Ukuran :\n- Detail :",
    'bags-pouch': "- Model yang tersedia :\n- Bahan :\n- Detail :",
    'drinkware-dining': "- Kategori & material :\n- Dimensi & kapasitas :\n- Pilihan warna :\n- Pilihan cetak logo :",
    'gift-sets': "- Isi paket :\n- Bahan :\n- Kemasan :\n- Detail :",
    'office-stationery': "- Material & fitur :\n- Model yang tersedia :",
    'tech-gadgets': "- Model yang tersedia :\n- Spesifikasi :\n- Konektivitas :\n- Detail :"
  };

  function bindSpecificationTemplate(select, textarea) {
    let lastTemplate = '';

    function updateTemplate() {
      const template = specificationTemplates[select.value] || '';
      if (!textarea.value.trim() || textarea.value === lastTemplate) {
        textarea.value = template;
      }
      lastTemplate = template;
    }

    select.addEventListener('change', updateTemplate);
    return updateTemplate;
  }

  const addCategorySelect = document.getElementById('product-category');
  const addSpecification = document.getElementById('product-description');
  if (addCategorySelect && addSpecification) {
    const updateAddTemplate = bindSpecificationTemplate(addCategorySelect, addSpecification);
    if (!addSpecification.value.trim() && addCategorySelect.value) {
      updateAddTemplate();
    }
  }

  const editCategorySelect = document.getElementById('edit-product-category');
  const editSpecification = document.getElementById('edit-product-description');
  const updateEditTemplate = editCategorySelect && editSpecification
    ? bindSpecificationTemplate(editCategorySelect, editSpecification)
    : null;

  function syncCustomSelect(select) {
    const box = select.closest('[data-custom-select]');
    const option = select.options[select.selectedIndex];
    if (!box || !option) return;
    const trigger = box.querySelector('.catalog-select-trigger span');
    const selected = box.querySelectorAll('[role="option"]');
    if (trigger) trigger.textContent = option.textContent;
    selected.forEach(function (item) {
      item.setAttribute('aria-selected', String(item.dataset.value === select.value));
    });
  }

  document.querySelectorAll('[data-edit-product]').forEach(function (button) {
    button.addEventListener('click', function () {
      const form = document.getElementById('editProductForm');
      form.action = button.dataset.action;
      document.getElementById('edit-product-name').value = button.dataset.name;
      const categorySelect = document.getElementById('edit-product-category');
      if (!categorySelect.querySelector('option[value="' + CSS.escape(button.dataset.category) + '"]')) {
        const legacyCategory = document.createElement('option');
        legacyCategory.value = button.dataset.category;
        legacyCategory.textContent = button.dataset.category;
        legacyCategory.dataset.legacy = 'true';
        categorySelect.appendChild(legacyCategory);
        const menu = categorySelect.closest('[data-custom-select]').querySelector('.catalog-select-menu');
        const legacyOption = document.createElement('button');
        legacyOption.type = 'button';
        legacyOption.setAttribute('role', 'option');
        legacyOption.dataset.value = button.dataset.category;
        legacyOption.textContent = button.dataset.category;
        menu.appendChild(legacyOption);
        legacyOption.addEventListener('click', function () {
          categorySelect.value = legacyOption.dataset.value;
          categorySelect.dispatchEvent(new Event('change', { bubbles: true }));
          syncCustomSelect(categorySelect);
          menu.parentElement.classList.remove('is-open');
          menu.parentElement.querySelector('.catalog-select-trigger').setAttribute('aria-expanded', 'false');
        });
      }
      categorySelect.value = button.dataset.category;
      syncCustomSelect(categorySelect);
      const catalogSelect = document.getElementById('edit-product-catalog');
      catalogSelect.value = button.dataset.catalogCategory;
      syncCustomSelect(catalogSelect);
      const productTypeSelect = document.getElementById('edit-product-type');
      productTypeSelect.value = button.dataset.productType;
      syncCustomSelect(productTypeSelect);
      document.getElementById('edit-product-stock').value = button.dataset.stock;
      document.getElementById('edit-product-description').value = button.dataset.description;
      if (updateEditTemplate) {
        updateEditTemplate();
        document.getElementById('edit-product-description').value = button.dataset.description;
      }
      document.getElementById('edit-product-image').value = '';
      document.getElementById('editProductModal').style.display = 'flex';
    });
  });
</script>

</body>
</html>
