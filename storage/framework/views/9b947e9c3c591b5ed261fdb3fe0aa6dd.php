<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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

			<?php if($errors->any()): ?>
				<div role="alert">
					<ul>
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			<?php endif; ?>

			<form method="POST" action="<?php echo e(route('register.post')); ?>">
				<?php echo csrf_field(); ?>
				<label for="username">
					Username
					<input type="text" id="username" name="username" value="<?php echo e(old('username')); ?>" required autofocus>
				</label>

				<label for="email">
					Email
					<input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
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

			<p>Sudah punya akun? <a href="<?php echo e(route('login')); ?>">Masuk</a></p>
		</article>
	</main>
</body>
</html>


<?php /**PATH C:\Users\Naufal\Documents\Tugas-Magang\Laravel\LoginPage\resources\views/auth/register.blade.php ENDPATH**/ ?>