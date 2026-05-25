<table style="width: 100vw; border: 1px solid black; border-collapse: collapse; padding: 1rem;" >
  <tr style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;" colspan="5">Nama Pasien: Lorem</th>
  </tr>
  <tr style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">No.</th>
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">Poli</th>
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">Nama Dokter</th>
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">Tanggal Periksa</th>
    <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">Jam Periksa</th>
  </tr>
  <?php 
      $no = 1;
      foreach($dataPendaftar as $d) { ?>
        <tr>
          <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;"><?= $no ?></td>
          <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;"><?= $d->nama_poli ?></td>
          <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;"><?= $d->nama_dokter ?></td>
          <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;"><?= $d->tgl_daftar ?></td>
          <?php if ($d->shift === 'Malam') { ?>
            <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">19:00 - 22:00</td>
          <?php } else { ?>
            <td style="border: 1px solid black; border-collapse: collapse; padding: 1rem;">12:00 - 15:00</td>
          <?php } ?>
        </tr>
      <?php 
      $no++;
      } ?>
</table>