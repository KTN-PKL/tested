<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/login.css" />
    <title>Login Fasdes</title>
  </head>
  <body class="css-selector text-light">
    <div class="container p-5">
       @include('sweetalert::alert')
       <div class="card-title text-center">
        <img src="{{asset('template')}}/assets/img/logoupland.png" class="w-50" alt="tes">
      </div>
      <h1>Selamat Datang Fasdes</h1>
      <form action="{{route('login.check')}}">

      
     
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" >Email</label>
          <input type="text" class="form-control" id="inputusername" aria-describedby="emailelp" name="email" placeholder="Masukkan ID atau Email" />
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputpassword" name="password" placeholder="******"/>
        </div>
      
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-dark shadow mt-3"><b>Masuk</b></button>
        </div>
        <div class="text-center p-3 mt-2 fw-bold">Atau</div>
        <div class="d-grid gap-2">
          <a href="{{route('fasdes.register')}}" class="btn btn-warning shadow mt-3"><b>Daftar</b></a>
        </div>
        
      </form>
    </div>
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
