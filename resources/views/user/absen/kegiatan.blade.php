@extends('layouts.templateuser')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style type="text/css">
  #results { padding:20px; border:1px solid; background:#ccc; }
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

          <form action="{{route('absenkegiatan.store')}}" method="POST">
          @csrf
          <p class="card-text">Hari/Tanggal : {{ $dayList[$d].", ".$t }}</p>
          <input type="text" name="waktuabsen" value="{{$s}}" hidden>
          <p class="card-text">Kordinat lokasi :  <span id="inputabsenkegiatan"></span></p>
          <input type="text" id="inputabsenkegiatan1" name="lokasiabsen" hidden >
    
          <div class="button text-center d-grid">
            <a href="#" class="btn btn-block btn-warning">
              <i class="fa-solid fa-user"></i> Foto Selfie</a
            >
            <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
                <div id="results">Your captured image will appear here...</div>
            </div>

        <!-- field deskripsi -->
        <div class="form-floating mb-3 pt-3">
          <textarea
            class="form-control"
            placeholder="Leave a comment here"
            id="floatingTextarea" name="deskripsikegiatan"
          ></textarea>
          <label for="floatingTextarea">Deskripsi Absensi</label>
        </div>
        <!-- akhir field deskripsi -->

        <!-- field kegiatan -->
        <div class="button text-center d-grid">
          <a href="#" class="btn btn-block btn-primary"
            ><i class="fa-solid fa-camera"></i> Foto Kegiatan</a
          >
        </div>

        <div class="kegiatan pt-3 mb-3">
          <select class="form-select" aria-label="Default select example" name="jeniskegiatan">
            <option selected disabled>Jenis Kegiatan</option>
            <option value="lapangan">Lapangan</option>
            <option value="kantor">Kantor</option>
            <option value="dinas luar kota">Dinas Luar Kota</option>
            <option value="dinas luar daerah">Dinas Luar Daerah</option>
            <option value="dinas luar negeri">Dinas Luar Negeri</option>
          </select>
        </div>
        <!-- akhir field kegiatan -->

        <div class="Pelatihan pt-3 mb-3">
          <select onchange="test()" class="form-select" aria-label="Default select example" id="pelatihan" name="pelatihan">
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
          <a href="#" class="btn btn-block btn-primary"
            ><i class="fa-solid fa-camera"></i> Foto Pelatihan</a
          >
        </div>
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
    // tambahan form pelatihan
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
  <script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
  

  {{-- end form pelatihan --}}


 
</body>
@endsection
  
</html>
