<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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

			<?php if($errors->any()): ?>
				<div role="alert">
					<ul>
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			<?php endif; ?>

			<form method="POST" action="<?php echo e(route('login.post')); ?>">
				<?php echo csrf_field(); ?>
				<label for="login">
					Email atau Username
					<input type="text" id="login" name="login" value="<?php echo e(old('login')); ?>" required autofocus>
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

			<p>Belum punya akun? <a href="<?php echo e(route('register')); ?>">Daftar</a></p>
		</article>
	</main>
</body>
</html>


<?php /**PATH C:\Users\Naufal\Documents\Tugas-Magang\Laravel\LoginPage\resources\views/auth/login.blade.php ENDPATH**/ ?>