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

    <title>Daftar Pasien</title>
  </head>

  <body
    class="font-josefinSans overflow-x-hidden"
    style="
      background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
        url('<?= base_url('assets/') ?>img/backgroundImage.png');
      background-size: cover;
      background-attachment: fixed;
    "
  >
    <header class="bg-ourCyan flex items-center justify-around">
      <a href="<?= base_url() ?>" class="w-1/6">
        <img src="<?= base_url('assets/') ?>img/Logo.png" class="h-20 md:h-32" />
      </a>
      <h1 class="text-center md:text-xl">
        Form Daftar Diri Pasien Rumah Sakit
      </h1>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto">
      <form class="mt-10 p-2" method="POST" action="<?= base_url('poli/daftar/') ?><?= $idPoli ?>">
        <input name="idPoli" type="hidden" value="<?= $idPoli ?>">
        <input name="idPasien" type="hidden" value="<?= $this->session->userdata('id_pasien') ?>">
        <label class="mb-10 flex w-full justify-between">
          <span class="md:py-4 bg-white text-center px-1 py-2 flex-2 md:flex-1"
            >Pilih Tanggal</span
          >
          <span class="md:py-4 text-center p-1 flex-1">:</span>
          <input id="txtDate" name="tanggal" class="px-1 py-2 flex-2" type="date" />
        </label>
				<?= form_error('tanggal', '<div class="text-red-500">', '</div>') ?>
        <label class="mb-10 flex w-full justify-between">
          <span class="md:py-4 bg-white text-center px-1 py-2 flex-2 md:flex-1"
            >Pilih Jadwal</span
          >
          <span class="md:py-4 text-center p-1 flex-1">:</span>
          <select name="jadwal" class="px-1 py-2 flex-2">
            <?php if(!empty($dataDokter)) { ?>
              <?php foreach($dataDokter as $d) { ?>
                <option value="<?= $d->id_dokter ?>"><?= $d->nama_dokter ?> ~ <?= $d->shift ?></option>
              <?php } ?>
              <?php } else { ?>
                <option>Dokter Tidak Ada</option>
              <?php } ?>
          </select>
        </label>
				<?= form_error('jadwal', '<div class="text-red-500">', '</div>') ?>
        <label class="mb-10 flex w-full justify-between">
          <span class="md:py-4 bg-white text-center px-1 py-2 flex-2 md:flex-1"
            >Pilih Pembayaran</span
          >
          <span class="md:py-4 text-center p-1 flex-1">:</span>
          <select name="pembayaran" class="px-1 py-2 flex-2">
            <option>--Pembayaran--</option>
            <option value="pribadi">Pribadi</option>
            <option value="asuransi">Asuransi</option>
          </select>
        </label>
				<?= form_error('pembayaran', '<div class="text-red-500">', '</div>') ?>
        <div class="flex w-full justify-around mt-16">
          <button
            type="reset"
            class="bg-white px-6 py-2 md:px-8 md:py-4 border-1 border-red-500 text-red-500 rounded-xl"
          >
            <i class="fa-solid fa-trash-can"></i> Reset
          </button>
          <button
            type="submit"
            class="bg-white px-6 py-2 md:px-8 md:py-4 border-1 border-blue-500 text-blue-500 rounded-xl"
          >
            <i class="fa-solid fa-floppy-disk"></i> Submit
          </button>
        </div>
      </form>
    </main>
    <!-- Close Main Content -->
    <script>
      var dtToday = new Date();

      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if (month < 10) month = "0" + month.toString();
      if (day < 10) day = "0" + day.toString();
      var minDate = year + "-" + month + "-" + day;

      $("#txtDate").attr("min", minDate);
    </script>
  </body>
</html>
