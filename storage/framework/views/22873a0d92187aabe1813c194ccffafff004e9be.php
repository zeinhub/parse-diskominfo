
<?php $__env->startSection('title'); ?>
Kategori: <?php echo e(strtoUpper($kategori['kategori'])); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
    <?php if (Auth::User()->role == "admin") { ?>
        <a href="<?php echo e(route('adminhome')); ?>">Home</a> &nbsp;/&nbsp;<a href="<?php echo e(route('allcategory')); ?>">Kategori</a> &nbsp;/&nbsp; <a><?php echo e(strtoUpper($kategori['kategori'])); ?>

        <?php } else { ?>
            <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;<a href="<?php echo e(route('allcategory')); ?>">Kategori</a> &nbsp;/&nbsp; <a><?php echo e(strtoUpper($kategori['kategori'])); ?>

            <?php } ?>
</div></a>
<hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title" style="margin-bottom: 0px;">Kategori: <?php echo e($kategori['kategori']); ?></h2>
        <h5 class=" filter-title" style="font-weight: lighter"><?php echo e($artikel->total()); ?> berita</h5>
        <div class="row">
            <?php
            foreach ($artikel as $a) {
                $foto = DB::table('file')->where('artikel_id', $a->uuid)->where('jenis_file', "foto")->first();
            ?>
                <div class="col-lg-4 col-md-5 col-sm-12 mb-20-px">
                    <div class="latest-upload-wrap">
                        <div class="latest-upload">
                            <?php if (is_object($foto)) { ?>
                                <div loading="lazy" style="background-image:url('<?php echo e(url('files/', $foto->nama_file)); ?>');" class="post-thumbnail"></div>
                            <?php } else { ?>
                                <div loading="lazy" style="background-image:url('<?php echo e(url('frontend/assets/image/kosong.png')); ?>');" class="post-thumbnail"></div>
                            <?php } ?>
                            <div class="info">
                                <div class="row">
                                    <div class="col padding-0">
                                        <div class="author">
                                            <?php echo e(date('d-m-Y', strtotime($a->created_at))); ?> by
                                            <a href="<?php echo e(route('postbyauthor', ['username' => $a->username])); ?>"><?php echo e($a->nama_admin); ?></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <a href="#" class="category"><?php echo e($a->kategori); ?></a>
                            <?php if (Auth::User()->role == "admin") { ?>
                                <div class="title" title="<?php echo e($a->judul); ?>"><a href="<?php echo e(route('admin-berita', ['uuid' => $a->uuid])); ?>"><?php echo e(substr($a->judul, 0, 40)."... [Selengkapnya]"); ?></a></div>
                            <?php } else { ?>
                                <div class="title" title="<?php echo e($a->judul); ?>"><a href="<?php echo e(route('berita', ['uuid' => $a->uuid])); ?>"><?php echo e(substr($a->judul, 0, 40)."... [Selengkapnya]"); ?></a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <div class="pagination">
        <?php echo e($artikel->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/bycategory.blade.php ENDPATH**/ ?>