<!doctype html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#6C388A">
    <title>Eltic Apps | BIKINKARYA CREATIVE MEDIA</title>
    <meta name="description" content="ELTIC APPS | BIKINKARYA CREATIVE MEDIA">
    <meta name="keywords" content="BIKINKARYA CREATIVE MEDIA" />
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-info" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-info text-light">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <!-- <img src="<?=base_url()?>/assets/img/logo.png" alt="logo" class="logo"> -->
            ELTIC APPS
        </div>
        <div class="right">
            <a href="<?= base_url("auth/logout")?>" class="headerButton">
                <ion-icon name="log-out-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <?= $contents ?>

    <!-- App Bottom Menu -->
    <div class="appBottomMenu bg-info text-light">
        <a href="<?=base_url()?>" class="item active">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a href="<?=base_url("page/belajar/")?>" class="item">
            <div class="col">
                <ion-icon name="book-outline"></ion-icon>
            </div>
        </a>
        <a href="<?=base_url("topup")?>" class="item">
            <div class="col">
                <ion-icon name="cash-outline"></ion-icon>
            </div>
        </a>
        <a href="<?=base_url("info")?>" class="item">
            <div class="col">
                <ion-icon name="information-circle-outline"></ion-icon>
            </div>
        </a>
        <a href="<?=base_url("page/profil")?>" class="item">
            <div class="col">
                <ion-icon name="person-circle-outline"></ion-icon>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox bg-info">
                        <div class="image-wrapper">
                            <img src="<?=base_url()?>/assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong><?= $this->session->nama?></strong>
                            <div class="text-muted">
                                <ion-icon name="mail-outline"></ion-icon>
                                <?= $this->session->email?>
                            </div>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="<?=base_url()?>" class="item">
                                <div class="icon-box bg-info">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Beranda
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url("page/belajar")?>" class="item">
                                <div class="icon-box bg-info">
                                    <ion-icon name="book-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Belajar
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url("topup")?>" class="item">
                                <div class="icon-box bg-info">
                                    <ion-icon name="cash-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Top UP</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url("info")?>" class="item">
                                <div class="icon-box bg-info">
                                    <ion-icon name="information-circle-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Info Terbaru</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url("page/profil")?>" class="item">
                                <div class="icon-box bg-info">
                                    <ion-icon name="person-circle-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Profil</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="item">
                                <div class="icon-box bg-info">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Dark Mode</div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input dark-mode-switch"
                                            id="darkmodesidebar">
                                        <label class="custom-control-label" for="darkmodesidebar"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->


    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="<?=base_url()?>/assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="<?=base_url()?>/assets/js/lib/popper.min.js"></script>
    <script src="<?=base_url()?>/assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="<?=base_url()?>/assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="<?=base_url()?>/assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="<?=base_url()?>/assets/js/base.js"></script>
    

</body>

</html>