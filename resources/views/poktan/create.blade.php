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
              <form class="row g-3" action="{{route('faskab.poktan.store', $id)}}" method="POST">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kelompok Petani</label>
                  <input type="text" class="form-control" name="namapoktan">
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">Luas Tanah</label>
                          <input type="number" class="form-control" name="luastanah">
                        </div>
                        <div class="col-6">
                            <label for="inputEmail4" class="form-label">Jumlah Petani</label>
                            <input type="text" class="form-control" name="jumlahpetani">
                        </div>
                        </div>
                </div>
                
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <label for="inputEmail4" class="form-label">Jumlah Produksi</label>
                            <input type="number" class="form-control" name="jumlahproduksi">
                        </div>
                        <div class="col-6">
                            <label for="inputEmail4" class="form-label">Pasar</label>
                           <select name="pasar" id="" class="form-select">
                            <option value="" selected disabled> -- Pilih Pasar -- </option>
                            <option value="lokal">Lokal</option>
                            <option value="internasional">Internasional</option>
                           </select>
                        </div>
                    </div>
                    
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Pemeliharaan</label>
                    <input type="text" class="form-control" name="pemeliharaan">
                </div>
              
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" name="lokasipoktan">
                </div>
                
                

                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

    </div>

  </div>


@endsection