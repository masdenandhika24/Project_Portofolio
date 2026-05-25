<table style="width: 100vw; border: 1px solid black; border-collapse: collapse; padding: 1rem;" >
  <tr style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;" colspan="3">Nama Pasien: <?= $this->session->userdata('nama_pasien') ?></th>
  </tr>
  <tr style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">No.</th>
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">Rincian</th>
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">Harga</th>
    </tr>
    <?php if ($transaksi[0]->pembayaran == 'Asuransi') {} else { ?>
        <tr style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">
          <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">1.</td>
          <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">Pelayanan Rumah Sakit</td>
          <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">Rp. 200000</td>
        </tr>
      <?php } ?>
  <?php
   $no = 2;
      foreach ($transaksi as $d) { ?>
        <tr style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'>
          <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $no ?></td>
          <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nama_obat ?></td>
          <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Rp. <?= $d->harga ?></td>
        </tr>
      <?php
        $no++;
      } ?>
  <tr>
        <th class="bg-ourSomeBlue text-white text-center" style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;" colspan="2">Total Harga</td>
        <?php if ($transaksi[0]->pembayaran == 'Asuransi') { ?>
          <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">Rp. <?= $sum[0]->total ?></td>
          <?php } else { ?>
            <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">Rp. <?= $sum[0]->total + 200000 ?></td>
        <?php } ?>
      </tr>
</table>