@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Daftar Fasilitator Desa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Fasilitator Desa</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <div class="col mt-4">
        <a href="#" class="btn btn-primary">Create Fasilitator Desa</a>
      </div>
      <br>
      <div>
        <table class="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Email</th>
              <th>Nama Fasilitator Desa</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    </div>
   
 
@endsection