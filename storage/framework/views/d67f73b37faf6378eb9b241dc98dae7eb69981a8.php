
<?php $__env->startSection('title'); ?>
<?php echo e($artikel->judul); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
  <?php if (Auth::User()->role == "admin") { ?>
    <a href="<?php echo e(route('adminhome')); ?>">Home</a> &nbsp;/&nbsp;<a href="<?php echo e(route('postbycategory', ['kategori' => $artikel->kategori])); ?>"><?php echo e($artikel->kategori); ?></a> &nbsp;/&nbsp;<?php echo e($artikel->judul); ?>

  <?php } else { ?>
    <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;<a href="<?php echo e(route('postbycategory', ['kategori' => $artikel->kategori])); ?>"><?php echo e($artikel->kategori); ?></a> &nbsp;/&nbsp;<?php echo e($artikel->judul); ?>

  <?php } ?>
</div>
<hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
  <!-- <div class="featured-image">
    <img src="<?php echo e(url('images/', $artikel->foto_utama)); ?>" alt="" class="text-center">
  </div> -->
  <!-- <div>
    <?php
    // echo $artikel->deskripsi;
    ?>
  </div> -->
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
          <li class="splide__slide text-center"> <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <div class="img-thumbnail-box">
                <div class="img-thumbnail" style="background-image:url('<?php echo e(url('files/', $f->nama_file)); ?>');"></div>
              </div>
            </a></li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
</div>
<!-- <h2 style="margin-top: 20px;" class="documentation-title">
  Lampiran :
</h2>
<div class="row">
  <?php for ($i = 0; $i < 5; $i++) {
  ?>
    <div style="margin-top: 10px" class="col-lg-3 col-md-4 col-sm-5 col-12">
      <a class="file-thumbnail">
        <i class="fas fa-file fa-2x"></i>
        Laporan Keuangan.doc
      </a>
    </div>
  <?php } ?>
</div> -->
<script src="<?php echo e(url('frontend/library/splide-3.6.9/dist/js/splide.min.js')); ?>"></script>
<script>
  var splide = new Splide('.splide', {
    perPage: 3,
    rewind: true,
  });

  splide.mount();
</script>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div id="modal-thumbnail" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Lorem Ipsum Dolor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="<?php echo e(url('frontend/assets/image/md-duran-E0ylfF52C6M-unsplash.jpg')); ?>" alt="">
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger">Hapus</a>
        <a href="#" class="btn btn-success">Unduh</a>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/post.blade.php ENDPATH**/ ?>