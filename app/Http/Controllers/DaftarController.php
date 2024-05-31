<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{
    public function daftar(){
        return view('auth.daftar');
    }

    public function daftar_proses(Request $request){
        $customMessages = [
            'nama.regex'    => 'Maaf data anda tidak valid',
            'required'      => 'Semua data wajib diisi',
        ];

        $rules = [
            'nama'      => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'username'  => 'required',
            'email'     => 'required|email',
            'password'  => 'required',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customMessages);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        $checkUser = User::where('username',$request->username)->first();
        if ($checkUser){
            return redirect()->route('register')->withErrors('Maaf data anda tidak valid!');
        }
        // $checkEmail = User::where('email',$request->email)->first();
        // if ($checkEmail){
        //     return redirect()->route('daftar')->withErrors('Akun anda telah Terdaftar!');
        // }


        $user = User::create([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('pengguna');
        return redirect()->route('login');

    }
}
