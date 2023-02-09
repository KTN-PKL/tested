@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Kelompok Petani {{$fasdes->name}} </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('kegiatan')}}">Kelompok Petani Fasilitator Desa</a></li>
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
            <td style="width:30%"><h6>Nama Fasilitator Desa</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{$fasdes->name}}</h6></td>
          </tr>
          <tr>
            <td><h6>Alamat</h6></td>
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
        <div class="filter col-md-4">
          <form action="{{route('kegiatan.kegiatan.filter', $fasdes->id)}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-8">
                <select style="background-color: rgb(212, 211, 211)" name="filter" class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option  selected value="0">Pilih Jenis Kegiatan</option>
                  <option value="all">Semua Kegiatan</option>
                  <option value="lapangan">Lapangan</option>
                  <option value="kantor">Kantor</option>
                  <option value="dinas luar kota">Dinas Luar Kota</option>
                  <option value="dinas luar daerah">Dinas Luar Daerah</option>
                  <option value="dinas luar negeri">Dinas Luar Negeri</option>
                  <option value="overtime">Overtime</option>
                </select>
              </div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-sm btn-primary">Cari</button>
              </div>
            </div>
            
         
       
        </form>
        </div>
       
       <br>
       @php
       date_default_timezone_set("Asia/Jakarta");
       $m = date("m");
       $t = date("Y");
       $dayList = array(
         '01' => 'Januari',
         '02' => 'Februari',
         '03' => 'Maret',
         '04' => 'April',
         '05'=>'Mei',
         '06' => 'Juni',
         '07' => 'Juli',
         '08' => 'Agustus',
         '09' => 'September',
         '10' => 'Oktober',
         '11' => 'November',
         '12' => 'Desember',
         );
       @endphp
        <div><h5>Data Absensi Kegiatan Bulan {{$dayList[$m]}} {{$t}} - {{$filter}}</h5></div>
        <table id="satu" class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Jenis Kegiatan</th>
              <th>Selfie Kegiatan</th>
              <th>Foto Kegiatan</th>
              <th>Foto Pelatihan</th>
              <th>Action</th>
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
              <td>
                <a href="{{route('kegiatan.edit', $data->id_absenkegiatan)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>

    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
          $('.datatable').DataTable();
              document.getElementById("dataTable-dropdown").style.display = "none";
      });
  </script>
   
 
@endsection