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

    <title>History</title>
  </head>
  @auth
  <body class="d-flex flex-column min-vh-100">
    <div class="title bg-primary text-light text-center p-3">
      <h1 class="display-5"><i class="fa-solid fa-id-card-clip text-light"></i> Selamat datang</h1>
      <p>{{Auth::user()->name}}</p>
    </div>
    <div class="container p-1">
      <!-- main menu -->
      <div class="history p-2 rou">
        <div class="rounded label bg-primary">
          <h4 class="text-light p-3"><i class="fa-solid fa-book"></i> History</h4>
        </div>
        <!-- card -->
        <h6 style="color:grey">Absen Harian</h6>
        @forelse($absenharian as $data)
        <div class="card shadow" style="width: 100%">
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <p class="fw-bold">{{$data->tgl}} {{$data->jam}}</p>
                <p class="fw-bold">Absen Harian</p>
              </div>
              <div class="col-4 fw-bold">Status : <span class="badge bg-success">Absen Masuk</span></div>
            </div>
          </div>
        </div>  
        @if($data->jampulang <> null)
        <div class="card shadow" style="width: 100%">
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <p class="fw-bold">{{$data->tgl}} {{$data->jampulang}}</p>
                <p class="fw-bold">Absen Harian</p>
              </div>
              <div class="col-4 fw-bold">Status : <span class="badge bg-danger">Absen Pulang</span></div>
            </div>
          </div>
        </div> 
        @endif 
        @empty
        <p class="bg-danger text-white p-1">Belum Ada Absen Harian</p>
       @endforelse
       <h6 style="color:grey">Absen Kegiatan</h6>
       @forelse($absenkegiatan as $datas)
       <div class="card shadow" style="width: 100%">
        <div class="card-body">
          <div class="row">
            <div class="col-8">
              <p class="fw-bold">{{$datas->tanggalabsen}} {{$datas->waktuabsen}}</p>
              <p class="fw-bold">Absen Kegiatan {{$datas->jeniskegiatan}}</p>
            </div>
            <div class="col-4 fw-bold">Status : <span class="badge bg-danger">Absen Kegiatan</span></div>
          </div>
        </div>
        @empty
        <p class="bg-danger text-white p-1">Belum Ada Absen Kegiatan</p>
      </div> 
       @endforelse
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
  @endauth
</html>
