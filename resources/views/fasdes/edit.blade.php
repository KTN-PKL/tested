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
              <form class="row g-3" action="{{route('faskab.fasdes.update', $fasdes->id)}}" method="POST">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Fasilitator Desa</label>
                  <input type="text" class="form-control" name="name" value="{{$fasdes->name}}">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{$fasdes->email}}">
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
                  <label for="inputPassword4" class="form-label">Alamat</label>
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


@endsection