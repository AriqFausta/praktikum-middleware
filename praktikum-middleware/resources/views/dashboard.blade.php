@extends('layouts.app')

@section('content')
  <div class="card">
    <h2>Dashboard</h2>
    <p class="muted">Selamat datang, <strong>{{ auth()->user()->name }}</strong></p>
    <p class="muted">Role: <strong>{{ auth()->user()->role }}</strong></p>

    <div style="margin-top:12px;display:flex;gap:12px;flex-wrap:wrap">
      <a href="/hello" class="muted">Hello page</a>
      <a href="/jobs" class="muted">Jobs</a>
      @if(auth()->user()->role === 'admin')
        <a href="/admin" class="muted">Admin panel</a>
      @endif
    </div>
  </div>
@endsection
