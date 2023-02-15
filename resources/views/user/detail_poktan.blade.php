<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="{{asset('templateUser')}}/style.css" />
    <title>Detail Poktan</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="title bg-primary text-light text-center p-3">
    <h1 class="display-5"><i class="fa-solid fa-id-card-clip text-light"></i> Selamat datang</h1>
        <p>User</p>
    </div>
    <div class="container p-1">
        <!-- main menu -->
        <div class="history p-2 rou">
        <div class="rounded label bg-primary">
            <h4 class="text-light p-3"><i class="fa-solid fa-pencil"></i> Detail PokTan</h4>
        </div>
        <!-- card -->
        <div class="card shadow" style="width: 100%">
            <div class="card-body">
              <div class="row">
                <div class="col-10">
                    <table border="0">
                        <tbody>
                            <tr><td>Nama Poktan</td><td>: </td><td>{{$poktan->namapoktan}}</td></tr>
                            <tr><td>Luas Tanah</td><td>: </td><td>{{$poktan->luastanah}}</td></tr>
                            <tr><td>Jumlah Produksi</td><td>: </td><td>{{$poktan->jumlahproduksi}}</td></tr>
                            <tr><td>Pemelihara</td><td>: </td><td>{{$poktan->pemeliharaan}}</td></tr>
                            <tr><td>Pasar Lokal</td><td>: </td><td>{{$poktan->pasar}}</td></tr>
                            <tr><td>Lokasi Poktan</td><td>: </td><td>{{$poktan->lokasipoktan}}</td></tr>
                            <tr><td>Nama Bantuan</td><td>: </td><td>{{$poktan->namabantuan}}</td></tr>
                            <tr><td>Kuantitas Bantuan</td><td>: </td><td>{{$poktan->qtybantuan}}</td></tr>
                            <tr><td>Waktu Penyaluran</td><td>: </td><td>{{$poktan->waktubantuan}}</td></tr>
                            <tr><td>List Data Petani</td><td>: </td></tr>
                        </tbody>
                    </table>
                    <table style="width:30%" class="table table-sm table-primary table-bordered">
                      <tr>
                        <th>No</th>
                        <th>Nama Petani</th>
                      </tr>
                      @php
                      $i=0;
                      @endphp
                      @foreach($petani as $data)
                      @php
                          $i=$i+1;
                      @endphp
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$data->namapetani}}</td>
                      </tr>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- card history end -->
    </div>

    <!-- end main menu -->

    <!-- nav bottom -->
    <div class="botnav fixed-bottom bg-dark text-light text-center">
        <div class="row">
            <div class="col-4 p-3">
                <a href="{{url('fasdes/dashboard')}}" class="text-decoration-none text-light fa-solid fa-house-user text-light">
                </a>
              </div>
              <div class="col-4 p-3">
                <a href="{{url('harian/absen')}}" class="text-decoration-none text-light fa-solid fa-camera">
                </a>
              </div>
              <div class="col-4 p-3">
                <a href="{{route('fasdes.profil')}}" class="text-decoration-none text-light fa-solid fa-user">
                </a>
              </div>
        </div>
    </div>
    
    <!-- end nav bottom -->
    </div>
    <!-- footer -->
    <footer class="text-light text-center text-lg-start mt-auto pt-5">
        <!-- Copyright -->
        <div class="text-center p-3 bg-primary" style="height: 20vh">
            ©2023 Copyright:
        <a class="text-dark" href="#"></a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- end footer -->
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
    </body>
</html>