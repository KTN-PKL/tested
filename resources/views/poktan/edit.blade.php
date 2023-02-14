@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Edit Kelompok Petani</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('faskab.poktan.index')}}">Kelompok Petani Fasilitator Desa</a></li>
        <li class="breadcrumb-item"><a href="{{route('poktan', $poktan->id_user)}}">Daftar Kelompok Petani</a></li>
        <li class="breadcrumb-item active">Edit Kelompok Petani</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <center>
            <h5 class="card-title">Edit Kelompok Petani</h5>
        </center>
        

              <!-- Vertical Form -->
              <form class="row g-3" action="{{route('faskab.poktan.update', $poktan->id_poktan)}}" method="POST">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kelompok Petani</label>
                  <input type="text" class="form-control" name="namapoktan" value="{{$poktan->namapoktan}}" required>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">Luas Tanah</label>
                          <input type="number" class="form-control" name="luastanah" value="{{$poktan->luastanah}}" required>
                        </div>
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">Pasar</label>
                         <select name="pasar" id="" class="form-select">
                          <option value="" disabled> -- Pilih Pasar -- </option>
                          <option value="lokal" @if ($poktan->pasar == "lokal")
                            selected
                          @endif>Lokal</option>
                          <option value="internasional" @if ($poktan->pasar == "internasional")
                            selected
                          @endif>Internasional</option>
                         </select>
                      </div>
              
                      </div>
                </div>
                
                <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <div class="col-12 mt-2">
                          <label for="inputEmail4" class="form-label">Jumlah Produksi</label>
                          <input type="number" class="form-control" name="jumlahproduksi" value="{{$poktan->jumlahproduksi}}" required>
                       </div>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Pemeliharaan</label>
                            <input type="text" class="form-control" name="pemeliharaan" value="{{$poktan->pemeliharaan}}" required>
                        </div>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="lokasipoktan" value="{{$poktan->lokasipoktan}}" required>
                        </div>
                      </div>
                      
                        <div class="col-6">
                          <div class="col-12 mt-2">
                            <label for="inputEmail4" class="form-label">Nama Bantuan</label>
                            <input type="text" class="form-control" name="namabantuan" value="{{$poktan->namabantuan}}" required>
                          </div>
                          <div class="col-12 mt-2">
                            <label for="inputEmail4" class="form-label">Kuantitas</label>
                            <input type="number" class="form-control" name="qtybantuan" value="{{$poktan->qtybantuan}}" required>
                          </div>
                          <div class="col-12 mt-2">
                            <label for="inputEmail4" class="form-label">Waktu Penyaluran</label>
                            <input type="date" class="form-control" name="waktubantuan" value="{{$poktan->waktubantuan}}" required>
                          </div>
                         
                        </div>
                      
                    </div>
                    
                </div>
  

                <div class="col-12">
                  <div class="col-6">
                    @php
                      $jf = count($petani);
                  @endphp
                  <input type="text" hidden value="{{ $jf }}" name="jf" id="jf">
                  <label for="kategori" class="form-label">Petani</label>
                  @php
                    $i = 0;
                  @endphp
                  @foreach ($petani as $item)
                  @if ($i <> 0)
                    <div id="plusf{{ $i }}">
                  @endif
                  <div class="input-group col-md-6"> 
                    <input class="form-control" type="text" name="namapetani{{$i}}" value="{{$item->namapetani}}" id="fasilitas" placeholder="Nama Petani">
    
                    @php
                    $i = $i+1;
                    @endphp
                    <span class="input-group-text" id="Tf{{ $i }}" type = "button" onclick="plusf({{ $i }})" @if ($i <> $jf)
                      style="display: none"
                    @endif><i class="bi bi-plus"></i></span>   
                    @if ($i <> 1)
                    <span class="input-group-text" id="Mf{{ $i }}" type = "button" onclick="minsf({{ $i }})" @if ($i <> $jf)
                      style="display: none"
                    @endif><i class="bi bi-x"></i></span>
                  </div>
                    @else
                  </div> 
                  <div id="Mf1"></div>   
                    @endif
                    @if ($i == $jf)
                    <div id="plusf{{ $jf }}"></div>
                    @else
                      @if ($i <> 1)
                     
                      @endif
                    @endif
                  @endforeach
                   </div>
                  </div>
                </div>
                  
                
                
                </div>
                
                <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

    </div>

  </div>

<script>
  function plusf(id)
  {
    var x = id + 1;
    document.getElementById("Tf" + id).style.display="none";
    document.getElementById("Mf" + id).style.display="none";
    $("#jf").val(x)
    $("#plusf" + id).html(`
    <div class="input-group col-md-6"> 
      <input class="form-control" type="text" name="namapetani`+id+`" id="fasilitas" placeholder="Nama Petani">
    <span class="input-group-text" id="Tf`+x+`" type = "button" onclick="plusf(`+x+`)"><i class="bi bi-plus"></i></span>   
    <span class="input-group-text" id="Mf`+x+`" type = "button" onclick="minsf(`+x+`)"><i class="bi bi-x"></i></span>
    </div>
    <div id="plusf`+x+`"></div>
    `);
  }
  function minsf(id)
  {
    var x = id - 1;
    document.getElementById("Tf" + x).style.display="block";
    document.getElementById("Mf" + x).style.display="block";
    $("#jf").val(x)
    $("#plusf"+ x).html(`  `);
  }
</script>
@endsection