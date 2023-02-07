@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Kelompok Petani Fasilitator Desa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Kelompok Petani Fasilitator Desa</li>
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
      <br>
      <div>
        <table class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Fasilitator Desa</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($fasdes as $data)
            @php
            $i=$i+1;
            @endphp
            <tr>
              <td style="width:8%">{{$i}}</td>
              <td>{{$data->name}}</td>
              <td style="width:30%">
                <a href="{{route('kegiatan.kegiatan', $data->id)}}" class="btn btn-sm btn-primary"> <i class="bi bi-eye"></i> Lihat Data Absen Kegiatan</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
   
 
@endsection