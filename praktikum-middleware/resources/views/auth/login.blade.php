@extends('layouts.app')

@section('content')
	<div class="card" style="max-width:520px;margin:0 auto">
		<h2>Login</h2>

		@if ($errors->any())
			<div class="error-list">
				<strong>Terjadi kesalahan:</strong>
				<ul style="margin:6px 0 0 18px;padding:0">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form method="POST" action="{{ route('login') }}" style="margin-top:12px;display:grid;gap:10px">
			@csrf

			<div class="form-row">
				<label for="email">Email</label>
				<input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
			</div>

			<div class="form-row">
				<label for="password">Password</label>
				<input id="password" type="password" name="password" required>
			</div>

			<div style="display:flex;justify-content:space-between;align-items:center">
				<label class="muted" style="display:inline-flex;align-items:center;gap:6px"><input type="checkbox" name="remember"> Ingat saya</label>
				<div style="display:flex;gap:8px;align-items:center">
					<a class="muted" href="/password/reset">Lupa kata sandi?</a>
					<button type="submit">Masuk</button>
				</div>
			</div>
		</form>

		<p class="muted" style="margin-top:14px;text-align:center">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
	</div>
@endsection
