<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container p-5">
      <div class="icon text-center p-5"><i class="fa-solid fa-id-card-clip fa-5x text-light"></i></div>
      <h1>Selamat Datang Admin</h1>
      <form action="{{route('login.check')}}">
        @if(session()->has('error'))
        <div id="login-alert" class="alert alert-danger custom-alert col-md-12"><b>Warning!</b> {{session('error')}}</div>
        @endif
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputusername" aria-describedby="emailelp" name="email" />
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputpassword" name="password"/>
        </div>
        <div class="mb-3">
          <a href="#">Lupa Password</a>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-warning"><b>Masuk</b></button>
        </div>
      </form>
    </div>
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
