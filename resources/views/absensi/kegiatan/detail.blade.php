@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Detail Absen Fasilitator Desa {{$absen->name}}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('kegiatan.index')}}">Daftar Fasilitator Desa</a></li>
        <li class="breadcrumb-item"><a href="{{route('kegiatan.kegiatan', $absen->id_user)}}">Daftar Absen Fasilitator Desa</a></li>
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
                    <td valign="top"><h6 style="color: black">{{$absen->jeniskegiatan}}</h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Pelatihan</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black">{{$absen->pelatihan}}</h6></td>
                </tr>
                @if($absen->pelatihan == "pelatihan")
                <tr>
                  <td valign="top"><h6>Judul Pelatihan</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black">{{$absen->judulpelatihan}}</h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Durasi Pelatihan</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black">{{$absen->durasipelatihan}} Menit</h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Tempat Pelatihan</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black">{{$absen->tempatpelatihan}}</h6></td>
                </tr>
                @endif
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
        <div class="col-12">
          <table style="width:100%">
            <tr>
              <td style="width:30%" valign="top"><h6>Deskripsi Kegiatan</h6></td>
           </tr>
          </table>
          <div style="border:1px solid grey;height:200px;">
            <div style="margin-left:1em;margin-top:1em;margin-right:1em;margin-bottom:1em;">
              <h6>{{$absen->deskripsikegiatan}}</h6>
            </div>
           
          </div>
          <br>
          <table style="width:100%">
            <tr>
              <td style="width:30%" valign="top"><h6>Lokasi Kegiatan</h6></td>
           </tr>
          </table>
          <div id="googleMap" style="width:100%;height:380px;"></div>
        </div>
    
       
    </div>
  </div>  


<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-8.5830695,116.3202515),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng(-8.5830695,116.3202515),
      map: peta,
      animation: google.maps.Animation.BOUNCE
  });

}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection