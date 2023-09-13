<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\DokumentasiController;

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

// landing page
Route::get('/', [LandingPageController::class, 'index']);

// authenticate
// guest
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
// user
Route::get('/dashboard/password/update', [LoginController::class, 'show_change_password'])->middleware('auth');
Route::put('/dashboard/password/update', [LoginController::class, 'change_password'])->middleware('auth');
Route::get('/dashboard/logout', [LoginController::class, 'logout'])->middleware('auth');

// dashboard
// beranda
Route::get('/dashboard', [BerandaController::class, 'index'])->middleware('auth');
// mahasiswa
Route::resource('/dashboard/mahasiswa', MahasiswaController::class)->middleware('auth')->except(['create', 'edit']);
// surat
Route::get('/dashboard/surat/download', [DownloadController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/surat', SuratController::class)->middleware('auth')->except(['edit']);
Route::post('/dashboard/surat/create/preview', [SuratController::class, 'preview'])->middleware('auth')->name('surat.preview');
Route::post('/dashboard/surat/create/preview/kirimPengajuan', [SuratController::class, 'kirimPengajuan'])->middleware('auth')->name('surat.kirimPengajuan');
// pengumuman
Route::resource('/dashboard/pengumuman', PengumumanController::class)->middleware('auth')->except(['create', 'edit']);
// dokumentasi
Route::resource('/dashboard/dokumentasi', DokumentasiController::class)->middleware('auth')->except(['create', 'edit']);
// aduan
Route::resource('/dashboard/aduan', AduanController::class)->middleware('auth')->except(['create', 'edit']);
// peraturan
Route::resource('/dashboard/peraturan', PeraturanController::class)->middleware('auth')->except(['create', 'show', 'edit']);
