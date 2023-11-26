<?php

use App\Http\Controllers\HomeController;
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
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
