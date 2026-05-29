<table class="mx-auto w-9/12 mt-8" style="width: 100vw; border: 1px solid black; border-collapse: collapse; padding: 1rem;">
    <tr style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;" class="bg-ourAdminStyle" >
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Id Pasien</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>NIK</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Nama Pasien</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Tanggal Lahir</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Alamat</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Nama Orang Tua</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Jenis Kelamin</th>
    </tr>
    <?php foreach ($allPasien as $d) { ?>
        <tr style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->id_pasien ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nik ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nama_pasien ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->tanggal_lahir ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->alamat ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nama_ortu ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->jenis_kelamin ?></td>
        </tr>
    <?php } ?>
</table>