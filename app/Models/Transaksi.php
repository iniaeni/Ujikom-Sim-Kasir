<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pelanggan',
        'produk_id',
        'nama_produk',
        'harga',
        'jumlah',
        'sub_total'
    ];

    public function produk(){
        return $this->belongsTo(Produk::class,  'produk_id');
    }

   
    
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class,  'id_pelanggan');
    }
    
}
