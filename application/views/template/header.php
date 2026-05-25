<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APLIKASI LAPTOPKU</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- Datatables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css'); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>">

    <!-- CUSTOM THEME (INI PENTING UNTUK 1 TEMA) -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/theme.css'); ?>">
</head>

<body class="hold-transition sidebar-mini theme-bg">

<div class="wrapper">

    <!-- HEADER -->
    <header class="main-header">

        <a href="<?php echo site_url(); ?>" class="logo">
            <span class="logo-mini"><b>LK</b></span>
            <span class="logo-lg"><b>LAPTOPKU</b></span>
        </a>

        <nav class="navbar navbar-static-top">

            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

        </nav>

    </header>

    <!-- SIDEBAR -->
    <aside class="main-sidebar">
        <section class="sidebar">

            <ul class="sidebar-menu">
                <li class="header">MENU</li>

                <?php $this->load->view('template/menu'); ?>

            </ul>

        </section>
    </aside>

    <!-- CONTENT -->
    <div class="content-wrapper">
        <section class="content">