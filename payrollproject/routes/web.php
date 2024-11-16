<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user_perusahaan', [UserController::class, 'user_perusahaan']);

// Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
// Route::get('/user_perusahaan', [HomeController::class, 'user_perusahaan'])->name('user_perusahaan');

Route::get('/user_perusahaan', [App\Http\Controllers\UserController::class,'user_perusahaan']);
Route::get('/user_perusahaan/create', [App\Http\Controllers\UserController::class,'create']);
Route::post('/user_perusahaan/create', [UserController::class, 'daftar_user']);
Route::get('user_perusahaan/{id_user}/edit', [UserController::class, 'edit']);
// Menggunakan metode PUT untuk mengupdate data
Route::put('/user_perusahaan/{id_user}/update', [UserController::class, 'update'])->name('user_perusahaan.update');
Route::get('user_perusahaan/{id_user}/delete', [UserController::class, 'destroy']); //ini buat hapus data user

// Route::get('/user_perusahaan/create', [App\Http\Controllers\UserController::class,'daftar_user']);

Route::controller(AuthController::class)->group(function(){
    Route::get('register', 'register')->name('register');
});
