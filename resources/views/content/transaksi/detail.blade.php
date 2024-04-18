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
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Penjualan</h5>
              <a href="/transaksi" type="submit" class="btn btn-primary mr-2">Tambah Transaksi</a>
              <!-- Bordered Table -->
              <table class="table table-bordered mt-3 ">
              <thead>
                        <tr>
                        
                          <th> Tanggal</th>
                          <th> Nama Pelanggan</th>
                          <th> Produk </th>
                          <th> Jumlah</th>
                          <th> Sub Total</th>
                          <th> Kasir</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach($details as $detail)
                     @php $no = 3; @endphp
                        <tr>
                         <td> {{ \Carbon\Carbon::parse($detail->tanggal_transaksi)->format('d F Y') }}</td>
                          <td> {{$detail->pelanggan->nama_pelanggan }}</td>
                          <td> @if (isset($produk[$detail->id_pelanggan]))
                            <ul>
                                @foreach ($produk[$detail->id_pelanggan] as $item)
                                    <li>{{ $item->produk->nama_produk }}</li>
                                @endforeach
                            </ul>
                                @endif
                        </td>
                          <td>{{ $detail->jumlah_transaksi }}</td>
                          <td>Rp {{ $detail->total_bayar }}</td>
                          <td> satu</td>
                          <td>
                              <div style="display: flex; gap:10px;" >
                               
                                  <form action="" method="post">
                                      @csrf
                                      @method('DELETE')
                                      
                                      <!-- <a href="" class="btn btn-warning">
                                      <i class="bi bi-eye-fill" style="color:white;"></i>
                                      </a> -->
                                    
                                      <button type="submit" class="btn btn-danger">
                                      <i class="bi bi-trash"></i>
                                      </button>
                                  </form>


                                 
                              </div>
                          </td>

                        </tr>
                        @endforeach
                                                     
                      </tbody>
              </table>
              <!-- End Bordered Table -->
 </main>

  