<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EditArtikelController extends Controller
{
    public function edit(Request $request,$id){
        $ardata = Artikel::find($id);
        return view('artikel.artikel_edit',compact('ardata'));

    }

    public function update(Request $request,$id){
        $customMessage = [
            'judul.required'        => 'Data wajib diisi',
            'deskripsi.required'    => 'Data wajib diisi',
            'gambar.mimes'          => 'Maaf data anda tidak valid',
            'gambar.max'            => 'Maaf data anda tidak valid',
        ];

        $validator = Validator::make($request->all(),[
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'nullable|mimes:png,jpg,jpeg|max:100',
            
            
        ],$customMessage);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $ardata['judul']        = $request->judul;
        $ardata['deskripsi']    = $request->deskripsi;

        $gambar     = $request->file('gambar');
        if($gambar){
            $filename   = date('Y-m-d').$gambar->getClientOriginalName();
            $path       = 'gambar-artikel/'.$filename;

            Storage::disk('public')->put($path,file_get_contents($gambar));

            $ardata['gambar']       = $filename;
        }
        
        
        Artikel::whereId($id)->update($ardata);

        return redirect()->route('admin.artikel')->with('update','Data Berhasil Diubah');
    }
}
