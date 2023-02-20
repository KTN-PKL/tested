@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Fasilitator Desa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('faskab.fasdes.index')}}">Fasilitator Desa</a></li>
        <li class="breadcrumb-item active">Edit Fasilitator</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Edit Fasilitator Desa</h5>
        </center>
        

              <!-- Vertical Form -->
              <form enctype="multipart/form-data" class="row g-3" action="{{route('faskab.fasdes.update', $fasdes->id)}}" method="POST">
                @csrf
                <center>
                  <div class="img-circle">
                    <div style="position: relative; width:100%; cursor: pointer;">
                      <img id="imageResult" onclick="ubahProfil()" class="img-circle" style="width: 140px; height: 140px;" src="{{asset('/foto/profilfasdes/'. $fasdes->profil)}}" >
                      <span onclick="ubahProfil()" style="position:absolute;top:50%;left:50%; transform: translate(-50%, -50%)"><i class="bi bi-pencil" style="color:yellow;font-size:24px;"></i></span>
                      <input onchange="readURL(this);" type="file" hidden name="profil" id="profil">
                    </div>
                  </div>
                </center>
              
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Fasilitator Desa</label>
                  <input type="text" class="form-control" name="name" value="{{$fasdes->name}}" required>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{$fasdes->email}}" required>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label> <i style="font-size:12px" class="text-muted">Masukkan Password Baru</i>
                  <input type="password" class="form-control" name="password">
                 
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="{{$fasdes->alamat}}">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Nomor Telepon</label>
                  <input type="text" class="form-control" name="notelp" value="{{$fasdes->no_telp}}">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Jenis Kelamin</label>
                  <select class="form-select" name="jeniskelamin">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="pria" @if ($fasdes->jeniskelamin == "pria")
                      selected
                    @endif>Pria</option>
                    <option value="wanita" @if ($fasdes->jeniskelamin == "wanita")
                      selected
                    @endif>Wanita</option>
                    
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

    </div>

  </div>

  <script>
    function ubahProfil(){
        $("#profil").click()
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
  </script>


@endsection