@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Detail Kelompok Petani</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('faskab.poktan.index')}}">Kelompok Petani Fasilitator Desa</a></li>
        <li class="breadcrumb-item"><a href="{{route('poktan', $poktan->id_user)}}">Daftar Kelompok Petani</a></li>
        <li class="breadcrumb-item active">Detail Kelompok Petani</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Detail Kelompok Petani</h5>
        </center>
        <table>
          <tr>
              <td valign="top" style="width:30%"><h6>Nama Kelompok Petani</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top"><h6 style="color: black">{{$poktan->namapoktan}}</h6></td>
          </tr>
          {{-- <tr>
            <td valign="top"><h6>Jumlah Petani</h6></td>
            <td valign="top"><h6>:</h6></td>
            <td valign="top"><h6 style="color: black">{{$poktan->jumlahpetani}} Orang</h6></td>
        </tr> --}}
          <tr>
              <td valign="top"><h6>Luas Tanah</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top"><h6 style="color: black">{{$poktan->luastanah}} Hektar</h6></td>
          </tr>
          <tr>
              <td valign="top"><h6>Jumlah Produksi</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top"><h6 style="color: black">{{$poktan->jumlahproduksi}} Kilogram</h6></td>
          </tr>
          <tr>
              <td valign="top"><h6>Pemeliharaan</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top"><h6 style="color: black">{{$poktan->pemeliharaan}}</h6></td>
          </tr>
          <tr>
            <td valign="top"><h6>Lokasi Kelompok Petani</h6></td>
            <td valign="top"><h6>:</h6></td>
            <td valign="top"><h6 style="color: black">{{$poktan->lokasipoktan}}</h6></td>
          </tr>
      
      </table>

      <div class="poktan mt-4" >
        <h5><u>Data Nama Petani</u></h5>
            <table style="width:30%" class="table table-sm table-primary table-bordered">
              <tr>
                <th>No</th>
                <th>Nama Petani</th>
              </tr>
              @php
              $i=0;
              @endphp
              @foreach($petani as $data)
              @php
                  $i=$i+1;
              @endphp
              <tr>
                <td>{{$i}}</td>
                <td>{{$data->namapetani}}</td>
              </tr>
              @endforeach
            </table>
      </div>
      <div class="poktan mt-4" >
        <h5><u>Data Bantuan</u></h5>
            <table style="width:100%" class="table table-sm table-primary table-bordered">
              <tr>
                <th>No</th>
                <th>Nama Bantuan</th>
                <th>Waktu Penyaluran</th>
                <th>Kuantitas Bantuan</th>
              </tr>
              @php
              $i=0;
              @endphp
              @foreach($bantuan as $data)
              @php
                  $i=$i+1;
              @endphp
              <tr>
                <td>{{$i}}</td>
                <td>{{$data->namabantuan}}</td>
                <td>{{$data->waktubantuan}}</td>
                <td>{{$data->qtybantuan}}</td>
              </tr>
              @endforeach
            </table>
      </div>

      <div class="poktan mt-4" >
        <h5><u>Data Pelatihan</u></h5>
            <table style="width:100%" class="table table-sm table-primary table-bordered">
              <tr>
                <th>No</th>
                <th>Nama Pelatihan</th>
                <th>Waktu Pelatihan</th>
                <th>Jumlah Peserta</th>
              </tr>
              @php
              $i=0;
              @endphp
              @foreach($pelatihan as $data)
              @php
                  $i=$i+1;
              @endphp
              <tr>
                <td>{{$i}}</td>
                <td>{{$data->namapelatihan}}</td>
                <td>{{$data->waktupelatihan}}</td>
                <td>{{$data->jumlahpeserta}}</td>
              </tr>
              @endforeach
            </table>
      </div>



@endsection