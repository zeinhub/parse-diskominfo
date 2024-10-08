
<?php $__env->startSection('title'); ?>
Statistik Arsip
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
  <?php if (Auth::User()->role == "admin") { ?>
    <a href="<?php echo e(route('adminhome')); ?>">Home</a> &nbsp;/&nbsp;<a>Statistik</a>
  <?php } else { ?>
    <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;<a>Statistik</a>
  <?php } ?>
</div>
<hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="statistic">
  <div class="statistic-title">
    <h2>Statistik</h2>
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div id="berita-harian"></div>
        <script>
          var options = {
            series: [{
              name: 'Sales',
              data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
            }],
            chart: {
              height: 350,
              type: 'line',
            },
            forecastDataPoints: {
              count: 7
            },
            stroke: {
              width: 5,
              curve: 'smooth'
            },
            xaxis: {
              type: 'datetime',
              categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001', '4/11/2001', '5/11/2001', '6/11/2001'],
              tickAmount: 10,
              labels: {
                formatter: function(value, timestamp, opts) {
                  return opts.dateFormatter(new Date(timestamp), 'dd MMM')
                }
              }
            },
            title: {
              text: 'Berita harian',
              align: 'left',
              style: {
                fontSize: "16px",
                color: '#666'
              }
            },
            fill: {
              type: 'gradient',
              gradient: {
                shade: 'dark',
                gradientToColors: ['#FDD835'],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
              },
            },
            yaxis: {
              min: -10,
              max: 40
            }
          };

          var chart = new ApexCharts(document.querySelector("#berita-harian"), options);
          chart.render();
        </script>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div id="berita-mingguan"></div>
        <script>
          var options = {
            series: [{
              name: "Desktops",
              data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
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
              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
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
              name: 'sales',
              data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
              categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            }
          }

          var chart = new ApexCharts(document.querySelector("#berita-tahunan"), options);

          chart.render();
        </script>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/statistic.blade.php ENDPATH**/ ?>