<div class="navbar-line"></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"><img width="40px" src="<?php echo e(url('frontend/assets/image/parse.png')); ?>" alt=""></a>
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
        <?php if (Auth::User()->role == "admin") { ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('adminhome')); ?>">Home</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('home')); ?>">Home</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('filter')); ?>">Filter</a>
        </li>
        <?php if (Auth::User()->role == "admin") { ?>
          <li class="nav-item <?php echo e($uploadBtn); ?> uploadBtn">
            <a class="nav-link" href="<?php echo e(route('upload-data')); ?>">Upload Data</a>
          </li>
        <?php } ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Statistik
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo e(route('statistik-berita')); ?>">Berita</a></li>
            <li><a class="dropdown-item" href="<?php echo e(route('statistik-kategori')); ?>">Kategori</a></li>
          </ul>
        </li>
        <?php if (Auth::User()->role == "admin") { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('register')); ?>">Tambah Akun</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('about')); ?>">About</a>
        </li>

      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo e(Auth::User()->name); ?>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a></li>
            <!-- <?php if (Auth::User()->role == "user") { ?>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Hapus Akun?</a></li>
            <?php } ?> -->
          </ul>
        </li>
      </ul>
      <!--  -->

    </div>
  </div>
</nav><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>