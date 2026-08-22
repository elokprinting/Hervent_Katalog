@extends('layouts.app')

@section('title', 'Blog Management')

@section('content')
<main id="top">
  <section class="s" style="padding-top: 60px;">
    <div class="wrap" style="max-width: 1200px; margin: 0 auto; position: relative; min-height: 80vh;">
      
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 class="h2">Blog Management (Production)</h1>
      </div>

      @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
          {{ session('success') }}
        </div>
      @endif
      
      @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
          <tr style="border-bottom: 2px solid #eaeaea;">
            <th style="padding: 1rem;">Image</th>
            <th style="padding: 1rem;">Title</th>
            <th style="padding: 1rem;">Date</th>
            <th style="padding: 1rem;">Status</th>
            <th style="padding: 1rem;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($blogs as $blog)
          <tr style="border-bottom: 1px solid #eaeaea;">
            <td style="padding: 1rem;">
              @if($blog->image)
                <img src="{{ asset($blog->image) }}" alt="image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
              @else
                <div style="width: 50px; height: 50px; background: #eee; border-radius: 4px;"></div>
              @endif
            </td>
            <td style="padding: 1rem; max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $blog->title }}</td>
            <td style="padding: 1rem;">{{ $blog->published_at ? $blog->published_at->format('d M Y') : 'Draft' }}</td>
            <td style="padding: 1rem;">
              @if($blog->is_published)
                <span style="background: #e6f4ea; color: #1e8e3e; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.85rem;">Published</span>
              @else
                <span style="background: #f1f3f4; color: #5f6368; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.85rem;">Draft</span>
              @endif
            </td>
            <td style="padding: 1rem;">
              <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" style="color: #4285f4; text-decoration: none; margin-right: 10px;">View</a>
            </td>
          </tr>
          @endforeach
          
          @if($blogs->isEmpty())
          <tr>
            <td colspan="5" style="padding: 2rem; text-align: center; color: #888;">No blogs found. Create one by clicking the + button.</td>
          </tr>
          @endif
        </tbody>
      </table>

      <!-- FAB (Floating Action Button) -->
      <button onclick="document.getElementById('blogModal').style.display='flex'" style="position: fixed; bottom: 30px; right: 30px; width: 60px; height: 60px; border-radius: 50%; background: #e31837; color: white; border: none; font-size: 24px; cursor: pointer; box-shadow: 0 4px 10px rgba(227, 24, 55, 0.3); display: flex; align-items: center; justify-content: center; z-index: 100;">
        +
      </button>

      <!-- Popup Modal -->
      <div id="blogModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: #fff; width: 100%; max-width: 600px; padding: 2rem; border-radius: 8px; position: relative; max-height: 90vh; overflow-y: auto;">
          <button onclick="document.getElementById('blogModal').style.display='none'" style="position: absolute; top: 15px; right: 20px; background: none; border: none; font-size: 1.5rem; cursor: pointer;">&times;</button>
          <h2 class="h3" style="margin-bottom: 1.5rem;">Add New Blog</h2>
          
          <form action="{{ route('production.blog.store') }}" method="POST" enctype="multipart/form-data" class="catalog-form" style="max-width: none;">
            @csrf
            <div class="catalog-field" style="margin-bottom: 1rem;">
              <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Title</label>
              <input type="text" name="title" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px; font-family: inherit;">
            </div>
            
            <div class="catalog-field" style="margin-bottom: 1rem;">
              <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Image</label>
              <input type="file" name="image" accept="image/*" style="width: 100%; padding: 0.5rem;">
            </div>

            <div class="catalog-field" style="margin-bottom: 1.5rem;">
              <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Content (HTML supported)</label>
              <textarea name="content" rows="10" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px; font-family: inherit; font-size: 1rem;"></textarea>
            </div>

            <div style="text-align: right;">
              <button type="submit" class="btn b-red" style="padding: 0.8rem 2rem; border: none; cursor: pointer;">Publish Blog</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>
</main>
@endsection
