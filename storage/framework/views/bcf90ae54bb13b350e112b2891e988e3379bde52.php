
<?php $__env->startSection('title'); ?>
Filter Berita
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
    <?php if (Auth::User()->role == "admin") { ?>
        <a href="<?php echo e(route('adminhome')); ?>">Home</a> &nbsp;/&nbsp;<a>Filter</a>
    <?php } else { ?>
        <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;<a>Filter</a>
    <?php } ?>
</div>
<hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- <style>
    .nav-search {
        display: none !important;
    }
</style> -->
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <div class="row">
            <div class="col">
                <h2 class="filter-title">Filter</h2>
            </div>
            <!-- <div class="col">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div> -->
        </div>
        <div class="filter-box">
            <form action="<?php echo e(route('cari-filter')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input class="form-control" type="text" name="judul" placeholder="Judul">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input class="form-control" type="text" name="kategori" placeholder="Kategori">
                            <!-- <option value="" disabled selected>Pilih Kategori</option>
                                <option value="">Pembangunan</option> -->
                            </input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" placeholder="tahun" name="tahun" id="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="wilayah">Wilayah</label>
                        </div>
                        <select class="form-control" name="wilayah" id="">
                            <option value="" disabled selected>Pilih Wilayah</option>
                            <option value="">Cisoka</option>
                            <option value="">Cikupa</option>
                            <option value="">Tigaraksa</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dinas">Dinas</label>
                            <select class="form-control" name="dinas" id="">
                                <option value="" disabled selected>Pilih Dinas</option>
                                <option value="">Cisoka</option>
                                <option value="">Cikupa</option>
                                <option value="">Tigaraksa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <br>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary">Terapkan Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <hr>
    <!-- <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title">Hasil</h2>
        <div class="row">
            <?php
            for ($i = 0; $i < 5; $i++) {
            ?>
                <div class="col-lg-4 col-md-5 col-sm-12 mb-20-px">
                    <div class="latest-upload-wrap">
                        <div class="latest-upload">
                            <div loading="lazy" style="background-image:url('<?php echo e(url('frontend/assets/image/md-duran-E0ylfF52C6M-unsplash.jpg')); ?>');" class="post-thumbnail"></div>
                            <div class="info">
                                <div class="row">
                                    <div class="col padding-0">
                                        <div class="author">
                                            25/01/2022 by
                                            <a href="#">Awiez Fathwa Zein</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <span class="category">Raker</span>
                            <div class="title"><a href="">Lorem ipsum dolor</a></div>
                            <div class="content">
                                <?php
                                $num_char = 100;
                                $text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, repellendus natus, cum quas illum dolore enim laborum suscipit modi quidem molestiae quisquam! Enim ipsa expedita fugiat iste totam quos eaque?
                                Qui magnam, impedit reiciendis aperiam voluptate corporis pariatur ut, ea nihil sunt ullam quam consequatur officia molestias libero harum inventore. Perferendis, aperiam aliquam in voluptate sed veniam recusandae consectetur quam.
                                Cum, eum nisi dolor tempora ex labore at? Dolorum ipsam aliquid odit dolore ipsum vero reprehenderit expedita incidunt quidem soluta, animi blanditiis optio? Doloremque voluptates corporis deleniti dignissimos, dicta eius?
                                Ullam perspiciatis saepe, neque expedita excepturi pariatur dolore ut vero aliquam! Placeat mollitia eaque delectus, rem cumque tempore quae qui nisi temporibus, dolores harum! Aut distinctio architecto consequuntur reiciendis id?
                                Deleniti a soluta dolore aliquam fuga ut neque excepturi, tenetur aut atque rerum laudantium maiores alias iste nesciunt sed nam expedita. Praesentium quaerat assumenda repellendus illo! Perspiciatis aliquid atque nam!";
                                echo substr($text, 0, $num_char) . '...';
                                ?>
                                <a href="">[Selengkapnya...]</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div> -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/filter.blade.php ENDPATH**/ ?>