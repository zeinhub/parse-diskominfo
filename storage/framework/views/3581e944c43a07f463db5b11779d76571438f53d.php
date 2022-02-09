<div class="navbar-line"></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">PR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
      $isAdmin = 1;
      $home = 'home';
      $uploadBtn = null;
      if($isAdmin != 0){
      $home = 'admin';
      $uploadBtn = "upload-btn-visible";
      }
      ?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
        if (Auth::user()->role == "admin") {
        ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('adminhome')); ?>">Home</a>
          </li>
        <?php } else if (Auth::user()->role == "user") { ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('home')); ?>">Home</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('statistic')); ?>">Statistik</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('filter')); ?>">Filter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('about')); ?>">About</a>
        </li>
        <?php if (Auth::user()->role == "admin") { ?>
          <li class="nav-item <?php echo e($uploadBtn); ?> uploadBtn">
            <a class="nav-link" href="<?php echo e(route('upload-data')); ?>">Upload Data</a>
          </li>
        <?php } ?>


        
    </ul>
    <form action="<?php echo e(route('cari')); ?>" method="POST" class="d-flex nav-search">
      <?php echo e(csrf_field()); ?>

      <input class="form-control me-2" name="judul" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
  </div>
  </div>
</nav><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>