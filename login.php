<?php
session_start();
if (isset($_SESSION['login'])) {
    // header("Location: dashboard.php");
    echo '<script>window.location="index.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dompet : Payment Admin Template">
    <meta property="og:title" content="Dompet : Payment Admin Template">
    <meta property="og:description" content="Dompet : Payment Admin Template">
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <?php require 'view/title.php' ?>

    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="vh-100" style="background-image: url('img/bg.jpg');">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <img src="assets/images/logo.png" alt="">
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" id="username" class="form-control" placeholder="username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" id="password" class="form-control" placeholder="********">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Login Sebagai</strong></label>
                                            <select class="form-control" id="level">
                                                <option value="1">Admin</option>
                                                <option value="2">Karyawan</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" id="login" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="assets/vendor/global/global.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/dlabnav-init.js"></script>
    <script src="assets/js/styleSwitcher.js"></script>

    <!-- jquery -->
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>

    <!-- sweetalert -->
    <link rel="stylesheet" href="assets/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script type="text/javascript">
        $('#login').click(function() {
            let username = $('#username').val();
            let password = $('#password').val();
            let level = $('#level').val();

            if (username == "" || password == "") {
                Swal.fire(
                    '',
                    'Mohon lengkapi formulir',
                    'question'
                )
            } else {
                $.ajax({
                    type: "POST",
                    url: "controller/login/login.php",
                    data: {
                        username: username,
                        password: password,
                        level: level
                    }, // data yang dikirim
                    success: function(response) {
                        console.log(response)
                        if (response === "user") {
                            window.location = "index_user.php";

                        } else if (response === "admin") {
                            window.location = "index.php";
                        } else {
                            Swal.fire("Gagal!", "Login tidak berhasil, silahkan cek user dan password anda.", "error");
                        }
                    },
                    dataType: 'text'
                });
            }
        });
    </script>
</body>

</html>