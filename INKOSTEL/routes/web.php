<?php

use App\Http\Controllers\KosController;
use App\Http\Controllers\SimpanController;
use App\Models\Validasi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailKontroler;
use App\Http\Controllers\LoginRegis;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\CariKosController;
use App\Http\Controllers\ValidationController;


//use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('index');
})->name('home');

// MiddleWare
Route::middleware(['guest'])->group(function () {
});

//Login and Registration
Route::get('/login', [LoginRegis::class, 'login'])->name('login');
Route::post('/login', [LoginRegis::class, 'loginPost'])->name('loginPost');
Route::post('/registration', [LoginRegis::class, 'registrationPost'])->name('registration.post');

//Logout
Route::post('/logout', [LoginRegis::class, 'logout'])->name('logout');

// MiddleWare
Route::middleware(['guest']);

// Cari Kost
Route::get('/carikost', [CariKosController::class, 'index'])->name('carikost');


//Simpan Kost
Route::get('/simpan', [SimpanController::class, 'tampilkanHalamanSimpan'])->name('simpan.halaman');
Route::post('/simpan/{id}', [SimpanController::class, 'simpanKost']);
Route::delete('/simpan/hapus/{id}', [SimpanController::class, 'hapusSimpan'])->name('hapus.simpan');
//akhir simpan kost


//profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/update/{id}', [ProfileController::class, 'update']);

// detailkos
Route::get('/detailkos/{id_kos}', [CariKosController::class, 'detailKos'])->name('detailkos');
Route::get('/acc/{id_kos}', [ValidationController::class, 'acceptkos']);

Route::get('/jualkos', function () {
    return view('jualkos');
});


// Iklan Kos
Route::post('/jualkos', [ValidationController::class, 'store'])->name('jualkos');

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/navbar', function () {
    return view('partial.navbar');
});

Route::get('/footer', function () {
    return view('partial.footer');
});

// Validasi
Route::get('/val', [ValidationController::class, 'index'])->name('val')->middleware('admin');
Route::get('/updateData/{id_kos}', [ValidationController::class, 'acceptkos'])->middleware('admin');

// Acc
Route::get('/terima/{id_kos}', [ValidationController::class, 'terima'])->name('terima')->middleware('admin');
Route::get('/tolak/{id_kos}', [ValidationController::class, 'tolak'])->name('tolak')->middleware('admin');
