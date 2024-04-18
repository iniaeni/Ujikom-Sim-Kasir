<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailPenjualanController;
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

// route login 
Route::middleware('isGuest')->group(function(){
    Route::get('/', [AuthController::class, 'index']);
    Route::post('/auth', [AuthController::class, 'auth'])->name('login.auth');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/error', [DashboardController::class, 'error'])->name('dashboard.view');


Route::middleware(['isLogin', 'CekRole:petugas'])->group(function(){
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::post('/input-transaksi/{id}', [TransaksiController::class, 'tambahKeranjang'])->name('input.transaksi');
    Route::get('/keranjang', [TransaksiController::class, 'view']);
    Route::patch('/kurang-barang/{id}', [TransaksiController::class, 'kurang'])->name('kurang.barang');
    Route::get('/print/{id_pelanggan}', [CheckoutController::class, 'printPDF']);
    // route struk dan detail
    Route::get('/struk/{id_pelanggan}', [TransaksiController::class, 'struk'])->name('struk.pembayaran');
    
});

Route::middleware('isLogin')->group(function(){
// dashboard
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
Route::get('/detail-penjualan', [DetailPenjualanController::class, 'index']);

// route Checout 
Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.barang');

});

