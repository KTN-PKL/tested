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
              <div class="line">
                  <!-- Reports -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Reports</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      $.get("{{ url('harian/chart') }}/", {}, function(data, status) {
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
                  });
                  </script>
                  <!-- End Line Chart -->

               

              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  $.get("{{ url('harian/chart') }}/", {}, function(data, status) {
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