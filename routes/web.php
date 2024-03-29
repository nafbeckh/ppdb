<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CalonSiswaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AsalSekolahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/authenticate', [UserController::class, 'authenticate'])->name('auth');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/pendaftaran/form-siswa', [SiswaController::class, 'index'])->name('form-siswa');
    Route::post('/pendaftaran/form-siswa', [SiswaController::class, 'store']);
    Route::get('/pendaftaran/form-orangtua', [OrangTuaController::class, 'index'])->name('form-orangtua');
    Route::post('/pendaftaran/form-orangtua', [OrangTuaController::class, 'store']);
    Route::get('/pendaftaran/form-asalsekolah', [AsalSekolahController::class, 'index'])->name('form-asalsekolah');
    Route::post('/pendaftaran/form-asalsekolah', [AsalSekolahController::class, 'store']);
    Route::post('/bayar', [PembayaranController::class, 'bayar'])->name('bayar');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/siswa', [CalonSiswaController::class, 'index'])->name('siswa.index');
    Route::get('/admin/terverifikasi', [CalonSiswaController::class, 'terverifikasi'])->name('siswa.terverifikasi');
    Route::get('/admin/diterima', [CalonSiswaController::class, 'diterima'])->name('siswa.diterima');
    Route::get('/admin/ditolak', [CalonSiswaController::class, 'ditolak'])->name('siswa.ditolak');

    Route::post('/admin/siswa/terima/{id}', [CalonSiswaController::class, 'terima'])->name('siswa.terima');
    Route::post('/admin/siswa/tolak/{id}', [CalonSiswaController::class, 'tolak'])->name('siswa.tolak');

    Route::delete('/admin/siswa/destroy/{id}', [CalonSiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::delete('/admin/siswa', [CalonSiswaController::class, 'destroyBatch'])->name('siswa.destroy.batch');

    Route::get('/admin/setting', [SettingController::class, 'index'])->name('setting.ppdb');
    Route::post('/admin/setting', [SettingController::class, 'update'])->name('setting.ppdb.update');
});
