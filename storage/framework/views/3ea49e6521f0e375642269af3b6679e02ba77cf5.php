<div class="sidebar">
  <div class="sidebar-title mb-3">
    PENCARIAN
    <div class="line-sidebar-title"></div>
  </div>
  <div class="sidebar-content mb-3">
    <form action="<?php echo e(route('cari')); ?>" method="get" class="d-flex nav-search">
      <?php echo e(csrf_field()); ?>

      <input class="form-control me-2" name="judul" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
  </div>
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
          data: [30, 40, 35]
        }],
        xaxis: {
          categories: [1991, 1992, 1993]
        }
      }

      var chart = new ApexCharts(document.querySelector("#chart"), options);

      chart.render();
    </script>
  </div>
  <div class="sidebar-title">BERITA TERBARU
    <div class="line-sidebar-title"></div>
  </div>
  <div class="sidebar-content news-content">
    <?php
    $news_api_url = 'https://newsapi.org/v2/everything?q=Kabupaten+Tangerang+OR+Banten+OR+Pemerintah+Kabupaten+Tangerang+OR+Bupati+Tangerang&apiKey=d977691509e24de48bcd24b95699d76c';
    $json_dataa = file_get_contents($news_api_url);
    $response_dataa = json_decode($json_dataa);
    ?>
    <?php
    $i = 0;
    foreach ($response_dataa->articles as $key) {
    ?>
      <?php
      // if ($i < 5) { 
      ?>
      <div class="row">
        <div class="col-2">
          <span class="news-number">#<?= $i + 1 ?></span>
        </div>
        <div class="col">
          <div class="news-title">
            <a target="blank" href="<?= $key->url; ?>"> <?= $key->title; ?> - <?= $key->source->name ?></a>
          </div>
        </div>
        <div class="sidebar-divider"></div>
      </div>
      <?php
      // } 
      $i++;
      ?>
    <?php
    }
    ?>
  </div>
</div><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>