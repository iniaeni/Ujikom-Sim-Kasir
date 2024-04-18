<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
    ];

    public function detail(){
        return $this->hasMany(DetailPenjualan::class);
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
