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
    <link href="{{url('frontend/library/sbadmin2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('frontend/library/sbadmin2/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body style="background-image: url('{{url('files/kantor.jpeg')}}');" class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-5 col-md-9">

                <div class="card border-0 o-hidden shadow-lg my-5">
                    <div class=" card-body p-0">
                        <!-- Nested Row within Card Body -->
                        {{-- <div class="row"> --}}
                        <style>
                            .bg-login-image {
                                background-image: url('');
                            }
                        </style>
                        {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><img src="{{url('files/parse.png')}}" style="width:50px" />&nbsp;PARSE - Register</h1>
                                </div>
                                <form class="user mx-auto" method="post" action="{{route('actionregister')}}">
                                    {{ csrf_field() }}
                                    <div class=" form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="nama" aria-describedby="emailHelp" placeholder="Nama" required>
                                    </div>
                                    <div class=" form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Email" required>
                                    </div>
                                    <div class=" form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" aria-describedby="emailHelp" placeholder="Username" required>
                                    </div>
                                    <div class=" form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="role" aria-describedby="emailHelp" placeholder="Role" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="confirmpassword" placeholder="Confirm Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                                    {{-- <hr>
                                        <a href="{{route('login')}}" class="btn btn-google btn-user btn-block">
                                    Log in
                                    </a> --}}
                                    {{-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                                </form>
                                {{-- <hr> --}}
                                {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> --}}
                            </div>
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('frontend/library/sbadmin2/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('frontend/library/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('frontend/library/sbadmin2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('frontend/library/sbadmin2/js/sb-admin-2.min.js')}}"></script>

</body>

</html>