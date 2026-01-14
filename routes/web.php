<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResidentController;




Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('auth.login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('layouts.app');
    });
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::middleware('auth_admin')->group(function () {
        Route::get('/resident', [ResidentController::class,'index']);
        Route::get('/resident/create', [ResidentController::class,'create']);
        Route::get('/resident/{id}', [ResidentController::class,'edit'])->name('resident-edit');
        Route::post('/resident', [ResidentController::class,'store']);
        Route::put('/resident/{id}', [ResidentController::class,'update']);
        Route::get('/resident-destroy/{id}', [ResidentController::class,'destroy'])->name('resident-delete');
    });


    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/create', [ReportController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [ReportController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}', [ReportController::class, 'edit'])->name('laporan.edit');
    Route::put('/laporan/{id}', [ReportController::class, 'update'])->name('laporan.update');
});

