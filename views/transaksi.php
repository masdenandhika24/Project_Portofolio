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
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/fontAwesome/css/all.min.css" />
  <script src="<?= base_url('assets/') ?>vendor/fontAwesome/js/all.min.js"></script>

  <!-- JQuery -->
  <script src="<?= base_url('assets/') ?>vendor/jQuery/jQuery.js"></script>

  <title>Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="font-josefinSans overflow-x-scroll">


  <!-- Main Content -->
  <main class="mt-16 container mx-auto">
    <table class="w-full">
      <tr>
        <th class="bg-ourSomeBlue text-white">No.</th>
        <th class="bg-ourSomeBlue text-white">Rincian</th>
        <th class="bg-ourSomeBlue text-white">Harga</th>
      </tr>

      <?php if ($transaksi[0]->pembayaran == 'Asuransi') {} else { ?>
        <tr>
          <td>1.</td>
          <td>Pelayanan Rumah Sakit</td>
          <td>Rp. 200000</td>
        </tr>
      <?php } ?>

      <?php
      $no = 2;
      foreach ($transaksi as $d) { ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $d->nama_obat ?></td>
          <td>Rp. <?= $d->harga ?></td>
        </tr>
      <?php
        $no++;
      } ?>

      <tr>
        <td class="bg-ourSomeBlue text-white text-center" colspan="2">Total Harga</td>
        <?php if ($transaksi[0]->pembayaran == 'Asuransi') { ?>
          <td>Rp. <?= $sum[0]->total ?></td>
          <?php } else { ?>
            <td>Rp. <?= $sum[0]->total + 200000 ?></td>
        <?php } ?>
      </tr>
    </table>
    <hr class="border-1 my-8 w-full border-slate-400" />
    <div class="w-full flex justify-center items-center">
      <a href='<?= base_url("data/pembayaranPDF/") ?><?= $id ?>'><button class="text-center bg-white border-1 rounded-lg py-2 px-6 text-red-500 border-red-500"><i class="fas fa-file-pdf"></i> PDF</button></a>
    </div>
  </main>
  <!-- Close Main Content -->
</body>

</html>