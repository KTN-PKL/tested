<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.c ss"
    />
    <link rel="stylesheet" href="{{asset('templateUser')}}/style.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
          <h5 class="card-title mb-3">Absensi Kegiatan</h5>
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
          <form action="">
          <p class="card-text">Hari/Tanggal : {{ $dayList[$d].", ".$t }}</p>
          <input type="text" name="harian" value="{{ $dayList[$d].", ".$t }}" hidden>
          <p class="card-text">Kordinat lokasi :  <span id="lokasi"></span></p>
          <input type="text" id="lokasiisi" name="lokasi" hidden>
          <div class="button text-center d-grid">
            <a href="#" class="btn btn-block btn-warning" onclick="selfie()">
              <i class="fa-solid fa-user"></i> Foto Selfie</a>
          </div>
          <div id="hasilselfie"></div>
          <input type="text" id="gambarselfie" name="selfie" hidden>
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
            <a href="#" class="btn btn-block btn-primary" onclick="fotokegiatan()">
              <i class="fa-solid fa-camera"></i> Foto kegiatan</a>
          </div>
           <div id="hasilkegiatan"></div>
          <input type="text" id="gambarkegiatan" name="kegiatan" hidden>

          <div class="button text-center d-grid pt-3">
            <button href="#" class="btn btn-block btn-success">
              <i class="fa-solid fa-floppy-disk"></i> Simpan</button>
          </div>
        </form>
        </div>
      </div>
      <!-- akhir componen card -->
      
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="vidOff()"></button>
              </div>
              <div class="modal-body">
                <center>
                    <div id="container">
                    <video autoplay="true" id="videoElement">
                    </video>
                    </div>
                    <div id="ambilgambar"></div>
                </div>
                </center>
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
        $("#gambarselfie").val();
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
        $("#gambarkegiatan").val();
        //'<img src="'+dataURL+'"/>'
        $(".btn-close").click();
      }
   
    </script>
  </body>
</html>
