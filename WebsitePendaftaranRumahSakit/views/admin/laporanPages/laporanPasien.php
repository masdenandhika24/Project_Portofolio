<main class="ml-20 mx-auto float-none">
      <div class="no-print md:text-xl ">
        <button id='printer' class="margLeft mt-8 mb-2 md:px-8 md:py-4 px-4 py-2 border-slate-800 text-slate-800 border-1 rounded-xl" type="submit"><i class="fa-solid fa-print"></i> Print</button>
        <a href="<?= base_url('admin/laporan/pasienXls') ?>"><button class="mx-0.5 mt-8 mb-2 md:px-8 md:py-4 px-4 py-2 border-green-500 text-green-500 border-1 rounded-xl" type="submit"><i class="fa-solid fa-file-csv"></i> Excel</button></a>
        <a href="<?= base_url('admin/laporan/pasienPdf') ?>"><button class="mt-8 mb-2 md:px-8 md:py-4 px-4 py-2 border-red-500 text-red-500 border-1 rounded-xl" type="submit"><i class="fa-solid fa-file-pdf"></i> PDF</button></a>
      </div>
      <div class="overflow-x-auto">
      <table class="mx-auto w-9/12 mt-8">
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

    <script>
      $('#printer').on('click', () => {
        window.print()
      })
    </script>