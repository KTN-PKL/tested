@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Lokasi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('faskab.lokasi.index')}}">Daftar Lokasi</a></li>
        <li class="breadcrumb-item active">Edit Lokasi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Edit Lokasi</h5>
        </center>

              <!-- Vertical Form -->
              <input type="text" value="{{ $lokasi->id_lokasi }}" id="id" hidden>
              <form class="row g-3" action="{{route('faskab.lokasi.update', $lokasi->id_lokasi)}}" method="POST">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Fasilitator Desa</label>
                  <input type="text" class="form-control" value="{{$lokasi->name}}" readonly>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Kecamatan</label>
                  <select class="form-select" id="id_kecamatan" onchange="desa()">
                    <option value="0" @if ($lokasi->id_kecamatan == null)
                      selected
                    @endif disabled>-- Pilih Kecamatan --</option>
                    @foreach ($kecamatan as $item)
                    <option value="{{ $item->id_kecamatan }}" @if ($lokasi->id_kecamatan == $item->id_kecamatan)
                      selected
                    @endif>{{ $item->kecamatan }}</option>
                    @endforeach
                  </select>
                </div>
                <div id="desa"></div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Lokasi</label>
                  <div class="form-group">
                    <center>
                    <input style="width:50%" class="form-control" type="text" id="lat" name="lokasi" value="{{$lokasi->lokasi}}" readonly>
                    </center>
                </div>
                  <div id="googleMap" style="width:100%;height:380px;"></div>
               
                </div>
               
              </div>
                {{-- <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label> <i style="font-size:12px" class="text-muted">Masukkan Password Baru</i>
                  <input type="password" class="form-control" name="password">
                 
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="{{$lokasi->alamat}}">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Nomor Telepon</label>
                  <input type="text" class="form-control" name="notelp" value="{{$lokasi->no_telp}}">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Alamat</label>
                  <select class="form-select" name="jeniskelamin">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Pria" @if ($lokasi->jeniskelamin == "Pria")
                      selected
                    @endif>Pria</option>
                    <option value="Wanita" @if ($lokasi->jeniskelamin == "Wanita")
                      selected
                    @endif>Wanita</option>
                    
                  </select>
                </div> --}}
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

    </div>

  </div>


@endsection
<script>
  function desa() {
    var id_kecamatan = $("#id_kecamatan").val();
    var id = $("#id").val();
            $.get("{{ url('lokasi/desa') }}/" + id +"/"+id_kecamatan, {}, function(data, status) {
                $("#desa").html(data);
            });
        }
</script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }
  
     // isi nilai koordinat ke form
    var lang = posisiTitik.lat()+","+ posisiTitik.lng()
    document.getElementById("lat").value = lang;
    
}
  
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-6.5590559087145754,107.77278900146484),
    zoom:13,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>