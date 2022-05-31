<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\PengunjungController;
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
    return view('layouts.index');
});

Route::resource('kamar',KamarController::class);
Route::resource('makanan',MakananController::class);
Route::resource('minuman',MinumanController::class);
Route::resource('pengunjung',PengunjungController::class);
