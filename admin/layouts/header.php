<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trang chủ</title>

        <link href="<?php echo base_url() ?>/public/admin/css/styles.css" rel="stylesheet" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
         <script type="text/javascript" src="<?php echo base_url() ?>assets/js/chart.min.js"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Xin chào <?php echo $_SESSION['admin_name'] ?></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $_SESSION['admin_name'] ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url() ?>/admin/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="<?php echo base_url() . "admin/" ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tổng quan</a>
                            <a class="nav-link" href="<?php echo modules("banner/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>
                                Thay đổi banner</a
                            >
                            <a class="nav-link" href="<?php echo modules("logo/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>
                                Hoạt động</a
                            >
                            <a class="nav-link" href="<?php echo modules("category/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fa fa-list"></i></div>
                                Danh mục sản phẩm</a
                            >
                            <a class="nav-link" href="<?php echo modules("product/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-mobile"></i></div>
                                Team</a
                            >
                            <a class="nav-link" href="<?php echo modules("tintuc/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-mobile"></i></div>
                                Tin tức</a
                            >
                            <a class="nav-link" href="<?php echo modules("gioithieu/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-mobile"></i></div>
                                Giới thiệu</a
                            >
                            <a class="nav-link" href="<?php echo modules("admin/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Admin</a
                            >
                            <a class="nav-link" href="<?php echo modules("user/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Thành viên</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>