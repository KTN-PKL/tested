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
    <title>Detail Absen Harian</title>
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
            <h4 class="text-light p-3"><i class="fa-solid fa-eye"></i> Detail Absen Harian</h4>
        </div>
        <!-- card -->
        <div class="card shadow" style="width: 100%">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <span class="badge bg-prim">Foto Masuk</span>
                        <img class="img" src="{{asset('/foto/'. $absenharian->fotofasdes)}}" width="100%" alt="">
                    </div>
                    <div class="col-6">
                        <span class="badge bg-prim">Foto Kegiatan Masuk</span>
                        <img class="img" src="{{asset('/foto/'. $absenharian->fotokegiatanharian)}}" width="100%" alt="">
                    </div>
                

                </div>
                <div class="col-12 mt-2">
                    <table border="0">
                        <tbody>
                            <tr><td>Tanggal Absen Masuk</td><td>: </td><td>{{$absenharian->tgl}} {{$absenharian->jam}}</td></tr>
                            <tr><td>Jenis Absen</td><td>: </td><td>{{$absenharian->jenis}}</td></tr>
                            <tr><td valign="top">Deskripsi Absen Masuk</td><td valign="top">: </td><td valign="top">{{$absenharian->deskripsi}}</td></tr>
                          
                        </tbody>
                    </table>
                </div>

                @if($absenharian->jampulang <> null)
                <div class="row mt-4">
                    <div class="col-6">
                        <span class="badge bg-prim">Foto Pulang</span>
                        <img class="img" src="{{asset('/foto/'. $absenharian->fotofasdespulang)}}" width="100%" alt="">
                    </div>
                    <div class="col-6">
                        <span class="badge bg-prim">Foto Kegiatan Pulang</span>
                        <img class="img" src="{{asset('/foto/'. $absenharian->fotokegiatanharianpulang)}}" width="100%" alt="">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <table border="0">
                        <tbody>
                            <tr><td>Tanggal Absen Masuk</td><td>: </td><td>{{$absenharian->tgl}} {{$absenharian->jampulang}}</td></tr>
                            <tr><td>Jenis Absen</td><td>: </td><td>{{$absenharian->jenis}}</td></tr>
                            <tr><td valign="top">Deskripsi Absen Masuk</td><td valign="top">: </td><td valign="top">{{$absenharian->deskripsipulang}}</td></tr>
                          
                        </tbody>
                    </table>
                </div>
                @endif
           
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
