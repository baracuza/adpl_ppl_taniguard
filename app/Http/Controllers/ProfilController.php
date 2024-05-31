<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    // public function profil(){
    //     $akun = Auth::user();
    //     return view('profil.profil',compact('akun'));
    //     return view('profil.profil');
    // }
    public function profil(){
        return view('profil.profil');
    }

    // public function profil_edit(){
    //     return view('profil.profil_edit');
    // }

    public function profil_update(Request $request,$id){
        $customMessage = [
            'password.required'     => 'Data wajib diisi',
            'nama.required'         => 'Data wajib diisi',
            'username.required'     => 'Data wajib diisi',
            'email.required'        => 'Data wajib diisi',
            'password.min'          => 'Kata sandi minimal 5 karakter',
            'password.confirmed'    => 'Konfirmasi kata sandi tidak cocok',
        ];


        $validator = Validator::make($request->all(),[
            'nama'          => 'required',
            'username'      => 'required',
            'email'         => 'required|email',
            'password'      => 'nullable',
            'gambar'        => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ],$customMessage);
        
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        if(empty($request->nama) || empty($request->username) || empty($request->email) || empty($request->password))  {
            return redirect()->back()->withErrors('Semua Data Wajib Diisi')->withInput();
        }

        $data['name']               = $request->nama;
        $data['username']           = $request->username;
        $data['email']              = $request->email;
        if($request->password){
            $data['password']           = Hash::make($request->password);
        }

        $gambar     = $request->file('gambar');
        if($gambar){
            $filename   = date('Y-m-d').$gambar->getClientOriginalName();
            $path       = 'gambar-profil/'.$filename;

            Storage::disk('public')->put($path,file_get_contents($gambar));

            $data['image']       = $filename;
        }

        User::whereId($id)->update($data);

        return redirect()->route('profil')->with('success','Data Berhasil Diubah');
    }



}
