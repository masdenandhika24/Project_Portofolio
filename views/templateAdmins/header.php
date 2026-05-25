<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="<?= base_url('assets/') ?>img/Logo.png" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/styles.css" />

    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/fontAwesome/css/all.min.css" />
    <script src="<?= base_url('assets/') ?>vendor/fontAwesome/js/all.min.js"></script>

    <!-- JQuery -->
    <script src="<?= base_url('assets/') ?>vendor/jQuery/jQuery.js"></script>

    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <style type="text/css" media="print">
   .no-print { display: none; }
  </style>
  <style>
      .margLeft {margin-left: 0.2rem}

    @media (min-width: 720px) {
      .margLeft {margin-left: 13.5rem}
    }
  </style>

  <body class="font-josefinSans overflow-x-hidden">
    
    <aside class="no-print px-2 md:px-4 lg:px-8 float-left w- md:w-56 lg:w-80 pb-8 overflow-y-auto sticky bottom-0 top-0 left-0 h-screen text-white bg-ourAdminStyle ">
      <nav class="flex flex-col items-center">
        <a href="<?= base_url('admin/') ?>dashboard" class="w-full">
          <img src="<?= base_url('assets/') ?>img/LogoWhite.png" class="w-16 md:w-24" />
        </a>
        <hr class="w-full" />
        <h5 class="opacity-75 w-full ">Data</h5>
        <ul class="pl-2 w-full flex flex-col items-center md:px-4">
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/data/') ?>pasien" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-hospital-user"></i> <span class="data-toggling hidden md:inline">Data Pasien</span></a></li>
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/data/') ?>pendaftar" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-table"></i> <span class="data-toggling hidden md:inline">Data Pendaftar</span></a></li>
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/data/') ?>poli" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-house-chimney-medical"></i></i> <span class="data-toggling hidden md:inline">Data Poli</span></a></li>
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/data/') ?>dokter" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-user-doctor"></i> <span class="data-toggling hidden md:inline">Data Dokter</span></a></li>
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/data/') ?>obat" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-tablets"></i> <span class="data-toggling hidden md:inline">Data Obat</span></a></li>
        </ul>
        <hr class="w-full" />
        <h5 class="opacity-75 w-full ">Laporan</h5>
        <ul class="pl-2 w-full flex flex-col items-center md:px-4">
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/laporan/') ?>pasien" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-hospital-user"></i> <span class="data-toggling hidden md:inline">Laporan Pasien</span></a></li>
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/laporan/') ?>pendaftar" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-table"></i> <span class="data-toggling hidden md:inline">Laporan Pendaftar</span></a></li>
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/laporan/') ?>poli" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-house-chimney-medical"></i></i> <span class="data-toggling hidden md:inline">Laporan Poli</span></a></li>
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/laporan/') ?>dokter" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-user-doctor"></i> <span class="data-toggling hidden md:inline">Laporan Dokter</span></a></li>
          <li class="my-4 md:my-8 md:w-full"><a href="<?= base_url('admin/laporan/') ?>obat" class="flex items-center"><i class="fa-solid fa-xl mr-4 fa-tablets"></i> <span class="data-toggling hidden md:inline">Laporan Obat</span></a></li>
        </ul>
      </nav>
    </aside>
    <header class="flex justify-between items-center text-white bg-ourAdminStyle py-2 px-4 md:py-4 md:px-20">
      <span class="text-xl md:text-5xl"><?= $title ?></span>
      <a href="<?= base_url('auth/') ?>logout" class="text-xs md:text-lg">Admin <i class="fa-solid fa-arrow-right-from-bracket fa-xl"></i></a>
    </header>