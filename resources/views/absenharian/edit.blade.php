@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Edit Data Absen Kegiatan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('kegiatan.index')}}">Kelompok Petani Fasilitator Desa</a></li>
        <li class="breadcrumb-item"><a href="{{route('kegiatan.kegiatan', $harian->id_user)}}">Daftar Kelompok Petani</a></li>
        <li class="breadcrumb-item active">Edit Data Absen harian</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
              <!-- Vertical Form -->
              <form enctype="multipart/form-data" class="row g-3" action="{{ route('faskab.harian.update', $harian->id_absenharian) }}" method="POST">
                @csrf
                <center>
                  <h5 class="card-title">Edit Data Absen harian</h5> 
                  <div class="col col-md-3">
                    <select class="form-select" id="jenis" onchange="jeniss()" name="jenis">
                      <option value="masuk" selected>masuk</option>
                      <option value="pulang">pulang</option>
                      </select>
                  </div>
                 
              </center>
                <div class="col-12">
                  <div class="row">
                    <div class="col-8">
                      <label for="inputNanme4" class="form-label">Tanggal Absen</label>
                      <input type="text" class="form-control"  value="{{$harian->tgl}}" readonly>
                    </div>
                    <div class="col-4">
                      <label for="inputNanme4" class="form-label">Waktu Absen</label>
                      <div id="jam"></div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Deskripsi Kegiatan</label>
                  <div id="deskripsi"></div>
                </div>
                <div class="col-12">
                  <div class="row">
                      <div class="col-12">
                        <label for="inputNanme4" class="form-label">Foto</label><small class="text-muted" style="font-size:8px">Klik gambar jika ingin mengubah</small>
                        <div class="row">
                          <div class="col-5 col-md-5 ">
                            <center>
                              <span class="badge bg-primary">Foto Selfie</span>
                              <div id="fotofasdes"></div>
                              <input onchange="readURL(this);" type="file" id="fileselfiekegiatan" name="fasdes" hidden>
                            </center>
                          </div>
                          <div class="col-2 col-md-2"></div>
                          <div class="col-5 col-md-5 ">
                            <center>
                              <span class="badge bg-primary">Foto Kegiatan</span>
                              <div id="fotokegiatan"></div>
                               <input onchange="readURL2(this);" type="file" id="filefotokegiatan" name="kegiatan" hidden>
                            </center>
                          </div>
                        </div>
                      </div>

                  </div>

                </div>
              

                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function() {
  jeniss()
})
  function gantiselfiekegiatan(){
    $("#fileselfiekegiatan").click();
  }
  function gantifotokegiatan(){
    $("#filefotokegiatan").click();
  }
function jeniss()
{
  var jenis = $("#jenis").val();
  if (jenis == "masuk") {
    $("#jam").html(`<input type="text" class="form-control" value="{{ $harian->jam }}" readonly>`);
    $("#deskripsi").html(`<textarea type="text" class="form-control" name="deskripsi">{{$harian->deskripsi}}</textarea>`);
    $("#fotofasdes").html(`<img id="imageResult" class="img-thumbnail btn" src="{{asset('/foto/'. $harian->fotofasdes)}}" width="100%" alt="" onclick="gantiselfiekegiatan()">`);
    $("#fotokegiatan").html(` <img id="imageResult2" class="img-thumbnail btn" src="{{asset('/foto/'. $harian->fotokegiatanharian)}}" width="100%" alt="" onclick="gantifotokegiatan()">`)
  } else {
    $("#jam").html(`<input type="text" class="form-control" value="{{ $harian->jampulang }}" readonly>`);
    $("#deskripsi").html(`<textarea type="text" class="form-control" name="deskripsi">{{$harian->deskripsipulang}}</textarea>`);
    $("#fotofasdes").html(`<img id="imageResult" class="img-thumbnail btn" src="{{asset('/foto/'. $harian->fotofasdespulang)}}" width="100%" alt="" onclick="gantiselfiekegiatan()">`);
    $("#fotokegiatan").html(` <img id="imageResult2" class="img-thumbnail btn" src="{{asset('/foto/'. $harian->fotokegiatanharianpulang)}}" width="100%" alt="" onclick="gantifotokegiatan()">`)
  }

}
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
  
          reader.onload = function (e) {
              $('#imageResult')
                  .attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
  function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
  
          reader.onload = function (e) {
              $('#imageResult2')
                  .attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
  function readURL3(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
  
          reader.onload = function (e) {
              $('#imageResult3')
                  .attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>

@endsection