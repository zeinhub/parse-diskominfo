<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('addon-script-top'); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body style="<?php echo $__env->yieldContent('body-style'); ?>" class="<?php echo $__env->yieldContent('class-body'); ?>">
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-50-px">
        <?php echo $__env->yieldContent('breadcrumb'); ?>
        <div class="row">
            <div class="col">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Kembali ke atas"><i class="fas fa-chevron-circle-up fa-2x"></i></button>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('addon-script-bottom'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/app.blade.php ENDPATH**/ ?>