<table class="mx-auto w-9/12 mt-8"style="width: 100vw; border: 1px solid black; border-collapse: collapse; padding: 1rem;">
    <tr class="bg-ourAdminStyle" style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Kode Pendaftaran</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Nama Pasien</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Poli Tujuan</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Tanggal Periksa</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Pembayaran</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Status</th>
    </tr>
    <?php foreach ($allPendaftar as $d) { ?>
        <tr style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->kode_pendaftaran ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nama_pasien ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nama_poli ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->tgl_daftar ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->pembayaran ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->status_periksa ?></td>
        </tr>
    <?php } ?>
</table>