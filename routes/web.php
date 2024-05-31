<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Buat_artikel;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\Data_pengguna;
use App\Http\Controllers\DetailArtikelController;
use App\Http\Controllers\edit_artikel;
use App\Http\Controllers\EditArtikelController;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\lihat_artikel;
use App\Http\Controllers\LupaSandiController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\PencatatanController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\TambahArtikelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SandiBaruController;
// tambahan
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/',[HomeController::class,'landing']);
// Route::get('/home',[HomeController::class,'landing']);

// masih guest
// Route::middleware(['guest'])->group(function(){



    Route::get('/home',[LandingController::class,'landing']);

Route::middleware(['guest'])->group(function(){
    Route::get('/',[LandingController::class,'landing']);
    Route::get('/index',[LandingController::class,'landing']);
    Route::get('/masuk',[MasukController::class,'indexMasuk'])->name('login');
    Route::post('/auth-masuk',[MasukController::class,'masuk_proses'])->name('login-proses');
    Route::get('/Daftar',[DaftarController::class,'daftar'])->name('register');
    Route::post('/auth-daftar',[DaftarController::class,'daftar_proses'])->name('register-proses');
    // ================================================================================================
    Route::get('/forgot-password',[LupaSandiController::class,'katasandi_request'])->name('password.request');
    Route::post('/forgot-password',[LupaSandiController::class,'request_email'])->name('password.email');
    Route::get('/reset-password/{token}',[SandiBaruController::class,'katasandi_token'])->name('password.reset');
    Route::post('/reset-password',[SandiBaruController::class,'katasandi_update'])->name('password.update');

    
});


Route::middleware(['auth'])->group(function(){
    Route::get('/beranda',[BerandaController::class,'beranda'])->name('admin.dasboard');
    Route::get('/data-pengguna',[Data_pengguna::class,'data_pengguna'])->name('akun');

    // profil
    Route::get('/profile',[ProfilController::class,'profil'])->name('profil');
    Route::get('/profile/profile-edit/{id}',[EditProfilController::class,'profil_edit'])->name('profil.edit');
    Route::put('/profile/profile-edit/update/{id}',[EditProfilController::class,'profil_update'])->name('profil.update'); //{proses update untuk edit profil} ini proses mengupdate artikel dari fitur edit artikel
    
    // artikel
    Route::get('/artikel',[ArtikelController::class,'indexArtikel'])->name('admin.artikel');
    Route::get('/artikel/lihat-artikel/{id}',[DetailArtikelController::class,'view'])->name('view_artikel');
    Route::get('/artikel/menambah',[TambahArtikelController::class,'create'])->name('admin.create');
    Route::post('/artikel/menambah/proses-menambah',[TambahArtikelController::class,'store'])->name('admin.store'); //{proses menambah untuk create} ini proses dari menambahkan artikel dari fitur tambah(create) artikel
    Route::get('/artikel/artikel-edit/{id}',[EditArtikelController::class,'edit'])->name('admin.edit');
    Route::put('/artikel/artikel-edit/update/{id}',[EditArtikelController::class,'update'])->name('admin.update'); //{proses update untuk eidt} ini proses mengupdate artikel dari fitur edit artikel
    
    Route::get('/keluar',[KeluarController::class,'keluar'])->name('logout');

    // pencatatan
    Route::get('/pencatatan/Real-Time',[SensorController::class,'monitoring_RT'])->name('monitoring-RT'); //=> monitoring card
    Route::get('/bacarespon', [SensorController::class,'bacarespon'])->name('bacarespon');
    Route::get('/simpan/{nilairespon}',[SensorController::class,'simpansensor'])->name('simpan-sensor'); //=> menyimpan nilai sensor ke database tb_sensor
    Route::get('/pencatatan/riwayat',[RiwayatController::class,'riwayat'])->name('riwayat');
    // Route::get('/sensor-data', [SensorController::class, 'sensor_data']);
});



// Route::post('/sensor-data', [SensorController::class, 'sensor_data']);
Route::post('/sensor-data', [SensorController::class, 'sensor_data'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

    
    
    
    
    
    
//     Route::middleware(['guest'])->group(function(){
        
// });

Route::get('/home', function() {
    return redirect('/');
});

// yang bisa diakses setelah login







// Route::get('/user_dasboard',[HomeController::class,'user_dasboard'])->name('user.dasboard'); 
// Route::get('/user_artikel',[ArtikelController::class,'user_artikel'])->name('user.artikel');

// Route::get('/user_artikel/view/{id}',[ArtikelController::class,'user_view'])->name('user.view_artikel');

// Route::middleware(['auth'])->group(function(){
    
// });




// Route::get('/coba/2', function () {
//     return view('auth.login-coba2');
// });
// Route::get('/coba/landing', function () {
//     return view('landing-coba');
// });
// Route::get('/coba', function () {
//     return view('auth.login-coba');
// });











Route::get('/template', function () {
    return view('user.view_artikel_user');
});


// Route::get('/login',[LoginController::class,'index'])->name('login');
// Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
// Route::get('/logout',[LoginController::class,'logout'])->name('logout');

// Route::get('/register',[LoginController::class,'register'])->name('register');
// Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');


// Route::get('/dasboard',[LoginController::class,'dasboard'])->name('dasboard');












