<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\validation\Rule;

class EditProfilController extends Controller
{
    public function profil_edit(){
        return view('profil.profil_edit');
    }

    public function profil_update(Request $request,$id){
        $customMessage = [
            'password.required'     => 'Data wajib diisi',
            'nama.required'         => 'Data wajib diisi',
            'nama.regex'            => 'Maaf data anda tidak valid',
            'username.required'     => 'Data wajib diisi',
            'email.required'        => 'Data wajib diisi',
            'gambar.mimes'          => 'Maaf data anda tidak valid',
            'gambar.max'            => 'Maaf data anda tidak valid',
        ];


        $validator = Validator::make($request->all(),[
            'nama'          => 'required|regex:/^[a-zA-Z\s]*$/',
            'username'      => 'required',
            'email'         => 'required|email',
            'password'      => 'nullable',
            'gambar'        => 'nullable|mimes:png,jpg,jpeg|max:100',
        ],$customMessage);
        
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        // if(empty($request->nama) || empty($request->username) || empty($request->email) || empty($request->password))  {
        //     return redirect()->back()->withErrors('Semua Data Wajib Diisi')->withInput();
        // }

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
