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

    <title>History</title>
  </head>
  @auth
  <body class="d-flex flex-column min-vh-100">
    <div class="title bg-prim text-light text-center p-3">
      <div class="card-title text-center">
        <img src="{{asset('template')}}/assets/img/logoupland.png" style="width:150px;background-color:white;" alt="tes">
    </div>
      <h1 class="display-5">Selamat datang</h1>
      <p>{{Auth::user()->name}}</p>
    </div>
    <div class="container p-1">
      <!-- main menu -->
      <div class="history p-2 rou">
        <div class="rounded label bg-prim">
          <h4 class="text-light p-3"><i class="fa-solid fa-book"></i> History</h4>
        </div>
        @php
  date_default_timezone_set("Asia/Jakarta");
  $d = date("Y-m");
@endphp
      
        <div class="col col-md-4">
          <select class="form-select" id="absen" onchange="absen()">
            <option value="harian" selected>Harian</option>
            <option value="kegiatan">Kegiatan</option>
            </select>
        </div>
        <div class="col col-md-3 mt-2">
          <input type="month" id="bulan" class="form-control"  value="{{ $d }}" onchange="jh()">
        </div>
        <div class="col col-md-5 mt-2">
          <div class="input-group">
            <input type="date" id="dari" class="form-control" onchange="absen()">
            <div style="width:20%">
              <input style="text-align:center" type="text" class="form-control" value="-" readonly>
            </div>
            <input type="date" id="sampai" class="form-control" onchange="absen()">
          </div>
        </div>
    
        <div class="col-12 mt-2">
          <div id="export"> </div>
        </div>
        
        <br>
        <!-- card -->
        
        <div id="histori"></div>
        <!-- card history end -->
       
      </div>
      
      <!-- end main menu -->

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
    </div>
    <!-- footer -->
    <footer class="text-light text-center text-lg-start mt-auto pt-5">
      <!-- Copyright -->
      <div class="text-center p-3 bg-prim" style="height: 20vh">
        ??2023 Copyright:
        <a class="text-dark" href="#"></a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- end footer -->
    <script src="{{asset('templateUser')}}/js/bootstrap.bundle.min.js"></script>
  </body>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script>
    $(document).ready(function() {
      jh()
    });
    function absen()
    {
      var dari = $("#dari").val();
      var sampai = $("#sampai").val();
      var absen = $("#absen").val();
      if (absen == "harian") {
        $.ajax({
                    type: "get",
                    url: "{{ url('fasdes/historiharian') }}",
                    data: {
                    "sampai": sampai,
                    "dari": dari,
                    },
                success: function(data, status) {
                  $("#histori").html(data);
                    }
                });
      } else {
        $.ajax({
                    type: "get",
                    url: "{{ url('fasdes/historikegiatan') }}",
                    data: {
                    "dari": dari,
                    "sampai": sampai,
                    },
                success: function(data, status) {
                  $("#histori").html(data);
                    }
                }); 
      }
      $("#export").html(`<a href="/fasdes/export`+absen+`?&dari=`+dari+`&sampai=`+sampai+`" class="btn btn-sm btn-primary col col-12">Export</a>`);
      var myarr = dari.split("-");
                var myvar = myarr[0] + "-" + myarr[1];
                $("#bulan").val(myvar);
    }
    function jh()
            {
              var bulan =  $("#bulan").val();
              $.get("{{ url('harian/hari') }}/"+bulan, {}, function(data, status) {
                $("#dari").val(bulan+"-01");
                $("#sampai").val(bulan+"-"+data);
                absen()
              });    
            }
  </script>
  @endauth
</html>
