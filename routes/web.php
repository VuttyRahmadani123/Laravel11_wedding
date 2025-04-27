<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\JenispaketController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesanandetailController;
use App\Http\Controllers\UserController;

// route register
Route::get('user/login', [UserController::class, 'login'])->name('login');
Route::post('user/login', [UserController::class, 'dologin'])->name('login.post');
Route::get('user/register', [UserController::class, 'register'])->name('register');
Route::post('user/register', [UserController::class, 'doregister'])->name('register.post');


Route::post('user/logout', [UserController::class, 'logout'])->name('logout');



// route khusus untuk admin
Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('admin/jenispaket', [JenispaketController::class, 'index'])->name('admin.jenispaket.index');
Route::post('admin/jenispaket/store', [JenispaketController::class, 'store'])->name('admin.jenispaket.store');
Route::get('admin/jenispaket/{id}/edit', [JenispaketController::class, 'edit'])->name('admin.jenispaket.edit');
Route::put('admin/jenispaket/{id}/update', [JenispaketController::class, 'update'])->name('admin.jenispaket.update');
Route::delete('admin/jenispaket/{id}/destroy', [JenispaketController::class, 'destroy'])->name('admin.jenispaket.destroy');

Route::get('admin/item', [ItemController::class, 'index'])->name('admin.item.index');
Route::post('admin/item/store', [ItemController::class, 'store'])->name('admin.item.store');
Route::get('admin/item/{id}/edit', [ItemController::class, 'edit'])->name('admin.item.edit');
Route::put('admin/item/{id}/update', [ItemController::class, 'update'])->name('admin.item.update');
Route::delete('admin/item/{id}/destroy', [ItemController::class, 'destroy'])->name('admin.item.destroy');

Route::get('admin/pesanan', [PesananController::class, 'index'])->name('admin.pesanan.index');
Route::post('admin/pesanan/store', [PesananController::class, 'store'])->name('admin.pesanan.store');
Route::get('admin/pesanan/{id}/edit', [PesananController::class, 'edit'])->name('admin.pesanan.edit');
Route::put('admin/pesanan/{id}/update', [PesananController::class, 'update'])->name('admin.pesanan.update');
Route::delete('admin/pesanan/{id}/destroy', [PesananController::class, 'destroy'])->name('admin.pesanan.destroy');

Route::get('admin/pesanandetail', [PesanandetailController::class, 'index'])->name('admin.pesanandetail.index');
Route::post('admin/pesanandetail/store', [PesanandetailController::class, 'store'])->name('admin.pesanandetail.store');
Route::get('admin/pesanandetail/{id}/edit', [PesanandetailController::class, 'edit'])->name('admin.pesanandetailn.edit');
Route::put('admin/pesanandetail/{id}/update', [PesanandetailController::class, 'update'])->name('admin.pesanandetail.update');
Route::delete('admin/pesanandetail/{id}/destroy', [PesanandetailController::class, 'destroy'])->name('admin.pesanandetail.destroy');

// route untuk pelanggan
Route::get('/', function () {
    return view('index');
})->name('index');






