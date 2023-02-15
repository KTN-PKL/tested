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
    <title>Tambah Poktan</title>
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
            <h4 class="text-light p-3"><i class="fa-solid fa-pencil"></i> Tambah PokTan</h4>
        </div>
        <!-- card -->
        <div class="card shadow" style="width: 100%">
            <div class="card-body">
                <form action="{{route('fasdes.storepoktan', Auth::user()->id)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="luastanah" class="form-label">Nama Poktan</label>
                        <input type="text" class="form-control" id="namapoktan" name="namapoktan" value="{{old('namapoktan')}}" >
                      </div>
                    <div class="mb-3">
                      <label for="luastanah" class="form-label">Luas Tanah</label>
                      <input type="number" class="form-control" id="luastanah" name="luastanah" value="{{old('luastanah')}}" >
                    </div>
                    <div class="mb-3">
                      <label for="jumlahproduksi" class="form-label">Jumlah produksi</label>
                      <input type="number" class="form-control" id="jumlahproduksi" name="jumlahproduksi" value="{{old('jumlahproduksi')}}" >
                    </div>
                    <div class="mb-3">
                        <label for="jumlahproduksi" class="form-label">Pemeliharaan</label>
                        <input type="text" class="form-control" id="pemeliharaan" name="pemeliharaan" value="{{old('pemeliharaan')}}" >
                      </div>
                    <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Pasar</label>
                        <select name="pasar" id="" class="form-select">
                            <option value=" " selected disabled>-- Pilih Pasar --</option>
                            <option value="lokal">Lokal</option>
                            <option value="internasional">Internasional</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Lokasi Kelompok Petani</label>
                        <input type="text" class="form-control" id="lokasipoktan" name="lokasipoktan" value="{{old('lokasipoktan')}}" >
                    </div>

                    <div class="mb-3">
                      <input type="text" name="jp" hidden value="1" id="jp">
                                
                      <div class="form-group">
                        <label for="paket" class="form-label">Nama Bantuan</label>
                          <input type="text" id="paket" class="form-control" placeholder="Masukkan Nama Bantuan" name="namabantuan0" data-parsley-required="true">
                          <div class="row mt-2">
                              <div class="col col-6 col-md-6">
                                  <label for="weekday" class="form-label">Waktu Penyaluran</label>
                                  <input type="date" id="weekday" class="form-control" placeholder="Waktu Penyaluran Bantuan" name="waktubantuan0" data-parsley-required="true">
                              </div>
                              <div class="col col-6 col-md-6">
                                  <label for="weekend" class="form-label">Kuantitas Bantuan</label>
                                  <input type="number" id="weekend" class="form-control" placeholder="Kuantitas Bantuan" name="qtybantuan0" data-parsley-required="true">
                              </div>
                          </div>
                          
                          <center>
                          <div id="mp1"></div>
                          <div class="col-md-8 mt-2">
                          <a id="tp1" class="btn btn-success" onclick="tambahpaket(1)">Tambah Bantuan</a>
                          </div>
                        </center>
                        <div id="paket1"></div>
                      </div>
                    
                    </div>
                   



                    {{-- <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Nama Bantuan</label>
                        <input type="text" class="form-control" id="namabantuan" name="namabantuan" value="{{old('namabantuan')}}" >
                    </div>
                    <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Kuantitas Bantuan</label>
                        <input type="text" class="form-control" id="qtybantuan" name="qtybantuan" value="{{old('qtybantuan')}}" >
                    </div>
                    <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Waktu Penyaluran Bantuan</label>
                        <input type="date" class="form-control" id="waktubantuan" name="waktubantuan" value="{{old('waktubantuan')}}" >
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">List Daftar Petani</label>
                        <input type="text" name="jumlah" value="1" id="jumlah" hidden>
                        <div class="input-group col-md-6 mb-3">
                        <input type="text" class="form-control  @error('skill') is-invalid @enderror" value="{{ old('skill') }}" name="namapetani0" placeholder="Nama Petani" required>
                        <span class="input-group-text" id="T1" type = "button" onclick="plus(1)"><i class="fa fa-plus"></i></span>
                        </div>
                        <div id="M1"></div>
                        <div id="plus1"></div>
                         @error('skill')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                         @enderror

                    </div>
                    <div class="d-grid ">
                        <button type="submit" class="btn btn-block btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>
                  </form>
            </div>
        </div>
        <!-- card history end -->
    </div>

    <!-- end main menu -->

    <!-- nav bottom -->
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
        {{-- Script tambahan Form Add --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
      </script>
      
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        function plus(id)
        {
          var x = id + 1;
          document.getElementById("T" + id).style.display="none";
          document.getElementById("M" + id).style.display="none";
          $("#jumlah").val(x)
          $("#plus" + id).html(`
          <div class="input-group col-md-6 mb-3">
          <input type="text" class="form-control" name="namapetani`+id+`" placeholder="Nama Petani">
          <span class="input-group-text" id="T`+x+`" type = "button" onclick="plus(`+x+`)"><i class="fa fa-plus"></i></span>
          <span class="input-group-text" id="M`+x+`" type = "button" onclick="mins(`+x+`)"><i class="fa fa-times"></i></span>
          </div>
          <div id="plus`+x+`"></div>
          `);
        }
        function mins(id)
        {
          var x = id - 1;
          document.getElementById("T" + x).style.display="block";
          document.getElementById("M" + x).style.display="block";
          $("#jumlah").val(x)
          $("#plus"+ x).html(`  `);
        }

        // script bantuan
        function tambahpaket(id)
    {
      var x = id + 1;
      document.getElementById("tp" + id).style.display="none";
      document.getElementById("mp" + id).style.display="none";
      $("#jp").val(x)
      $("#paket" + id).html(`
      <div class="form-group">
      <label for="paket" class="form-label">Nama Bantuan</label>
      <input type="text" id="paket" class="form-control" placeholder="Masukkan Nama Bantuan" name="namabantuan`+id+`" data-parsley-required="true">
        <div class="row mt-2">
          <div class="col col-6 col-md-6">
            <label for="weekday" class="form-label">Waktu Penyaluran</label>
            <input type="date" id="weekday" class="form-control" placeholder="Penyaluran Bantuan" name="waktubantuan`+id+`" data-parsley-required="true">
            </div>
              <div class="col col-6 col-md-6">
              <label for="weekend" class="form-label">Kuantitas Bantuan</label>
              <input type="number" id="weekend" class="form-control" placeholder="Kuantitas Bantuan" name="qtybantuan`+id+`" data-parsley-required="true">
              </div>
            </div>
              <div class="row">
              <center>
              
              <div class="col-md-4 mt-2">
              <a id="tp`+x+`" class="btn btn-success" onclick="tambahpaket(`+x+`)">Tambah Bantuan</a>
              </div>
              <div class="col-md-4">
              <a id="mp`+x+`" class="btn btn-warning" onclick="minpaket(`+x+`)">Hapus Bantuan</a>
              </div>
            
              </center>
            </div>
            <div id="paket`+x+`"></div>
            </div>
   
      `);
    }
    function minpaket(id)
    {
      var x = id - 1;
      document.getElementById("tp" + x).style.display="block";
      document.getElementById("mp" + x).style.display="block";
      $("#jp").val(x)
      $("#paket"+ x).html(`  `);
    }
      </script>
    </body>
</html>
