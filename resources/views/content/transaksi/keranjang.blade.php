@extends('layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Kasir Cepat</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Data Petugas/staff</li>
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

   <section class="section">
      <div class="row">

          <div class="card">
            <div class="card-body">
               
              <h5 class="card-title"><a href="\transaksi" class="bi bi-arrow-left-circle pt-5" style="font-size:20px; padding-top: 10px"></a> Pilih Produk</h5>
              <table class="table table-bordered mt-3">
              <thead>
                        <tr>
                          <th> No </th>
                          <th> Nama Produk </th>
                          <th> Harga </th>
                          <th> Stok </th>
                          <th> Checkout</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $no = 1; @endphp
                      @foreach ($produkx as $produk)
                        <tr>
                          <td> {{ $no++ }}</td> 
                          <td> {{$produk['nama_produk']}}</td>
                          <td>Rp {{ number_format($produk['harga'], 0, ',', '.') }}</td>
                          <td> {{$produk['stok']}}</td>
                          <td>
                              <div style="display: flex; gap:10px;" >
                             
                                  <form action="{{route('input.transaksi', $produk['id'])}}" method="post">
                                      @csrf
                                      @method('POST')                                   
                                
                                      <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#input-keranjang">
                                      <i class="bi bi-cart-plus-fill"></i>
                                      </button>
                                  </form>
                                 
                                  
                                  <form action="{{route('kurang.barang', $produk['id'])}}" method="post" data-toggle="modal" data-target="#hapus-keranjang">
                                      @csrf
                                      @method('PATCH')                                   
                                
                                      <button type="submit" class="btn btn-warning">
                                      <i class="bi bi-cart-dash-fill"></i>
                                      </button>
                                  </form>

                                  
                                 
                              </div>
                          </td>

                        </tr>
                        @endforeach                                  
                      </tbody>
              </table>
              <!-- End Bordered Table -->
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="input-keranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Berhasil Menambahkan!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
              <h4>Barang bertambah 1 </h4>
              </div> 
            </div>
          </div>
        </div>

        <div class="modal fade" id="hapus-keranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Berhasil Menghapus!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
              <h4>Barang berkurang 1</h4>
              </div> 
            </div>
          </div>
        </div>
      
   </section>

</main>
@endsection
