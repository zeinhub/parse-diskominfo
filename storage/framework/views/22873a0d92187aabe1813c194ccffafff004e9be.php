
<?php $__env->startSection('title'); ?>
Kategori: <?php echo e(strtoUpper($kategori['kategori'])); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
    <?php if (Auth::User()->role == "admin") { ?>
        <a href="<?php echo e(route('adminhome')); ?>">Home</a> &nbsp;/&nbsp;<a href="#">Kategori</a> &nbsp;/&nbsp; <a href="#"><?php echo e(strtoUpper($kategori['kategori'])); ?>

        <?php } else { ?>
            <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;<a href="#">Kategori</a> &nbsp;/&nbsp; <a href="#"><?php echo e(strtoUpper($kategori['kategori'])); ?>

            <?php } ?>
</div></a>
<hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title">Kategori: <?php echo e($kategori['kategori']); ?>

        </h2>
        <div class="row">
            <?php
            foreach ($artikel as $a) {
            ?>
                <div class="col-lg-4 col-md-5 col-sm-12 mb-20-px">
                    <div class="latest-upload-wrap">
                        <div class="latest-upload">
                            <div loading="lazy" style="background-image:url('<?php echo e(url('frontend/assets/image/md-duran-E0ylfF52C6M-unsplash.jpg')); ?>');" class="post-thumbnail"></div>
                            <div class="info">
                                <div class="row">
                                    <div class="col padding-0">
                                        <div class="author">
                                            <?php echo e($a->created_at); ?> by
                                            <a href="<?php echo e(route('postbyauthor', ['author' => $a->nama_user, 'id_author' => $a->id_user])); ?>"><?php echo e($a->nama_user); ?></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <a href="#"><?php echo e($a->kategori); ?></a>
                            <?php if (Auth::User()->role == "admin") { ?>
                                <div class="title"><a href="<?php echo e(route('admin-berita', ['id' => $a->id])); ?>"><?php echo e($a->judul); ?></a></div>
                            <?php } else { ?>
                                <div class="title"><a href="<?php echo e(route('berita', ['id' => $a->id])); ?>"><?php echo e($a->judul); ?></a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/bycategory.blade.php ENDPATH**/ ?>