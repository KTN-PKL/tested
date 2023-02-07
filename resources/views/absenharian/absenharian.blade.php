@extends('layouts.template')
@section('content')
<div class="pagetitle">
    {{-- <h1>Daftar Kelompok Petani {{$fasdes->name}} </h1> --}}
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
        <table class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Jam Masuk</th>
              <th>Foto Fasdes Masuk</th>
              <th>Foto Kegiatan Masuk</th>
              <th>Jam Pulang</th>
              <th>Foto Fasdes Pulang</th>
              <th>Foto Kegiatan Pulang</th>
              <th>status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach($harian as $data)
            @php
            $i=$i+1;
            $dat = explode(":" , $data->jam);
                   $H = $dat[0] * 60;
                   $hasil = $H + $dat[1];
            @endphp
            <tr>
              <td style="width:7%">{{$i}}</td>
              <td>{{$data->tgl}}</td>
              <td>{{ $data->jam }}</td>
              <td><img src="{{asset('/foto/'. $data->fotofasdes)}}"  alt="Gambar" width="100px" height="100px"></td>
              <td><img src="{{asset('/foto/'. $data->fotokegiatanharian)}}"  alt="Gambar" width="100px" height="100px"></td>
              @foreach ($pulang as $item)
              @if ($data->tgl == $item->tgl)
              <td>{{ $item->jam }}</td>
              <td><img src="{{asset('/foto/'. $item->fotofasdes)}}"  alt="Gambar" width="100px" height="100px"></td>
              <td><img src="{{asset('/foto/'. $item->fotokegiatanharian)}}"  alt="Gambar" width="100px" height="100px"></td>
              @endif
              @endforeach
              <td>@if ($hasil > 420)
                  Terlambat
                  @else
                  Tepat Waktu
              @endif</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
   
 
@endsection