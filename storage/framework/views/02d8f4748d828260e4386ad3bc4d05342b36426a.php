
<?php $__env->startSection('title'); ?>
Selamat Datang - Press Release Diskominfo Kabupaten Tangerang
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="banner">
    <img src="https://tangerangkab.go.id/images/1639013612.png" alt="">
</div>
<div class="latest-upload-wrap">
    <h3 class="latest-upload-heading">Unggahan Terbaru</h3>
    <?php echo e(Auth::user()->name); ?>

    <div class="row">
        <?php
        $n = 0;
        foreach ($artikel as $a) {
            if ($n < 5) {
        ?>
                <div data-aos="fade-up" style="margin-top: 10px" class="col-lg-4 col-xs-12">
                    <div class="latest-upload-wrap">
                        <div class="latest-upload">
                            <div loading="lazy" style="background-image:url('<?php echo e(url('frontend/assets/image/md-duran-E0ylfF52C6M-unsplash.jpg', $a->foto_utama)); ?>');" class="post-thumbnail"></div>
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
                            <a href="<?php echo e(route('postbycategory', ['kategori' => $a->kategori])); ?>" class="category"><?php echo e($a->kategori); ?></a>
                            <?php if (Auth::User()->role == "admin") { ?>
                                <div class="title"><a href="<?php echo e(route('admin-berita', ['id' => $a->id])); ?>"><?php echo e($a->judul); ?></a></div>
                            <?php } else { ?>
                                <div class="title"><a href="<?php echo e(route('berita', ['id' => $a->id])); ?>"><?php echo e($a->judul); ?></a></div>
                            <?php } ?>
                            <!-- <div class="content">
                                <?php
                                $num_char = 100;
                                $text = "$a->deskripsi";
                                echo substr($text, 0, $num_char) . '...';
                                ?>
                                <a href="<?php echo e(route('berita', ['id' => $a->id])); ?>">[Selengkapnya...]</a>
                            </div> -->
                        </div>
                    </div>
                </div>
        <?php
                $n++;
            }
        }
        ?>


    </div>
    <!-- <div class="row">
        <?php
        for ($i = 0; $i < 5; $i++) {
        ?>
            <div data-aos="fade-up" style="margin-top: 10px" class="col-lg-4 col-xs-12">
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
                        <div class="title"><a href="<?php echo e(route('arsip')); ?>">Lorem ipsum dolor</a></div>
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
                            <a href="<?php echo e(route('arsip')); ?>">[Selengkapnya...]</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div> -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/home.blade.php ENDPATH**/ ?>