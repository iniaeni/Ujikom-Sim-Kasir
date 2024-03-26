<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::all();
        $jumlahProduk = $produk->count();
        $petugas = User::where('role', 'petugas')->count();
     
        return view('content.dashboard', compact('jumlahProduk', 'petugas'));
    }
}
