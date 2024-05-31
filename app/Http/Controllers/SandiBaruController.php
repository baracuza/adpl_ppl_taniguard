<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class SandiBaruController extends Controller
{
    public function katasandi_token(string $token){
        return view('auth.sandi-baru', ['token' => $token]);
    }

    public function katasandi_update(Request $request){
        // Custom error messages
        $customMessage = [
            'password.required'     => 'Data wajib diisi',
            'token.required'        => 'Data wajib diisi',
            'password.confirmed'    => 'Konfirmasi kata sandi tidak cocok',
        ];

        // Validasi manual untuk memastikan kedua kolom diisi
        if ($request->filled('password') xor $request->filled('password_confirmation')) {
            return back()->withErrors(['password' => 'Data wajib diisi'])->withInput();
        }

        // Laravel validation
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ], $customMessage);


        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            // Pesan kustom ketika kata sandi berhasil diperbarui
            $successMessage = 'Kata Sandi berhasil diperbarui';
            return redirect()->route('login');

        } else {
        return back()->withErrors(['email' => [__($status)]]);
        }

    }
}
