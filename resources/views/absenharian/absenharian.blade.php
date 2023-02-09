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
      <div class="col mt-4 col-md-3">
        <input type="month" id="bulan" class="form-control"  value="{{ $d }}" onchange="read()">
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
    <script>
      $(document).ready(function() {
            read()
            });
            function read() {
                var id = {{ $id }};
                var bulan =  $("#bulan").val();
                $.ajax({
                    type: "get",
                    url: "{{ url('harian/read') }}",
                    data: {
                    "id": id,
                    "bulan": bulan,
                    },
                success: function(data, status) {
                    $("#table").html(data);
                    }
                });
            }
    </script>
  
@endsection

