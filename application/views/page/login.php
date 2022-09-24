<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#6C388A" >
    <title>Eltic Apps | BIKINKARYA CREATIVE MEDIA</title>
    <meta name="description" content="ELTIC APPS | BIKINKARYA CREATIVE MEDIA">
    <meta name="keywords" content="BIKINKARYA CREATIVE MEDIA" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">
        <div class="login-form mt-1">
            <div class="section">
                <img src="<?= base_url() ?>/assets/img/logo.jpg" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>Halaman Login</h1>
                <h4>Silahkan Masukkan Email dan Password Anda</h4>
            </div>
            <div class="section mt-1 mb-5">
                <?php $this->view('message'); ?>
                <form action="<?= site_url('auth/process') ?>" method="post" id="FormLogin">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" name="username" class="form-control" id="email" placeholder="Email" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-links mt-2">
                        <div>
                            Belum Punya Akun? <a href="<?= base_url('pendaftaran/tambah') ?>">Daftar</a>
                        </div>
                        <!-- <div><a href="<?=base_url("pendaftaran/forget/")?>" class="text-muted">Forgot Password?</a></div> -->
                    </div>

                    <div class="form-button-group">
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-lg">Log in</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="<?= base_url() ?>/assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="<?= base_url() ?>/assets/js/lib/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="<?= base_url() ?>/assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="<?= base_url() ?>/assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="<?= base_url() ?>/assets/js/base.js"></script>

</body>

</html>