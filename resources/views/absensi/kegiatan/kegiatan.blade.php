@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Kelompok Petani {{$fasdes->name}} </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('kegiatan')}}">Daftar Fasilitator Desa</a></li>
        <li class="breadcrumb-item active">Daftar Absen Fasilitator Desa</li>
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
          <tr>
            <td style="width:30%"><h6>Kecamatan</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{$fasdes->kecamatan}}</h6></td>
          </tr>
          <tr>
            <td style="width:30%"><h6>Desa</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{$fasdes->desa}}</h6></td>
          </tr>
        </table>
        <div class="filter col-12">
          <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Cari Data
          </a>
          @if(Route::current()->getName() == 'kegiatan.kegiatan.filter')
          <a href="{{route('kegiatan.kegiatan', $fasdes->id)}}" type="button" class="btn btn-warning">
           Reset Pencarian
          </a>
          @endif
          @if(Route::current()->getName() == 'kegiatan.kegiatan.filter')
          <a target="_blank" class="btn btn-primary" href="{{ url('kegiatan/export2?id='.$fasdes->id.'&awal='.$awal.'&akhir='.$akhir.'&filter='.$filter) }}">EXPORT</a>
          @else
          <a target="_blank" class="btn btn-primary" href="{{ url('kegiatan/export/'.$fasdes->id) }}">EXPORT</a>
          @endif
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
         '05'=> 'Mei',
         '06' => 'Juni',
         '07' => 'Juli',
         '08' => 'Agustus',
         '09' => 'September',
         '10' => 'Oktober',
         '11' => 'November',
         '12' => 'Desember',
         );
       @endphp
        <div><h5>
          @if(Route::current()->getName() == 'kegiatan.kegiatan')
          Data Absensi Kegiatan Bulan {{$dayList[$m]}} {{$t}} - {{$filter}}
          @elseif(Route::current()->getName() == 'kegiatan.kegiatan.filter')
          Data Absensi Kegiatan {{$filter}} Periode {{$awal}} - {{$akhir}} 
          @endif
        </h5>
      </div>
      
        <table style="width:100%" id="satu" class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Kegiatan</th>
              <th>Deskripsi Kegiatan</th>
              <th>Pelatihan</th>
              <th>Selfie Kegiatan</th>
              <th>Foto Kegiatan</th>
              <th>Judul Pelatihan</th>
              <th>Foto Pelatihan</th>
              <th>Status Absen</th>
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
              <td style="width:5%">{{$i}}</td>
              <td style="width:12%">{{$data->tanggalabsen}}</td>
              <td style="width:10%">{{$data->waktuabsen}} WIB</td>
              <td style="width:10%">{{$data->jeniskegiatan}}</td>
              <td>{{$data->deskripsikegiatan}}</td>
              <td>{{$data->pelatihan}}</td>
              <td style="width:10%"><img class="img-thumbnail" src="{{asset('/foto/absenkegiatan/'. $data->selfiekegiatan)}}" width="80px" alt=""></td>
              <td style="width:10%"><img class="img-thumbnail" src="{{asset('foto/absenkegiatan/'. $data->fotokegiatan) }}" width="80px" alt=""></td>
              @if($data->pelatihan == "pelatihan")
              <td style="width:10%">{{ $data->judulpelatihan }}</td>
              <td style="width:10%"><img class="img-thumbnail" src="{{asset('foto/absenkegiatan/'. $data->fotopelatihan) }}" width="80px" alt=""></td>
              @else
              <td>Non Pelatihan</td>
              <td>Non Pelatihan</td>
              @endif
              <td>
                <span class="badge bg-success">Verified</span>
              </td>
              <td style="width:10%">
                <a href="{{route('kegiatan.detail', $data->id_absenkegiatan)}}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                <a href="{{route('kegiatan.edit', $data->id_absenkegiatan)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                <a href="#" class="btn btn-success btn-sm"><i class="bi bi-check2"></i></a>
                <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
    
    <div class="modal fade" id="basicModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Basic Modal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{route('kegiatan.kegiatan.filter', $fasdes->id)}}" method="POST">
            @csrf
          <div class="modal-body">
                <div class="col-12">
                  <label for="">Jenis Kegiatan</label>
                  <select style="background-color: rgb(255, 255, 255)" name="filter" class="form-select">
                    <option  selected value=" ">Pilih Jenis Kegiatan</option>
                    <option value=" ">Semua Kegiatan</option>
                    <option value="uptd">UPTD</option>
                    <option value="lapangan">Lapangan</option>
                    <option value="dinas">Dinas</option>
                    <option value="dinas luar kota">Dinas Luar Kota</option>
                    <option value="dinas luar daerah">Dinas Luar Daerah</option>
                    <option value="dinas luar negeri">Dinas Luar Negeri</option>
                    <option value="overtime">Overtime</option>
                  </select>
                </div>
               <div class="col-12">
                <label for="">Rentang Waktu</label>
                <div class="input-group">
                  <input type="date" class="form-control" placeholder="awal" aria-label="awal" name="awal">
                  <span class="input-group-text"> - </span>
                  <input type="date" class="form-control" placeholder="akhir" aria-label="akhir" name="akhir">
                </div>
               </div>
                <div class="col-md-2">
                 
                </div>
              
           
         
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Cari</button>
          </div>
        </form>
        </div>
      </div>
    </div><!-- End Basic Modal-->
      

    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
          $('.datatable').DataTable();
              document.getElementById("dataTable-dropdown").style.display = "none";
      });
      
  </script>

  
   
 
@endsection