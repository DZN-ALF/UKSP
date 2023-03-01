<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\SppController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardController;


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


Auth::routes(); 
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('status-pembayaran/{siswa:nisn}', [PembayaranController::class, 'statusPembayaranShow'])->name('pembayaran.status-pembayaran.show');
    Route::get('status-pembayaran/{nisn}/{tahun}', [PembayaranController::class, 'statusPembayaranShowStatus'])->name('pembayaran.status-pembayaran.show-status');
   });
Route::middleware(['pembayaran'])->group(function () {
    Route::resource('/pembayaran-spp', PembayaranController::class);
    Route::get('bayar', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('bayar/{nisn}', [PembayaranController::class, 'bayar'])->name('pembayaran.bayar');
    Route::get('spp/{id_spp}', [PembayaranController::class, 'spp'])->name('pembayaran.spp');
    Route::post('bayar/{nisn}', [PembayaranController::class, 'prosesBayar'])->name('berbayar');
    Route::get('status-pembayaran',[PembayaranController::class, 'statusPembayaran'])->name('pembayaran.status-pembayaran');
    Route::get('print', [PembayaranController::class, 'generatelapor'])->name('pembayaran.generate.print');  
});
    
Route::middleware(['auth','admin'])->group(function () {
    Route::resource('/data-siswa', SiswaController::class);
    Route::resource('/data-kelas', KelasController::class);
    Route::resource('/data-petugas', PetugasController::class);
    Route::resource('/data-spp', SppController::class);
		});
