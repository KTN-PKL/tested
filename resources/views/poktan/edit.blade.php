@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Fasilitator Desa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('faskab.fasdes.index')}}">Fasilitator Desa</a></li>
        <li class="breadcrumb-item active">Create Fasilitator</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Create Fasilitator Desa</h5>
        </center>
        

              <!-- Vertical Form -->
              <form class="row g-3" action="{{route('faskab.poktan.update', $poktan->id_poktan)}}" method="POST">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Fasilitator Desa</label>
                  <input type="text" class="form-control" name="name" value="{{$poktan->namapoktan}}">
                </div>
                {{-- <div class="col-12">
                  <label for="inputPassword4" class="form-label">Alamat</label>
                  <select class="form-select" name="jeniskelamin">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Pria" @if ($fasdes->jeniskelamin == "Pria")
                      selected
                    @endif>Pria</option>
                    <option value="Wanita" @if ($fasdes->jeniskelamin == "Wanita")
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