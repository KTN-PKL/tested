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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Absen Harian</title>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <div class="title bg-prim text-light text-center p-3">
      <h1 class="display-5">
        @php
        date_default_timezone_set("Asia/Jakarta");
        $t = date("Y-m-d");
        $d = date("D");
        $dayList = array(
          'Sun' => 'Minggu',
          'Mon' => 'Senin',
          'Tue' => 'Selasa',
          'Wed' => 'Rabu',
          'Thu' => 'Kamis',
          'Fri' => 'Jumat',
          'Sat' => 'Sabtu'
          );
        @endphp
      @if ($dayList[$d] == "Sabtu" || $dayList[$d] == "Minggu")
      <i class="fa-solid fa-id-card-clip text-light"></i> Libur !
      @else
      @if ($cek == null)
        <i class="fa-solid fa-id-card-clip text-light"></i> Absen Harian (Masuk)
      @elseif ($cek->jampulang == null)
        <i class="fa-solid fa-id-card-clip text-light"></i> Absen Harian (Pulang)
      @else
      <i class="fa-solid fa-id-card-clip text-light"></i> Anda Telah Absen Hari Ini!
      @endif
      @endif
    </h1>
      <p>{{ Auth::user()->name }}</p>
    </div>

    <!-- container -->
    <div class="container mt-3">
      @if ($dayList[$d] == "t" || $dayList[$d] == "t") 
      <!--line diatas di bypass dulu-->
      <!--($dayList[$d] == "Sabtu" || $dayList[$d] == "Minggu")-->
      <center> <div class="alert alert-warning fa-2xl" role="alert">
          <i class="fa-solid fa-triangle-exclamation mb-3"></i>
         <marquee>
           <h5>
               Wah kamu rajin kerja sampe absen hari libur!
           </h5>
         </marquee>
      </div></center>
      @else
      <!-- componen card -->
      <div class="card">
        <div class="card-body">
          <div class="deskripsi mt-3">
            <h6>Tahap absensi</h6>
            <ul>
              <li>Pastikan GPS HP Aktif.</li>
              <li>Kordinat akan muncul apabila GPS aktif.</li>
              <li>Lakukan Foto Selfie.</li>
              <li>Masukan deskripsi absensi.</li>
              <li>pilih button foto kegiatan.</li>
              <li>Pilih Tombol Simpan Untuk melakukan Absen.</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- akhir componen card -->

      <!-- componen card -->
      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title mb-3">Absensi Harian</h5>
          @if ($cek == null)
          <form class="row g-3" action="{{route('absen.harian.store')}}" method="POST">
          
          @elseif ($cek->jampulang == null)
          <form class="row g-3" action="{{route('absen.harian.storepulang')}}" method="POST">  
          @endif
          @csrf
          <p class="card-text">Hari/Tanggal : {{ $dayList[$d].", ".$t }}</p>
          <input type="text" name="harian" value="{{ $t }}" hidden>
          <p class="card-text">Kordinat lokasi :  <span id="lokasi"></span></p>
          <input type="text" id="lokasiisi" name="lokasi" hidden>
          <div class="button text-center d-grid">
            <a href="#" class="btn btn-block btn-warning" onclick="selfie()">
              <i class="fa-solid fa-user"></i> Foto Selfie</a>
          </div>
          
          {{-- This is the code that will display the image that has been taken by the user.   --}}
          <div id="hasilselfie" class="overflow-hidden d-flex justify-content-center"></div>
          <input type="text" id="gambarselfie" name="selfie" hidden>

          <!-- select posisi-->
          <div>
            <p>Pilih posisi</p>
            <select class="form-select" aria-label="Default select" name="jenis" id="jenis">
              <option value="Dalam Kantor" selected>Dalam Kantor</option>
              <option value="Luar Kantor">Luar Kantor</option>
            </select>
          </div>
          <!-- end select posisi-->

          <!-- field deskripsi -->
          <div class="form-floating mb-3 pt-3">
            <textarea
              class="form-control"
              placeholder="Leave a comment here"
              id="floatingTextarea"
              name="deskripsi"
            ></textarea>
            <label for="floatingTextarea">Deskripsi Absensi</label>
          </div>
          <div class="button text-center d-grid">
            <a href="#" class="btn btn-block btn-warning" onclick="fotokegiatan()">
              <i class="fa-solid fa-camera"></i> Foto kegiatan</a>
          </div>
          <div id="hasilkegiatan" class="overflow-hidden d-flex justify-content-center"></div>
          <input type="text" id="gambarkegiatan" name="kegiatan" hidden>
          <input type="submit"  value="submit" id="klik" hidden>
        </form>

        <div class="button text-center d-grid pt-3">
          <div class="btn btn-block btn-success" onclick="jarak()">
            <i class="fa-solid fa-floppy-disk"></i> Simpan</div>
        </div>

        </div>
      </div>
      <!-- akhir componen card -->
      @endif
            <!-- nav bottom -->
      <div class="botnav fixed-bottom bg-dark text-light text-center mb-0">
        <div class="row">
          <div class="col-4 p-3">
            <a
              href="{{url('fasdes/dashboard')}}"
              class="text-decoration-none text-light fa-solid fa-house-user text-light"
            ></a>
          </div>
          <div class="col-4 p-3">
            <a
              href="{{url('harian/absen')}}"
              class="text-decoration-none text-light fa-solid fa-camera"
            ></a>
          </div>
          <div class="col-4 p-3">
            <a
              href="{{url('#')}}"
              class="text-decoration-none text-light fa-solid fa-user"
            ></a>
          </div>
        </div>
      </div>
      <!-- end nav bottom -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl ">
          <div class="modal-content bg-dark text-light">
              <div class="modal-header">
                  <div id="ambilgambar" class="pt-3"></div>
                  <button type="button" class="btn-close bg-danger rounded" data-bs-dismiss="modal" aria-label="Close" onclick="vidOff()"></button>
              </div>
              <div class="modal-body">
                <center>
                    <div id="container" class="overflow-hidden d-flex justify-content-center">
                    <video autoplay="true" id="videoElement">
                    </video>
                    </div>
                    
                </div>
                </center>
          </div>
      </div>
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


      {{-- The above code is a modal that will be displayed when the user is too far from the location.  --}}
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Posisi Anda Terlalu Jauh</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div id="jarak"></div>
            </div>
        </div>
      </div>

    <!-- akhir container -->
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    var video = document.querySelector("#videoElement");
    
    //locasi
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
              $('#lokasi').html(latitude+","+longitude);
              $('#lokasiisi').val(latitude+","+longitude);
      }
      function jarak()
      {
        var data =  $('#lokasiisi').val()
        var jenis = $('#jenis').val()
        if (jenis == "Dalam Kantor") {
        $.get("{{ url('harian/jarak') }}/"+data, {}, function(data, status) {
        if (data > 0.2) {
          $("#exampleModal2").modal('show');
          var jarak = data * 1000;
        $("#jarak").html("Jarak Anda dari titik absen : "+ jarak +" meter");
        } else {
        $("#klik").click();
        }
        });    
      } else {
        $("#klik").click();
        }
      }
      //webcam selfie
      function selfie()
      {
        if (navigator.mediaDevices.getUserMedia) {
          navigator.mediaDevices.getUserMedia({ video: true })
          .then(function (stream) {
          video.srcObject = stream;
          })
          .catch(function (err0r) {
          console.log("Something went wrong!");
          });
      }
      var data = `<a href="#" onclick="snapselfie()" class="btn btn-primary">Ambil Gambar</a>`;
        $("#exampleModal").modal('show');
        $("#ambilgambar").html(data);
        
      }
      function fotokegiatan()
      {
        if (navigator.mediaDevices.getUserMedia) {
          navigator.mediaDevices.getUserMedia({ video: true })
          .then(function (stream) {
          video.srcObject = stream;
          })
          .catch(function (err0r) {
          console.log("Something went wrong!");
          });
      }
        var data = `<a href="#" onclick="snapkegiatan()" class="btn btn-primary">Ambil Gambar Kegiatan</a>`;
        $("#exampleModal").modal('show');
        $("#ambilgambar").html(data);
      }
      function vidOff() {
      var mediaStream = video.srcObject;
      var tracks = mediaStream.getTracks();
      tracks[0].stop();
      }
      function snapselfie() {
        var data = `<center>
          <canvas id="canvas" width="425" height="300"></canvas>
          </center>`;
        $("#hasilselfie").html(data);
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, 425, 300);
        var dataURL = canvas.toDataURL(dataURL);
        $("#gambarselfie").val(dataURL);
        //'<img src="'+dataURL+'"/>'
        $(".btn-close").click();
      }
      function snapkegiatan() {
        var data = `<center>
          <canvas id="canvas1" width="425" height="300"></canvas>
          </center>`;
        $("#hasilkegiatan").html(data);
        var canvas1 = document.getElementById('canvas1');
        var context1 = canvas1.getContext('2d');
        context1.drawImage(video, 0, 0, 425, 300);
        var dataURL = canvas1.toDataURL(dataURL);
        $("#gambarkegiatan").val(dataURL);
        //'<img src="'+dataURL+'"/>'
        $(".btn-close").click();
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
