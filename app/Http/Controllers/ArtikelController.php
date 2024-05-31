<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{
    public function indexArtikel(){
        $ardata = Artikel::get();

        return view('artikel.artikel',compact('ardata'));
    }
    // public function user_artikel(){
    //     $ardata = Artikel::get();

    //     return view('user.artikel_user',compact('ardata'));
    // }
    

    public function create(){
        return view('artikel.create_artikel');
    }

    public function store( Request $request ){
        $validator = Validator::make($request->all(),[
            'gambar'    => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

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
        

    public function edit(Request $request,$id){
        $ardata = Artikel::find($id);
        return view('artikel.artikel_edit',compact('ardata'));

    }

    public function view(Request $request,$id){
        $ardata_view = Artikel::find($id);
        return view('artikel.view_artikel',compact('ardata_view'));

    }
    // public function user_view(Request $request,$id){
    //     $ardata_view = Artikel::find($id);
    //     return view('user.view_artikel_user',compact('ardata_view'));

    // }


    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'nullable|mimes:png,jpg,jpeg|max:100',
            
            
        ]);

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
