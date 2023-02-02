@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Lokasi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Lokasi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <br>
      <div>
        <table class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Fasilitator Desa</th>
              <th>Lokasi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($lokasi as $data)
            @php
            $i=$i+1;
            @endphp
            <tr>
              <td>{{$i}}</td>
              <td>{{ $data->name }}</td>
              <td>@if ($data->lokasi == null)
              Edit Untuk Menambahkan Lokasi
              @else
              {{$data->lokasi}}
              @endif
                </td>
              <td style="width:25%">
                <a href="{{ route('lokasi.edit', $data->id_lokasi) }}" class="btn btn-sm btn-warning" onclick="edit({{ $data->id_lokasi }})"><i class="bi bi-pencil-square"></i> Edit</a>
                <a href="{{ route('faskab.lokasi.destroy', $data->id_lokasi) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
   <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="page" class="p-2"></div>
            </div>
        </div>
    </div>
    </div>
 
@endsection