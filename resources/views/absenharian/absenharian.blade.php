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
  @php
  date_default_timezone_set("Asia/Jakarta");
  $d = date("Y-m");
@endphp
  <div class="card">
    <div class="card-body">
      <div class="col mt-4">
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
        <div class="row">
          <div class="col col-md-3">
            <input type="month" id="bulan" class="form-control"  value="{{ $d }}" onchange="jh()">
          </div>
          <div class="col col-md-5">
            <div class="input-group">
              <input type="date" id="dari" class="form-control" onchange="read()">
              <span class="input-group-text" id="basic-addon2">-</span>
              <input type="date" id="sampai" class="form-control" onchange="read()">
            </div>
          </div>
          <div class="col col-md-2"></div>
          <div class="col col-md-2">
            <div id="excel"></div>
          </div>
        </div>
      </div>
      <br>
      <div id="table"></div>
    </div>
    </div>
  {{-- Script tambahan --}}
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(document).ready(function() {
            jh()
            });
            function read() {
                var id = {{ $id }};
                var dari = $("#dari").val();
                var sampai = $("#sampai").val();
                if (dari > sampai) {
                  $("#sampai").val(dari);
                  sampai = dari;
                }
                $("#excel").html(` <a target="_blank" class="btn btn-primary" href="{{ url('harian/export?id=`+id+`&dari=`+dari+`&sampai=`+sampai+`') }}">EXPORT</a>`);
                $.ajax({
                    type: "get",
                    url: "{{ url('harian/read') }}",
                    data: {
                    "id": id,
                    "dari": dari,
                    "sampai": sampai,
                    },
                success: function(data, status) {
                    $("#table").html(data);
                    }
                });
                var myarr = dari.split("-");
                var myvar = myarr[0] + "-" + myarr[1];
                $("#bulan").val(myvar);
            }
            function jh()
            {
              var bulan =  $("#bulan").val();
              $.get("{{ url('harian/hari') }}/"+bulan, {}, function(data, status) {
                $("#dari").val(bulan+"-01");
                $("#sampai").val(bulan+"-"+data);
                read()
              });    
            }
    </script>
  
@endsection

