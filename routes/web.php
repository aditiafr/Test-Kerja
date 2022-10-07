<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KembaliController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Bus;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Siswa

Route::controller(SiswaController::class)->group(function () {

    Route::get('/', 'index')->name('siswa');

    Route::get('/siswa/create', 'create')->name('siswa.create');

    Route::post('/siswa/store', 'store')->name('siswa.store');

    Route::get('/siswa/{id}/edit', 'edit')->name('siswa.edit');

    Route::put('/siswa/{id}', 'update')->name('siswa.update');

    Route::delete('/siswa/{id}', 'destroy')->name('siswa.destroy');

});

// Route::get('/', [SiswaController::class, 'index'])->name('siswa');

// Route::get('/siswa/create', [SiswaController::class, 'create']);

// Route::post('/siswa/store', [SiswaController::class, 'store']);

// Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);

// Route::put('/siswa/{id}', [SiswaController::class, 'update']);

// Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);

// Buku

Route::controller(BukuController::class)->group(function () {

    Route::get('/buku', 'index')->name('buku');

    Route::get('/buku/create', 'create')->name('buku.create');

    Route::post('/buku/store', 'store')->name('buku.store');

    Route::get('/buku/{id}/edit', 'edit')->name('buku.edit');

    Route::put('/buku/{id}', 'update')->name('buku.update');

    Route::delete('/buku/{id}', 'destroy')->name('buku.destroy');

});

// Route::get('/buku', [BukuController::class, 'index'])->name('buku');

// Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');

// Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');

// Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('edit.buku');

// Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

// Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

// Pinjam

Route::controller(PinjamController::class)->group(function () {

    Route::get('/pinjam', 'index')->name('pinjam');

    Route::get('/pinjam/tersedia', 'tersedia')->name('tersedia');

    Route::get('/pinjam/kembali', 'kembali')->name('kembali');

    Route::get('/pinjam/jumlah', 'jumlah')->name('jumlah');

    Route::get('/pinjam/create', 'create')->name('pinjam.create');

    Route::post('/pinjam/store', 'store')->name('pinjam.store');

    Route::get('/pinjam/{id}/edit', 'edit')->name('pinjam.edit');

    Route::put('/pinjam/{id}', 'update')->name('pinjam.update');

    Route::delete('/pinjam/{id}', 'destroy')->name('pinjam.destroy');

    // Route::put('/pinjam/{id}', 'kembali')->name('pinjam.kembali');

});

Route::put('/kembali/{id}', [KembaliController::class, 'update'])->name('kembali.update');

// Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam');

// Route::get('/pinjam/create', [PinjamController::class, 'create'])->name('pinjam.create');

// Route::post('/pinjam/store', [PinjamController::class, 'store'])->name('pinjam.store');

// Route::get('/pinjam/{id}/edit', [PinjamController::class, 'edit'])->name('pinjam.edit');

// Route::put('/pinjam/{id}', [PinjamController::class, 'update'])->name('pinjam.update');

// Route::delete('/pinjam/{id}', [PinjamController::class, 'destroy'])->name('pinjam.destroy');
