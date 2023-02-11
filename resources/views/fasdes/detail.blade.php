@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Detail Fasilitator Desa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('faskab.fasdes.index')}}">Fasilitator Desa</a></li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Detail Fasilitator Desa</h5>
        </center>
        <div class="identitas">
        <h5><u>Identitas Fasilitator Desa</u></h5>
          <table>
            <tr>
                <td valign="top" style="width:30%"><h6>Nama Fasilitator Desa</h6></td>
                <td valign="top"><h6>:</h6></td>
                <td valign="top"><h6 style="color: black">{{$fasdes->name}}</h6></td>
            </tr>
            <tr>
              <td valign="top" style="width:30%"><h6>Jenis Kelamin</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top">
                <h6 style="color: black">
                @if($fasdes->jeniskelamin == null)
                Belum ditentukan
                @elseif($fasdes->jeniskelamin == "pria")
                <i class="bi bi-gender-male"></i> Pria
                @elseif($fasdes->jeniskelamin == "wanita")
                <i class="bi bi-gender-female"></i> Wanita
                @endif
                </h6></td>
          </tr>
            <tr>
              <td valign="top"><h6>Email</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top"><h6 style="color: black">{{$fasdes->email}}</h6></td>
          </tr>
            <tr>
                <td valign="top"><h6>Alamat</h6></td>
                <td valign="top"><h6>:</h6></td>
                <td valign="top"><h6 style="color: black">
                  @if($fasdes->alamat == null)
                  Belum ditentukan
                  @else
                  {{$fasdes->alamat}}
                  @endif
                  </h6></td>
            </tr>
            <tr>
                <td valign="top"><h6>Nomor Telepon</h6></td>
                <td valign="top"><h6>:</h6></td>
                <td valign="top"><h6 style="color: black">
                  @if($fasdes->no_telp == null)
                  Belum ditentukan
                  @else
                  {{$fasdes->no_telp}}
                  @endif
                </h6></td>
            </tr>
            <tr>
              <td valign="top"><h6>Total Petani</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top"><h6 style="color: black">{{$petani}} Orang</h6></td>
          </tr>
        </table>
        </div>

        <div class="poktan mt-4" >
          <h5><u>Data Kelompok Petani</u></h5>
              <table class="table table-sm table-primary">
                <tr>
                  <th>No</th>
                  <th>Nama Poktan</th>
                  <th>Luas Tanah</th>
                  <th>Pasar</th>
                </tr>
                @php
                $i=0;
                @endphp
                @foreach($poktan as $data)
                @php
                    $i=$i+1;
                @endphp
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$data->namapoktan}}</td>
                  <td>{{$data->luastanah}} Ha</td>
                  <td>{{$data->pasar}}</td>
                </tr>
                @endforeach
              </table>
        </div>
       



@endsection