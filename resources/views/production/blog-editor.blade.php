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
    border-radius: 4px;
    margin-bottom: 1rem;
  }
  .alert-error {
    background: #f8d7da;
    color: #721c24;
    padding: 1rem;
    border-radius: 4px;
    margin-bottom: 1rem;
  }
  .blog-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    background: #fff;
    border-radius: 8px;
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
    border-radius: 10px;
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
    border-radius: 6px;
    font-family: inherit;
    font-size: 1rem;
    transition: border-color 0.2s;
  }
  .form-group input:focus,
  .form-group textarea:focus {
    outline: none;
    border-color: #b81a1f;
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
          <form action="{{ route('production.logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" style="background: transparent; border: 1.5px solid #b81a1f; color: #b81a1f; padding: 0.6rem 1.2rem; border-radius: 8px; font-weight: 600; font-size: 0.95rem; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 0.5rem;" onmouseover="this.style.background='#b81a1f';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#b81a1f'">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
              Logout
            </button>
          </form>
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
            <td colspan="5" style="padding: 3rem; text-align: center; color: #aaa;">
              Belum ada artikel. Klik tombol <strong>+</strong> untuk menambah.
            </td>
          </tr>
          @endif
        </tbody>
      </table>

    </div>
  </section>
</main>

<!-- FAB Button -->
<button class="fab" onclick="document.getElementById('blogModal').style.display='flex'" title="Tambah Blog Baru">+</button>

<!-- Modal Add Blog -->
<div id="blogModal" class="modal-overlay">
  <div class="modal-box">
    <button class="modal-close" onclick="document.getElementById('blogModal').style.display='none'">&times;</button>
    <h2 class="h3" style="margin-bottom: 1.5rem;">Tambah Blog Baru</h2>

    <form action="{{ route('production.blog.store') }}" method="POST" enctype="multipart/form-data">
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

@include('partials.footer')

</body>
</html>
