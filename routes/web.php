<?php

use App\Http\Controllers\KamarController;
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
Route::resource('pegawai',PegawaiController::class);
Route::resource('reservasi',ReservasiController::class);
Route::resource('transaksi',TransaksiController::class);
Route::get('pesanans/cetak_pdf', [PesananController::class, 'cetak_pdf']);
Route::get('transaksis/cetak_pdf', [TransaksiController::class, 'cetak_pdf']);
