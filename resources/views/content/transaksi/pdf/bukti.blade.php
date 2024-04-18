<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Kasir Cepat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>


<main id="main" class="main">



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
        

                       
<script type="text/javascript">
        window.print();

    </script>             
 </main>
<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
  