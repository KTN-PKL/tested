@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Kelompok Petani {{$fasdes->name}} </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('poktan')}}">Kelompok Petani Fasilitator Desa</a></li>
        <li class="breadcrumb-item active">Daftar Kelompok Petani</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  @if (session()->has('success'))
  <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
    {{session()->get('success')}}
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif  
  @if (session()->has('deleted'))
  <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
    {{session()->get('deleted')}}
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif  
  <div class="card">
    <div class="card-body">
      <div class="col mt-4">
      </div>
      <br>
      <div>
        <table>
          <tr>
            <td style="width:50%"><h6>Nama Fasilitator Desa</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{$fasdes->name}}</h6></td>
          </tr>
          <tr>
            <td style="width:50%"><h6>Alamat</h6></td>
            <td><h6>:</h6></td>
            <td><h6>
              @if($fasdes->alamat <> null)
              {{$fasdes->alamat}}
              @else
              Alamat Belum ditentukan.
              @endif
            </h6></td>
          </tr>
        </table>
       
        <table class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Jenis Kegiatan</th>
              <th>Selfie Kegiatan</th>
              <th>Foto Kegiatan</th>
              <th>Foto Pelatihan</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach($kegiatan as $data)
            @php
            $i=$i+1;
            @endphp
            <tr>
              <td style="width:8%">{{$i}}</td>
              <td style="width:15%">{{$data->tanggalabsen}}</td>
              <td style="width:10%">{{$data->waktuabsen}} WIB</td>
              <td style="width:15%">{{$data->jeniskegiatan}}</td>
              <td><img class="img-thumbnail" src="{{asset('/foto/absenkegiatan/'. $data->selfiekegiatan)}}" width="30%" alt=""></td>
              <td><img class="img-thumbnail" src="{{ asset('foto/absenkegiatan/'. $data->fotokegiatan) }}" width="30%" alt=""></td>
              <td>
                @if($data->fotopelatihan <> null)
                <img class="img-thumbnail" src="{{ asset('foto/absenkegiatan/'. $data->fotopelatihan) }}" width="30%" alt="">
                @else
                <h6>Tidak ada Foto Pelatihan</h6>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
   
 
@endsection