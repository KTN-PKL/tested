@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Edit Data Absen Kegiatan</h1>
    <nav>
      {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('faskab.poktan.index')}}">Kelompok Petani Fasilitator Desa</a></li>
        <li class="breadcrumb-item"><a href="{{route('poktan', $id)}}">Daftar Kelompok Petani</a></li>
        <li class="breadcrumb-item active">Edit Data Absen Kegiatan</li>
      </ol> --}}
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Edit Data Absen Kegiatan</h5>
        </center>
        

              <!-- Vertical Form -->
              <form enctype="multipart/form-data" class="row g-3" action="{{route('kegiatan.updateAbsen', $kegiatan->id_absenkegiatan)}}" method="POST">
                @csrf
                <div class="col-12">
                  <div class="row">
                    <div class="col-8">
                      <label for="inputNanme4" class="form-label">Tanggal Absen</label>
                      <input type="date" class="form-control" name="tanggalabsen" value="{{$kegiatan->tanggalabsen}}" readonly>
                    </div>
                    <div class="col-4">
                      <label for="inputNanme4" class="form-label">Waktu Absen</label>
                      <input type="time" class="form-control" name="waktuabsen" value="{{$kegiatan->waktuabsen}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Jenis Kegiatan</label>
                  <select class="form-select" name="jeniskegiatan" id="">
                    <option value=" " disabled>-- Pilih Jenis Kegiatan --</option>
                    <option value="kantor" @if ($kegiatan->jeniskegiatan == "kantor")
                      selected
                    @endif>Kantor</option>
                    <option value="lapangan" @if ($kegiatan->jeniskegiatan == "lapangan")
                      selected
                    @endif>Internasional</option>
                    <option value="dinas luar kota" @if ($kegiatan->jeniskegiatan == "dinas luar kota")
                      selected
                    @endif>Dinas Luar Kota</option>
                    <option value="dinas luar daerah" @if ($kegiatan->jeniskegiatan == "dinas luar daerah")
                      selected
                    @endif>Dinas Luar Daerah</option>
                    <option value="dinas luar negeri" @if ($kegiatan->jeniskegiatan == "dinas luar negeri")
                      selected
                    @endif>Dinas Luar Negeri</option>
                    <option value="overtime" @if ($kegiatan->jeniskegiatan == "overtime")
                      selected
                    @endif>Overtime</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Deskripsi Kegiatan</label>
                  <textarea type="time" class="form-control" name="deskripsikegiatan">{{$kegiatan->deskripsikegiatan}}</textarea>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-6">
                      <div class="col-12 col-md-12">
                        <label for="inputNanme4" class="form-label">Jenis Pelatihan</label>
                        <select class="form-select" name="pelatihan" id="">
                          <option value=" " disabled>-- Pilih Jenis Pelatihan --</option>
                          <option value="pelatihan" @if ($kegiatan->pelatihan == "pelatihan")
                            selected
                          @endif>Pelatihan</option>
                          <option value="nonpelatihan" @if ($kegiatan->pelatihan == "nonpelatihan")
                            selected
                          @endif>Non Pelatihan</option>
                        </select>
                      </div>
                      <div class="col-12 mt-3">
                        <label for="inputNanme4" class="form-label">Judul Pelatihan</label>
                        <input type="text" class="form-control" name="judulpelatihan" value="{{$kegiatan->judulpelatihan}}">
                      </div>
                      <div class="col-12 mt-3">
                        <label for="inputNanme4" class="form-label">Durasi Pelatihan</label>
                        <input type="number" class="form-control" name="durasipelatihan" value="{{$kegiatan->durasipelatihan}}">
                      </div>
                      <div class="col-12 mt-3">
                        <label for="inputNanme4" class="form-label">Tempat Pelatihan</label>
                        <input type="text" class="form-control" name="tempatpelatihan" value="{{$kegiatan->tempatpelatihan}}">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="col-12">
                        <label for="inputNanme4" class="form-label">Foto</label><small class="text-muted" style="font-size:8px">Klik gambar jika ingin mengubah</small>
                        <div class="row">
                          <div class="col-4 col-md-4 ">
                            <span class="badge bg-primary">Foto Selfie</span>
                            <img id="imageResult" class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/'. $kegiatan->selfiekegiatan)}}" width="100%" alt="" onclick="gantiselfiekegiatan()">
                            <input onchange="readURL(this);" type="file" id="fileselfiekegiatan" name="selfiekegiatan" hidden>
                         
                          </div>
                          <div class="col-4 col-md-4 ">
                            <span class="badge bg-primary">Foto Kegiatan</span>
                            <img id="imageResult2" class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/'. $kegiatan->fotokegiatan)}}" width="100%" alt="" onclick="gantifotokegiatan()">
                            <input onchange="readURL2(this);" type="file" id="filefotokegiatan" name="fotokegiatan" hidden>
                           
                          </div>
                          <div class="col-4 col-md-4 ">
                            @if($kegiatan->pelatihan == "pelatihan")
                            <span class="badge bg-primary">Foto Pelatihan</span>
                            <img id="imageResult3" class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/'. $kegiatan->fotopelatihan)}}" width="100%" alt="" onclick="gantifotopelatihan()">
                            <input onchange="readURL3(this);" type="file" id="filefotopelatihan" name="fotopelatihan" hidden>
                            
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
              


              

                
               

               
              
                {{-- <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">Luas Tanah</label>
                          <input type="number" class="form-control" name="luastanah" value="{{$poktan->luastanah}}">
                        </div>
                        <div class="col-6">
                            <label for="inputEmail4" class="form-label">Jumlah Petani</label>
                            <input type="text" class="form-control" name="jumlahpetani" value="{{$poktan->jumlahpetani}}">
                        </div>
                        </div>
                </div> --}}
                
                {{-- <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <label for="inputEmail4" class="form-label">Jumlah Produksi</label>
                            <input type="number" class="form-control" name="jumlahproduksi" value="{{$poktan->jumlahproduksi}}">
                        </div>
                        <div class="col-6">
                            <label for="inputEmail4" class="form-label">Pasar</label>
                           <select name="pasar" id="" class="form-select">
                            <option value="" disabled> -- Pilih Pasar -- </option>
                            <option value="lokal" @if ($poktan->pasar == "lokal")
                              selected
                            @endif>Lokal</option>
                            <option value="internasional" @if ($poktan->pasar == "internasional")
                              selected
                            @endif>Internasional</option>
                           </select>
                        </div>
                    </div>
                    
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Pemeliharaan</label>
                    <input type="text" class="form-control" name="pemeliharaan" value="{{$poktan->pemeliharaan}}">
                </div>
              
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" name="lokasipoktan" value="{{$poktan->lokasipoktan}}">
                </div> --}}
                
                

                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

    </div>

  </div>
<script>
  function gantiselfiekegiatan(){
    $("#fileselfiekegiatan").click();
  }
  function gantifotokegiatan(){
    $("#filefotokegiatan").click();
  }
  function gantifotopelatihan(){
    $("#filefotopelatihan").click();
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