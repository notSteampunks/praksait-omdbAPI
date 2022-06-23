<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PostController;
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
Route::get('/', [MahasiswaController::class , 'index']);
Route::get('siswa', [MahasiswaController::class , 'index']);
Route::get('siswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('siswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('siswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');

Route::get('/siswa/windows',[PostController::class, 'index']);
Route::get('/siswa/windows/create',[PostController::class, 'show'])->name('windows.create');
Route::post('/siswa/windows/store',[PostController::class, 'storewin']);
Route::delete('/siswa/{id}',[PostController::class, 'destroy']);
Route::get('/siswa/windows/{id}/edit',[PostController::class, 'edit'])->name('windows.edit');
Route::put('/siswa/windows/{id}/update',[PostController::class, 'update'])->name('windows.update');

Route::get('/film', [FilmController::class , 'show']);