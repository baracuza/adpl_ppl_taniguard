<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Artikel;

class TambahArtikelController extends Controller
{
    //craete
    public function create(){
        return view('artikel.create_artikel');
    }

    //store
    public function store( Request $request ){
        $customMessage = [
            'judul.required'        => 'Semua data wajib diisi',
            'deskripsi.required'    => 'Semua data wajib diisi',
            'gambar.required'    => 'Semua data wajib diisi',
            'gambar.mimes'          => 'Maaf data anda tidak valid',
            'gambar.max'            => 'Maaf data anda tidak valid',
        ];

        $validator = Validator::make($request->all(),[
            
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'required|mimes:png,jpg,jpeg|max:100',
        ],$customMessage);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        if(empty($request->judul) || empty($request->deskripsi) || empty($request->gambar)) {
            return redirect()->back()->withErrors('Semua Data Wajib Diisi')->withInput();
        }

        $gambar     = $request->file('gambar');
        $filename   = date('Y-m-d').$gambar->getClientOriginalName();
        $path       = 'gambar-artikel/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($gambar));

        $ardata['judul']        = $request->judul;
        $ardata['deskripsi']    = $request->deskripsi;
        $ardata['gambar']       = $filename;
        // dd($ardata);

        Artikel::create($ardata);
        return redirect()->route('admin.artikel')->with('update','Data Berhasil Ditambahkan');

    }
}
