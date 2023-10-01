<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/pasien', \App\Http\Controllers\PasienController::class);
Route::resource('/dokter', \App\Http\Controllers\DokterController::class);
Route::resource('/antrian', \App\Http\Controllers\dataAntrianController::class)->middleware('auth');
Route::resource('/periksa', \App\Http\Controllers\PeriksaController::class);
Route::resource('/resep', \App\Http\Controllers\ResepsionisController::class);
Route::resource('/ruangan', \App\Http\Controllers\RuanganController::class);