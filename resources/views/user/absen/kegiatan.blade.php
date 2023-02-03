@extends('layouts.templateuser')
<style>
  #container {
    margin: 0px auto;
    width: 500px;
    height: 375px;
    border: 10px #333 solid;
  }
  #videoElement {
    width: 500px;
    height: 375px;
    background-color: #666;
  }
  </style>
@section('content')
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
          <p class="card-text">Hari/Tanggal : {{ $dayList[$d].", ".$t }}</p>
          <p class="card-text">Kordinat lokasi :  <span id="lokasi"></span></p>
          <div class="button text-center d-grid">
            <a href="#" class="btn btn-block btn-warning">
              <i class="fa-solid fa-user"></i> Foto Selfie</a
            >
            <video autoplay="true" id="videoElement">

            </video>
        </div>

        <!-- field deskripsi -->
        <div class="form-floating mb-3 pt-3">
          <textarea
            class="form-control"
            placeholder="Leave a comment here"
            id="floatingTextarea"
          ></textarea>
          <label for="floatingTextarea">Deskripsi Absensi</label>
        </div>
        <div class="button text-center d-grid">
          <a href="#" class="btn btn-block btn-primary"
            ><i class="fa-solid fa-camera"></i> Foto Kegiatan</a
          >
        </div>
        <!-- akhir field deskripsi -->

        <!-- field kegiatan -->
        <div class="kegiatan pt-3 mb-3">
          <select class="form-select" aria-label="Default select example">
            <option selected disabled>Jenis Kegiatan</option>
            <option value="1">Lapangan</option>
            <option value="2">Kantor</option>
            <option value="3">Dinas Luar Kota</option>
            <option value="3">Dinas Luar Daerah</option>
            <option value="3">Dinas Luar Negeri</option>
          </select>
        </div>
        <!-- akhir field kegiatan -->

        <div class="Pelatihan pt-3 mb-3">
          <!-- isi code -->
          <select onchange="pelatihan()" class="form-select" aria-label="Default select example" id="pelatihan">
            <option value="" selected disabled>-- Pilih Pelatihan --</option>
            <option value="pelatihan">Pelatihan</option>
            <option value="nonpelatihan">Non Pelatihan</option>
          </select>
        </div>

        <div id="form" style="display: none">
          <div class="form-floating mb-3 pt-3">
            <textarea
            class="form-control"
            placeholder="Leave a comment here"
            id="floatingTextarea"
          ></textarea>
          <label for="floatingTextarea">Judul</label>
        </div>
        <div class="form-floating mb-3 pt-3">
          <textarea
          class="form-control"
          placeholder="Leave a comment here"
          id="floatingTextarea"
        ></textarea>
        <label for="floatingTextarea">Durasi Waktu</label>
        </div>
        <div class="form-floating mb-3 pt-3">
          <textarea
          class="form-control"
          placeholder="Leave a comment here"
          id="floatingTextarea"
        ></textarea>
        <label for="floatingTextarea">Tempat</label>
        </div>
        <div class="button text-center d-grid">
          <a href="#" class="btn btn-block btn-primary"
            ><i class="fa-solid fa-camera"></i> Foto Pelatihan</a
          >
        </div>

        </div>
      

        <div class="button text-center d-grid pt-3">
          <a href="#" class="btn btn-block btn-success"
            ><i class="fa-solid fa-floppy-disk"></i> Simpan</a
          >
        </div>
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
  <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('templateUser')}}/js/test.js"></script>
  <script>
    // tambahan form pelatihan
    function pelatihan(){
      var pelatihan = $("#pelatihan").val();
      if(pelatihan == "pelatihan"){
        document.getElementById("form").style.display = "block";
      }
     else{
      document.getElementById("form").style.display = "none";
     }
     
    }
  </script>
  <script>
    var video = document.querySelector("#videoElement");

    if (navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
          video.srcObject = stream;
        })
        .catch(function (err0r) {
          console.log("Something went wrong!");
        });
    }
  </script>
  {{-- end form pelatihan --}}


 
</body>
@endsection
  
</html>
