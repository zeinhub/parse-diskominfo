
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
        </div>
        <div class="filter-box">
            <form action="<?php echo e(route('cari-filter')); ?>" method="get">
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
                            <input placeholder="Kategori" list="category" type="text" class="form-control" name="kategori" id="">
                            <datalist id="category">
                                <?php
                                $data = file_get_contents("category.json");
                                foreach (json_decode($data)->category as $area) {
                                ?>
                                    <option value="<?= $area->category; ?>">
                                    <?php
                                }
                                    ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" list="tahun" class="form-control" placeholder="tahun" name="tahun" id="">
                            <datalist id="tahun">
                                <?php
                                $array = [];
                                foreach ($tahun as $t) {
                                    if (!in_array($t, $array)) {
                                        array_push($array, $t);
                                ?>
                                        <option value="<?= $t; ?>">
                                    <?php }
                                } ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="wilayah">Wilayah</label>
                            <input type="text" list="wilayah" class="form-control" placeholder="wilayah" name="wilayah" id="">
                            <datalist id="wilayah">
                                <?php
                                $array = [];
                                foreach ($wilayah as $w) {
                                    if (!in_array($w, $array)) {
                                        array_push($array, $w);
                                ?>
                                        <option value="<?= $w; ?>">
                                    <?php }
                                } ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dinas">Dinas</label>
                            <input type="text" list="dinas" class="form-control" placeholder="dinas" name="dinas" id="">
                            <datalist id="dinas">
                                <?php
                                $array = [];
                                foreach ($dinas as $d) {
                                    if (!in_array($d, $array)) {
                                        array_push($array, $d);
                                ?>
                                        <option value="<?= $d; ?>">
                                    <?php }
                                } ?>
                            </datalist>
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/filter.blade.php ENDPATH**/ ?>