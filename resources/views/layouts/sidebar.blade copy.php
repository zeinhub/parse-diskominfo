<div class="sidebar">
    <div class="sidebar-title">
        STATISTIK
    </div>
    <div class="sidebar-content">
        <div id="chart"></div>
        <script>
            var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30,40,35,50,49,60,70,91,125]
            }],
            xaxis: {
                categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
            }
            }

            var chart = new ApexCharts(document.querySelector("#chart"), options);

            chart.render();
        </script>
    </div>
    <div class="sidebar-title">
        KALENDER
    </div>
    <div class="sidebar-content">
      <iframe src="https://calendar.google.com/calendar/embed?height=300&wkst=2&bgcolor=%23ffffff&ctz=Asia%2FJakarta&showCalendars=0&showDate=1&showPrint=0&showTabs=0&showTitle=1&showNav=1&showTz=1&hl=id&mode=MONTH&title=Diskominfo%20Kabupaten%20Tangerang&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%230B8043" style="border:solid 1px #777" width="300" height="300" frameborder="0" scrolling="no"></iframe>
    </div>
    <div class="sidebar-title">
        STATISTIK COVID
    </div>
    <div class="sidebar-content">
      @php
        $api_url = 'https://api.kawalcorona.com/indonesia';
        $json_data = file_get_contents($api_url);
        $response_data = json_decode($json_data);
      @endphp
      <div class="row">
        <div style="margin-top: 10px;" class="col-12">
          <i class="fas fa-map-marker-alt"></i> Wilayah : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->name;
              }
          @endphp
        </div>
        <div class="col-12">
          <i class="fas fa-head-side-cough"></i> Positif : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->positif;
              }
          @endphp
        </div>
        <div class="col-12">
          <i class="fas fa-smile"></i> Sembuh : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->sembuh;
              }
          @endphp
        </div>
        <div class="col-12">
          <i class="fas fa-frown"></i> Dirawat : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->dirawat;
              }
          @endphp
        </div>
        <div class="col-12">
          <i class="fas fa-sad-tear"></i>
          Meninggal : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->meninggal;
              }
          @endphp
        </div>
      </div>
    </div>
    <div class="sidebar-title">Berita Terbaru</div>
    <div class="sidebar-content news-content">
      @php
        $news_api_url = 'https://newsapi.org/v2/top-headlines?country=id&apiKey=d977691509e24de48bcd24b95699d76c';
        $json_dataa = file_get_contents($news_api_url);
        $response_dataa = json_decode($json_dataa);
      @endphp
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php 
          $i = 0;
          foreach ($response_dataa->articles as $key) {  
          ?>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i?>" class="active" aria-current="true" aria-label="Slide 1"></button>
          <?php
          $i++;
          } 
          ?>
        </div>
        <div class="carousel-inner">
          <?php 
          $inn = 0;
          foreach ($response_dataa->articles as $key) {  
          if ($inn == 0) {
            ?>
            <div style="background-image: url('<?=$key->urlToImage?>'); background-size:contain;" class="carousel-item active">
            {{-- <img src="" class="d-block w-100" alt="..."> --}}
            <div class="carousel-caption d-none d-md-block">
              <p id="newsTitle"><a href="<?=$key->url?>" target="blank"><?=$key->title?></a></p>
            </div>
          </div>
          <?php
          $inn++;
          } else { ?>
            <div style="background-image: url('<?=$key->urlToImage?>'); background-size:contain;" class="carousel-item">
              {{-- <img src="" class="d-block w-100" alt="..."> --}}
              <div class="carousel-caption d-none d-md-block">
                <p id="newsTitle"><a href="<?=$key->url?>" target="blank"><?=$key->title?></a></p>
              </div>
            </div>
            <?php
          }
        }
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
</div>