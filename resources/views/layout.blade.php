<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kasir Cepat</title>

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
@if(Auth::check())
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="/assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">Kasir Cepat -admin</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">   

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="{{asset('/assets/images/pp.png')}}" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->role}} - {{Auth::user()->nama}}</span>
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6> {{Auth::user()->nama}}</h6>
          <span>{{Auth::user()->role}}</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="/logout">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul>
    </li>

  </ul>
</nav>

</header>
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
@if (Session::get('notAllowed'))
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show w-100" role="alert">
            {{Session::get('notAllowed')}}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
  <li class="nav-item">
    <a class="nav-link collapsed" href="/dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link collapsed " href="/produk">
        <i class="bi bi-cart-plus-fill"></i>
      <span>Produk</span>
    </a>
  </li>
  @if (Auth::user()->role == 'petugas') 
  <li class="nav-item">
    <a class="nav-link collapsed " href="/transaksi">
        <i class="bi bi-cash-coin"></i>
      <span>Transaksi</span>
    </a>
  </li>
  @endif

  
  <li class="nav-item">
    <a class="nav-link collapsed " href="/detail-penjualan">
        <i class="bi bi-file-earmark-bar-graph-fill"></i>
      <span>Data Penjualan</span>
    </a>
  </li>
  @if (Auth::user()->role == 'admin') 
  <li class="nav-item">
    <a class="nav-link collapsed " href="/petugas">
        <i class="bi bi-person-lines-fill"></i>
      <span>Data Petugas/Staff</span>
    </a>
  </li>
  @endif

  

    </ul>
  </li><!-- End Components Nav -->

</aside><!-- End Sidebar-->

  
    
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endif
@yield('content')

<!-- Vendor JS Files -->
<script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>
  
</body>

</html>