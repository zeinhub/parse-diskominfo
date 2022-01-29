<div class="sidebar">
    <div class="sidebar-title">
        STATISTIK
        <div class="line-sidebar-title"></div>
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
                data: [30,40,35]
            }],
            xaxis: {
                categories: [1991,1992,1993]
            }
            }

            var chart = new ApexCharts(document.querySelector("#chart"), options);

            chart.render();
        </script>
    </div>
    <div class="sidebar-title">
        KALENDER
        <div class="line-sidebar-title"></div>
    </div>
    <div class="sidebar-content">
      <iframe src="https://calendar.google.com/calendar/embed?height=300&wkst=2&bgcolor=%23ffffff&ctz=Asia%2FJakarta&showCalendars=0&showDate=1&showPrint=0&showTabs=0&showTitle=1&showNav=1&showTz=1&hl=id&mode=MONTH&title=Diskominfo%20Kabupaten%20Tangerang&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%230B8043" style="border:solid 1px #777" width="300" height="300" frameborder="0" scrolling="no"></iframe>
    </div>
    <div class="sidebar-title">
        PENYEBARAN COVID
        <div class="line-sidebar-title"></div>
    </div>
    <div class="sidebar-content">
      @php
        $api_url = 'https://api.kawalcorona.com/indonesia';
        $json_data = file_get_contents($api_url);
        $response_data = json_decode($json_data);
      @endphp
      <table>
        <tr>
          <td>Wilayah</td>
          <td>&nbsp;&nbsp;:</td>
          <td>
            @php
            foreach ($response_data as $covid) {
              echo $covid->name;
            }
            @endphp
          </td>
        </tr>
        <tr>
          <td>Positif</td>
          <td>&nbsp;&nbsp;:</td>
          <td>
            @php
            foreach ($response_data as $covid) {
              echo $covid->positif;
            }
            @endphp
          </td>
        </tr>
        <tr>
          <td>Sembuh</td>
          <td>&nbsp;&nbsp;:</td>
          <td>
            @php
            foreach ($response_data as $covid) {
              echo $covid->sembuh;
            }
            @endphp
          </td>
        </tr>
        <tr>
          <td>Dirawat</td>
          <td>&nbsp;&nbsp;:</td>
          <td>
            @php
            foreach ($response_data as $covid) {
              echo $covid->dirawat;
            }
            @endphp
          </td>
        </tr>
        <tr>
          <td>Meninggal</td>
          <td>&nbsp;&nbsp;:</td>
          <td>
            @php
            foreach ($response_data as $covid) {
              echo $covid->meninggal;
            }
            @endphp
          </td>
        </tr>
      </table>
      {{-- <div class="row">
        <div style="margin-top: 10px;" class="col-12">
          Wilayah : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->name;
              }
          @endphp
        </div>
        <div class="col-12">
          Positif : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->positif;
              }
          @endphp
        </div>
        <div class="col-12">
          Sembuh : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->sembuh;
              }
          @endphp
        </div>
        <div class="col-12">
          Dirawat : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->dirawat;
              }
          @endphp
        </div>
        <div class="col-12">
          Meninggal : 
          @php
              foreach ($response_data as $covid) {
                echo $covid->meninggal;
              }
          @endphp
        </div>
      </div> --}}
    </div>
    <div class="sidebar-title">BERITA TERBARU
      <div class="line-sidebar-title"></div>
    </div>
    <div class="sidebar-content news-content">
     <?php
    $news_api_url = 'https://newsapi.org/v2/top-headlines?country=id&apiKey=d977691509e24de48bcd24b95699d76c';
    $json_dataa = file_get_contents($news_api_url);
    $response_dataa = json_decode($json_dataa);
     ?>
      <?php
      $i = 0;
      foreach ($response_dataa->articles as $key) {
      ?>
        <?php if ($i < 5) { ?>
          <div class="row">
            <div class="col-2">
              <span class="news-number">#<?=$i+1?></span>
            </div>
            <div class="col">
              <div class="news-title">
                <a target="blank" href="<?=$key->url;?>"> <?=$key->title;?></a>
              </div>
            </div>
            <div class="sidebar-divider"></div>
          </div>
        <?php
        } 
        $i++;
        ?>
      <?php
    }
    ?>
    </div>
</div>