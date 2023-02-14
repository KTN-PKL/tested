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


    <title>Profile</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- header -->
    <div class="title bg-primary text-light text-center p-3">
        <h1 class="display-5"><i class="fa-solid fa-id-card-clip text-light"></i> Selamat datang</h1>
        <p>User</p>
    </div>
    <!-- header -->

    <!-- container -->
    <div class="container p-1">
        <!-- main menu -->
        <div class="history p-2">
            @if(session()->has('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
              {{session()->get('success')}}
            </div>
            @endif
            <!-- foto profile -->
            <div class="profile-pic mt-3 mb-3">
                <img src="{{asset('/foto/profilfasdes/'. $fasdes->profil)}}" class="circular--portrait mx-auto d-block " alt="foto profile">
            </div>
            <!-- foto profile end -->

            {{-- title --}}
        <div class="rounded label bg-primary mt-3">
            <div class="row p-3">
                <div class="col-9 p-2 d-flex justify-content-start">
                    <h4 class="text-light "><i class="fa-solid fa-users"></i> Profil</h4>
                </div>
                <div class="col-3 p-2 d-flex justify-content-center">
                    <a href="{{route('fasdes.editprofil')}}" class="btn btn-warning"><i class="fa fa-pen-to-square"></i> Edit Profil</a>
                </div>
            </div>
        </div>
        {{-- end title --}}

            <!-- card profile-->
            <div class="card shadow" style="width: 100%">
                <div class="card-body">
                    <table border="0">
                        <tbody>
                        <tr><td>Nama</td><td>: </td><td>{{$fasdes->name}}</td></tr>
                        <tr><td>Jenis Kelamin</td><td>: </td><td>{{$fasdes->jeniskelamin}}</td></tr>
                        <tr><td>Alamat</td><td>: </td><td>{{$fasdes->alamat}}</td></tr>
                        <tr><td>Email</td><td>: </td><td>{{$fasdes->email}}</td></tr>
                        <tr><td>No.hp</td><td>: </td><td>{{$fasdes->no_telp}}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- card profile end -->

            {{-- <!-- title -->
            <div class="rounded label bg-primary mt-3">
                <div class="row p-3">
                    <div class="col-8 p-2 d-flex justify-content-start">
                        <h4 class="text-light "><i class="fa-solid fa-users"></i> Profile Poktan</h4>
                    </div>
                    <div class="col-4 p-2 d-flex justify-content-center">
                        <a href="#" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                    </div>
                </div>
            </div>
            <!-- title end -->

            <!-- card poktan  -->
            <div class="card shadow mt-2" style="width: 100%">
                <div class="card-body">
                    <table border="0">
                        <tbody>
                            <tr><td>Luas Tanah</td><td>: </td><td>value</td></tr>
                            <tr><td>Jumlah Produksi</td><td>: </td><td>value</td></tr>
                            <tr><td>Pemelihara</td><td>: </td><td>value</td></tr>
                            <tr><td>Pasar Lokal</td><td>: </td><td>value</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- card poktan end --> --}}

        {{-- Kelola Poktan --}}
        {{-- title --}}
        <div class="rounded label bg-primary mt-3">
            <div class="row p-3">
                <div class="col-9 p-2 d-flex justify-content-start">
                    <h4 class="text-light "><i class="fa-solid fa-users"></i> Kelola Poktan</h4>
                </div>
                <div class="col-3 p-2 d-flex justify-content-center">
                    <a href="{{route('fasdes.createpoktan', Auth::user()->id)}}" class="btn btn-warning"><i class="fa-solid fa-plus"></i> Buat Poktan</a>
                </div>
            </div>
        </div>
        {{-- end title --}}
        {{-- card kelola poktan --}}
        @foreach($poktan as $data)
        <div class="card shadow mt-2" style="width: 100%">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table border="0">
                            <tbody>
                                <tr><td>Nama Poktan</td><td>: </td><td>{{$data->namapoktan}}</td></tr>
                                <tr><td>Luas Tanah</td><td>: </td><td>{{$data->luastanah}}</td></tr>
                                <tr><td>Jumlah Produksi</td><td>: </td><td>{{$data->jumlahproduksi}}</td></tr>
                                <tr><td>Pemelihara</td><td>: </td><td>{{$data->pemeliharaan}}</td></tr>
                                <tr><td>Pasar Lokal</td><td>: </td><td>{{$data->pasar}}</td></tr>
                                <tr><td>Lokasi Poktan</td><td>: </td><td>{{$data->lokasipoktan}}</td></tr>
                                <tr><td>Nama Bantuan</td><td>: </td><td>{{$data->namabantuan}}</td></tr>
                                <tr><td>Kuantitas Bantuan</td><td>: </td><td>{{$data->qtybantuan}}</td></tr>
                                <tr><td>Waktu Penyaluran</td><td>: </td><td>{{$data->waktubantuan}}</td></tr>
                            
                            </tbody>
                        </table>
                    </div>
                   
                </div>
                <center>
                    <div class="col-12">
                        <a href="{{route('fasdes.editpoktan', $data->id_poktan)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a href="{{route('fasdes.detailpoktan', $data->id_poktan)}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i> Lihat</a>
                        <a href="{{route('fasdes.destroypoktan', $data->id_poktan)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</a>
                    </div>
                </center>
              
               
            </div>
        </div>
        @endforeach
        {{-- end card kelola poktan --}}
        {{-- End Kelola Poktan --}}
        </div>
    </div>
    <!-- end container -->



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

    <!-- footer -->
    <footer class="text-light text-center text-lg-start mt-auto pt-5">
        <!-- Copyright -->
        <div class="text-center p-3 bg-primary" style="height: 20vh">
            ©2023 Copyright:
            <a class="text-dark" href="#"></a>
        </div>
    <!-- Copyright -->
    </footer>
    <!-- end footer -->
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
</body>
</html>