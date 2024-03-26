<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_harga',
        'pelanggan_id',
        'tanggal_penjualan',
    ];

    public function detail(){
        return $this->hasMany(Detail::class);
    }

}
