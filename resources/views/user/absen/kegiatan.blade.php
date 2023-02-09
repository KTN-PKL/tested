@extends('layouts.templateuser')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style type="text/css">
  #results { padding:20px; border:1px solid; background:#ccc; }
</style>
@section('content')
@if(session()->has('msg'))
<div id="login-alert" class="alert alert-danger custom-alert col-md-12"><b>Warning!</b> {{session('msg')}}</div>
@endif
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
          $s = date("Y-m-d H:i:s");
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

          <form action="{{route('absenkegiatan.store')}}" method="POST" data-parsley-validate>
          @csrf
          <p class="card-text">Hari/Tanggal : {{ $dayList[$d].", ".$t }}</p>
          <input type="text" name="tanggalabsen" value="{{$t}}" hidden>
          <p class="card-text">Kordinat lokasi :  <span id="inputabsenkegiatan"></span></p>
          <input type="text" id="inputabsenkegiatan1" name="lokasiabsen" hidden >
    
          <div class="button text-center d-grid">
            <a href="#" class="btn btn-block btn-warning" onclick="selfie()">
              <i class="fa-solid fa-user"></i> Foto Selfie</a>
          </div>
          <div id="hasilselfie"></div>
          <input type="text" id="gambarselfie" name="selfie" hidden  data-parsley-required="true">

        <!-- field deskripsi -->
        <div class="form-floating mb-3 pt-3">
          <textarea
            class="form-control"
            placeholder="Leave a comment here"
            id="floatingTextarea" name="deskripsikegiatan"  data-parsley-required="true"
          ></textarea>
          <label for="floatingTextarea">Deskripsi Absensi</label>
        </div>
        <!-- akhir field deskripsi -->

        <!-- field kegiatan -->
        <div class="button text-center d-grid">
          <a href="#" class="btn btn-block btn-primary" onclick="fotokegiatan()"
            ><i class="fa-solid fa-camera"></i> Foto Kegiatan</a
          >
        </div>
        <div id="hasilkegiatan"></div>
        <input type="text" id="fotokegiatan" name="fotokegiatan" hidden>


        <div class="kegiatan pt-3 mb-3">
          <select class="form-select" aria-label="Default select example" name="jeniskegiatan"  data-parsley-required="true">
            <option selected disabled>Jenis Kegiatan</option>
            <option value="lapangan">Lapangan</option>
            <option value="kantor">Kantor</option>
            <option value="dinas luar kota">Dinas Luar Kota</option>
            <option value="dinas luar daerah">Dinas Luar Daerah</option>
            <option value="dinas luar negeri">Dinas Luar Negeri</option>
            <option value="overtime">Overtime</option>
            
          </select>
        </div>
        <!-- akhir field kegiatan -->

        <div class="Pelatihan pt-3 mb-3">
          <select onchange="test()" class="form-select" aria-label="Default select example" id="pelatihan" name="pelatihan"  data-parsley-required="true">
            <option value="" selected disabled>-- Pilih Pelatihan --</option>
            <option value="pelatihan">Pelatihan</option>
            <option value="nonpelatihan">Non Pelatihan</option>
          </select>
        </div>

        {{-- form jika pelatihan --}}
        <div id="form" style="display: none">
          <div class="form-floating mb-3 pt-3">
            <textarea
            class="form-control"
            placeholder="Leave a comment here"
            id="floatingTextarea" name="judulpelatihan"
          ></textarea>
          <label for="floatingTextarea">Judul</label>
        </div>
        <div class="form-floating mb-3 pt-3">
          <textarea
          class="form-control"
          placeholder="Leave a comment here"
          id="floatingTextarea" name="durasipelatihan"
        ></textarea>
        <label for="floatingTextarea">Durasi Waktu</label>
        </div>
        <div class="form-floating mb-3 pt-3">
          <textarea
          class="form-control"
          placeholder="Leave a comment here"
          id="floatingTextarea" name="tempatpelatihan"
        ></textarea>
        <label for="floatingTextarea">Tempat</label>
        </div>
        <div class="button text-center d-grid">
          <a href="#" class="btn btn-block btn-primary" onclick="fotopelatihan()"
            ><i class="fa-solid fa-camera"></i> Foto Pelatihan</a
          >
       
        </div>
        <div id="hasillpelatihan"></div>
        <input type="text" id="fotopelatihan" name="fotopelatihan" hidden>
        </div>
        {{-- end form pelatihan --}}
      

        <div class="button text-center d-grid pt-3">
          <button type="submit" class="btn btn-block btn-success"
            ><i class="fa-solid fa-floppy-disk"></i> Simpan</button
          >
        </div>
      </div>
    </form>
    </div>
    <!-- akhir componen card -->

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
                    <div id="container" class="ratio ratio-16x9">
                    <video autoplay="true" id="videoElement">
                    </video>
                    </div>
                    <div id="ambilgambar" class="pt-3"></div>
                </div>
                </center>
          </div>
      </div>
      </div>
      {{-- end modal --}}

    <!-- nav bottom -->
    <div class="botnav fixed-bottom bg-dark text-light text-center">
      <div class="row">
        <div class="col-4 p-3"><i class="fa-solid fa-house-user"></i></div>
        <div class="col-4 p-3"><i class="fa-solid fa-camera"></i></div>
        <div class="col-4 p-3"><i class="fa-solid fa-user"></i></div>
      </div>
    </div>
    <!-- end nav bottom -->
  <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
  <script>
    // script tambahan form pelatihan
    function test(){
      var pelatihan = $("#pelatihan").val();
      if(pelatihan == "pelatihan"){
        document.getElementById("form").style.display = "block";
      }
     else{
      document.getElementById("form").style.display = "none";
     }
     
    }
  </script>
  {{-- end script tambahan form pelatihan --}}
  
  {{-- start webcam  --}}
  <script>
     var video = document.querySelector("#videoElement");
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

      function fotopelatihan()
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
         var data = `<a href="#" onclick="snappelatihan()" class="btn btn-primary">Ambil Gambar Kegiatan</a>`;
        $("#exampleModal").modal('show');
         $("#ambilgambar").html(data);
      }

      function snappelatihan() {
        var data = `<center>
          <canvas id="canvas1" width="425" height="300"></canvas>
          </center>`;
         $("#hasillpelatihan").html(data);
        var canvas1 = document.getElementById('canvas1');
        var context1 = canvas1.getContext('2d');
        context1.drawImage(video, 0, 0, 425, 300);
        var dataURL = canvas1.toDataURL(dataURL);
        $("#fotopelatihan").val(dataURL);
        //'<img src="'+dataURL+'"/>'
        $(".btn-close").click();
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

      function snapkegiatan() {
        var data = `<center>
          <canvas   id="canvas1" width="425" height="300">hi</canvas>
          </center>`;
         $("#hasilkegiatan").html(data);
        var canvas1 = document.getElementById('canvas1');
        var context1 = canvas1.getContext('2d');
        context1.drawImage(video, 0, 0, 425, 300);
        var dataURL = canvas1.toDataURL(dataURL);
        $("#fotokegiatan").val(dataURL);
        //'<img src="'+dataURL+'"/>'
        $(".btn-close").click();
      }

   

      function vidOff() {
      var mediaStream = video.srcObject;
      var tracks = mediaStream.getTracks();
      tracks[0].stop();
      }

      
  </script>

  
  {{-- endwebcam --}}


 
</body>
@endsection
  
</html>
