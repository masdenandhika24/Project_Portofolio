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

  <body class="font-josefinSans overflow-x-hidden" style="background:linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('<?= base_url('assets/') ?>img/backgroundImage.jpg'); background-size: cover;  background-attachment: fixed;">
    <header
      class="container px-4 mx-auto flex justify-between items-center relative backdrop-blur-md bg-white/10 rounded-2xl mt-4 py-3"
    >
      <a href="#" class="w-1/6">
        <img src="<?= base_url('assets/') ?>img/Logo.png" />
      </a>
      <span
        id="menuButton"
        class="relative md:hidden w-10 flex hover:scale-110 flex-col cursor-pointer group transition-all"
      >
        <div class="m-1 border-1 transition-all border-black"></div>
        <div class="m-1 border-1 transition-all border-black"></div>
        <div class="m-1 border-1 transition-all border-black"></div>
      </span>
      <nav id="navBar" class="md:flex hidden transition-all">
        <ul class="flex">
          <li class="pl-12 hover:scale-110"><a class="text-white" href="<?= base_url() ?>">Beranda</a></li>
          <li class="group pl-12 relative">
            <span class="text-white" id='dropd' href="#">Dokter <i class="fa-solid fa-angle-down fa-sm"></i> </a>
            <ul
              class="hidden md:pl-12 absolute -left-8 -bottom-16 whitespace-nowrap group-hover:flex flex-col items-center"
            >
              <li class="p-1 hover:bg-white hover:scale-110 rounded-xl">
                <a class="m-2 text-black" href="<?= base_url("info/") ?>listDokter">List Dokter</a>
              </li>
              <li class="p-1 hover:bg-white hover:scale-110 rounded-xl">
                <a class="m-2 text-black" href="<?= base_url("info/") ?>jadwalDokter">Jadwal Dokter</a>
              </li>
            </ul>
          </li>
          <?php if (!empty($this->session->userdata('role'))) { ?>
            <li class="pl-12 hover:scale-110"><a href="<?= base_url('data/') ?>daftar">Data Daftar</a></li>
            <li class="pl-12 hover:scale-110"><a href="#">Selamat datang, <?= $this->session->userdata('nama_pasien') ?></a></li>
            <li class="pl-12 hover:scale-110"><a href="<?= base_url('auth/') ?>logout">Logout</a></li>
          <?php } else { ?>
            <li class="pl-12 hover:scale-110"><a class="text-white" href="<?= base_url('auth/') ?>login">Login</a></li>
          <?php } ?>
        </ul>
      </nav>
    </header>
    <script>
      const toggleNav = () => {
        $("#navBar").toggleClass(
          "hidden bg-white z-50 fixed flex flex-col left-0 right-0 top-16 bottom-0 items-center "
        );
        $("#navBar > ul").toggleClass("flex-col h-full items-center");
        $("#navBar > ul > li").toggleClass("pl-12 mt-16");
        $("#navBar > ul > li > ul").toggleClass("pl-12");

        $("#menuButton").toggleClass("rotate-180 animate-pulse");
        $("#menuButton > div:nth-child(1)").toggleClass(
          "translate-y-2.5 rotate-45"
        );
        $("#menuButton > div:nth-child(2)").toggleClass("border-transparent");
        $("#menuButton > div:nth-child(3)").toggleClass(
          "-translate-y-2.5 -rotate-45"
        );
      };
      $("#menuButton").on("click", () => {
        toggleNav();
      });
      $("#navBar").on("click", () => {
        if ($(window).width() <= 640) {
          toggleNav();
        };
      });
      $('#dropd').on('click', (event) => {
        event.stopPropagation()
      })
    </script>
