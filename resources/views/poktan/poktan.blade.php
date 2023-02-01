@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Kelompok Petani </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
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
        <a href="{{route('poktan.create', $id)}}" class="btn btn-primary">Create Kelompok Petani</a>
      </div>
      <br>
      <div>
        <table class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kelompok Petani</th>
              <th>Jumlah Petani</th>
              <th>Pasar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach($poktan as $data)
            @php
            $i=$i+1;
            @endphp
            <tr>
              <td style="width:8%">{{$i}}</td>
              <td>{{$data->namapoktan}}</td>
              <td>{{$data->jumlahpetani}}</td>
              <td>{{$data->pasar}}</td>
              <td style="width:30%">
                <a href="" class="btn btn-sm btn-primary"> <i class="bi bi-eye"></i> Lihat</a>
                <a href="{{route('poktan.edit', $data->id_poktan)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                <a href="{{route('faskab.poktan.destroy', $data->id_poktan)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
   
 
@endsection