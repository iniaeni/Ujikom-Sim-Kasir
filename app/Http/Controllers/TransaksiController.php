<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produkx = Produk::all();
        $keranjang = Transaksi::all();
        
        return view('content.transaksi.transaksi', compact('produkx', 'keranjang'));
    }

    public function view()
    {
        //
        $produkx = Produk::all();
        $keranjang = Transaksi::all();
        return view('content.transaksi.keranjang', compact('produkx', $keranjang));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahKeranjang(Request $request, $id)
    {
      

        $produk = Produk::findOrFail($id);
        $transaksis = Transaksi::findOrFail($id);
          // Cek apakah stok cukup untuk 1 unit
        if ($produk->stok < 1) {
            return back()->with('error', 'Stok tidak cukup.');
        }

        // mengurangi jumlah stok
        $produk->stok -= 1;
        $produk->save();
        
        
        $transaksi = Transaksi::where('nama_produk', $produk->nama_produk)
        ->whereNull('id_pelanggan')
        ->first();

        
            // menghitung sub total
            
         
        
    // Jika transaksi dengan produk yang sama sudah ada
    if ($transaksi) {
        // Tingkatkan jumlah produk dalam transaksi
        $transaksi->jumlah += 1;
        // $transaksi->$produk->harga * $transaksi->;
        $transaksi->save();
    } else {
        $totalBayar = $transaksis->harga * $transaksis->jumlah;
        // Jika transaksi belum ada, tambahkan produk baru ke transaksi dengan jumlah 1
        Transaksi::create([
            'produk_id' => $id,
            'nama_produk' => $produk->nama_produk,
            'harga' => $produk->harga,
            'sub_total' => $totalBayar,
            'jumlah' => 1,
            'id_pelanggan' => null,
        ]);
    }


       
    
        return redirect('/keranjang')->with('success', "Berhasil meenambah jumlah produk");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 
     public function kurang($id)
     {
         try {
             // Temukan transaksi berdasarkan ID
             $transaksi = Transaksi::findOrFail($id);
     
             // Temukan semua transaksi dengan nama produk yang sama dan id pelanggan null
             $barangs = Transaksi::where('nama_produk', $transaksi->nama_produk)
                                 ->whereNull('id_pelanggan')
                                 ->get();
             
             foreach ($barangs as $barang) {
                 if ($barang->jumlah > 0) {
                     $barang->jumlah -= 1;
                     $barang->save();
             
                     // Kembalikan stok ke produk
                     $produk = Produk::findOrFail($barang->produk_id);
                     $produk->stok += 1;
                     $produk->save();
                 }
             }
     
             return redirect('/transaksi')->with('berhasil', 'Berhasil mengurangi jumlah produk');
         } catch (\Exception $e) {
             return redirect('/keranjang')->with('error', 'Gagal mengurangi jumlah produk: ' . $e->getMessage());
         }
     }


     public function struk($id_pelanggan){
        $item = Transaksi::latest()->first();
        $struk = Transaksi::where('id_pelanggan', $item->id_pelanggan)->get();
      
        $totalBayar = Transaksi::where('id_pelanggan', $item->id_pelanggan)->sum('harga');
  
        $tanggalTransaksi = Transaksi::where('id_pelanggan', $item->id_pelanggan)->max('created_at');

        $pelanggan = Pelanggan::latest()->first();
        return view('content.transaksi.struk', compact('struk', 'pelanggan', 'totalBayar', 'tanggalTransaksi'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
