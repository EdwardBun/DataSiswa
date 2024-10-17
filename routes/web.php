<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');

Route::prefix('/siswa')->name('siswa.')->group(function () {
    Route::get('/create', [SiswaController::class, 'create'])->name('create');
    Route::post('/store', [SiswaController::class, 'store'])->name('store');
    Route::get('/index', [SiswaController::class, 'index'])->name('home');
    Route::get('/{siswa}', [SiswaController::class, 'edit'])->name('edit');
    Route::patch('/{siswa}', [SiswaController::class, 'update'])->name('update');
    Route::delete('/{siswa}', [SiswaController::class, 'destroy'])->name('delete');
});

Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');

Route::prefix('/nilai')->name('nilai.')->group(function () {
    Route::get('/create', [NilaiController::class, 'create'])->name('create');
    Route::post('/store', [NilaiController::class, 'store'])->name('store');
    Route::get('/index', [NilaiController::class, 'index'])->name('home');
    Route::get('/{nilai}', [NilaiController::class, 'edit'])->name('edit');
    Route::patch('/{nilai}', [NilaiController::class, 'update'])->name('update');
    Route::delete('/{nilai}', [NilaiController::class, 'destroy'])->name('delete');
});
