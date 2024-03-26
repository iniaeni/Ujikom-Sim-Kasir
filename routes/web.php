<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index']);
Route::post('/auth', [AuthController::class, 'auth'])->name('login.auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.view');

// Produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/create-produk', [ProdukController::class, 'view']);
Route::post('/produk', [ProdukController::class, 'create'])->name('produk.input');
Route::get('/update/{id}', [ProdukController::class, 'edit'])->name('produk.update');
Route::patch('editProduk/{id}', [ProdukController::class, 'update'])->name('produk.edit');
Route::delete('/deleteProduk/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');

// route pegawai
Route::get('/petugas', [PetugasController::class, 'index']);
Route::get('/create-petugas', [PetugasController::class, 'show']);
Route::post('/create-petugas', [PetugasController::class, 'create'])->name('petugas.input');
Route::get('/edit/{id}', [PetugasController::class, 'viewEdit'])->name('petugas');
Route::patch('/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
Route::delete('/delete/{id}', [PetugasController::class, 'destroy'])->name('petugas.delete');

// route transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);


Route::get('/penjualan', [PenjualanController::class, 'index']);