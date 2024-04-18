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

        <!-- Setiap kartu sekarang ditempatkan dalam kolom yang memiliki lebar setengah dari container pada layar medium ke atas -->
        
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Transaksi</h5>
              <a href="/keranjang" type="submit" class="btn btn-primary mr-2">Pilih Produk</a>
              
              <form class="row g-3 mt-2" action="{{route('checkout.barang')}}" method="POST" autocomplete="off" >
                @csrf
                @method('POST')
               
                

                @foreach($keranjang as $keranjangx)
              @if($keranjangx['id_pelanggan'] == null)
                <div class="col-md-5">
                <!-- Placeholder untuk Nama Produk -->
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingProductName" placeholder="Nama Produk" name="nama_produk" value="{{ isset($keranjangx['id_pelanggan']) ? '' : $keranjangx['nama_produk'] }}" readonly>
                    <label for="floatingProductName">Nama Produk</label>
                </div>
            
            </div>
            <div class="col-md-3">
                <!-- Input untuk Jumlah -->
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingQuantity" placeholder="Jumlah" name="jumlah" value="{{ isset($keranjangx['id_pelanggan']) ? '' : $keranjangx['jumlah']}}" readonly>
                    <label for="floatingQuantity">Jumlah</label>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Input untuk Harga -->
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingPrice" placeholder="Total Harga" name="harga" value="{{ isset($keranjangx['id_pelanggan']) ? '' : $keranjangx['harga']* $keranjangx['jumlah']}}" >
                    <label for="floatingPrice">Harga</label>
                </div>
            </div>
           
            @endif
            @endforeach
            
            </div>
          </div>
        </div>

            
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Nama Pelanggan</h5>
                <div class="border"></div>
                
                <div class="col-md-12 mt-4">
                  <div class="">
                    <input type="date" class="form-control" name="tanggal" id="tanggal" readonly>
                    <script>
                      // Mendapatkan elemen input tanggal
                      var inputTanggal = document.getElementById('tanggal');

                      // Mendapatkan tanggal hari ini
                      var today = new Date();
                      var year = today.getFullYear();
                      var month = ('0' + (today.getMonth() + 1)).slice(-2); // Tambahkan 0 di depan jika bulan < 10
                      var day = ('0' + today.getDate()).slice(-2); // Tambahkan 0 di depan jika tanggal < 10

                      // Format tanggal menjadi 'YYYY-MM-DD'
                      var formattedDate = year + '-' + month + '-' + day;

                      // Atur nilai awal input tanggal
                      inputTanggal.value = formattedDate;
                      </script>
                  </div>
                </div>
                <div class="col-md-12 mt-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Pelanggan" name="nama_pelanggan">
                    <label for="floatingName">Nama Pelanggan</label>
                  </div>
                </div>
                <div class="col-12 mt-3">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="alamat"></textarea>
                    <label for="floatingTextarea">Address</label>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="floatingName" placeholder="No Telpon" name="nomor_telp">
                    <label for="floatingName">No Telpon</label>
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#checkout">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                </div>
          </div>
        </div>
              </form><!-- End floating Labels Form -->
      </div>

      <!-- MOdal -->
      <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Berhasil Checkout!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
              <h6>Terimakasih sudah membeli</h6>
              </div> 
            </div>
          </div>
        </div>
   </section>

</main>
@endsection
