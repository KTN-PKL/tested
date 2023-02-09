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
      <div id="table"></div>
    </div>
    </div>
   
 
@endsection

<script>
  $(document).ready(function() {
        read()
        });
    
        function read() {
            var tanggal = 1;
            $.ajax({
                type: "get",
                url: "{{ url('cashflow/read') }}",
                data: {
                "tanggal": tanggal,
                },
            success: function(data, status) {
                $("#table").html(data);
                }
            });
        }
</script>