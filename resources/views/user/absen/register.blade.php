<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/login.css" />
    <title>Daftar</title>
</head>
<body class="css-selector">
        <div class="container p-5">
            <div class="icon text-center p-5"><i  class="fa-solid fa-id-card-clip fa-5x text-light"></i></div>
            <h1>Pendaftaran Fasdes</h1>
            <form action="">
                <div class="mb-3">
                    <label for="nama" class="form-label" >Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="user" />
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label" >Alamat</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="jln..." />
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Titik Kordinat Absen  </label>
                    <input type="email" class="form-control" id="inputusername" aria-describedby="emailelp" name="email" placeholder="-6.570845979075066, 107.75895723861193" />
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Profile</label>
                        <input class="form-control" type="file" id="formFile">
                </div>                      
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Email</label>
                    <input type="email" class="form-control" id="inputusername" aria-describedby="emailelp" name="email" placeholder="user@mail.com" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1"    class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputpassword" name="password" placeholder="******"/>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark shadow mt-3"><b>Masuk</b></button>
                </div>
                <div class="text-center p-3 mt-2 fw-bold">Atau</div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning shadow mt-3"><b>Daftar</b></button>
                </div>
            </form>
        </div>    

<script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
</body>
</html>