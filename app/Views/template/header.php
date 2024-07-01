<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AdminLTE Template</title>
    <!-- Memuat Bootstrap CSS -->
    <link href="<?= base_url('AdminLTE-3.2.0/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Memuat AdminLTE CSS -->
    <link href="<?= base_url('AdminLTE-3.2.0/dist/css/adminlte.min.css') ?>" rel="stylesheet">
    <!-- Memuat Font Awesome -->
    <link href="<?= base_url('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <!-- Atur viewport untuk responsif -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link"></a>
            </li>
        </ul>
    </nav>
    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="<?= base_url('AdminLTE-3.2.0/dist/img/AdminLTELogo.png') ?>"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= base_url('AdminLTE-3.2.0/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Hello, <?= session()->get('username') ?: 'Guest' ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                         <li class="nav-item">
                            <a href="<?= base_url('/') ?>" class="nav-link active">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Entry Data
                                </p>
                            </a>
                        </li>

                        <?php if ( session()->get('is_admin') == 1): ?>
                        <li class="nav-item">
                            <a href="<?= base_url('/user/list') ?>" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>List Data & User</p>
                            </a>
                        </li>
                        <?php endif; ?>

                        <li class="nav-item">
                        <a href="<?= base_url('/logout') ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-in-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
