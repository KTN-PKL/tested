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
                <button id="logot" class="btn btn-warning" onclick="hapus()">
                  <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Sign Out</span>
                  </button>
                  <form id="logoutform" method="POST" action="{{route('user.logout')}}">
                        @csrf
                      <button type="submit" id="logout" class="btn btn-warning" hidden>
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
              <h5>{{ $telat }}</h5>
            </div>
          </div>
        </div>
      </div>
      @php
      date_default_timezone_set("Asia/Jakarta");
      $d = date("Y-m");
    @endphp
      {{-- barchart --}}
      <br>
      <div class="card">
        <div class="card-body">
        
          <h5 class="card-title">Chart Absen Harian</h5>
        
            <div class="col col-12 col-md-12">
              <input type="month" id="bulan" class="form-control"  value="{{ $d }}" onchange="jh()">
            </div>
            <div style="margin-top:1em" class="col col-12 col-md-12">
              <div class="input-group">
                <input type="date" id="dari" class="form-control" onchange="bar()">
                <div style="width:20%">
                  <input style="text-align:center" type="text" class="form-control" value="-" readonly>
                </div>
                <input type="date" id="sampai" class="form-control" onchange="bar()">
              </div>
            </div>
            <div style="margin-top:1em" class="col col-12 col-md-12"> 
              <select class="form-select" id="absen" onchange="bar()">
                <option value="masuk" selected>Masuk</option>
                <option value="pulang">Pulang</option>
                </select>
            </div>
    
           <div id="chartharian"></div>
        </div>
      </div>
      <div class="card">
      <div class="card-body">
        
        <h5 class="card-title">Chart Hasil Panen</h5>
        <canvas id="barChart1" style="max-height: 400px;"></canvas>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        
        <h5 class="card-title">Chart Luas Lokasi</h5>
        <canvas id="barChart2" style="max-height: 400px;"></canvas>
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

    
    <script src="{{asset('template')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    <script src="{{asset('template')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{asset('template')}}/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="{{asset('template')}}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> --}}
    <script>
$(document).ready(function() {
jh()
});
function jh()
{
var bulan =  $("#bulan").val();
$.get("{{ url('harian/hari') }}/"+bulan, {}, function(data, status) {
  $("#dari").val(bulan+"-01");
  $("#sampai").val(bulan+"-"+data);
  bar()
});    
}
function bar() {
$("#chartharian").html(`<canvas id="barChart" style="max-height: 400px;"></canvas>`);
var dari = $("#dari").val();
var absen = $("#absen").val();
  var sampai = $("#sampai").val();
  if (dari > sampai) {
    $("#sampai").val(dari);
    sampai = dari;
  }
  var myarr = dari.split("-");
  var myvar = myarr[0] + "-" + myarr[1];
  $("#bulan").val(myvar);
  var isi = "dari="+dari+"&sampai="+sampai;
        $.get(`{{ url('harian/chart2?`+isi+`') }}/`, {}, function(data, status) {
      var h = data.h;
      if (absen == "masuk") {
        var v = data.v;
      } else {
        var v = data.p;
      }
      var barc = document.getElementById("barChart").getContext('2d');

  new Chart( barc, {
  type: 'bar',
  data: {
    labels: h,
    datasets: [{
      label: 'Bar Chart',
      data: v,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
}); });
}
function bar1() {
        $.get("{{ url('profil/chartpanen') }}/", {}, function(data, status) {
      var h = data.h;
      var v = data.v
      var barc = document.getElementById("barChart1").getContext('2d');

  new Chart( barc, {
  type: 'bar',
  data: {
    labels: h,
    datasets: [{
      label: 'Bar Chart',
      data: v,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
}); });
}
function bar2() {
        $.get("{{ url('profil/chartlahan') }}/", {}, function(data, status) {
      var h = data.h;
      var v = data.v
      var barc = document.getElementById("barChart2").getContext('2d');

  new Chart( barc, {
  type: 'bar',
  data: {
    labels: h,
    datasets: [{
      label: 'Bar Chart',
      data: v,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
}); });
}
      function hapus() {
            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda Ingin Menghapus Item ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Iya Saya Yakin!',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.value) {
              document.getElementById("logoutform").submit();}
                })
        }
    </script>
  </body>
</html>
