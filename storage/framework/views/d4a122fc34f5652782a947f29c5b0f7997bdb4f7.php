
<?php $__env->startSection('addon-script-top'); ?>
<script src="https://cdn.tiny.cloud/1/g30aj0fetx2ms7ttb105k6vsyqvgclb7sfxpk92vzasxp45g/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    tinymce.init({
        selector: '#isi'
    });
</script>
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
    <form method="post" action="<?php echo e(route('store-file')); ?>" enctype="multipart/form-data">
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
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <br>
                    <div class="d-grid gap-2">
                        <button onclick="sukses()" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- <script>
        function sukses() {
            Swal.fire(
                'Sukses!',
                'Data berhasil disimpan!',
                'success'
            )
        }
    </script> -->
    <script>
        $(document).ready(function() {
            $('form').ajaxForm({
                beforeSend: function() {
                    $('#success').empty();
                    $('.progress-bar').text('0%');
                    $('.progress-bar').css('width', '0%');
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    $('.progress-bar').text(percentComplete + '0%');
                    $('.progress-bar').css('width', percentComplete + '0%');
                },
                success: function(data) {
                    if (data.success) {
                        $('#success').html('<div class="text-success text-center"><b>' + data.success + '</b></div><br /><br />');
                        $('#success').append(data.image);
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');
                        return redirect(route('adminhome'));
                    }
                }
            });
        });
    </script>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/admin/upload.blade.php ENDPATH**/ ?>