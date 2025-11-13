<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	/**
	 * Tampilkan halaman login.
	 */
	public function showLogin()
	{
		return view('auth.login');
	}

	/**
	 * Proses login user.
	 */
	public function login(Request $request)
	{
		$request->validate([
			'login' => ['required', 'string'],
			'password' => ['required'],
		]);

		$login = $request->input('login');
		$password = $request->input('password');

		// Cek apakah input adalah email atau username
		$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		$credentials = [
			$field => $login,
			'password' => $password,
		];

		if (Auth::attempt($credentials, $request->boolean('remember'))) {
			$request->session()->regenerate();
			return redirect()->intended(route('dashboard'));
		}

		return back()->withErrors([
			'login' => 'Kredensial tidak valid.',
		])->onlyInput('login');
	}

	/**
	 * Tampilkan halaman register.
	 */
	public function showRegister()
	{
		return view('auth.register');
	}

	/**
	 * Proses registrasi user baru.
	 */
	public function register(Request $request)
	{
		$validated = $request->validate([
			'username' => ['required', 'string', 'max:255', 'unique:users,username'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
			'password' => ['required', 'confirmed', 'min:8'],
		]);

		$user = User::create([
			'name' => $validated['username'], // Set name dengan username
			'username' => $validated['username'],
			'email' => $validated['email'],
			// Model User sudah cast 'password' => 'hashed'
			'password' => $validated['password'],
		]);

		Auth::login($user);

		$request->session()->regenerate();

		return redirect()->route('dashboard');
	}

	/**
	 * Logout user.
	 */
	public function logout(Request $request)
	{
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('login');
	}
}


