@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Fasilitator Desa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('faskab.poktan.index')}}">Kelompok Petani Fasilitator Desa</a></li>
        <li class="breadcrumb-item"><a href="{{route('poktan', $id)}}">Daftar Kelompok Petani</a></li>
        <li class="breadcrumb-item active">Create Fasilitator</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Create Kelompok Petani</h5>
        </center>
        

              <!-- Vertical Form -->
              <form class="row g-3" action="{{route('faskab.poktan.store', $id)}}" method="POST" >
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kelompok Petani</label>
                  <input type="text" class="form-control"  id="validationCustom01" name="namapoktan" >
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">Luas Tanah</label>
                          <input type="number" class="form-control" name="luastanah">
                        </div>
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">Pasar</label>
                         <select name="pasar" id="" class="form-select">
                          <option value="" selected disabled> -- Pilih Pasar -- </option>
                          <option value="lokal">Lokal</option>
                          <option value="internasional">Internasional</option>
                         </select>
                      </div>
                        {{-- <div class="col-6">
                            <label for="inputEmail4" class="form-label">Jumlah Petani</label>
                            <input type="text" class="form-control" name="jumlahpetani">
                        </div> --}}
                        </div>
                </div>
                
                <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <div class="col-12 mt-2">
                          <label for="inputEmail4" class="form-label">Jumlah Produksi</label>
                          <input type="number" class="form-control" name="jumlahproduksi">
                        </div>
                      </div>  
                      <div class="col-6">
                        <div class="col-12 mt-2">
                          <label for="inputEmail4" class="form-label">Jumlah Petani</label>
                          <input type="number" class="form-control" name="jumlahpetani">
                        </div>
                      </div>       
                    </div>        
                </div>
             
                <div class="col-12 mt-2">
                  <label for="inputEmail4" class="form-label">Alamat</label>
                  <textarea type="text" class="form-control" name="lokasipoktan"></textarea>
                </div>      
               
                <div class="col-6">
                  <div style="border:1px solid grey" class="mb-3">
                    <div style="margin-left:1em; margin-right:1em"> 
                      <input type="text" name="jp" hidden value="1" id="jp">
                              
                      <div class="form-group">
                        <label for="paket" class="form-label">Nama Bantuan</label>
                          <input type="text" id="paket" class="form-control" placeholder="Masukkan Nama Bantuan" name="namabantuan0" required>
                          <div class="row mt-2">
                              <div class="col col-6 col-md-6">
                                  <label for="weekday" class="form-label">Waktu Penyaluran</label>
                                  <input type="date" id="weekday" class="form-control" placeholder="Waktu Penyaluran Bantuan" name="waktubantuan0" required>
                              </div>
                              <div class="col col-6 col-md-6">
                                  <label for="weekend" class="form-label">Kuantitas Bantuan</label>
                                  <input type="number" id="weekend" class="form-control" placeholder="Kuantitas Bantuan" name="qtybantuan0" required>
                              </div>
                          </div>
                          
                          <center>
                            <div id="mp1" class="col-md-12">
                              <div ></div>
                            </div>
                          <div id="tp1" class="col-md-12 mt-2">
                          <a  class="btn btn-success" onclick="tambahpaket(1)">Tambah Bantuan</a>
                          </div>
                        </center>
                       
                          <div class="col-md-12 mt-2" id="paket1"></div>
                   
        
                      </div>
                    </div>
                    </div>

                    <div style="border:1px solid grey">
                      <div style="margin-left:1em;margin-right:1em">
                        <div class="mb-3">
                          <input type="text" name="jl" hidden value="1" id="jl">
                        </div>
                        <div class="form-group">
                          <label for="paket" class="form-label">Nama Pelatihan</label>
                            <input type="text" id="pelatihan" class="form-control" placeholder="Masukkan Nama Pelatihan" name="namapelatihan0" required>
                            <div class="row mt-2">
                                <div class="col col-6 col-md-6">
                                    <label for="weekday" class="form-label">Waktu Pelaksanaan</label>
                                    <input type="date" id="waktupelatihan" class="form-control" placeholder="Waktu Pelaksanaan" name="waktupelatihan0" required>
                                </div>
                                <div class="col col-6 col-md-6">
                                    <label for="weekend" class="form-label">Jumlah Peserta</label>
                                    <input type="number" id="jumlahpeserta" class="form-control" placeholder="Jumlah Peserta" name="jumlahpeserta0" required>
                                </div>
                            </div>
                            
                            <center>
                              <div id="ml1" class="col-md-12">
                              </div>
                            <div id="tl1" class="col-md-12 mt-2">
                            <a  class="btn btn-success" onclick="tambahpelatihan(1)">Tambah Pelatihan</a>
                            </div>
                          </center>
                         
                            <div class="col-md-12 mt-2" id="pelatihan1"></div>
                     
          
                        </div>
                      </div>
                    </div>
                 
                </div>
             

                <div style="border:1px solid grey" class="col-6">
                    <div style="margin-left:1em;margin-right:1em">
                  <label class="form-label">List Daftar Petani</label>
                  <input type="text" name="jumlah" value="1" id="jumlah" hidden>
                  <div class="input-group col-md-6 mb-3">
                  <input type="text" class="form-control  @error('skill') is-invalid @enderror" value="{{ old('skill') }}" name="namapetani0" placeholder="Nama Petani" required>
                  <span class="input-group-text" id="T1" type = "button" onclick="plus(1)"><i class="bi bi-plus"></i></span>
                  </div>
                  <div id="M1"></div>
                  <div id="plus1"></div>
                   @error('skill')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                   @enderror
                    </div>
                </div>
             

             
                
                

                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

    </div>

  </div>
<script>
  function plus(id)
  {
    var x = id + 1;
    document.getElementById("T" + id).style.display="none";
    document.getElementById("M" + id).style.display="none";
    $("#jumlah").val(x)
    $("#plus" + id).html(`
    <div class="input-group col-md-6 mb-3">
    <input type="text" class="form-control" name="namapetani`+id+`" placeholder="Nama Petani" required>
    <span class="input-group-text" id="T`+x+`" type = "button" onclick="plus(`+x+`)"><i class="bi bi-plus"></i></span>
    <span class="input-group-text" id="M`+x+`" type = "button" onclick="mins(`+x+`)"><i class="bi bi-x"></i></span>
    </div>
    <div id="plus`+x+`"></div>
    `);
  }
  function mins(id)
  {
    var x = id - 1;
    document.getElementById("T" + x).style.display="block";
    document.getElementById("M" + x).style.display="block";
    $("#jumlah").val(x)
    $("#plus"+ x).html(`  `);
  }

  // script bantuan
  function tambahpaket(id)
      {
      var x = id + 1;
      document.getElementById("tp" + id).style.display="none";
      document.getElementById("mp" + id).style.display="none";
      $("#jp").val(x)
      $("#paket" + id).html(`
      <div class="form-group">
      <label for="paket" class="form-label">Nama Bantuan</label>
      <input type="text" id="paket" class="form-control" placeholder="Masukkan Nama Bantuan" name="namabantuan`+id+`" required>
        <div class="row mt-2">
          <div class="col col-6 col-md-6">
            <label for="weekday" class="form-label">Waktu Penyaluran</label>
            <input type="date" id="weekday" class="form-control" placeholder="Penyaluran Bantuan" name="waktubantuan`+id+`" required>
            </div>
              <div class="col col-6 col-md-6">
              <label for="weekend" class="form-label">Kuantitas Bantuan</label>
              <input type="number" id="weekend" class="form-control" placeholder="Kuantitas Bantuan" name="qtybantuan`+id+`" required>
              </div>
            </div>
              
              <center>
              
              <div id="tp`+x+`" class="col-md-12 mt-2">
              <a  class="btn btn-success" onclick="tambahpaket(`+x+`)">Tambah Bantuan</a>
              </div>
              <div  id="mp`+x+`" class="col-md-12 mt-2">
              <a class="btn btn-warning" onclick="minpaket(`+x+`)">Hapus Bantuan</a>
              </div>
            
              </center>
         
            <div class="col-md-12 mt-2" id="paket`+x+`"></div>
            
   
      `);
    }
    function minpaket(id)
    {
      var x = id - 1;
      document.getElementById("tp" + x).style.display="block";
      document.getElementById("mp" + x).style.display="block";
      $("#jp").val(x)
      $("#paket"+ x).html(`  `);
    }

    // end script bantuan

    // start script pelatihan
      // script bantuan
      function tambahpelatihan(id)
      {
      var x = id + 1;
      document.getElementById("tl" + id).style.display="none";
      document.getElementById("ml" + id).style.display="none";
      $("#jl").val(x)
      $("#pelatihan" + id).html(`
      <div class="form-group">
      <label for="paket" class="form-label">Nama Pelatihan</label>
      <input type="text" id="pelatihan" class="form-control" placeholder="Masukkan Nama Pelatihan" name="namapelatihan`+id+`" required>
        <div class="row mt-2">
          <div class="col col-6 col-md-6">
            <label for="weekday" class="form-label">Waktu Pelatihan</label>
            <input type="date" id="waktupelatihan" class="form-control" placeholder="Waktu Pelaksanaan" name="waktupelatihan`+id+`" required>
            </div>
              <div class="col col-6 col-md-6">
              <label for="weekend" class="form-label">Jumlah Peserta</label>
              <input type="number" id="jumlahpeserta" class="form-control" placeholder="Masukkan Jumlah Peserta" name="jumlahpeserta`+id+`" required>
              </div>
            </div>
              
              <center>
              
              <div id="tl`+x+`" class="col-md-12 mt-2">
              <a  class="btn btn-success" onclick="tambahpelatihan(`+x+`)">Tambah Pelatihan</a>
              </div>
              <div  id="ml`+x+`" class="col-md-12 mt-2">
              <a class="btn btn-warning" onclick="minpelatihan(`+x+`)">Hapus Pelatihan</a>
              </div>
            
              </center>
         
            <div class="col-md-12 mt-2" id="pelatihan`+x+`"></div>
            
   
      `);
    }
    function minpelatihan(id)
    {
      var x = id - 1;
      document.getElementById("tl" + x).style.display="block";
      document.getElementById("ml" + x).style.display="block";
      $("#jl").val(x)
      $("#pelatihan"+ x).html(`  `);
    }
    // end script pelatihan
</script>
@endsection