<table style="width: 100vw; border: 1px solid black; border-collapse: collapse; padding: 1rem;" class="mx-auto w-9/12 mt-8">
    <tr style="border: 1px solid black; border-collapse: collapse; padding: 1rem;" class="bg-ourAdminStyle">
        <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">Id Obat</th>
        <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">Nama Obat</th>
        <th style="background-color: #54649F; color: #fff; border: 1px solid black; border-collapse: collapse; padding: 1rem;">Harga Obat</th>
    </tr>
    <?php foreach ($allObat as $d) { ?>
        <tr style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->id_obat ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'><?= $d->nama_obat ?></td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 1rem;'>Rp. <?= $d->harga ?></td>
        </tr>
    <?php } ?>
</table>