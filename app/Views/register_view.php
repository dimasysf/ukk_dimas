<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <?php
                        if (empty(session()->setFlashdata("error"))):
                        ?>
                        <div class="alert alert-light">
                            <?= session()->getFlashdata("error")?>
                        </div>
                        <?php endif?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create account</h1>
                                    </div>
                                    <form class="user" action="register" method="post">
                                        <div class="form-group">
                                            <input type="text" name="nik" id="nik" class="form-control form-control-user" placeholder="NIK"required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nama" id="nama" class="form-control form-control-user" placeholder="Nama"required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Username"required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" class="form-control form-control-user" id="paassword" placeholder="Password"required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="telp" id="telp" class="form-control form-control-user" placeholder="No telepon"required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register Account
                                        </button>
                                        <div class="text-center">
                                            <a href="login" a class="small">Silakan Login</a>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>/js/sb-admin-2.min.js"></script>

</body>

</html>