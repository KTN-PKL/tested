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
            <div class="card-title text-center">
                <img src="{{asset('template')}}/assets/img/logoupland.png" style="width:150px;background-color:white;" alt="tes">
            </div>
            <h4 class="text-light p-3"> Detail Absen Kegiatan</h4>
        </div>
        <!-- card -->
        <div class="card shadow" style="width: 100%">
            <div class="card-body">
                <div class="row">
                    <div @if($absenkegiatan->pelatihan == "pelatihan") class="col-4" @else class="col-6" @endif>
                        <span class="badge bg-prim">Foto Kegiatan</span>
                        <img class="img" src="{{asset('/foto/absenkegiatan/'. $absenkegiatan->fotokegiatan)}}" width="100%" alt="">
                    </div>
                    <div @if($absenkegiatan->pelatihan == "pelatihan") class="col-4" @else class="col-6" @endif>
                        <span class="badge bg-prim">Selfie</span>
                        <img class="img" src="{{asset('/foto/absenkegiatan/'. $absenkegiatan->selfiekegiatan)}}" width="100%" alt="">
                    </div>
                    @if($absenkegiatan->pelatihan == "pelatihan")
                    <div class="col-4">
                        <span class="badge bg-prim">Foto Pelatihan</span>
                        <img class="img" src="{{asset('/foto/absenkegiatan/'. $absenkegiatan->fotopelatihan)}}" width="100%" alt="">
                    </div>
                    @endif

                </div>
                <div class="col-12 mt-2">
                    <table border="0">
                        <tbody>
                            <tr><td>Tanggal Absen</td><td>: </td><td>{{$absenkegiatan->tanggalabsen}} {{$absenkegiatan->waktuabsen}}</td></tr>
                            <tr><td>Jenis Kegiatan</td><td>: </td><td>{{$absenkegiatan->jeniskegiatan}}</td></tr>
                            <tr><td valign="top">Deskripsi Kegiatan</td><td valign="top">: </td><td valign="top">{{$absenkegiatan->deskripsikegiatan}}</td></tr>
                            <tr><td>Pelatihan</td><td>: </td><td>{{$absenkegiatan->pelatihan}}</td></tr>
                            @if($absenkegiatan->pelatihan == "pelatihan")
                            <tr><td valign="top">Judul Pelatihan</td><td valign="top">: </td><td valign="top">{{$absenkegiatan->judulpelatihan}}</td></tr>
                            <tr><td>Durasi Pelatihan</td><td>: </td><td>{{$absenkegiatan->durasipelatihan}} Menit</td></tr>
                            <tr><td valign="top">Tempat Pelatihan</td><td valign="top">: </td><td valign="top">{{$absenkegiatan->tempatpelatihan}}</td></tr>
                            @endif
                        </tbody>
                    </table>
                

                   
                   
                </div>
           
        </div>
        <input type="text" value="{{ $absenkegiatan->lokasiabsen }}" id="lokasi" hidden>
        <div id="googleMap" style="width:100%;height:380px;"></div>
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
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var lokkasi = $("#lokasi").val();
  var myarr = lokkasi.split(",");
  var lat = parseFloat(myarr[0]);
  var long = parseFloat(myarr[1]);
  var propertiPeta = {
    center: {
      lat: lat,
      lng: long
    },
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position:  {
      lat: lat,
      lng: long
    },
      map: peta,
      animation: google.maps.Animation.BOUNCE
  });

}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
