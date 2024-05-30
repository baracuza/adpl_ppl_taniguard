<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasukController extends Controller
{
    public function indexMasuk(){
        return view('auth.masuk');
    }

    public function masuk_proses(Request $request){
        if(empty($request->username) || empty($request->password)) {
            return redirect()->route('login')->withErrors('Semua Data Wajib Diisi')->withInput();
        }
        
        $infologin = [
            'username'     => $request->username,
            'password'     => $request->password,
        ];
            if(Auth::attempt($infologin)){

                return redirect()->route('admin.dasboard');
                // dd(auth()->user()->getRoleNames());
            } else{
                $user = User::where('username', $request->username)->first();
                if($user){
                    if(!Hash::check($request->password, $user->password)) {
                        return redirect()->route('login')->withErrors('Maaf data anda tidak valid!');
                    } else {
                        return redirect()->route('login')->withErrors('Maaf data anda tidak valid!');
                    }
                } else{
                    return redirect()->route('login')->withErrors('Maaf data anda tidak valid!');
                }
            } 
    }
}
