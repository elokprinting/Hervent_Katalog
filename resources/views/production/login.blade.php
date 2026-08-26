<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Production Access | HERVENT</title>
<meta name="theme-color" content="#B81A1F">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
  body {
    margin: 0;
    min-height: 100vh;
    background-color: #f9f9f9;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font, 'Inter', sans-serif);
  }
  .login-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    padding: 3rem 2.5rem;
    width: 100%;
    max-width: 440px;
    text-align: center;
    border: 1px solid #eaeaea;
  }
  .login-logo {
    margin-bottom: 2rem;
  }
  .login-logo img {
    height: 45px;
    object-fit: contain;
  }
  .login-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #222;
    margin-bottom: 0.5rem;
  }
  .login-subtitle {
    font-size: 0.95rem;
    color: #666;
    margin-bottom: 2rem;
    line-height: 1.5;
  }
  .form-group {
    margin-bottom: 1.5rem;
    text-align: left;
  }
  .form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    font-size: 0.9rem;
    color: #444;
  }
  .form-group input {
    width: 100%;
    padding: 0.9rem 1rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    font-family: inherit;
    transition: all 0.2s;
    box-sizing: border-box;
    background-color: #fafafa;
  }
  .form-group input:focus {
    outline: none;
    border-color: #b81a1f;
    background-color: #fff;
    box-shadow: 0 0 0 3px rgba(184, 26, 31, 0.1);
  }
  .btn-login {
    width: 100%;
    background: #b81a1f;
    color: #fff;
    border: none;
    padding: 1rem;
    border-radius: 8px;
    font-size: 1.05rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    margin-top: 0.5rem;
    box-shadow: 0 4px 12px rgba(184, 26, 31, 0.2);
  }
  .btn-login:hover {
    background: #991519;
    box-shadow: 0 4px 15px rgba(184, 26, 31, 0.3);
  }
  .alert-error {
    background: #fef0f0;
    color: #c92a2a;
    border-left: 4px solid #c92a2a;
    padding: 1rem;
    border-radius: 4px;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
    text-align: left;
  }
  .alert-info {
    background: #f0f7ff;
    color: #005cc5;
    border-left: 4px solid #005cc5;
    padding: 1rem;
    border-radius: 4px;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
    text-align: left;
  }
  .back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 2rem;
    font-size: 0.9rem;
    color: #777;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s;
  }
  .back-link:hover {
    color: #b81a1f;
  }
</style>
</head>
<body>

<div class="login-card">
  <div class="login-logo">
    <img src="{{ asset('images/Logo Landscape.png') }}" alt="Hervent Logo" onerror="this.style.display='none'">
  </div>
  
  <div class="login-title">Area Produksi</div>
  <div class="login-subtitle">Masukkan password untuk mengakses halaman manajemen konten</div>

  @if(session('info'))
    <div class="alert-info">{{ session('info') }}</div>
  @endif

  @if($errors->has('password'))
    <div class="alert-error">{{ $errors->first('password') }}</div>
  @endif

  <form action="{{ route('production.login.submit', absolute: false) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="password">Password Akses</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password..." autocomplete="current-password" required autofocus>
    </div>
    <button type="submit" class="btn-login">Masuk ke Dashboard</button>
  </form>

  <a href="{{ route('home') }}" class="back-link">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    Kembali ke Website
  </a>
</div>

</body>
</html>
