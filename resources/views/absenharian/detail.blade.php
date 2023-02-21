@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Detail Absen Fasilitator Desa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('kegiatan.index')}}">Daftar Fasilitator Desa</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{route('kegiatan.kegiatan', $absen->id_user)}}">Daftar Absen Fasilitator Desa</a></li> --}}
        <li class="breadcrumb-item active">Detail Data Absen Kegiatan</li>
      </ol>
    </nav>
</div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Detail Absen</h5>
            <div class="col col-md-3">
              <select class="form-select" id="absen" onchange="absens()" name="absen">
                <option value="masuk" selected>Masuk</option>
                <option value="pulang">Pulang</option>
                </select>
            </div>
        </center>
        <div class="col-12">
          <div class="row">
            <div class="col-6">
              <table>
                <tr>
                    <td valign="top" style="width:40%"><h6>Nama Fasilitator Desa</h6></td>
                    <td valign="top"><h6>:</h6></td>
                    <td valign="top"><h6 style="color: black"></h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Tanggal Absen</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black">{{ $harian->tgl }}</h6></td>
              </tr>
                <tr>
                    <td valign="top"><h6>Jam Absen</h6></td>
                    <td valign="top"><h6>:</h6></td>
                    <td valign="top"><h6 style="color: black" id="jam"></h6></td>
                </tr>
                <tr>
                    <td valign="top"><h6>Jenis Absen</h6></td>
                    <td valign="top"><h6>:</h6></td>
                    <td valign="top"><h6 style="color: black">{{ $harian->jenis }}</h6></td>
                </tr>
                <tr>
                  <td valign="top"><h6>Status Absen</h6></td>
                  <td valign="top"><h6>:</h6></td>
                  <td valign="top"><h6 style="color: black">
                    @php
                    $dat = explode(":" , $harian->jam);
                     $H = $dat[0] * 60;
                     $hasil = $H + $dat[1];
                    @endphp
                    @if ($hasil > 420)
                    Terlambat
                    @else
                    Tepat Waktu
                    @endif
                  </h6></td>
                </tr>
            </table>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-4 col-md-4 ">
                  <span class="badge bg-primary">Foto Selfie</span>
                  <div id="fasdes"></div>
             
                </div>
                <div class="col-4 col-md-4 ">
                  <span class="badge bg-primary">Foto Kegiatan</span>
                 <div id="kegiatan"></div>
                 
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
              <h6 id="deskripsi"></h6>
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
        <input type="text" id="lokasi1" value="{{ $harian->lokasiharian }}" hidden>
        <input type="text" id="lokasi2" value="{{ $harian->lokasipulang }}" hidden>
       
    </div>
  </div>  

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
  $(document).ready(function() {
    absens()
} );
function initialize() {
  var absen = $("#absen").val();
    if (absen == "masuk") {
  var lokkasi = $("#lokasi1").val();
}else{
  var lokkasi = $("#lokasi2").val();
}
  var myarr = lokkasi.split(",");
  var lat = parseFloat(myarr[0]);
  var long = parseFloat(myarr[1]);
  var propertiPeta = {
    center: {
      lat: lat,
      lng: long
    },
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position: {
      lat: lat,
      lng: long
    },
      map: peta,
      animation: google.maps.Animation.BOUNCE
  });

}

// // event jendela di-load  
// google.maps.event.addDomListener(window, 'load', initialize);
  function absens()
  {
    var absen = $("#absen").val();
    if (absen == "masuk") {
      $("#jam").html("{{ $harian->jam }}");
      $("#fasdes").html(`<img id="imageResult" class="img-thumbnail btn" src="{{asset('/foto/'. $harian->fotofasdes)}}" width="100%" height="100" alt="">`);
      $("#kegiatan").html(` <img id="imageResult2" class="img-thumbnail btn" src="{{asset('/foto/'. $harian->fotokegiatanharian)}}" width="100%" height="100" alt="">`);
      $("#deskripsi").html("{{ $harian->deskripsi }}");
      initialize()
    } else {
      $("#jam").html("{{ $harian->jampulang }}");
      $("#fasdes").html(`<img id="imageResult" class="img-thumbnail btn" src="{{asset('/foto/'. $harian->fotofasdespulang)}}" width="100%" height="100" alt="">`);
      $("#kegiatan").html(` <img id="imageResult2" class="img-thumbnail btn" src="{{asset('/foto/'. $harian->fotokegiatanharianpulang)}}" width="100%" height="100" alt="">`);
      $("#deskripsi").html("{{ $harian->deskripsipulang }}");
      initialize()
    }
    
  }
</script>
@endsection