<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalGajiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PayrollController;





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
Route::get('/gaji-tertinggi', [UserController::class, 'gajiTertinggi'])->name('gaji.tertinggi');
Route::get('/gaji-tertinggi', [HomeController::class, 'gajiTertinggi'])->name('gajiTertinggi');







// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user_perusahaan', [UserController::class, 'user_perusahaan']);
Route::get('/perusahaan', [PerusahaanController::class, 'perusahaan']);
Route::get('/jadwal_gaji', [JadwalGajiController::class, 'jadwal_gaji']);
// Route::get('/jadwal-gaji', [JadwalGajiController::class, 'showJadwalGaji']);
Route::get('/jadwal_gaji', [JadwalGajiController::class, 'jadwal_gaji'])->name('jadwal_gaji');
Route::post('/process-payroll', [PayrollController::class, 'processPayroll'])->name('processPayroll');
Route::get('/log_payroll', [PayrollController::class, 'logPayroll'])->name('logPayroll');




Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/jadwal_gaji/set', [PayrollController::class, 'setJadwalGaji'])->name('setJadwalGaji');

Route::get('/user_perusahaan', [UserController::class, 'user_perusahaan'])
    ->middleware('role:Super Admin, Admin')
    ->name('user_perusahaan');




Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {






});
// Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
// Route::get('/user_perusahaan', [HomeController::class, 'user_perusahaan'])->name('user_perusahaan');



// Route::get('/user_perusahaan/create', [App\Http\Controllers\UserController::class,'daftar_user']);



Route::get('/user_perusahaan', [App\Http\Controllers\UserController::class, 'user_perusahaan']);
Route::get('/user_perusahaan/create', [App\Http\Controllers\UserController::class, 'create']);
Route::post('/user_perusahaan/create', [UserController::class, 'daftar_user']);
Route::get('user_perusahaan/{id_user}/edit', [UserController::class, 'edit']);
// Menggunakan metode PUT untuk mengupdate data
Route::put('/user_perusahaan/{id_user}/update', [UserController::class, 'update'])->name('user_perusahaan.update');
Route::get('user_perusahaan/{id_user}/delete', [UserController::class, 'destroy']); //ini buat hapus data user


Route::get('/user_perusahaan/search', [UserController::class, 'search'])->name('user_perusahaan.search');




Route::get('/perusahaan', [App\Http\Controllers\PerusahaanController::class, 'perusahaan']);
Route::get('/perusahaan/createp', [App\Http\Controllers\PerusahaanController::class, 'createp']);
Route::post('/perusahaan/createp', [PerusahaanController::class, 'daftar_perusahaan']);
Route::get('perusahaan/{id_perusahaan}/edit', [PerusahaanController::class, 'edit']);
// Menggunakan metode PUT untuk mengupdate data
Route::put('/perusahaan/{id_perusahaan}/update', [PerusahaanController::class, 'update'])->name('perusahaan.update');
Route::get('perusahaan/{id_perusahaan}/delete', [PerusahaanController::class, 'destroy']); //ini buat hapus data user



Route::get('/jadwal_gaji/tambahjadwal', [App\Http\Controllers\JadwalGajiController::class, 'tambahjadwal']);
Route::post('/jadwal_gaji/set', [PayrollController::class, 'setJadwalGaji'])->name('setJadwalGaji');
Route::get('/jadwal_gaji/cetak-pdf', [JadwalGajiController::class, 'cetakPDF'])->name('jadwal_gaji.cetakPDF');
Route::get('/jadwal_gaji/download-pdf', [JadwalGajiController::class, 'downloadPdf'])->name('jadwal_gaji.downloadPdf');


Route::get('/jadwal-gaji/tambah', [JadwalGajiController::class, 'tambahjadwal'])->name('jadwal_gaji.tambahjadwal');
Route::get('/jadwal_gaji/tambahjadwal', [JadwalGajiController::class, 'create'])->name('jadwal_gaji.tambahjadwal');
Route::get('/jadwal_gaji/tambahjadwal', [JadwalGajiController::class, 'create'])->name('jadwal_gaji.tambahjadwal');



Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
});
