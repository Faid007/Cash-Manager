<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriUangKeluarController;
use App\Http\Controllers\LaporanUangMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UangKeluarController;
use App\Http\Controllers\UangMasukController;
use App\Models\UangKeluar;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// useless routes
// Just to demo sidebar dropdown links active states.

//route uang masuk
route::get('kategori', [KategoriController::class, 'index'])->name('kategori');

Route::get('kategori/tambah', function () {
    return view('form.uang-masuk.kategori.add');
})->middleware(['auth'])->name('kategori-masuk.add');

Route::post('kategori/tambah', [KategoriController::class, 'store']);
Route::get('kategori/tambah/{id}', [KategoriController::class, 'edit']);
Route::post('kategori/tambah/{id}', [KategoriController::class, 'update']);

Route::get('/masuk/uang-masuk', [UangMasukController::class, 'index'])->name('masuk.index');
Route::get('/masuk/uang-masuk/tambah', [UangMasukController::class, 'create'])->name('masuk.add');
Route::post('/masuk/uang-masuk/tambah', [UangMasukController::class, 'store']);
Route::get('/masuk/uang-masuk/tambah/{id}', [UangMasukController::class, 'edit']);
Route::post('/masuk/uang-masuk/edit/{id}', [UangMasukController::class, 'update']);
Route::delete('/masuk/uang-masuk/hapus/{id}', [UangMasukController::class, 'destroy']);

//route uang keluar
Route::get('/keluar/uang-keluar', [UangKeluarController::class, 'index'])->name('keluar.index');
Route::get('/keluar/uang-keluar/tambah', [UangKeluarController::class, 'create'])->name('keluar.add');
Route::post('/keluar/uang-keluar/tambah', [UangKeluarController::class, 'store']);
Route::get('/keluar/uang-keluar/tambah/{id}', [UangKeluarController::class, 'edit']);
Route::post('/keluar/uang-keluar/edit/{id}', [UangKeluarController::class, 'update']);
Route::delete('/keluar/uang-keluar/hapus/{id}', [UangKeluarController::class, 'destroy']);

//route laporan uang masuk
Route::get('/laporan/uang-masuk', [LaporanUangMasukController::class, 'index'])->name('laporan-masuk.index');

Route::get('/laporan/uang-masuk/show', function () {
    return view('form.laporan.uang-masuk.show');
})->middleware(['auth'])->name('laporan-masuk.show');

//route laporan uang keluar
Route::get('/laporan/uang-keluar', function () {
    return view('form.laporan.uang-keluar.index');
})->middleware(['auth'])->name('laporan-keluar.index');

Route::get('/laporan/uang-keluar/show', function () {
    return view('form.laporan.uang-keluar.show');
})->middleware(['auth'])->name('laporan-keluar.show');

require __DIR__ . '/auth.php';
