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
          <h5 class="card-title mb-0 mt-1 " style="font-size: 20px;" ><strong> Hi, Administrator </strong></h5>
   
            </div>
        </div>
    </section>
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Pegawai/Staff</h5>
              <a href="/create-petugas" type="submit" class="btn btn-primary mr-2">Tambah Pegawai</a>
              <!-- Bordered Table -->
              <table class="table table-bordered mt-3">
              <thead>
                        <tr>
                          <th> No </th>
                          <th> Nama Petugas</th>
                          <th> Email</th>
                          <th> Role</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                      
                     @php
                     $no = 1;
                     @endphp

                    @foreach ($petugasx as $petugas)
                        <tr>
                          <td>{{ $no++ }}</td> 
                          <td> {{ $petugas['nama']}}</td>
                          <td>{{$petugas['email']}}</td>
                          <td> {{$petugas['role']}}</td>
                          <td>
                              <div style="display: flex; gap:10px;" >
                                  <!-- Modal -->
                                  <form action="{{route('petugas.delete', $petugas['id'])}}" method="post">
                                      @csrf
                                      @method('DELETE') 
                                      
                                      <a href="/edit/{{ $petugas ['id'] }}" class="btn btn-warning">
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

  