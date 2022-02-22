<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PARSE - Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(url('frontend/library/sbadmin2/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(url('frontend/library/sbadmin2/css/sb-admin-2.min.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(url('frontend/style/style.css')); ?>">

</head>

<body style="background-image: url('<?php echo e(url('files/kantor.jpeg')); ?>');" class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-5 col-md-9">

                <div class="card border-0 o-hidden shadow-lg my-5">
                    <div class=" card-body p-0">
                        <!-- Nested Row within Card Body -->
                        
                        <style>
                            .bg-login-image {
                                background-image: url('');
                            }
                        </style>
                        
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><img src="<?php echo e(url('files/parse.png')); ?>" style="width:50px" />&nbsp;PARSE - Register</h1>
                                </div>
                                
                                <?php if(count($errors) > 0): ?>
                                <?php $errorr = []; ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php array_push($errorr, $error); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <script>
                                    alert(<?php echo json_encode($errorr); ?>);
                                </script>
                                <!-- <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div> -->
                                <?php endif; ?>
                                <form class="user mx-auto" method="post" action="<?php echo e(route('actionregister')); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <div class=" form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="nama" aria-describedby="emailHelp" placeholder="Nama" value="<?php echo e(old('nama')); ?>" required>
                                    </div>
                                    <div class=" form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
                                    </div>
                                    <div class=" form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" aria-describedby="emailHelp" placeholder="Username" value="<?php echo e(old('username')); ?>" required>
                                    </div>
                                    <div class=" form-group">
                                        <select class="form-control form-control-lg" style="border-radius: 10rem; font-size: .8rem; color:grey; height: 3.2rem;" id="exampleInputEmail" name="role" value="<?php echo e(old('role')); ?>" required>
                                            <option value="" selected disabled>--Pilih Role--</option>
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="confirmpassword" placeholder="Confirm Password" required>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                                    <hr>
                                    <a href="<?php echo e(route('adminhome')); ?>" class="btn btn-outline-primary btn-user btn-block">Home</a>
                                    
                                    
                                </form>
                                
                                
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(url('frontend/library/sbadmin2/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('frontend/library/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(url('frontend/library/sbadmin2/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(url('frontend/library/sbadmin2/js/sb-admin-2.min.js')); ?>"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\parse-diskominfo\resources\views/register.blade.php ENDPATH**/ ?>