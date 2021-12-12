<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarBaruController;
use App\Http\Controllers\DaftarLamaController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\DashboardDokterController;
use App\Http\Controllers\DashboardPasienController;
use App\Http\Controllers\DashboardPoliklinikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home',
        'image' => 'rotinsulu.png'
    ]);
});

Route::get('/pendaftaran', function () {
    return view('daftar.konfirmasi',[
        'title' => 'Pendaftaran',
        'active' => 'pendaftaran'
    ]);
});

Route::get('/konfirmasi', [KonfirmasiController::class, 'index']);
Route::post('/konfirmasi', [KonfirmasiController::class, 'store']);

Route::resource('/daftar', DaftarBaruController::class);
Route::resource('/daftar_lama', DaftarLamaController::class);

Route::get('/about', function () {
    return view('about',[
        'title' => 'About',
        'active' => 'about'
    ]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/dokter', DashboardDokterController::class)->middleware('auth');
Route::resource('/dashboard/poliklinik', DashboardPoliklinikController::class)->middleware('auth');
Route::resource('/dashboard/pasien', DashboardPasienController::class)->middleware('auth');