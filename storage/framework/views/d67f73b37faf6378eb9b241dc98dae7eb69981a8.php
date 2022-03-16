
<?php $__env->startSection('title'); ?>
<?php echo e($artikel->judul); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
  <?php if (Auth::User()->role == "admin") { ?>
    <a href="<?php echo e(route('adminhome')); ?>">Home</a> &nbsp;/&nbsp;<a href="<?php echo e(route('allcategory')); ?>">Kategori</a> &nbsp;/&nbsp;<a href="<?php echo e(route('postbycategory', ['kategori' => $artikel->kategori])); ?>"><?php echo e($artikel->kategori); ?></a> &nbsp;/&nbsp;<?php echo e($artikel->judul); ?>

  <?php } else { ?>
    <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;<a href="<?php echo e(route('allcategory')); ?>">Kategori</a> &nbsp;/&nbsp;<a href="<?php echo e(route('postbycategory', ['kategori' => $artikel->kategori])); ?>"><?php echo e($artikel->kategori); ?></a> &nbsp;/&nbsp;<?php echo e($artikel->judul); ?>

  <?php } ?>
</div>
<hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if($message = Session::get('success')): ?>
<script>
  alert(<?php echo json_encode($message); ?>);
</script>
<?php endif; ?>

<div id="page-content" class="post">
  <div class="post-title-heading"><?php echo e($artikel->judul); ?></div>
  <div class="row">
    <div class="col">
      <table>
        <div class="author">
          <?php echo e($artikel->created_at->format('d F Y, h:i:s A')); ?> by
          <a href="<?php echo e(route('postbyauthor', ['username' => $artikel->username])); ?>"><?php echo e($artikel->nama_admin); ?></a>
        </div>
      </table>
    </div>
    <div class="col text-end">
      <?php if (Auth::User()->role == "admin") { ?>
        <a class="text-end btn btn-outline-danger" href="<?php echo e(route('edit-post', ['uuid' => $artikel->uuid])); ?>"> Edit Data</a>
      <?php } ?>
      <a class="text-end btn btn-outline-info" href="<?php echo e($artikel->link); ?>" target="blank"> Open Link </a>
    </div>
  </div>
  <iframe width="100%" height="315" src="<?php echo e($artikel->link); ?>" title="Berita" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<h2 class="documentation-title">
  <br>
  Dokumentasi:
</h2>
<div class="splide">
  <div class="splide__track">
    <ul class="splide__list">
      <?php
      foreach ($files as $f) {
        if ($f->jenis_file == "foto") { ?>
          <li class="splide__slide text-center"> <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo e($f->id); ?>">
              <div class="img-thumbnail-box">
                <div class="img-thumbnail" style="background-image:url('<?php echo e(url('files/', $f->nama_file)); ?>');"></div>
              </div>
            </a></li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
</div>
<hr>
<div class="splidevideo">
  <div class="splide__track">
    <ul class="splide__list">
      <?php
      foreach ($files as $f) {
        if ($f->jenis_file == "video") { ?>
          <li class="splide__slide text-center">
            <div class="video-thumbnail-box">
              <video width="320" height="240" controls>
                <source src="<?php echo e(url('files/',$f->nama_file)); ?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
</div>
<script src="<?php echo e(url('frontend/library/splide-3.6.9/dist/js/splide.min.js')); ?>"></script>
<script>
  var splide = new Splide('.splide', {
    perPage: 2,
    rewind: true,
    autoWidth: true,
  });

  splide.mount();
</script>
<script>
  var splide = new Splide('.splidevideo', {
    perPage: 2,
    // drag: 'free',
    rewind: true,
    autoWidth: true,
  });

  splide.mount();
</script>

<!-- Modal -->
<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($f->jenis_file == "foto"): ?>
<div class="modal fade" id="staticBackdrop<?php echo e($f->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div id="modal-thumbnail" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?php echo e($f->nama_file); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="<?php echo e(url('files/', $f->nama_file)); ?>" alt="">
      </div>
      <div class="modal-footer">
        <?php if (Auth::User()->role == "admin") {
          $route = route('download', ['uuid' => $artikel->uuid, 'id' => $f->id]);
        } else {
          $route = route('user-download', ['uuid' => $artikel->uuid, 'id' => $f->id]);
        }
        ?>
        <a href="<?php echo e($route); ?>" class="btn btn-success">Unduh</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/post.blade.php ENDPATH**/ ?>