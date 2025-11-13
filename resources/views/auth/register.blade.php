<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://unpkg.com/@picocss/pico@2/css/pico.min.css">
	<style>
		body { display: flex; min-height: 100vh; align-items: center; justify-content: center; }
		main { width: 100%; max-width: 520px; }
	</style>
</head>
<body>
	<main>
		<article>
			<h2>Daftar Akun</h2>

			@if ($errors->any())
				<div role="alert">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form method="POST" action="{{ route('register.post') }}">
				@csrf
				<label for="username">
					Username
					<input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
				</label>

				<label for="email">
					Email
					<input type="email" id="email" name="email" value="{{ old('email') }}" required>
				</label>

				<label for="password">
					Kata Sandi
					<input type="password" id="password" name="password" required>
				</label>

				<label for="password_confirmation">
					Konfirmasi Kata Sandi
					<input type="password" id="password_confirmation" name="password_confirmation" required>
				</label>

				<button type="submit">Daftar</button>
			</form>

			<p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
		</article>
	</main>
</body>
</html>


