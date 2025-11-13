<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://unpkg.com/@picocss/pico@2/css/pico.min.css">
	<style>
		body { display: flex; min-height: 100vh; align-items: center; justify-content: center; }
		main { width: 100%; max-width: 420px; }
	</style>
	</head>
<body>
	<main>
		<article>
			<h2>Masuk</h2>

			@if ($errors->any())
				<div role="alert">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form method="POST" action="{{ route('login.post') }}">
				@csrf
				<label for="login">
					Email atau Username
					<input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus>
				</label>

				<label for="password">
					Kata Sandi
					<input type="password" id="password" name="password" required>
				</label>

				<label>
					<input type="checkbox" name="remember">
					Ingat saya
				</label>

				<button type="submit">Login</button>
			</form>

			<p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
		</article>
	</main>
</body>
</html>


