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
                  <br>
                  <div class="row">
                    <div class="col col-md-3">
                      <input type="month" id="bulan" class="form-control"  value="{{ $d }}" onchange="jh()">
                    </div>
                    <div class="col col-md-5">
                      <div class="input-group">
                        <input type="date" id="dari" class="form-control" onchange="chart()">
                        <span class="input-group-text" id="basic-addon2">-</span>
                        <input type="date" id="sampai" class="form-control" onchange="chart()">
                      </div>
                    </div>
                  </div>
                  <h5 class="card-title">Reports</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>
                  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                </script>
                
                <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
                  <script>
                     $(document).ready(function() {
            jh()
            });
                   function chart(){
                    var dari = $("#dari").val();
                var sampai = $("#sampai").val();
                if (dari > sampai) {
                  $("#sampai").val(dari);
                  sampai = dari;
                }
                var isi = "dari="+dari+"&sampai="+sampai;
                      $.get(`{{ url('harian/chart?`+isi+`') }}/`, {}, function(data, status) {
                    var h = data.h;
                    var v = data.v;
                    var p = data.p;
                    var k = data.k;
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Harian Masuk',
                          data: v,
                        }, {
                          name: 'Harian Pulang',
                          data: p
                        }, {
                          name: 'Kegiatan',
                          data: k
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'date',
                          categories: h
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  }
            function jh()
            {
              var bulan =  $("#bulan").val();
              $.get("{{ url('harian/hari') }}/"+bulan, {}, function(data, status) {
                $("#dari").val(bulan+"-01");
                $("#sampai").val(bulan+"-"+data);
                chart()
              });    
            }
                  </script>
                  <!-- End Line Chart -->

               

              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
                
                document.addEventListener("DOMContentLoaded", () => {
                  var dari = $("#dari").val();
                var sampai = $("#sampai").val();
                if (dari > sampai) {
                  $("#sampai").val(dari);
                  sampai = dari;
                }
                var isi = "dari="+dari+"&sampai="+sampai;
                      $.get(`{{ url('harian/chart?`+isi+`') }}/`, {}, function(data, status) {
                    var h = data.h;
                    var v = data.v;
                    new Chart(document.querySelector('#barChart'), {
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
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
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
                  });
                  });    
                });
              </script>
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>
      </div>

    </div>
  </div><!-- End Reports -->

    </div>
@endsection