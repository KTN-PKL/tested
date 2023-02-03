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
          <p class="card-text">Hari/Tanggal :</p>
          <p class="card-text">Kordinat lokasi :  <span id="lokasi"></span></p>
          <div class="button text-center d-grid">
            <a href="#" class="btn btn-block btn-warning">
              <i class="fa-solid fa-user"></i> Foto Selfie</a
            >
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
              ><i class="fa-solid fa-camera"></i> Foto kegiatan</a
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
    </div>
    <!-- akhir container -->
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
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
        
              $('#lokasi').html(latitude+","+longitude);
      }
    </script>
  </body>
</html>
