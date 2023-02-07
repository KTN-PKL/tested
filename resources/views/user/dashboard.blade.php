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

    <title>Fasilitator Desa</title>
  </head>
  <body onload="startTime()">
    <div class="title bg-primary text-light text-center p-3">
      <h1 class="display-5">
        <i class="fa-solid fa-id-card-clip text-light"></i> Selamat datang
      </h1>
      <p>{{Auth::user()->name}}</p>
      <form method="POST" action="{{route('user.logout')}}">
        @csrf
      <button type="submit" class="btn btn-warning">
        <i class="bi bi-box-arrow-right"></i>
        <span>Sign Out</span>
      </button>
    </form>
    </div>
    <div class="container p-1">
      <!-- main menu -->
      <div class="header pt-3">
        <div class="card shadow p-3" style="width: 100%">
          <div class="row">
            <div class="col-6">
              <h1 class="display-6">Absensi Fasdes</h1>
            </div>
            <div class="col-6 display-6 d-flex justify-content-end">
              <div
                id="txt"
                class="bg-info rounded-4 text-light w-100 text-center p-2"
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
                      class="item d-grid bg-primary rounded mx-auto text-center p-2 text-light shadow"
                    >
                      <i class="fa-regular fa-calendar fa-2x"></i
                      ><span>Absen harian</span>
                    </div>
                  </a>
                </div>
                <div class="col mt-3">
                  <a href="{{route('absenkegiatan.index')}}" class="text-decoration-none">
                    <div
                      class="item d-grid bg-primary rounded mx-auto text-center p-2 text-light shadow"
                    >
                      <i class="fa-solid fa-camera-retro fa-2x"></i
                      ><span>Absen kegiatan</span>
                    </div>
                  </a>
                </div>

                <div class="col mt-3">
                  <a href="#" class="text-decoration-none">
                    <div
                      class="item d-grid bg-info rounded mx-auto text-center p-2 text-light shadow"
                    >
                      <i class="fa-solid fa-book fa-2x"></i><span>History</span>
                    </div>
                  </a>
                </div>
                <div class="col mt-3">
                  <a href="#" class="text-decoration-none">
                    <div
                      class="item d-grid bg-secondary rounded mx-auto text-center p-2 text-light shadow"
                    >
                      <i class="fa-solid fa-user fa-2x"></i>Profile
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- status -->
      <div class="container mt-3">
        <div class="row text-center">
          <div class="col-6">
            <div class="card bg-primary text-light shadow p-2">
              Absen Masuk
              <h5>Selesai</h5>
            </div>
          </div>
          <div class="col-6">
            <div class="card shadow p-2">
              Absen Pulang
              <h5>Selesai</h5>
            </div>
          </div>
        </div>
      </div>

      <!-- end status -->
      <div class="container mt-4">
        <h5>Rekap Absen</h5>
        <div class="row text-center">
          <div class="col-6">
            <div class="card bg-info shadow mt-2 p-1">
              Masuk
              <h5>0</h5>
            </div>
          </div>

          <div class="col-6">
            <div class="card bg-warning shadow mt-2 p-1">
              Terlambat
              <h5>0</h5>
            </div>
          </div>
        </div>
      </div>

      <!-- end main menu -->

      <!-- nav bottom -->
      <div class="botnav fixed-bottom bg-dark text-light text-center">
        <div class="row">
          <div class="col-4 p-3"><i class="fa-solid fa-house-user"></i></div>
          <div class="col-4 p-3"><i class="fa-solid fa-camera"></i></div>
          <div class="col-4 p-3"><i class="fa-solid fa-user"></i></div>
        </div>
      </div>
      <!-- end nav bottom -->
    </div>
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
  </body>
</html>
