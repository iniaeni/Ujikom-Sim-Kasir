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
                  <h4 class="card-title">Edit Petugas</h4>
                    <form class="row g-3" class="forms-sample" action="{{ route('petugas.edit', $petugas['id'])}}" method="POST">
                    @csrf
                    @method('PATCH')
                      
                    <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{ $petugas['nama']}}">
                </div>
                <div class="col-md-4">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" placeholder="Email" name="email" value="{{$petugas['email']}}">
                </div>
               
               
                <div class="col-md-4">
                  <select id="inputState" class="form-select" name="role">
                    <option selected>Sebagai..</option>
                    <option value="admin">admin</option>
                    <option value="petugas ">petugas</option>
                  </select>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/petugas" type="submit" class="btn btn-primary">Cancel</a>
                </div>
                    </form>
                  </div>
                </div>
              </div>
   
  </main>

  