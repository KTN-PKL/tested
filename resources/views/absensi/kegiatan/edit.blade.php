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
              <form class="row g-3" action="{{route('kegiatan.updateAbsen', $kegiatan->id_absenkegiatan)}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-8">
                    <label for="inputNanme4" class="form-label">Tanggal Absen</label>
                    <input type="date" class="form-control" name="tanggalabsen" value="{{$kegiatan->tanggalabsen}}" readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="inputNanme4" class="form-label">Waktu Absen</label>
                    <input type="time" class="form-control" name="waktuabsen" value="{{$kegiatan->waktuabsen}}" readonly>
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
                <div class="col-md-12">
                  <label for="inputNanme4" class="form-label">Deskripsi Kegiatan</label>
                  <textarea type="time" class="form-control" name="deskripsikegiatan">{{$kegiatan->deskripsikegiatan}}</textarea>
                </div>

                <div class="col-md-12">
                  <div class="row">
                    <label for="inputNanme4" class="form-label">Klik Gambar Jika Ingin Merubah</label>
                    <div class="col-4 col-md-4 ">
                      <label for="inputNanme4" class="form-label">Foto Selfie Kegiatan</label>
                      <img class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/'. $kegiatan->selfiekegiatan)}}" width="100%" alt="" onclick="gantiselfie()">
                     {{-- <a href="" class="btn btn-warning btn-sm" style="position: absolute;margin-top:2em">Ganti</a> --}}
                      <input type="file" id="fileselfie" name="fotoselfie" hidden>
                    </div>
                    <div class="col-4 col-md-4 ">
                      <label for="inputNanme4" class="form-label">Foto Kegiatan</label>
                      <img class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/'. $kegiatan->fotokegiatan)}}" width="100%" alt="" onclick="gantifotokegiatan()">
                     {{-- <a href="" class="btn btn-warning btn-sm" style="position: absolute;margin-top:2em">Ganti</a> --}}
                      <input type="file" id="filefotokegiatan" name="fotokegiatan" hidden>
                    </div>
                    <div class="col-4 col-md-4 ">
                      @if($kegiatan->pelatihan == "pelatihan")
                      <label for="inputNanme4" class="form-label">Foto Pelatihan</label>
                      <img class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/'. $kegiatan->fotopelatihan)}}" width="100%" alt="" onclick="gantifotopelatihan()">
                     {{-- <a href="" class="btn btn-warning btn-sm" style="position: absolute;margin-top:2em">Ganti</a> --}}
                      <input type="file" id="filefotopelatihan" name="fotopelatihan" hidden>
                      @else
                      <img class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/nonpelatihan.png')}}" width="100%" alt="">
                      @endif
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
  function gantiselfie(){
    $("#fileselfie").click();
  }
</script>

@endsection