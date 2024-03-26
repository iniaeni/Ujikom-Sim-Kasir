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
        <div class="card card-body m-2 mb-3">
          <h5 class="card-title mb-0 mt-1 " style="font-size: 20px;" ><strong> Hi, Administrator </strong></h5>
   
            </div>
        </div>
    </section>
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Produk</h5>
              <a href="/create-produk" type="submit" class="btn btn-primary mr-2">Tambah Produk</a>
              <!-- Bordered Table -->
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
                               
                                  <form action="{{route('produk.delete', $produk['id'])}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      
                                      <a href="/update/{{ $produk ['id'] }}" class="btn btn-warning">
                                      <i class="bi bi-pencil"></i>
                                      </a>
                                    
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

  