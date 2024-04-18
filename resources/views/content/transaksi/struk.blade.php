@extends('layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Kasir Cepat</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row"> 
        <div class="card card-body m-2 mb-3">
        <h5 class="card-title mb-0 mt-1 " style="font-size: 20px;" ><strong> Hi, {{Auth::user()->nama}} - {{Auth::user()->role}}</strong></h5>
   
            </div>
        </div>
    </section>
    <div class="card" style="width: 600px; margin-left: 30%;">
    <div class="card-body m-2">
        <div class="container">
        <div class="row mt-3">
                <div class="col-6"><a href="/detail-penjualan" class="bi bi-arrow-left-circle pt-5" style="font-size:25px;"></a></div>
             
                <div class="col-6 text-right"> <a href="/print/{id_pelanggan}" class="btn btn-danger">Print PDF</a></div>
            </div>

            <div class="row">
                      
                <div class="col-12 text-center">
                    <h4 class="mt-4">Struk Pembayaran</h4>
                    <span>Tanggal: {{ \Carbon\Carbon::parse($tanggalTransaksi)->format('d F Y') }}</span><br>
                    <span>Nama : <b>{{$pelanggan->nama_pelanggan}} </b></span><br>
                    <span>Alamat : <b>{{$pelanggan->alamat}} </b></span><br>
                    <span>No Telp : <b>{{$pelanggan->nomor_telp}} </b></span><br>
                    <span>Kasir: {{Auth::user()->nama}}</span>
                </div>
            </div>
            <hr>
          @foreach($struk as $item)
            <div class="row">
                <div class="col-6">{{$item->nama_produk}}</div>
                <div class="col-3">{{$item->jumlah}}</div>
                <div class="col-3 text-right">Rp {{$item->harga}}</div>
            </div>
         @endforeach
            <hr>
            <div class="row">
                <div class="col-6">Total</div>
                <div class="col-6 text-right">Rp {{ $totalBayar }}</div>
            </div>

            
            <div class="row">
                <div class="col-12"><br>
                    <p class="text-center">Terima kasih atas kunjungan Anda!</p>
                </div>
            </div>
        </div>
    </div>
</div>

                       
           
 </main>

  