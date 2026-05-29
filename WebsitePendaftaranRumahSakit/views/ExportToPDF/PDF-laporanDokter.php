<table class="mx-auto w-9/12 mt-8" style="width: 100vw; border: 1px solid black; border-collapse: collapse; padding: 1rem;">
    <tr style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>NIK</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Poli</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Nama Dokter</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Shift</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Jenis Kelamin</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>TTL</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Alamat</th>
    </tr>
    <?php foreach ($allDokter as $d) { ?>
        <tr style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nik ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nama_poli ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nama_dokter ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->shift ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->jenis_kelamin ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->ttl ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->alamat ?></td>
        </tr>
    <?php } ?>
</table>