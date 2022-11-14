<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laundry - Login</title>
    <!-- Custom fonts for this template-->
    <link href="/assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="/assets/LOGIN BG.gif">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-5">Welcome Back!</h1>
                                    </div>

                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <form action="<?= url_to('login') ?>" method="POST">
                                        <?= csrf_field() ?>

                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" value="<?= old('username'); ?>" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                            <span class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" value="<?= old('password'); ?>" id="exampleInputPassword" placeholder="<?= lang('Auth.password') ?>" required>
                                            <span class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Login
                                            </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/sbadmin/js/sb-admin-2.min.js"></script>



</body>

</html>