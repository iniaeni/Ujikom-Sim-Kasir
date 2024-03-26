@extends('layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Administrator</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row"> 
        <div class="card card-body">
          <h5 class="card-title mb-0 mt-1 " style="font-size: 20px;" ><strong> Hi, Administrator </strong></h5>
   
            </div>
        </div>
    </section>
    
    <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Tambah Produk</h4>
                    <form class="forms-sample" action="{{route('produk.input')}}" method="POST">
                        @method('POST')
                        @csrf
                      <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" id="exampleInputUsername1" style="width: 300px;">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1" style="width: 300px;">
                      </div>
                      <div class="form-group">
                        <label for="">Stok Produk</label>
                        <input type="number" name="stok" class="form-control" id="" style="width: 300px;">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2 mt-4">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
  </main>
@endsection
  