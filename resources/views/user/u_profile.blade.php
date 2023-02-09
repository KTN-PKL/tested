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

            <!-- foto profile -->
            <div class="profile-pic mt-3 mb-3">
                <img src="pf.jpg" class="circular--portrait mx-auto d-block " alt="foto profile">
            </div>
            <!-- foto profile end -->

            <!-- title -->
            <div class="rounded label bg-primary">
                <h4 class="text-light p-3"><i class="fa-solid fa-user"></i> Profile</h4>
            </div>
            <!-- title end -->

            <!-- card profile-->
            <div class="card shadow" style="width: 100%">
                <div class="card-body">
                    <table border="0">
                        <tbody>
                        <tr><td>Nama</td><td>: </td><td>Namafasdes</td></tr>
                        <tr><td>Jenis Kelamin</td><td>: </td><td>jenkelfasdes</td></tr>
                        <tr><td>Alamat</td><td>: </td><td>alamat</td></tr>
                        <tr><td>Email</td><td>: </td><td>emailfasdes</td></tr>
                        <tr><td>No.hp</td><td>: </td><td>kontakfasdes</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- card profile end -->

            <!-- title -->
            <div class="rounded label bg-primary mt-3">
                <div class="row p-3">
                    <div class="col-8 p-2 d-flex justify-content-start">
                        <h4 class="text-light "><i class="fa-solid fa-users"></i> Profile Poktan</h4>
                    </div>
                    <div class="col-4 p-2 d-flex justify-content-center">
                        <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Update</button>
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
        <!-- card poktan end -->
        </div>
    </div>
    <!-- end container -->



    <!-- nav bottom -->
    <div class="botnav fixed-bottom bg-dark text-light text-center">
        <div class="row">
           <div class="col-4 p-3"><a href="{{url('dashboard')}}" class="text-decoration-none text-light fa-solid fa-house-user text-light"></a></div>
          <div class="col-4 p-3"><a href="{{url('harian/absen')}}" class="text-decoration-none text-light fa-solid fa-camera"></a></div>
          <div class="col-4 p-3"><a href="{{url('#')}}" class="text-decoration-none text-light fa-solid fa-user"></a></div>
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