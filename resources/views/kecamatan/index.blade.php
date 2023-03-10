@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Kecamatan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Kecamatan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <div class="col mt-4">
        <a href="#" class="btn btn-primary" onclick="create()">Create Kecamatan</a>
      </div>
      <br>
      <div>
        <table class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Kecamatan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($kecamatan as $data)
            @php
            $i=$i+1;
            @endphp
            <tr>
              <td>{{$i}}</td>
              <td>{{$data->kecamatan}}</td>
              <td style="width:25%">
                <a href="#" class="btn btn-sm btn-warning" onclick="edit({{ $data->id_kecamatan }})"><i class="bi bi-pencil-square"></i> Edit</a>
                <a href="{{ route('faskab.kecamatan.destroy', $data->id_kecamatan) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</a>
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



<script>
    function create() {
            $.get("{{ route('kecamatan.create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Tambah Kecamatan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
    function edit(id) {
            $.get("{{ url('kecamatan/edit') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Edit Kecamatan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
</script>