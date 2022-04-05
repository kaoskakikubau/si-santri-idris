<?php

use App\Models\Kategori;
use App\Models\Pengguna;
use GuzzleHttp\Middleware;
use App\Http\Controllers\DasborCtrl;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaCtrl;
use App\Http\Controllers\DasborPostCtrl;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DasborKategCtrl;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\DaftarController;


// # routes basic (gadipake)
// Route::get('/blog', [PostController::class, 'index']);
// Route::get('/blog/{post:slug}', [PostController::class, 'show']); //sing routes model binding
// # routes semua kategori
// Route::get('/kategories', function () {
//     return view('kategories', [
//         'title' => "Kategori Pos",
//         'kategories' => Kategori::all() //model kategori yg dikirim
//     ]);
// });

// # routes untuk daftar
// Route::get('/daftar', [DaftarController::class, 'index'])->middleware('guest');
// Route::post('/daftar', [DaftarController::class, 'buat'])->middleware('guest');
// # route untuk pos yang ada di dasbor
// // Route::get('/dasbor/posts/{post:post_id}', [DasborPostCtrl::class, 'show'])->middleware('auth'); //sing routes model binding
// Route::get('/dasbor/posts/cekSlug', [DasborPostCtrl::class, 'cekSlug'])->middleware('auth');
// Route::post('/dasbor/posts/create', [DasborPostCtrl::class, 'store'])->middleware('auth');
// Route::resource('/dasbor/posts', DasborPostCtrl::class)->middleware('auth');
// #route untuk resource kategori
// Route::resource('/dasbor/kategori', DasborKategCtrl::class)->except('show')->middleware('admin');


########## SISTEM ##########
# route home
Route::get('/', function () {
    return view('sistem.masuk', [
        "title" => "Masuk | Sistem Portal Santri",
    ]);
})->name('masuk')->middleware('guest'); //dikasi nama 'masuk' dan dijagain, supaya yg bisa akses masuk hanya 'guest'
# routes untuk masuk
// Route::get('/masuk', [MasukController::class, 'index'])->Middleware('guest');
Route::post('masuk', [MasukController::class, 'auth']);
# route untuk keluar
Route::get('keluar', [MasukController::class, 'keluar']);
# route untuk dasbor
// Route::get('/dasbor', [DasborController::class, 'index'])->middleware('auth');
Route::get('dasbor', [DasborCtrl::class, 'index'])->middleware('auth')->name('dasbor');
// Route::get('dasbor', function () {
//     // $hitung = Pengguna::all()->count();
//     return view('sistem.dasbor', [
//         'title' => "Dashboard | Sistem Informasi Santri",
//         'tabel' => false,
//         'jml_pengguna' => Pengguna::all()->count()
//     ]);})->middleware('auth')->name('dasbor');
### Routes baru untuk pengembangan sistem santri
# route untuk resource pengguna
// Route::resource('pengguna', PenggunaCtrl::class)->middleware('auth');
Route::resource('pengguna', PenggunaCtrl::class)->middleware('admin');
# route untuk cek nomer ID Pengguna
Route::get('hapusfoto', [PenggunaCtrl::class, 'hapusfoto']);

