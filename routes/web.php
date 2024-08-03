<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\LogGuruController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dataGuruController;
use App\Http\Controllers\LogSatpamController;
use App\Http\Controllers\dataSatpamController;
use App\Http\Controllers\LogTataUsahaController;
use App\Http\Controllers\dataAbsenGuruController;
use App\Http\Controllers\dataTataUsahaController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\dataAbsenSatpamController;
use App\Http\Controllers\dataAbsenTataUsahaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Guru
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('data-guru', dataGuruController::class)->name('data-guru.index', 'data-guru');
    Route::resource('log-guru', LogGuruController::class)->name('log-guru.index', 'log-guru');
    // Log Guru
    Route::get('/log-guru', [LogGuruController::class, 'index'])->name('log-guru.index');
    Route::post('/log-guru/set-kehadiran', [LogGuruController::class, 'setKehadiran'])->name('log-guru.setKehadiran');
});
Route::get('/data-absen-guru', [dataAbsenGuruController::class, 'index'])->middleware('auth')->name('data-absen-guru');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    // Tata Usaha
    Route::resource('/data-tata-usaha', dataTataUsahaController::class)->name('data-tata-usaha.index', 'data-tata-usaha');
    Route::get('/log-tata-usaha', [LogTataUsahaController::class, 'index'])->name('log-tata-usaha.index');
    Route::post('/log-tata-usaha/set-kehadiran', [LogTataUsahaController::class, 'setKehadiran'])->name('log-tata-usaha.setKehadiran');
});
Route::get('/data-absen-tata-usaha', [dataAbsenTataUsahaController::class, 'index'])->middleware('auth')->name('data-absen-tata-usaha');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    // Satpam
    Route::resource('/data-satpam', dataSatpamController::class)->name('data-satpam.index', 'data-satpam');
    Route::get('/log-satpam', [LogSatpamController::class, 'index'])->name('log-satpam.index');
    Route::post('/log-satpam/set-kehadiran', [LogSatpamController::class, 'setKehadiran'])->name('log-satpam.setKehadiran');
});
Route::get('/data-absen-satpam', [dataAbsenSatpamController::class, 'index'])->middleware('auth')->name('data-absen-satpam');

// User Management
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('user-management', UserManagementController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

require __DIR__ . '/auth.php';
