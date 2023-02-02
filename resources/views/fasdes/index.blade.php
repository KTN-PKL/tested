@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Fasilitator Desa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Fasilitator Desa</li>
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
        <a href="{{route('fasdes.create')}}" class="btn btn-primary">Create Fasilitator Desa</a>
      </div>
      <br>
      <div>
        <table class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Email</th>
              <th>Nama Fasilitator Desa</th>
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
              <td>{{$i}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->name}}</td>
              <td style="width:25%">
                <a href="{{route('fasdes.detail', $data->id)}}" class="btn btn-sm btn-primary"> <i class="bi bi-eye"></i> Lihat</a>
                <a href="{{route('fasdes.edit', $data->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                <a href="{{route('faskab.fasdes.destroy', $data->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
   
 
@endsection