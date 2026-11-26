<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // ---------- LOGIN ----------

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Argumen kedua = remember me (checkbox "Ingat saya")
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))
                ->with('success', 'Login berhasil. Selamat datang!');
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    // ---------- LOGOUT ----------

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Anda sudah logout.');
    }

    // ---------- LUPA PASSWORD ----------

    public function showForgot()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success',
                'Link reset password sudah dikirim ke email Anda. Cek inbox (Mailpit).');
        }

        $message = $status === Password::RESET_THROTTLED
            ? 'Terlalu sering mencoba. Tunggu sebentar lalu coba lagi.'
            : 'Email tidak terdaftar.';

        return back()->withErrors(['email' => $message])->onlyInput('email');
    }

    // ---------- RESET PASSWORD ----------

    public function showReset(Request $request, string $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')
                ->with('success', 'Password berhasil diubah. Silakan login.');
        }

        return back()
            ->withErrors(['email' => 'Token reset tidak valid atau sudah kedaluwarsa.'])
            ->onlyInput('email');
    }
}
