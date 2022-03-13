
<?php $__env->startSection('addon-script-top'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
Unggah Dokumentasi
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
    <a href="<?php echo e(route('adminhome')); ?>">Home</a> &nbsp;/&nbsp;<a>Upload Data</a>
</div>
<hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="latest-upload-wrap pt-fs">
    <h2>
        Input Data
    </h2>
    <form method="POST" action="<?php echo e(route('store-file')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input placeholder="Judul" type="text" class="form-control" name="judul" value="<?php echo e(old('judul')); ?>" id="" required>
                </div>
            </div>
            <div class=" col-12">
                <div class="form-group">
                    <label for="judul">Link Berita</label>
                    <input placeholder="Link" type="text" class="form-control" name="link" value="<?php echo e(old('link')); ?>" id="" required>
                    <?php if($errors->has('link')): ?>
                    <div class="alert alert-danger alert-block" style="margin-top: 16px;">
                        <button style="float: right" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <p style="margin-bottom: 0px; font-size:small"><?php echo e($errors->first('link')); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input placeholder="Kategori" list="category" type="text" class="form-control" name="kategori" value="<?php echo e(old('kategori')); ?>" id="" required>
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
                    <input type="text" list="tahun" class="form-control" placeholder="tahun" name="tahun" value="<?php echo e(old('tahun')); ?>" id="" required>
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
                </div>
                <input placeholder="Wilayah" type="text" list="wilayah" class="form-control" name="wilayah" value="<?php echo e(old('wilayah')); ?>" id="" required>
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
            <div class="col-6">
                <div class="form-group">
                    <label for="dinas">Dinas</label>
                    <input placeholder="Dinas" type="text" list="dinas" class="form-control" name="dinas" value="<?php echo e(old('dinas')); ?>" id="" required>
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
            <!-- <div class="col">
                <div class="form-group">
                    <label for="hasil">Hasil</label>
                    <input class="form-control" type="text" placeholder="Hasil">
                </div>
            </div> -->
            <!-- <div class="col">
                <div class="form-group">
                    <label for="featured-image">Featured Image</label>
                    <input class="form-control" type="file" name="foto_utama" placeholder="Hasil">
                </div>
            </div> -->
            <div class="col">
                <div class="form-group">
                    <label for="featured-image">Dokumentasi Foto</label>
                    <input class="form-control" type="file" name="foto[]" placeholder="Dokumentasi Foto" accept="image/*" multiple>
                </div>
                <?php if($errors->has('foto.*')): ?>
                <div class="alert alert-danger alert-block" style="margin-top: 16px;">
                    <button style="float: right" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p style="margin-bottom: 0px; font-size:small"><?php echo e($errors->first('foto.*')); ?></p>
                </div>
                <?php endif; ?>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="featured-image">Dokumentasi Video</label>
                    <input class="form-control" type="file" name="video[]" placeholder="Dokumentasi Video" accept="video/*, audio/*" multiple>
                </div>
                <?php if($errors->has('video.*')): ?>
                <div class="alert alert-danger alert-block" style="margin-top: 16px;">
                    <button style="float: right" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p style="margin-bottom: 0px; font-size:small"><?php echo e($errors->first('video.*')); ?></p>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 mt-3">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                    <!-- <div class="percent">0%</div> -->
                </div>
                <!-- <div class="progress">
                    <div class="bar"></div>
                    <div class="percent">0%</div>
                </div>
                <div id="status"></div> -->
            </div>
            <div class="col-12">
                <div class="form-group">
                    <br>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" value="submit">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script script script type="text/javascript">
    var SITEURL = "<?php echo e(URL('/')); ?>";
    $(function() {
        $(document).ready(function() {
            var bar = $('.progress-bar');
            var percent = $('.progress-bar');
            $('form').ajaxForm({
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    alert('File Has Been Uploaded Successfully');
                    window.location.href = SITEURL + "/" + "admin/home";
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/admin/upload.blade.php ENDPATH**/ ?>