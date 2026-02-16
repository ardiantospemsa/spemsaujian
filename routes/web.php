<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;

Route::get('/', function(){ return redirect()->route('siswa.login'); });

// Admin
Route::get('/admin/login', [AuthController::class, 'adminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/siswa', [AdminController::class, 'tambahSiswa'])->name('admin.siswa.tambah');
Route::post('/admin/ujian', [AdminController::class, 'tambahUjian'])->name('admin.ujian.tambah');
Route::delete('/admin/siswa/{id}/hapus',[AdminController::class, 'hapusSiswa'])->name('admin.siswa.hapus');

// Hapus ujian (Admin)
Route::delete('/admin/ujian/{id}', [AdminController::class, 'hapusUjian'])->name('admin.ujian.hapus');

// Siswa
Route::get('/siswa/login', [AuthController::class, 'siswaLoginForm'])->name('siswa.login');
Route::post('/siswa/login', [AuthController::class, 'siswaLogin']);
Route::get('/dashboard', [SiswaController::class, 'dashboard'])
    ->middleware('siswa')
    ->name('siswa.dashboard');


// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
