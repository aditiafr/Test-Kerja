<?php

use App\Http\Controllers\BukuController;
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

Route::get('/', function () {
    return view('welcome');
});

// Siswa

Route::get('/siswa', [SiswaController::class, 'index']);

Route::get('/siswa/create', [SiswaController::class, 'create']);

Route::post('/siswa/store', [SiswaController::class, 'store']);

Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);

Route::put('/siswa/{id}', [SiswaController::class, 'update']);

Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);

// Buku

Route::get('/buku', [BukuController::class, 'index'])->name('buku');

Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');

Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');

Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('edit.buku');

Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
