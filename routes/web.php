<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;

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

Route::get('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('login/auth', [AuthController::class, 'auth']);

Route::middleware(['auth'])->group(function () {
    // Route Staff
    Route::middleware(['can:staff'])->group(function () {
        Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('s-dashboard');

        Route::get('/staff/mahasiswa', [StaffController::class, 'mahasiswa_index'])->name('s-mahasiswa-index');
        Route::get('/staff/mahasiswa/tambah', [StaffController::class, 'mahasiswa_create'])->name('s-mahasiswa-create');
        Route::post('/staff/mahasiswa/store', [StaffController::class, 'mahasiswa_store'])->name('s-mahasiswa-store');
        
        Route::get('/staff/dosen', [StaffController::class, 'dosen_index'])->name('s-dosen-index');
        Route::get('/staff/dosen/tambah', [StaffController::class, 'dosen_create'])->name('s-dosen-create');

        Route::get('/staff/monitoring_dosen', [StaffController::class, 'monitoring_dosen'])->name('s-m_dosen-index');
        Route::get('/staff/monitoring_ujian', [StaffController::class, 'monitoring_proposal'])->name('s-m_proposal-index');

    });

    // Route Mahasiswa
    Route::middleware(['can:mahasiswa'])->group(function () {
        Route::get('/mahasiswa/dashboard', function () {
            return view('mahasiswa.index');
        });
    });

    // Route Dosen
    Route::middleware(['can:dosen'])->group(function () {
        Route::get('/dosen/dashboard', function () {
            return view('dosen.index');
        });
    });
});
