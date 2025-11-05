<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Middleware') }}</title>
    <style>
      :root{--bg:#9292eb;--card:#fff;--muted:#6b7280;--accent:#111827}
      *{box-sizing:border-box}
      body{margin:0;font-family:system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial;background:var(--bg);color:#111}
      .container{max-width:1000px;margin:28px auto;padding:18px}
      header{background:var(--card);border-radius:10px;padding:12px 18px;display:flex;justify-content:space-between;align-items:center;box-shadow:0 6px 18px rgba(17,24,39,0.04)}
      .brand{font-weight:600}
      nav a{margin-left:12px;color:var(--accent);text-decoration:none;font-size:14px}
      .card{background:var(--card);padding:18px;border-radius:10px;box-shadow:0 6px 18px rgba(17,24,39,0.04)}
      .grid{display:grid;gap:12px}
      .form-row{display:flex;flex-direction:column;gap:6px}
      input[type="text"],input[type="email"],input[type="password"]{padding:10px;border:1px solid #e5e7eb;border-radius:8px;font-size:14px}
      button{background:var(--accent);color:#fff;padding:9px 12px;border-radius:8px;border:none;cursor:pointer}
      .muted{color:var(--muted);font-size:13px}
      .error-list{background:#fff5f5;border:1px solid #fecaca;color:#991b1b;padding:10px;border-radius:6px;font-size:13px}
      footer{margin-top:16px;text-align:center;color:var(--muted);font-size:13px}
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="brand">{{ config('app.name', 'Middleware') }}</div>
        <nav>
          @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            @if(auth()->user()->role === 'admin')
              <a href="{{ url('/admin') }}">Admin</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
              @csrf
              <button type="submit" style="margin-left:12px;background:transparent;color:var(--accent);padding:6px">Logout</button>
            </form>
          @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
          @endauth
        </nav>
      </header>

      <main style="margin-top:18px">
        @if(session('success'))
          <div class="card" style="margin-bottom:12px;color:green">{{ session('success') }}</div>
        @endif

        @yield('content')
      </main>

      <footer>
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} • PHP v{{ PHP_VERSION }}
      </footer>
    </div>
  </body>
</html>
