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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  

    <title>Absen Kegiatan</title>
  </head>
  <body onload="startTime()">
    <div class="title bg-primary text-light text-center p-3">
      <h1 class="display-5">
        <i class="fa-solid fa-id-card-clip text-light"></i> Sistem Absensi
      </h1>
      <p>user</p>
    </div>

    <!-- container -->
    <div class="container mt-3">
        @yield('content')
      <!-- nav bottom -->
      <div class="botnav fixed-bottom bg-dark text-light text-center">
        <div class="row">
          <div class="col-4 p-3"><i class="fa-solid fa-house-user"></i></div>
          <div class="col-4 p-3"><i class="fa-solid fa-camera"></i></div>
          <div class="col-4 p-3"><i class="fa-solid fa-user"></i></div>
        </div>
      </div>
      <!-- end nav bottom -->
    </div>
    <!-- akhir container -->


    
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
      {{-- Script tambahan --}}
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      navigator.geolocation.getCurrentPosition(function (position) {
            tampilLokasi(position);
      }, function (e) {
          alert('Geolocation Tidak Mendukung Pada Browser Anda');
      }, {
          enableHighAccuracy: true
      });
    });
    function tampilLokasi(posisi) {
      //console.log(posisi);
      var latitude 	= posisi.coords.latitude;
      var longitude 	= posisi.coords.longitude;
      
            $('#inputabsenkegiatan').html(latitude+","+longitude);
    }
  </script>

   
  </body>
</html>
