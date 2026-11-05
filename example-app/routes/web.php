<?php

use App\Http\Controllers\C_Admin;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_Dosen;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Mahasiswa;
use App\Http\Controllers\C_Produk;
use App\Http\Controllers\C_Register;
use App\Http\Controllers\C_User;
use Illuminate\Support\Facades\Route;

// Login, Register, Logout
Route::get('/', [C_Login::class, 'index'])->name('login');
Route::post('/login', [C_Login::class, 'authenticate']);
Route::get('/register', [C_Register::class, 'index']);
Route::post('/register', [C_Register::class, 'store']);
Route::post('/logout', [C_Login::class, 'logout']);

// Halaman yang wajib login
Route::middleware('auth')->group(function () {
    Route::get('/home', [C_Home::class, 'index']);

    // Admin saja (level 1)
    Route::middleware('level:1')->group(function () {
        Route::get('/about', [C_Admin::class, 'about']);
        Route::get('/chart', [C_Admin::class, 'chart']);
        Route::get('/invoice', [C_Admin::class, 'invoice']);
    });

    // Admin & User (1,2)
    Route::get('/user', [C_User::class, 'index'])->middleware('level:1,2');

    // Admin & Mahasiswa (1,3)
    Route::get('/mahasiswa', [C_Mahasiswa::class, 'index'])->middleware('level:1,3');

    // Admin & Dosen (1,4)
    Route::middleware('level:1,4')->group(function () {
        Route::get('/dosen', [C_Dosen::class, 'index'])->name('dosen');
        Route::get('/dosen/detail/{id_dosen}', [C_Dosen::class, 'detail']);
        Route::get('/dosen/add', [C_Dosen::class, 'add']);
        Route::post('/dosen/insert', [C_Dosen::class, 'insert']);
        Route::get('/dosen/edit/{id_dosen}', [C_Dosen::class, 'edit']);
        Route::post('/dosen/update/{id_dosen}', [C_Dosen::class, 'update']);
        Route::get('/dosen/delete/{id_dosen}', [C_Dosen::class, 'delete']);
        Route::get('/dosen/print', [C_Dosen::class, 'print']);         // BARU
    });
});

// ===== Praktikum sebelumnya =====
Route::get('/kali', function () {
    return 9 * 9;
});

Route::get('/contact', function () {
    return view('pages.v_contact', [
        'nama' => 'Raffi Saputra',
        'email' => 'saputrafirstt@gmail.com',
        'hp' => 6285133472065,
    ]);
});

Route::get('/produk', [C_Produk::class, 'index']);
Route::get('/produk/tambah', [C_Produk::class, 'tambahProduk']);

Route::get('/admin', [C_Dashboard::class, 'index']);

Route::get('/konversi/{asal_suhu}/{nilai_suhu}', function ($asal_suhu, $nilai_suhu) {
    return view('v_konversi', [
        'asal_suhu' => strtolower($asal_suhu),
        'nilai_suhu' => $nilai_suhu
    ]);
});