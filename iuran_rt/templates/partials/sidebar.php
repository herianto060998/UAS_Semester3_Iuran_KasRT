<?php
include '../config.php';
include '../session.php';
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Iuran Kas RT</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../templates/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../templates/dist/css/adminlte.min.css">
    <style>
        @media screen and (max-width: 900px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../logout" type="submit" class="btn btn-danger" onclick="javasciprt: return confirm('Apa Anda Yakin?')">Logout </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="../dashboard" class="brand-link">
                <center>
                    <span class="brand-text font-weight-light">Iuran Kas RT</span>
                </center>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../templates/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="../dashboard" class="d-block"><?= $_SESSION['nama'] ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="../dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php
                            if ($_SESSION['role'] == 'admin') {
                        ?>
                            <li class="nav-item">
                                <a href="../user" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Data User
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../warga" class="nav-link">
                                    <i class="nav-icon fas fa-warga"></i>
                                    <p>
                                        Data Warga
                                    </p>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
              
                        <li class="nav-item">
                            <a href="../iuran" class="nav-link">
                                <i class="nav-icon fas fa-iuran"></i>
                                <p>
                                    Data Iuran
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>