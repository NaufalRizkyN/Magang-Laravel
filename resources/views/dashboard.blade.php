<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://unpkg.com/@picocss/pico@2/css/pico.min.css">
	<style>
		body { display: flex; min-height: 100vh; align-items: center; justify-content: center; }
		main { width: 100%; max-width: 720px; }
	</style>
</head>
<body>
	<main>
		<article>
			<h2>Selamat datang, {{ auth()->user()->name }}</h2>
			<p>Ini adalah halaman yang diproteksi.</p>

			<form method="POST" action="{{ route('logout') }}">
				@csrf
				<button type="submit">Logout</button>
			</form>
		</article>
	</main>
</body>
</html>


