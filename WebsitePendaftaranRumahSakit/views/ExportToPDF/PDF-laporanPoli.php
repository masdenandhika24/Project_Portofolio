<table class="mx-auto w-9/12 mt-8" style="width: 100vw; border: 1px solid black; border-collapse: collapse; padding: 1rem;">
    <tr class="bg-ourAdminStyle" style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Id Poli</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Nama Poli</th>
        <th style='background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Gambar</th>
    </tr>
    <?php foreach ($allPoli as $d) { ?>
        <tr style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->id_poli ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nama_poli ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->poli_image ?></td>
        </tr>
    <?php } ?>
</table>