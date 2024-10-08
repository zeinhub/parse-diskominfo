
<?php $__env->startSection('title'); ?>
Selamat Datang - Pusat Data dan Arsip Elektronik (PARSE) Diskominfo Kabupaten Tangerang
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(url('frontend/style/style.css')); ?>">

<?php if($message = Session::get('success')): ?>
<script>
    alert(<?php echo json_encode($message); ?>);
</script>
<?php endif; ?>

<div class="banner">
    <img src="<?php echo e(url('frontend/assets/image/banner.png')); ?>" alt="">
</div>
<div class="latest-upload-wrap">
    <div class="row">
        <div class="col">
            <h3 style="display: inline-block" class="latest-upload-heading">Unggahan Terbaru</h3>
        </div>
        <div class="col text-end">
            <a href="<?php echo e(route('allpost')); ?>" style="margin-top: 20px" class="btn btn-outline-primary ">Semua Post</a>
        </div>
    </div>
    <div class="row">
        <?php
        $n = 0;
        foreach ($artikel as $a) {
            $foto = DB::table('file')->where('artikel_id', $a->uuid)->where('jenis_file', "foto")->first();
            if ($n < 5) {
        ?>
                <div data-aos="fade-up" style="margin-top: 10px" class="col-lg-4 col-xs-12">
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
                                            <a href=" <?php echo e(route('postbyauthor', ['username' => $a->username])); ?>"><?php echo e($a->nama_admin); ?></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <a href="<?php echo e(route('postbycategory', ['kategori' => $a->kategori])); ?>" class="category"><?php echo e($a->kategori); ?></a>
                            <?php if (Auth::User()->role == "admin") { ?>
                                <div class="title" title="<?php echo e($a->judul); ?>"><a href="<?php echo e(route('admin-berita', ['uuid' => $a->uuid])); ?>"><?php echo e(substr($a->judul, 0, 40)."... [Selengkapnya]"); ?></a></div>
                            <?php } else { ?>
                                <div class="title" title="<?php echo e($a->judul); ?>"><a href="<?php echo e(route('berita', ['uuid' => $a->uuid])); ?>"><?php echo e(substr($a->judul, 0, 40)."... [Selengkapnya]"); ?></a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        <?php
                $n++;
            }
        }
        ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/home.blade.php ENDPATH**/ ?>