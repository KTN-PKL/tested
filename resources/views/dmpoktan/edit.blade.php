@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Edit Kelompok Petani</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('dmpoktan.index')}}">Daftar Kelompok Petani</a></li>
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
              <form class="row g-3" action="{{route('dmpoktan.update', $poktan->id_poktan)}}" method="POST">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kelompok Petani</label>
                  <input type="text" class="form-control" name="namapoktan" value="{{$poktan->namapoktan}}" >
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">Luas Tanah</label>
                          <input type="number" class="form-control" name="luastanah" value="{{$poktan->luastanah}}" >
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
                        <label for="inputEmail4" class="form-label">Jumlah Petani</label>
                        <input type="number" class="form-control" name="jumlahpetani" value="{{$poktan->jumlahpetani}}" >
                      </div>      
                    </div> 
                    <div class="col-6">
                      <div class="col-12 mt-2">
                        <label for="inputEmail4" class="form-label">Jumlah Produksi</label>
                        <input type="number" class="form-control" name="jumlahproduksi" value="{{$poktan->jumlahproduksi}}" >
                      </div>
                    </div>        
                  </div>        
              </div>
              <div class="col-12 mt-2">
                <label for="inputEmail4" class="form-label">Alamat</label>
                <textarea type="text" class="form-control" name="lokasipoktan" >{{$poktan->lokasipoktan}}</textarea>
              </div>      
  
              <div class="col-12 mt-2">
                <div class="row">
                  <div class="col-12">
                    <div class="bantuan">
                      @php
                        $jp = count($bantuan);
                        $a = 0;
                        @endphp
                         <input type="text" name="jp" hidden value="{{ $jp }}" id="jp">
                         @foreach ($bantuan as $pkt)
                         @if ($a <> 0)
                         <div id="namabantuan{{ $a }}">
                         @endif
                         <label for="paket" class="form-label">Nama Bantuan</label>
                         <input type="text" id="namabantuan" class="form-control" placeholder="Masukkan Nama Bantuan" name="namabantuan{{ $a }}" value="{{ $pkt->namabantuan }}">
                          <div class="row mt-2">
                              <div class="col col-6 col-md-6">
                                  <label for="weekday" class="form-label">Waktu Penyaluran</label>
                                  <input type="text" id="waktubantuan" class="form-control" placeholder="Waktu Penyaluran" name="waktubantuan{{ $a }}"  value="{{ $pkt->waktubantuan }}">
                              </div>
                              <div class="col col-6 col-md-6">
                                  <label for="weekend" class="form-label">Kuantitas Bantuan</label>
                                  <input type="text" id="qtybantuan" class="form-control" placeholder="Kuantitas Bantuan" name="qtybantuan{{ $a }}" value="{{ $pkt->qtybantuan}}">
                              </div>
                          </div> 
  
                          @php
                            $a = $a + 1;
                           @endphp
                         
                         <center>
                          <div id="tp{{ $a }}" class="col-md-4 mt-2"  @if ($a <> $jp)
                            style="display: none"
                          @endif>
                          <a  class="btn btn-success" onclick="tambahpaket({{ $a }})">Tambah Bantuan</a>
                          </div>
                          @if ($a == 1)
                          <div id="mp1"></div>
                          @else
                          <div id="mp{{ $a }}" class="col-md-4 mt-2" @if ($a <> $jp)
                            style="display: none"
                          @endif>
                            <a  class="btn btn-warning" onclick="minpaket({{ $a }})" >Hapus Bantuan</a>
                          </div>   
                          @endif
                        </center>
                    
                         @endforeach
                         @if ($a == $jp)
                         <div class="col-md-12" id="namabantuan{{ $a }}"></div>  
                         @else
                         @if ($a <> 1)
                      
                         @endif
                        
                         @endif  
                        </div>
                    </div>
  
                   
                  </div>

                  
              <div class="col-12">
                <div class="pelatihan">
                  @php
                  $jz = count($pelatihan);
                  $a = 0;
              @endphp
              <input type="text" name="jz" hidden value="{{ $jz }}" id="jz">
              @foreach ($pelatihan as $pkt)
              @if ($a <> 0)
              <div id="namapelatihan{{ $a }}">
              @endif
         
                <label for="paket" class="form-label">Nama Pelatihan</label>
                  <input type="text" id="namapelatihan" class="form-control" placeholder="Masukkan Nama Pelatihan" name="namapelatihan{{ $a }}"  value="{{ $pkt->namapelatihan }}" required >
                  <div class="row mt-2">
                      <div class="col col-6 col-md-6">
                          <label for="weekday" class="form-label">Waktu Pelatihan</label>
                          <input type="text" id="waktupelatihan" class="form-control" placeholder="Harga Weekday" name="waktupelatihan{{ $a }}"   value="{{ $pkt->waktupelatihan }}" required>
                      </div>
                      <div class="col col-6 col-md-6">
                          <label for="weekend" class="form-label">Jumlah Peserta</label>
                          <input type="text" id="jumlahpeserta" class="form-control" placeholder="Harga Weekend" name="jumlahpeserta{{ $a }}"  value="{{ $pkt->jumlahpeserta}}" required>
                      </div>
                  </div>
                        @php
                        $a = $a + 1;
                       @endphp
                           <center>
                            <div id="tz{{ $a }}" class="col-md-6 mt-2"  @if ($a <> $jz)
                              style="display: none"
                            @endif>
                            <a  class="btn btn-success" onclick="tambahpelatihan({{ $a }})">Tambah Pelatihan</a>
                            </div>
                            @if ($a == 1)
                            <div id="mz1"></div>
                            @else
                            <div id="mz{{ $a }}" class="col-md-6 mt-2" @if ($a <> $jz)
                              style="display: none"
                            @endif>
                              <a  class="btn btn-warning" onclick="minpelatihan({{ $a }})" >Hapus Pelatihan</a>
                            </div>   
                            @endif
                          </center>
                          @endforeach
                       
                          @if ($a == $jz)
                          <div class="col-md-12" id="namapelatihan{{ $a }}"></div>  
                          @else
                          @if ($a <> 1)
                       
                          @endif
                         
                          @endif  
                </div>
              
              
              </div>
                
            </div>

              </div>
              
             
              <div class="col-12">
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
                <input class="form-control" type="text" name="namapetani{{$i}}" value="{{$item->namapetani}}" id="fasilitas" placeholder="Nama Petani" required>

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
                @endforeach
                @if ($i == $jf)
                <div id="plusf{{ $jf }}"></div>
                @else
                  @if ($i <> 1)
                 
                  @endif
                @endif
           
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
      <input class="form-control" type="text" name="namapetani`+id+`" id="fasilitas" placeholder="Nama Petani" required>
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

  function tambahpaket(id)
  {
    var x = id + 1;
    document.getElementById("tp" + id).style.display="none";
    document.getElementById("mp" + id).style.display="none";
    $("#jp").val(x)
    $("#namabantuan" + id).html(`
  
    <label for="paket" class="form-label">Nama Bantuan</label>
    <input type="text" id="namabantuan" class="form-control" placeholder="Masukkan Nama Bantuan" name="namabantuan`+id+`" required>
      <div class="row mt-2">
          <div class="col col-6 col-md-6">
          <label for="weekday" class="form-label">Waktu Penyaluran</label>
          <input type="date" id="waktubantuan" class="form-control" placeholder="Waktu Penyaluran" name="waktubantuan`+id+`" required>
          </div>
          <div class="col col-6 col-md-6">
            <label for="weekend" class="form-label">Kuantitas Bantuan</label>
            <input type="number" id="qtybantuan" class="form-control" placeholder="Kuantitas Bantuan" name="qtybantuan`+id+`" required>
            </div>
          </div>
            <div class="row">
            <center>
            
            <div id="tp`+x+`" class="col-md-4  mt-2">
            <a  class="btn btn-success" onclick="tambahpaket(`+x+`)">Tambah Bantuan</a>
            </div>
            <div  id="mp`+x+`"  class="col-md-4 mt-2">
            <a class="btn btn-warning" onclick="minpaket(`+x+`)">Hapus Bantuan</a>
            </div>
          
            </center>
            </div>
    <div class="col-md-6" id="namabantuan`+x+`"></div>
    `);
  }
  function minpaket(id)
  {
    var x = id - 1;
    document.getElementById("tp" + x).style.display="block";
    document.getElementById("mp" + x).style.display="block";
    $("#jp").val(x)
    $("#namabantuan"+ x).html(`  `);
  }

  // script pelatihan
  function tambahpelatihan(id)
  {
    var x = id + 1;
    document.getElementById("tz" + id).style.display="none";
    document.getElementById("mz" + id).style.display="none";
    $("#jz").val(x)
    $("#namapelatihan" + id).html(`
    <label for="paket" class="form-label">Nama Pelatihan</label>
    <input type="text" id="namapelatihan" class="form-control" placeholder="Masukkan Nama Pelatihan" name="namapelatihan`+id+`" required>
      <div class="row mt-2">
        <div class="col col-6 col-md-6">
          <label for="weekday" class="form-label">Waktu Pelatihan</label>
          <input type="date" id="waktupelatihan" class="form-control" placeholder="Waktu Pelatihan" name="waktupelatihan`+id+`" required>
          </div>
            <div class="col col-6 col-md-6">
            <label for="weekend" class="form-label">Jumlah Peserta</label>
            <input type="number" id="jumlahpeserta" class="form-control" placeholder="Jumlah Peserta Pelatihan" name="jumlahpeserta`+id+`" required>
            </div>
          </div>
            <div class="row">
            <center>
            
            <div id="tz`+x+`" class="col-md-6  mt-2">
            <a  class="btn btn-success" onclick="tambahpelatihan(`+x+`)">Tambah Pelatihan</a>
            </div>
            <div  id="mz`+x+`"  class="col-md-6 mt-2">
            <a class="btn btn-warning" onclick="minpelatihan(`+x+`)">Hapus Pelatihan</a>
            </div>
          
            </center>
            </div>
    <div class="col-md-6" id="namapelatihan`+x+`"></div>
    `);
  }
  function minpelatihan(id)
  {
    var x = id - 1;
    document.getElementById("tz" + x).style.display="block";
    document.getElementById("mz" + x).style.display="block";
    $("#jz").val(x)
    $("#namapelatihan"+ x).html(`  `);
  }
  // end script pelatihan
</script>
@endsection