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
            <h4 class="text-light p-3"><i class="fa-solid fa-pencil"></i> Update Profile PokTan</h4>
        </div>
        <!-- card -->
        <div class="card shadow" style="width: 100%">
            <div class="card-body">
                <form>
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
                        <label for="jumlahproduksi" class="form-label">Pemeliharaan</label>
                        <input type="text" class="form-control" id="jumlahproduksi" name="pemeliharaan" value="{{$poktan->pemeliharaan}}" >
                      </div>
                    <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Pasar</label>
                        <input type="text" class="form-control" id="pasar" name="pasar" value="{{$poktan->pasar}}" >
                    </div>
                    <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Lokasi Kelompok Petani</label>
                        <input type="text" class="form-control" id="lokasipoktan" name="lokasipoktan" value="{{$poktan->lokasipoktan}}" >
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
                        <input type="text" id="bantuan" class="form-control" placeholder="Masukkan Nama Paket" name="namabantuan{{ $a }}" data-parsley-required="true" value="{{ $pkt->namabantuan }}">
                        <div class="row mt-2">
                            <div class="col col-6 col-md-6">
                                <label for="weekday" class="form-label">Waktu Bantuan</label>
                                <input type="text" id="waktubantuan" class="form-control" placeholder="Harga Weekday" name="waktubantuan{{ $a }}" data-parsley-required="true"  value="{{ $pkt->waktubantuan }}">
                            </div>
                            <div class="col col-6 col-md-6">
                                <label for="weekend" class="form-label">Kuantitas Bantuan</label>
                                <input type="text" id="qtybantuan" class="form-control" placeholder="Harga Weekend" name="qtybantuan{{ $a }}" data-parsley-required="true" value="{{ $pkt->qtybantuan}}">
                            </div>
                        </div>
                              @php
                              $a = $a + 1;
                             @endphp
                                 <center>
                                  <div id="tp{{ $a }}" class="col-md-4 mt-2"  @if ($a <> $jp)
                                    style="display: none"
                                  @endif>
                                  <a  class="btn btn-success" onclick="tambahpaket({{ $a }})">Tambah Paket</a>
                                  </div>
                                  @if ($a == 1)
                                  <div id="mp1"></div>
                                  @else
                                  <div id="mp{{ $a }}" class="col-md-4 mt-2" @if ($a <> $jp)
                                    style="display: none"
                                  @endif>
                                    <a  class="btn btn-warning" onclick="minpaket({{ $a }})" >Hapus Paket</a>
                                  </div>   
                                  @endif
                                </center>
                             
                              @if ($a == $jp)
                              <div id="namabantuan{{ $a }}"></div>  
                              @else
                              @if ($a <> 1)
                           
                              @endif
                             
                              @endif  
                              @endforeach
                            </div>
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
    <div class="form-group">
    <label for="paket" class="form-label">Paket Wisata</label>
    <input type="text" id="namabantuan" class="form-control" placeholder="Masukkan Nama Bantuan" name="namabantuan`+id+`" data-parsley-required="true">
      <div class="row mt-2">
        <div class="col col-6 col-md-6">
          <label for="weekday" class="form-label">Waktu Penyaluran</label>
          <input type="text" id="waktubantuan" class="form-control" placeholder="Waktu Penyaluran" name="waktubantuan`+id+`" data-parsley-required="true">
          </div>
            <div class="col col-6 col-md-6">
            <label for="weekend" class="form-label">Kuantitas Bantuan</label>
            <input type="text" id="qtybantuan" class="form-control" placeholder="Kuantitas Bantuan" name="qtybantuan`+id+`" data-parsley-required="true">
            </div>
          </div>
            <div class="row">
            <center>
            
            <div id="tp`+x+`" class="col-md-4  mt-2">
            <a  class="btn btn-success" onclick="tambahpaket(`+x+`)">Tambah Paket</a>
            </div>
            <div  id="mp`+x+`"  class="col-md-4 mt-2">
            <a class="btn btn-warning" onclick="minpaket(`+x+`)">Hapus Paket</a>
            </div>
          
            </center>
          </div>
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
    </script>
    </body>
</html>
