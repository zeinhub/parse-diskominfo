
<?php $__env->startSection('title'); ?>
<?php foreach ($nama as $n) {
    $nama_author = $n->name;
} ?>
Author: <?php echo e($nama_author); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
    <?php if (Auth::User()->role == "admin") { ?>
        <a href="<?php echo e(route('adminhome')); ?>">Home</a> &nbsp;/&nbsp;<a href="#">Penulis</a> &nbsp;/&nbsp; <a><?php echo e(strtoUpper($nama_author)); ?>

        <?php } else { ?>
            <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;<a href="#">Penulis</a> &nbsp;/&nbsp; <a><?php echo e(strtoUpper($nama_author)); ?>

            <?php } ?>
</div>
<hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title">Author: <?php echo e($nama_author); ?></h2>
        <div class="row">
            <?php
            foreach ($artikel as $a) {
                $foto = DB::table('file')->where('artikel_id', $a->id)->where('jenis_file', "foto")->first();
            ?>
                <div class="col-lg-4 col-md-5 col-sm-12 mb-20-px">
                    <div class="latest-upload-wrap">
                        <div class="latest-upload">
                            <?php if (is_object($foto)) { ?>
                                <div loading="lazy" style="background-image:url('<?php echo e(url('files/', $foto->nama_file)); ?>');" class="post-thumbnail"></div>
                            <?php } else { ?>
                                <div loading="lazy" style="background-image:url('<?php echo e(url('files/kosong.png')); ?>');" class="post-thumbnail"></div>
                            <?php } ?>
                            <div class="info">
                                <div class="row">
                                    <div class="col padding-0">
                                        <div class="author">
                                            <?php echo e($a->created_at); ?> by
                                            <a href="#"><?php echo e($a->nama_admin); ?></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <a href="<?php echo e(route('postbycategory', ['kategori' => $a->kategori])); ?>" class="category"><?php echo e($a->kategori); ?></a>
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
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/bypost.blade.php ENDPATH**/ ?>