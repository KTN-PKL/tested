@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Detail Kelompok Petani</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('kegiatan.index')}}">Kelompok Petani Fasilitator Desa</a></li>
        <li class="breadcrumb-item"><a href="{{route('kegiatan.kegiatan', $absen->id_user)}}">Daftar Kelompok Petani</a></li>
        <li class="breadcrumb-item active">Detail Data Absen Kegiatan</li>
      </ol>
    </nav>
</div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Detail Absen</h5>
        </center>
        <div class="col-12">
          <div class="row">
            <div class="col-6">
              <table>
                <tr>
                    <td valign="top" style="width:40%"><h6>Nama Fasilitator Desa</h6></td>
                    <td valign="top"><h6>:</h6></td>
                    <td valign="top"><h6 style="color: black">{{$absen->name}}</h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Tanggal Absen</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black">{{$absen->tanggalabsen}}</h6></td>
              </tr>
                <tr>
                    <td valign="top"><h6>Jam Absen</h6></td>
                    <td valign="top"><h6>:</h6></td>
                    <td valign="top"><h6 style="color: black">{{$absen->waktuabsen}} WIB</h6></td>
                </tr>
                <tr>
                    <td valign="top"><h6>Jenis Kegiatan</h6></td>
                    <td valign="top"><h6>:</h6></td>
                    <td valign="top"><h6 style="color: black">Kilogram</h6></td>
                </tr>
                <tr>
                    <td valign="top"><h6>Deskripsi Kegiatan</h6></td>
                    <td valign="top"><h6>:</h6></td>
                    <td valign="top"><h6 style="color: black"></h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Pelatihan</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black"></h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Judul Pelatihan</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black"></h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Durasi Pelatihan</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black"></h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Tempat Pelatihan</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black"></h6></td>
                </tr>
            
            </table>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-4 col-md-4 ">
                  <span class="badge bg-primary">Foto Selfie</span>
                  <img id="imageResult" class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/'. $absen->selfiekegiatan)}}" width="100%" alt="">
             
                </div>
                <div class="col-4 col-md-4 ">
                  <span class="badge bg-primary">Foto Kegiatan</span>
                  <img id="imageResult2" class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/'. $absen->fotokegiatan)}}" width="100%" alt="">
                 
                </div>
                <div class="col-4 col-md-4 ">
                  @if($absen->pelatihan == "pelatihan")
                  <span class="badge bg-primary">Foto Pelatihan</span>
                  <img id="imageResult3" class="img-thumbnail btn" src="{{asset('/foto/absenkegiatan/'. $absen->fotopelatihan)}}" width="100%" alt="">
                  
                  @endif

              </div>
            </div>
          </div>
        </div>
        
       
    </div>
  </div>  

@endsection