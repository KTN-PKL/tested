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
                  <input type="text" class="form-control"  id="validationCustom01" name="namapoktan" required>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">Luas Tanah</label>
                          <input type="number" class="form-control" name="luastanah" required>
                        </div>
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">Pasar</label>
                         <select name="pasar" id="" class="form-select" required>
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
                          <input type="number" class="form-control" name="jumlahproduksi" required>
                        </div>
                        <div class="col-12 mt-2">
                          <label for="inputEmail4" class="form-label">Pemeliharaan</label>
                          <input type="text" class="form-control" name="pemeliharaan" required>
                        </div>
                        <div class="col-12 mt-2">
                          <label for="inputEmail4" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="lokasipoktan" required>
                        </div>
                       
                      </div>
                        <div class="col-6">
                          <div class="col-12 mt-2">
                            <label for="inputEmail4" class="form-label">Nama Bantuan</label>
                            <input type="text" class="form-control" name="namabantuan" required>
                          </div>
                          <div class="col-12 mt-2">
                            <label for="inputEmail4" class="form-label">Kuantitas</label>
                            <input type="number" class="form-control" name="qtybantuan" required>
                          </div>
                          <div class="col-12 mt-2">
                            <label for="inputEmail4" class="form-label">Waktu Penyaluran</label>
                            <input type="date" class="form-control" name="waktubantuan" required>
                          </div>
                         
                        </div>

                     
                     
                     
                    </div>
                    
                </div>
               

             

                <div class="col-6">
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
    <input type="text" class="form-control" name="namapetani`+id+`" placeholder="Nama Petani">
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
</script>
@endsection