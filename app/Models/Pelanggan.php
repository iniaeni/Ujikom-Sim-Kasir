<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'nomor_telp',
    ];

    public function penjualan(){
        return $this->hasMany(Penjualan::class);
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
