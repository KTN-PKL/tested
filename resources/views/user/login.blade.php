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
      <div class="icon text-center p-5"><i class="fa-solid fa-id-card-clip fa-5x text-light"></i></div>
      <h1>Selamat Datang Fasdes</h1>
      <form action="{{route('login.check')}}">
        @if(session()->has('error'))
        <div id="login-alert" class="alert alert-danger custom-alert col-md-12"><b>Warning!</b> {{session('error')}}</div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
          {{session()->get('success')}}
        @endif
     
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" >Email</label>
          <input type="email" class="form-control" id="inputusername" aria-describedby="emailelp" name="email" placeholder="user@mail.com" />
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
