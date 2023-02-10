<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/style.css" />
    <link rel="stylesheet" href="{{asset('templateUser')}}/login.css" />
    <title>Login FasKab</title>
  </head>
  <body class="css-selector">
    <!-- Login Form -->
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card shadow bg text-light">
            <div class="card-title text-center border-bottom">
              <h2 class="p-3">Login</h2>
            </div>
            <div class="card-body">

              <div class="icon text-center p-5"><i class="fa-solid fa-id-card-clip fa-5x text-light"></i></div>
              <h1 class="text-center">Selamat Datang Admin</h1>

              <form action="{{route('loginadmin.check')}}">
                @if(session()->has('error'))
                <div id="login-alert" class="alert alert-danger custom-alert col-md-12"><b>Warning!</b> {{session('error')}}</div>
                @endif
                @csrf
                <div class="mb-4">
                  <label for="username" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputusername" name="email" />
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="inputpassword" name="password"/>
                </div>
                <div class="mb-4">
                  <input type="checkbox" class="form-check-input" id="remember" />
                  <label for="remember" class="form-label">Remember Me</label>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn text-light bg-primary">Masuk</button>
                </div>
              </form>
            
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>


</html>
