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
     
       
      
    <!-- foto profile end -->
        <!-- main menu -->
        <div class="history p-2 rou">
        <div class="rounded label bg-prim">
            <h4 class="text-light p-3"><i class="fa-solid fa-pencil"></i> Update Profile Fasdes</h4>
        </div>
          <!-- foto profile -->
       <center>
        <div class=" img-circle">
          <div style="position: relative; padding: 0; cursor: pointer;">
            <img id="imageResult" onclick="ubahProfil()" class="img-circle" style="width: 140px; height: 140px;" src="{{asset('/foto/profilfasdes/'. $fasdes->profil)}}" >
            <span onclick="ubahProfil()" style="position: absolute; color: red; ">Ubah
            </span>
            <form enctype="multipart/form-data" action="{{route('fasdes.updateprofil', Auth::user()->id)}}" method="POST">
              @csrf
            <input onchange="readURL(this);" type="file" hidden name="profil" id="profil">
          </div>
        </div>
       </center>
        <!-- card -->
        <div class="card shadow" style="width: 100%">
            <div class="card-body">
            
                    <div class="mb-3">
                        <label for="luastanah" class="form-label">Nama Fasilitator Desa</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$fasdes->name}}" >
                      </div>
                    <div class="mb-3">
                      <label for="luastanah" class="form-label">Jenis Kelamin</label>
                      {{-- <input type="text" class="form-control" id="luastanah" name="jeniskelamin" value="{{$fasdes->jeniskelamin}}" > --}}
                      <select name="jeniskelamin" class="form-select" id="">
                        <option value=" " @if($fasdes->jeniskelamin == null) selected @endif disabled>-- Pilih Jenis Kelamin --</option>
                        <option value="pria" @if($fasdes->jeniskelamin == "pria") selected @endif>Pria</option>
                        <option value="wanita" @if($fasdes->jeniskelamin == "wanita") selected @endif>Wanita</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="luastanah" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="luastanah" name="alamat" value="{{$fasdes->alamat}}" >
                    </div>
                    <div class="mb-3">
                      <label for="jumlahproduksi" class="form-label">Nomor Telepon</label>
                      <input type="number" class="form-control" id="jumlahproduksi" name="no_telp" value="{{$fasdes->no_telp}}" >
                    </div>
                    <div class="mb-3">
                      <label for="inputEmail4" class="form-label">Kecamatan</label>
                      <select class="form-select" id="id_kecamatan" name="id_kecamatan" onchange="desa()">
                        <option value="0" @if ($lokasi->id_kecamatan == null)
                          selected
                        @endif disabled>-- Pilih Kecamatan --</option>
                        @foreach ($kecamatan as $item)
                        <option value="{{ $item->id_kecamatan }}" @if ($lokasi->id_kecamatan == $item->id_kecamatan)
                          selected
                        @endif>{{ $item->kecamatan }}</option>
                        @endforeach
                      </select>
                    </div>
                    <input type="text" name="id_desa" id="idbaru" hidden>
                    <div class="mb-3" id="desa">
                      
                  
                    </div>
                    <div class="mb-3">
                      <label for="jumlahproduksi" class="form-label">Koordinat Lokasi</label>
                      <input type="text" class="form-control" id="jumlahproduksi" name="lokasi" value="{{$lokasi->lokasi}}" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="jumlahproduksi" name="email" value="{{$fasdes->email}}" readonly >
                      </div>
                    <div class="mb-3">
                        <label for="pasarlokal" class="form-label">Password</label> <small class="text-muted" style="font-size:10px">Input password baru jika ingin mengubah.</small>
                        <input type="password" class="form-control" id="pasar" name="password">
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
        $(document).ready(function() {
            desa()
            });
      function desa() {
      var id_kecamatan = $("#id_kecamatan").val();
              $.get("{{ url('fasdes/profil') }}/" +id_kecamatan, {}, function(data, status) {
                  $("#desa").html(data);
                  getId()
              });
             
          }
      function ubahProfil(){
        $("#profil").click()
      }
      function getId()
      {
        var id_desa = $("#id_desa").val();
        $("#idbaru").val(id_desa);

      }
      function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
  
          reader.onload = function (e) {
              $('#imageResult')
                  .attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
     
     
    </script>
    </body>
</html>
