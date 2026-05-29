<main class="ml-20 mx-auto float-none py-8">
      <span class="text-xl md:text-4xl p-4">Table Data Pasien: </span>
      <div class="overflow-x-auto">
      <table style="width: 90%;" class="mx-auto w-9/12 mt-8">
        <tr class="bg-ourAdminStyle">
          <th>Id Pasien</th>
          <th>NIK</th>
          <th>Nama Pasien</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Nama Orang Tua</th>
          <th>Jenis Kelamin</th>
        </tr>
        <?php foreach($allPasien as $d) { ?>
          <tr>
          <td><?= $d->id_pasien ?></td>
          <td><?= $d->nik ?></td>
          <td><?= $d->nama_pasien ?></td>
          <td><?= $d->tanggal_lahir ?></td>
          <td><?= $d->alamat ?></td>
          <td><?= $d->nama_ortu ?></td>
          <td><?= $d->jenis_kelamin ?></td>
        </tr>
        <?php } ?>
      </table>
      </div>
    </main>