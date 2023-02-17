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
    <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    <link rel="stylesheet" href="{{asset('templateUser')}}/style.css" />

    <title>Fasilitator Desa</title>
  </head>
  <body onload="startTime()" class="d-flex flex-column min-vh-100">

    <div id="carouselExampleSlidesOnly" class="carousel slide p-3" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('template')}}/assets/img/logoupland.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('template')}}/assets/img/logoupland.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('template')}}/assets/img/logoupland.png" class="d-block w-100" alt="...">
      </div>
    </div>
    </div>

    <div class="title bg-prim text-light text-center p-3">
      <h1 class="display-5 ">
       Selamat Datang Fasilitator Desa
      </h1>
    
     
    </div>

 
    <div class="container p-1">
     
      @include('sweetalert::alert')
   
      <!-- main menu -->
      <div class="header pt-3">
        <div class="card shadow p-3" style="width: 100%">
          <div class="row">
            <div class="col-6">
              <h1 class="display-6 fw-bold">{{Auth::user()->name}}</h1>
            </div>
            <div class="col-6 display-6 d-flex justify-content-end">
              <div
                id="txt"
                class="bg-prim rounded-4 text-light w-100 text-center p-2"
              >
                <div id="txt"></div>
              </div>
            </div>
          </div>
          <div class="card-body">
        
            <div class="container">
              <div class="row row-cols-2 row-cols-md-2 row-cols-lg-4">
                <div class="col mt-3">
                  <a href="{{url('harian/absen')}}" class="text-decoration-none">
                    <div
                      class="item d-grid bg-prim rounded mx-auto text-center p-2 text-light shadow"
                    >
                      <i class="fa-regular fa-calendar fa-2x"></i
                      ><span>Absen harian</span>
                    </div>
                  </a>
                </div>
                <div class="col mt-3">
                  <a href="{{route('absenkegiatan.index')}}" class="text-decoration-none">
                    <div
                      class="item d-grid bg-prim rounded mx-auto text-center p-2 text-light shadow"
                    >
                      <i class="fa-solid fa-camera-retro fa-2x"></i
                      ><span>Absen kegiatan</span>
                    </div>
                  </a>
                </div>

                <div class="col mt-3">
                  <a href="{{route('fasdes.history')}}" class="text-decoration-none">
                    <div
                      class="item d-grid bg-prim rounded mx-auto text-center p-2 text-light shadow"
                    >
                      <i class="fa-solid fa-book fa-2x"></i><span>History</span>
                    </div>
                  </a>
                </div>
                <div class="col mt-3">
                  <a href="{{route('fasdes.profil')}}" class="text-decoration-none">
                    <div
                      class="item d-grid bg-prim rounded mx-auto text-center p-2 text-light shadow"
                    >
                      <i class="fa-solid fa-user fa-2x"></i>
                      <span>Profile</span>
                    </div>
                  </a>
                </div>
              </div>
              
              <div class="text-center mt-5">
                  <form id="logoutform" method="POST" action="{{route('user.logout')}}">
                        @csrf
                      <button type="submit" class="btn btn-warning">
                      <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Sign Out</span>
                      </button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- status -->
      <div class="container mt-3">
        <div class="row text-center">
          <div class="col-6">
            <div class="card shadow p-2">
              Absen Masuk
              <h5>
              @if($cek <> null)  
                Sudah Absen
                @else 
                Belum Absen
              @endif
              </h5>
            </div>
          </div>
          <div class="col-6">
            <div class="card shadow p-2">
              Absen Pulang
              <h5>
                @if($cek <> null)
                @if($cek->jampulang <> null)
                Sudah Absen
                @else
                Belum Absen
                @endif
                @else
                Belum Absen
                @endif
               
              </h5>
            </div>
          </div>
        </div>
      </div>

      <!-- end status -->
      <div class="container mt-4 ">
        <h5>Rekap Absen</h5>
        <div class="row text-center">
          <div class="col-6">
            <div class="card  shadow mt-2 p-1">
              Masuk
              <h5>{{$rekap}}</h5>
            </div>
          </div>

          <div class="col-6">
            <div class="card shadow mt-2 p-1">
              Terlambat
              <h5>0</h5>
            </div>
          </div>
        </div>
      </div>

      <!-- end main menu -->
     

      <!-- nav bottom -->
      <div class="botnav fixed-bottom bg-dark text-light text-center mb-0">
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
    <footer class="text-light text-center text-lg-start mt-auto pt-5" >
      <!-- Copyright -->
      <div class="text-center p-3 bg-prim" style="height:20vh;">
        ©2023 Copyright:
        <a class="text-dark" href="#"></a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- end footer -->

    
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
      function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById("txt").innerHTML = h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
      }

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        } // add zero in front of numbers < 10
        return i;
      }
    </script>

    <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).on("submit", "#logoutform", function(event) {
    event.preventDefault();
    let form = $(this);
    
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'logout!'
    }).then((willDelete) => {
            if (willDelete) {
              document.getElementById("logoutform").submit();
            } else {
                swal("Logout Canceled");
            }
        });
    });

    </script>
  </body>
</html>
