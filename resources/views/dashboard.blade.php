@extends('layouts.template')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <div id="cek"></div>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  @php
  date_default_timezone_set("Asia/Jakarta");
  $d = date("Y-m");
@endphp
              <div class="line">
                  <!-- Reports -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                
                  <h5 class="card-title">Chart Absen Harian</h5>
                  <div class="row">
                    <div class="col col-md-3">
                      <input type="month" id="bulan" class="form-control"  value="{{ $d }}" onchange="jh()">
                    </div>
                    <div class="col col-md-5">
                      <div class="input-group">
                        <input type="date" id="dari" class="form-control" onchange="bar()">
                        <span class="input-group-text" id="basic-addon2">-</span>
                        <input type="date" id="sampai" class="form-control" onchange="bar()">
                      </div>
                    </div>
                    <div class="col col-md-4">
                      <select class="form-select" id="absen" onchange="bar()">
                        <option value="masuk" selected>Masuk</option>
                        <option value="pulang">Pulang</option>
                        </select>
                    </div>
                  </div>
                   <div id="chartharian"></div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                
                  <h5 class="card-title">Chart Absen Kegiatan</h5>
                  <div class="row">
                    <div class="col col-md-3">
                      <input type="month" id="bulan1" class="form-control"  value="{{ $d }}" onchange="jh1()">
                    </div>
                    <div class="col col-md-5">
                      <div class="input-group">
                        <input type="date" id="dari1" class="form-control" onchange="bar1()">
                        <span class="input-group-text" id="basic-addon2">-</span>
                        <input type="date" id="sampai1" class="form-control" onchange="bar1()">
                      </div>
                    </div>
                  </div>
                   <div id="chartkegiatan"></div>
                </div>
              </div>
                  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                </script>
                
                <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
                  <script>
             $(document).ready(function() {
            jh(),
            jh1()
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
                      $.get(`{{ url('harian/chart?`+isi+`') }}/`, {}, function(data, status) {
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
            function jh1()
            {
              var bulan =  $("#bulan1").val();
              $.get("{{ url('harian/hari') }}/"+bulan, {}, function(data, status) {
                $("#dari1").val(bulan+"-01");
                $("#sampai1").val(bulan+"-"+data);
                bar1()
              });    
            }
            function bar1() {
              $("#chartkegiatan").html(`<canvas id="barChart2" style="max-height: 400px;"></canvas>`);
              var dari = $("#dari1").val();
              var absen = $("#absen1").val();
                var sampai = $("#sampai1").val();
                if (dari > sampai) {
                  $("#sampai1").val(dari);
                  sampai = dari;
                }
                var myarr = dari.split("-");
                var myvar = myarr[0] + "-" + myarr[1];
                $("#bulan1").val(myvar);
                var isi = "dari="+dari+"&sampai="+sampai;
                      $.get(`{{ url('harian/chart?`+isi+`') }}/`, {}, function(data, status) {
                    var h = data.h;
                    var v = data.k
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
                  </script>
                  <!-- End Line Chart -->

               

           
        </div>
      </div>
    </div>
  </div>

    </div>
@endsection