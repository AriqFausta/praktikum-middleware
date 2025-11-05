@extends('layouts.app')

@section('content')
	<div class="card" style="max-width:600px;margin:0 auto">
		<h2>Register</h2>

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

		<form method="POST" action="{{ route('register') }}" style="margin-top:12px;display:grid;gap:10px">
			@csrf

			<div class="form-row">
				<label for="name">Name</label>
				<input id="name" type="text" name="name" value="{{ old('name') }}" required>
			</div>

			<div class="form-row">
				<label for="email">Email</label>
				<input id="email" type="email" name="email" value="{{ old('email') }}" required>
			</div>

			<div class="form-row">
				<label for="password">Password</label>
				<input id="password" type="password" name="password" required>
			</div>

			<div class="form-row">
				<label for="password_confirmation">Konfirmasi Password</label>
				<input id="password_confirmation" type="password" name="password_confirmation" required>
			</div>

			<div style="margin-top:6px;display:flex;justify-content:flex-end">
				<button type="submit">Daftar</button>
			</div>
		</form>

		<p class="muted" style="margin-top:12px">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
	</div>
@endsection
