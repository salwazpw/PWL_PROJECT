<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('postlogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'CekLevel:admin,user']], function(){
    Route::get('/', function () {
        return view('layouts.dashboard');
    });
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    });
    Route::resource('kamar',KamarController::class);
    Route::resource('makanan',MakananController::class);
    Route::resource('minuman',MinumanController::class);
    Route::resource('pesanan',PesananController::class);
    Route::resource('pengunjung',PengunjungController::class);
    Route::resource('reservasi',ReservasiController::class);
    Route::get('pesanans/cetak_pdf/{pesanan}', [PesananController::class, 'cetak_pdf'])->name('cetakpdf');
    Route::get('transaksis/cetak_pdf/{transaksi}', [TransaksiController::class, 'cetak_pdf'])->name('cetak_pdf');
    Route::get('reservasis/cetak_pdf/{reservasi}', [ReservasiController::class, 'cetak_pdf'])->name('pdfcetak');
    Route::get('order/{pesanan}', [PesananController::class, 'pesanan'])->name('order');
    Route::get('payment/{transaksi}', [TransaksiController::class, 'transaksi'])->name('payment');
    Route::get('reserv/{reservasi}', [ReservasiController::class, 'reservasi'])->name('reserv');
});

Route::group(['middleware' => ['auth', 'CekLevel:admin']], function(){
    Route::resource('pegawai',PegawaiController::class);
    Route::resource('transaksi',TransaksiController::class);
});