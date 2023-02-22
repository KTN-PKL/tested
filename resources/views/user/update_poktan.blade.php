<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="{{asset('templateUser')}}/style.css" />
    <title>Update</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="title bg-prim text-light text-center p-3">
    <h1 class="display-5"><i class="fa-solid fa-id-card-clip text-light"></i> Selamat datang</h1>
        <p>User</p>
    </div>
    <div class="container p-1">
        <!-- main menu -->
        <div class="history p-2 rou">
        <div class="rounded label bg-prim">
          <div class="card-title text-center">
            <img src="{{asset('template')}}/assets/img/logoupland.png" style="width:150px;background-color:white;" alt="tes">
        </div>
            <h4 class="text-light p-3">Update Profile PokTan</h4>
        </div>
        <!-- card -->
        <div class="card shadow" style="width: 100%">
            <div class="card-body">
                <form action="{{route('fasdes.updatepoktan', $poktan->id_poktan)}}" method="POST">
                  @csrf
                    <div class="mb-3">
                        <label for="luastanah" class="form-label">Nama Poktan</label>
                        <input type="text" class="form-control" id="namapoktan" name="namapoktan" value="{{$poktan->namapoktan}}" >
                      </div>
                    <div class="mb-3">
                      <label for="luastanah" class="form-label">Luas Tanah</label>
                      <input type="number" class="form-control" id="luastanah" name="luastanah" value="{{$poktan->luastanah}}" >
                    </div>
                    <div class="mb-3">
                      <label for="jumlahproduksi" class="form-label">Jumlah produksi</label>
                      <input type="number" class="form-control" id="jumlahproduksi" name="jumlahproduksi" value="{{$poktan->jumlahproduksi}}" >
                    </div>
                    <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Pasar</label>
                        <input type="text" class="form-control" id="pasar" name="pasar" value="{{$poktan->pasar}}" >
                    </div>
                    <div class="mb-3">
                      <label for="jumlahpetani" class="form-label">Jumlah Petani</label>
                      <input type="number" class="form-control" id="jumlahproduksi" name="jumlahpetani" value="{{$poktan->jumlahpetani}}">
                    </div>
                    <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Lokasi Kelompok Petani</label>
                        <input type="text" class="form-control" id="lokasipoktan" name="lokasipoktan" value="{{$poktan->lokasipoktan}}">
                    </div>
                    <div class="mb-3">
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
                       <input type="text" id="namabantuan" class="form-control" placeholder="Masukkan Nama Bantuan" name="namabantuan{{ $a }}" value="{{ $pkt->namabantuan }}" required>
                        <div class="row mt-2">
                            <div class="col col-6 col-md-6">
                                <label for="weekday" class="form-label">Waktu Penyaluran</label>
                                <input type="text" id="waktubantuan" class="form-control" placeholder="Waktu Penyaluran" name="waktubantuan{{ $a }}"  value="{{ $pkt->waktubantuan }}" required>
                            </div>
                            <div class="col col-6 col-md-6">
                                <label for="weekend" class="form-label">Kuantitas Bantuan</label>
                                <input type="text" id="qtybantuan" class="form-control" placeholder="Kuantitas Bantuan" name="qtybantuan{{ $a }}" value="{{ $pkt->qtybantuan}}" required>
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
                       <div id="namabantuan{{ $a }}"></div>  
                       @else
                       @if ($a <> 1)
                    
                       @endif
                      
                       @endif  
                      </div>




                      <div class="mb-3">
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
                        <input type="text" id="namapelatihan" class="form-control" placeholder="Masukkan Nama Pelatihan" name="namapelatihan{{ $a }}"  value="{{ $pkt->namapelatihan }}" required>
                        <div class="row mt-2">
                            <div class="col col-6 col-md-6">
                                <label for="weekday" class="form-label">Waktu Pelatihan</label>
                                <input type="date" id="waktupelatihan" class="form-control" placeholder="Waktu Pelatihan" name="waktupelatihan{{ $a }}"   value="{{ $pkt->waktupelatihan }}" required>
                            </div>
                            <div class="col col-6 col-md-6">
                                <label for="weekend" class="form-label">Jumlah Peserta</label>
                                <input type="number" id="jumlahpeserta" class="form-control" placeholder="Jumlah Peserta" name="jumlahpeserta{{ $a }}"  value="{{ $pkt->jumlahpeserta}}" required>
                            </div>
                        </div>
                              @php
                              $a = $a + 1;
                             @endphp
                                 <center>
                                  <div id="tz{{ $a }}" class="col-md-4 mt-2"  @if ($a <> $jz)
                                    style="display: none"
                                  @endif>
                                  <a  class="btn btn-success" onclick="tambahpelatihan({{ $a }})">Tambah Pelatihan</a>
                                  </div>
                                  @if ($a == 1)
                                  <div id="mz1"></div>
                                  @else
                                  <div id="mz{{ $a }}" class="col-md-4 mt-2" @if ($a <> $jz)
                                    style="display: none"
                                  @endif>
                                    <a  class="btn btn-warning" onclick="minpelatihan({{ $a }})" >Hapus Pelatihan</a>
                                  </div>   
                                  @endif
                                </center>
                                @endforeach
                             
                                @if ($a == $jz)
                                <div id="namapelatihan{{ $a }}"></div>  
                                @else
                                @if ($a <> 1)
                             
                                @endif
                               
                                @endif  
                               </div>
                         
                     
                  
               
               
                 
             
                        
                           
                         
                         


                        
           
                <div class="mb-3">
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
                <div class="input-group col-6"> 
                  <input class="form-control" type="text" name="namapetani{{$i}}" value="{{$item->namapetani}}" id="fasilitas" placeholder="Nama Petani" required>
  
                  @php
                  $i = $i+1;
                  @endphp
                  <span class="input-group-text col-2" id="Tf{{ $i }}" type = "button" onclick="plusf({{ $i }})" @if ($i <> $jf)
                    style="display: none"
                  @endif><i class="fa fa-plus"></i></span>   
                  @if ($i <> 1)
                  <span class="input-group-text col-2" id="Mf{{ $i }}" type = "button" onclick="minsf({{ $i }})" @if ($i <> $jf)
                    style="display: none"
                  @endif><i class="fa fa-times"></i></span>
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
             


                    <div class="d-grid ">
                        <button type="submit" class="btn btn-block btn-primary"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>
                  </form>
            </div>
        </div>
        <!-- card history end -->
    </div>

    <!-- end main menu -->

    <!-- nav bottom -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <div class="botnav fixed-bottom bg-dark text-light text-center">
        <div class="row">
            <div class="col-4 p-3">
                <a href="{{url('fasdes/dashboard')}}" class="text-decoration-none text-light fa-solid fa-house-user text-light">
                </a>
              </div>
              <div class="col-4 p-3">
                <a href="{{url('harian/absen')}}" class="text-decoration-none text-light fa-solid fa-camera">
                </a>
              </div>
              <div class="col-4 p-3">
                <a href="{{route('fasdes.profil')}}" class="text-decoration-none text-light fa-solid fa-user">
                </a>
              </div>
        </div>
    </div>
    
    <!-- end nav bottom -->
    </div>
    <!-- footer -->
    <footer class="text-light text-center text-lg-start mt-auto pt-5">
        <!-- Copyright -->
        <div class="text-center p-3 bg-prim" style="height: 20vh">
            ©2023 Copyright:
        <a class="text-dark" href="#"></a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- end footer -->
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
    <script>
        function tambahpaket(id)
  {
    var x = id + 1;
    document.getElementById("tp" + id).style.display="none";
    document.getElementById("mp" + id).style.display="none";
    $("#jp").val(x)
    $("#namabantuan" + id).html(`
  
    <label for="paket" class="form-label">Nama Bantuan</label>
    <input type="text" id="namabantuan" class="form-control" placeholder="Masukkan Nama Bantuan" name="namabantuan`+id+`" required >
      <div class="row mt-2">
          <div class="col col-6 col-md-6">
          <label for="weekday" class="form-label">Waktu Penyaluran</label>
          <input type="date" id="waktubantuan" class="form-control" placeholder="Waktu Penyaluran" name="waktubantuan`+id+`" required >
          </div>
          <div class="col col-6 col-md-6">
            <label for="weekend" class="form-label">Kuantitas Bantuan</label>
            <input type="number" id="qtybantuan" class="form-control" placeholder="Kuantitas Bantuan" name="qtybantuan`+id+`" required >
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
    <div id="namabantuan`+x+`"></div>
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
    <input type="text" id="namapelatihan" class="form-control" placeholder="Masukkan Nama Pelatihan" name="namapelatihan`+id+`" required >
      <div class="row mt-2">
        <div class="col col-6 col-md-6">
          <label for="weekday" class="form-label">Waktu Pelatihan</label>
          <input type="date" id="waktupelatihan" class="form-control" placeholder="Waktu Pelatihan" name="waktupelatihan`+id+`" required >
          </div>
            <div class="col col-6 col-md-6">
            <label for="weekend" class="form-label">Jumlah Peserta</label>
            <input type="number" id="jumlahpeserta" class="form-control" placeholder="Jumlah Peserta Pelatihan" name="jumlahpeserta`+id+`" required >
            </div>
          </div>
            <div class="row">
            <center>
            
            <div id="tz`+x+`" class="col-md-4  mt-2">
            <a  class="btn btn-success" onclick="tambahpelatihan(`+x+`)">Tambah Pelatihan</a>
            </div>
            <div  id="mz`+x+`"  class="col-md-4 mt-2">
            <a class="btn btn-warning" onclick="minpelatihan(`+x+`)">Hapus Pelatihan</a>
            </div>
          
            </center>
          </div>
    <div id="namapelatihan`+x+`"></div>
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

  // script petani
  function plusf(id)
  {
    var x = id + 1;
    document.getElementById("Tf" + id).style.display="none";
    document.getElementById("Mf" + id).style.display="none";
    $("#jf").val(x)
    $("#plusf" + id).html(`
    <div class="input-group col-6"> 
      <input class="form-control" type="text" name="namapetani`+id+`" id="fasilitas" placeholder="Nama Petani" required >
    <span class="input-group-text col-2" id="Tf`+x+`" type = "button" onclick="plusf(`+x+`)"><i class="fa fa-plus"></i></span>   
    <span class="input-group-text col-2" id="Mf`+x+`" type = "button" onclick="minsf(`+x+`)"><i class="fa fa-times"></i></span>
    </div>
    <div class="input-group col-6" id="plusf`+x+`"></div>
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
  // end script petani


    </script>
    </body>
</html>
