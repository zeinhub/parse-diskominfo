
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
    <?php if (Auth::User()->role == "admin") { ?>
        <a href="<?php echo e(route('adminhome')); ?>">Home</a> &nbsp;/&nbsp;<a href="<?php echo e(route('filter')); ?>">Filter</a> &nbsp;/&nbsp;<a>Hasil Filter</a>
    <?php } else { ?>
        <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;<a href="<?php echo e(route('filter')); ?>">Filter</a> &nbsp;/&nbsp;<a>Hasil Filter</a>
    <?php } ?>
</div>
<hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .nav-search {
        display: none !important;
    }
</style>
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <div class="row">
            <div class="col">
                <h2 class="filter-title">Hasil Filter</h2>
            </div>
            <!-- <div class="col">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div> -->
        </div>
        <div class="filter-box">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input class="form-control" type="text" name="judul" value="<?php echo e($filter['judul']); ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input class="form-control" type="text" name="judul" value="<?php echo e($filter['kategori']); ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input class="form-control" type="text" name="judul" value="<?php echo e($filter['tahun']); ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <input class="form-control" type="text" name="judul" value="<?php echo e($filter['wilayah']); ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="dinas">Dinas</label>
                        <input class="form-control" type="text" name="judul" value="<?php echo e($filter['dinas']); ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title">Hasil</h2>
        <div class="row">
            <?php
            foreach ($hasil as $h) {
                $foto = DB::table('file')->where('artikel_id', $h->id)->where('jenis_file', "foto")->first();
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
                                            <?php echo e($h->created_at); ?> by
                                            <a href=" <?php echo e(route('postbyauthor', ['username' => $h->username])); ?>"><?php echo e($h->nama_admin); ?></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <a href="<?php echo e(route('postbycategory', ['kategori' => $h->kategori])); ?>" class="category"><?php echo e($h->kategori); ?></a>
                            <?php if (Auth::User()->role == "admin") { ?>
                                <div class="title"><a href="<?php echo e(route('admin-berita', ['id' => $h->id])); ?>"><?php echo e($h->judul); ?></a></div>
                            <?php } else { ?>
                                <div class="title"><a href="<?php echo e(route('berita', ['id' => $h->id])); ?>"><?php echo e($h->judul); ?></a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/hasil-filter.blade.php ENDPATH**/ ?>