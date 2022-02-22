@extends('app')
@section('title')
Statistik Berita
@endsection
@section('breadcrumb')
<div class="breadcrumb">
  <?php if (Auth::User()->role == "admin") { ?>
    <a href="{{route('adminhome')}}">Home</a> &nbsp;/&nbsp;<a>Statistik Berita</a>
  <?php } else { ?>
    <a href="{{route('home')}}">Home</a> &nbsp;/&nbsp;<a>Statistik Berita</a>
  <?php } ?>
</div>
<hr>
@endsection
@section('content')
<div class="statistic">
  <div class="statistic-title">
    <h2>Statistik Berita</h2>
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div id="berita-harian"></div>
        <script>
          var options = {
            chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: true,
                type: 'x',
                autoScaleYaxis: true,
                zoomedArea: {
                  fill: {
                    color: '#90CAF9',
                    opacity: 0.4
                  },
                  stroke: {
                    color: '#0D47A1',
                    opacity: 0.4,
                    width: 1
                  }
                }
              }
              //   toolbar: {
              //     show: false,
              //     offsetX: 0,
              //     offsetY: 0,
              //     tools: {
              //     download: true,
              //     selection: true,
              //     zoom: false,
              //     zoomin: false,
              //     zoomout: false,
              //     pan: true,
              //     reset: true | '<img src="/static/icons/reset.png" width="20">',
              //     customIcons: []
              //     }}
            },
            title: {
              text: 'Berita Harian',
              align: 'left'
            },
            series: [{
              name: 'Jumlah berita',
              data: <?php echo json_encode($data_harian); ?>
            }],
            xaxis: {
              categories: <?php echo json_encode($label_harian); ?>
            }
          }

          var chart = new ApexCharts(document.querySelector("#berita-harian"), options);

          chart.render();
        </script>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div id="berita-mingguan"></div>
        <script>
          var options = {
            series: [{
              name: "Jumlah berita",
              data: <?php echo json_encode($data_mingguan); ?>
            }],
            chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            title: {
              text: 'Berita Mingguan',
              align: 'left'
            },
            grid: {
              row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
              },
            },
            xaxis: {
              categories: <?php echo json_encode($label_mingguan); ?>,
              // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            }
          };

          var chart = new ApexCharts(document.querySelector("#berita-mingguan"), options);
          chart.render();
        </script>
      </div>
      <div class="col-lg-8 col-md-12 col-sm-12">
        <div id="berita-tahunan"></div>
        <script>
          var options = {
            chart: {
              type: 'line',
              zoom: {
                enabled: true,
                type: 'x',
                autoScaleYaxis: true,
                zoomedArea: {
                  fill: {
                    color: '#90CAF9',
                    opacity: 0.4
                  },
                  stroke: {
                    color: '#0D47A1',
                    opacity: 0.4,
                    width: 1
                  }
                }
              }
              //   toolbar: {
              //     show: false,
              //     offsetX: 0,
              //     offsetY: 0,
              //     tools: {
              //     download: true,
              //     selection: true,
              //     zoom: false,
              //     zoomin: false,
              //     zoomout: false,
              //     pan: true,
              //     reset: true | '<img src="/static/icons/reset.png" width="20">',
              //     customIcons: []
              //     }}
            },
            title: {
              text: 'Berita Tahunan',
              align: 'left'
            },
            series: [{
              name: 'Jumlah berita',
              data: <?php echo json_encode($data_tahunan); ?>
            }],
            xaxis: {
              categories: <?php echo json_encode($label_tahunan); ?>
            }
          }

          var chart = new ApexCharts(document.querySelector("#berita-tahunan"), options);

          chart.render();
        </script>
      </div>
    </div>
  </div>
</div>
@endsection