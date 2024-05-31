<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class LupaSandiController extends Controller
{
    // forgot-password
    public function lupa_password(){
        return view('auth.lupa-password');
    }

    public function lupa_password_proses(Request $request){
        // dd($request->all());
        $customMessage = [
            'email.required'     => 'Data wajib diisi',
            'email.email'        => 'Maaf data anda tidak valid',
            'email.exists'       => 'Maaf data anda tidak valid',
        ];

        $request->validate([
            'email'=> 'required|email|exists:users,email',
        ], $customMessage);

        $token = Str::random(60);

        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email,
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),


            ]
        );

        Mail::to($request->email)->send(new ResetPasswordMail($token));
        
        return redirect()->route('lupa-password')->with('success','kami telah mengirimkan link reset password ke email anda');

    }

    // validasi_forgot_password_act
    public function validasi_lupa_password_proses(Request $request) {

        $customMessage = [
            'password.required'     => 'Password tidak boleh kosong',
            'password.min'          => 'Password minimal 6 karakter',
        ];

        $request->validate([
            'password'=> 'required|min:6',
        ], $customMessage);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if (!$token) {
            return redirect ()->route('login')->with('failed', 'Token tidak valid');
        }

        $user = User::where('email', $token->email)->first();

        dd($user);
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        // ([
        //     'password' => Hash::make($request->password)
        // ]);
        
        $token->delete();

        return redirect()->route('login')->with('success','kata Sandi Anda Berhasil Diperbarui');



    }


    // validasi_forgot_password
    public function validasi_lupa_password(Request $request, $token){

        $getToken = PasswordResetToken :: where('token', $token)->first();

        if (!$getToken) {
            return redirect ()->route('login')->with('failed', 'Token tidak valid');
        }
        return view('auth.validasi-token', compact('token'));
    }

    // ------------------------------------------------------------------------------------------------------------------------------------
    public function katasandi_request(){
        return view('auth.lupa-sandi');
    }

    public function request_email(Request $request){
        $customMessage = [
            'email.required'     => 'Data wajib diisi',
            'email.exists'       => 'Maaf data anda tidak valid',
        ];


        $request->validate(['email' => 'required|email|exists:users,email'],$customMessage);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            // Pesan kustom ketika link reset berhasil dikirim
            $successMessage = 'Link reset kata sandi telah berhasil dikirim ke email Anda.';
            return back();
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function katasandi_token(string $token){
        return view('auth.reset-password', ['token' => $token]);
    }

    public function katasandi_update(Request $request){
        // Custom error messages
        $customMessage = [
            'password.required'     => 'Data wajib diisi',
            'password.confirmed'    => 'Konfirmasi kata sandi tidak cocok',
        ];

        // Validasi manual untuk memastikan kedua kolom diisi
        if ($request->filled('password') xor $request->filled('password_confirmation')) {
            return back()->withErrors(['password' => 'Data tidak valid'])->withInput();
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

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);

    }



}
