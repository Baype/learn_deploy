<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NonracikController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RacikController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SignaController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


##PUBLIC ACCESS
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('login', LoginController::class)->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('register');
Route::post('/register', [UsersController::class, 'store'])->name('register.store');


##PRIVATE ACCESS
Route::middleware('auth')->group(function () {
    Route::get('/racik/{id}/print', [RacikController::class, 'print'])->name('racik.print');
    Route::resource('pasien', PasienController::class);
    Route::resource('obat', ObatController::class);
    Route::resource('racik', RacikController::class);
    Route::resource('signa', SignaController::class);
});