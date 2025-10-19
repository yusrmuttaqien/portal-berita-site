<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;


Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/artikel/{slug}', [FrontController::class, 'show'])->name('front.show');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('admin.auth')->name('admin.')->group(function () {
    Route::get('/dashboard', [ArtikelController::class, 'dashboard'])->name('dashboard');
    Route::resource('artikel', ArtikelController::class);
});
