@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Detail Fasilitator Desa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('faskab.poktan.index')}}">Fasilitator Desa</a></li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Detail Fasilitator Desa</h5>
        </center>
        <table>
          <tr>
              <td valign="top" style="width:30%"><h6>Nama Fasilitator Desa</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top"><h6 style="color: black">{{$fasdes->name}}</h6></td>
          </tr>
          <tr>
            <td valign="top" style="width:30%"><h6>Jenis Kelamin</h6></td>
            <td valign="top"><h6>:</h6></td>
            <td valign="top"><h6 style="color: black">{{$fasdes->jeniskelamin}}</h6></td>
        </tr>
          <tr>
            <td valign="top"><h6>Email</h6></td>
            <td valign="top"><h6>:</h6></td>
            <td valign="top"><h6 style="color: black">{{$fasdes->email}}</h6></td>
        </tr>
          <tr>
              <td valign="top"><h6>Alamat</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top"><h6 style="color: black">{{$fasdes->alamat}}</h6></td>
          </tr>
          <tr>
              <td valign="top"><h6>Nomor Telepon</h6></td>
              <td valign="top"><h6>:</h6></td>
              <td valign="top"><h6 style="color: black">{{$fasdes->no_telp}}</h6></td>
          </tr>
  
      
      </table>


@endsection