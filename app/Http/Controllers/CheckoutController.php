<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function checkout(Request $request)
    {
        try {
            // Membuat pelanggan baru
            $pelanggan =Pelanggan::create([
                'nama_pelanggan'=> $request->nama_pelanggan,
                'alamat' => $request->alamat,
                'nomor_telp' => $request->nomor_telp,
            ]);

            $id_pelanggan = $pelanggan->id;
            
            // $produk = Transaksi::findOrFail($id);
         
            Transaksi::where('id_pelanggan', null)->update([
                'id_pelanggan' => $id_pelanggan,
                'harga' => $request->harga,
            ]);

           
                
            
    
            // Menghapus sesi transaksi setelah selesai
         
            return redirect('/struk/{id_pelanggan}');
        } catch (\Exception $e) {
            return redirect()->back();
        }


    }


    public function printPDF($id_pelanggan){
        $item = Transaksi::latest()->first();
        $struk = Transaksi::where('id_pelanggan', $item->id_pelanggan)->get();
      
        $totalBayar = Transaksi::where('id_pelanggan', $item->id_pelanggan)->sum('harga');
        $tanggalTransaksi = Transaksi::where('id_pelanggan', $item->id_pelanggan)->max('created_at');


        $pelanggan = Pelanggan::latest()->first();
        return view('content.transaksi.pdf.bukti', compact('struk', 'pelanggan', 'totalBayar', 'tanggalTransaksi'));
   
    }
   
    
}
