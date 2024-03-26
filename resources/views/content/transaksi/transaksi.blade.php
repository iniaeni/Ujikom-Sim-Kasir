@extends('layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Administrator</h1>
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
          <h5 class="card-title mb-0 mt-1 " style="font-size: 20px;"><strong> Hi, Administrator </strong></h5>
        </div>
      </div>
    </section>

   <section class="section">
      <div class="row">

        <!-- Setiap kartu sekarang ditempatkan dalam kolom yang memiliki lebar setengah dari container pada layar medium ke atas -->
        
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Transaksi</h5>
              <form class="row g-3">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Barang">
                    <label for="floatingName">Nama Barang</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="floatingEmail" placeholder="Harga">
                    <label for="floatingEmail">Harga</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="floatingPassword" placeholder="Jumlah">
                    <label for="floatingPassword">Jumlah</label>
                  </div>
                </div>

                <div class="border"></div>
                <h5 class="breadcrumb breadcrumb-item m-2" style="font-size:18px;">Data Pelanggan</h5>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Pelanggan">
                    <label for="floatingName">Nama Pelanggan</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Address</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="floatingName" placeholder="No Telpon">
                    <label for="floatingName">No Telpon</label>
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pilih Produk</h5>
              <table class="table table-bordered mt-3">
              <thead>
                        <tr>
                          <th> No </th>
                          <th> Nama Produk </th>
                          <th> Harga </th>
                          <th> Stok </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $no = 1; @endphp
                      @foreach ($produkx as $produk)
                        <tr>
                          <td> {{ $no++ }}</td> 
                          <td> {{$produk['nama_produk']}}</td>
                          <td>{{ number_format($produk['harga'], 0, ',', '.') }}</td>
                          <td> {{$produk['stok']}} </td>
                          <td>
                              <div style="display: flex; gap:10px;" >
                               
                                  <form action="" method="post">
                                      @csrf
                                      @method('DELETE')
                                      
                                                                         
                                      <button type="submit" class="btn btn-success">
                                      <i class="bi bi-cart-plus-fill"></i>
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

      </div>
   </section>

</main>
@endsection
