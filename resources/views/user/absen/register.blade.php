<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('templateUser')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/login.css" />
    <title>Daftar</title>
</head>
<body class="css-selector">
        <div class="container p-5 text-light">
            <div class="icon text-center p-5"><i  class="fa-solid fa-id-card-clip fa-5x text-light"></i></div>
            <h1>Pendaftaran Fasdes</h1>
            <form enctype="multipart/form-data" action="{{route('fasdes.postregister')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label" >Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="user" required />
                </div>
                <div class="mb-3">
                    <label for="jeniskelamin" class="form-label" >Jenis Kelamin</label>
                    <select class="form-select" name="jeniskelamin" required>
                        <option value=" " disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label" >Nomor Telepon</label>
                    <input type="number" class="form-control" id="name" name="no_telp" placeholder="08..." required />
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label" >Alamat</label>
                    <input type="text" class="form-control" id="name" name="alamat" placeholder="Jln..." required/>
                </div>
                <div class="mb-3">
                    <label for="inputEmail4" class="form-label">Kecamatan</label>
                    <select class="form-select" id="id_kecamatan" name="id_kecamatan" onchange="desa()" required>
                        <option value="" selected disabled>-- Pilih Kecamatan --</option>
                        @foreach ($kecamatan as $item)
                        <option value="{{ $item->id_kecamatan }}">{{ $item->kecamatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3" id="desa">
                  
                </div>

                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Titik Kordinat Absen  </label>
                    <input type="text" class="form-control" id="inputusername" aria-describedby="emailelp" name="lokasi" placeholder="-6.570845979075066, 107.75895723861193" required />
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Profile</label>
                        <input class="form-control" type="file" name="profil" id="formFile" required>
                </div>                      
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Email</label>
                    <input type="email" class="form-control" id="inputusername" aria-describedby="emailelp" name="email" placeholder="user@mail.com" required/>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1"    class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputpassword" name="password" placeholder="******" required/>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning shadow mt-3"><b>Daftar</b></button>
                </div>
            </form>
        </div>    

<script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>

 {{-- Script tambahan Form Add --}}
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
 integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    function desa() {
      var id_kecamatan = $("#id_kecamatan").val();
              $.get("{{ url('register/desa') }}/" +id_kecamatan, {}, function(data, status) {
                  $("#desa").html(data);
              });
          }
  </script>
</body>
</html>