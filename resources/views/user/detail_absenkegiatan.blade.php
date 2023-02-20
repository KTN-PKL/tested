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
    <title>Detail Absen Kegiatan</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="title bg-prim text-light text-center p-3">
    <h1 class="display-5"><i class="fa-solid fa-id-card-clip text-light"></i> Selamat datang</h1>
        <p>{{Auth::user()->name}}</p>
    </div>
    <div class="container p-1">
        <!-- main menu -->
        <div class="history p-2 rou">
        <div class="rounded label bg-prim">
            <h4 class="text-light p-3"><i class="fa-solid fa-pencil"></i> Detail Absen Kegiatan</h4>
        </div>
        <!-- card -->
        <div class="card shadow" style="width: 100%">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                    <table border="0">
                        <tbody>
                            <tr><td>Tanggal Absen</td><td>: </td><td>{{$kegiatan->tanggalabsen}} {{$kegiatan->waktuabsen}}</td></tr>
                            <tr><td>Jenis Kegiatan</td><td>: </td><td>{{$kegiatan->jeniskegiatan}}</td></tr>
                            <tr><td>Deskripsi Kegiatan</td><td>: </td><td>{{$kegiatan->deskripsikegiatan}}</td></tr>
                            <tr><td>Pelatihan</td><td>: </td><td>{{$kegiatan->pelatihan}}</td></tr>
                            @if($kegiatan->pelatihan == "pelatihan")
                            <tr><td>Judul Pelatihan</td><td>: </td><td>{{$kegiatan->judulpelatihan}}</td></tr>
                            <tr><td>Durasi Pelatihan</td><td>: </td><td>{{$kegiatan->durasipelatihan}} Menit</td></tr>
                            <tr><td>Tempat Pelatihan</td><td>: </td><td>{{$kegiatan->tempatpelatihan}}</td></tr>
                            @endif
                        </tbody>
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
        <div class="text-center p-3 bg-prim" style="height: 20vh">
            ©2023 Copyright:
        <a class="text-dark" href="#"></a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- end footer -->
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
