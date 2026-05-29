<main class="ml-20 mx-auto float-none py-8">
      <span class="text-xl md:text-4xl p-4">Table Data Pendaftar: </span>
      <div class="overflow-x-auto">
      <table style="width: 90%;" class="mx-auto w-9/12 mt-8">
        <tr class="bg-ourAdminStyle">
          <th>Kode Pendaftaran</th>
          <th>Nama Pasien</th>
          <th>Poli Tujuan</th>
          <th>Tanggal Periksa</th>
          <th>Pembayaran</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        <?php foreach($allPendaftar as $d) { ?>
        <tr>
          <td><?= $d->kode_pendaftaran ?></td>
          <td><?= $d->nama_pasien ?></td>
          <td><?= $d->nama_poli ?></td>
          <td><?= $d->tgl_daftar ?></td>
          <td><?= $d->pembayaran ?></td>
          <td><?= $d->status_periksa ?></td>
          <td>
            <div class="flex flex-col items-center">

            <?php if ($d->status_periksa == 'Belum Diperiksa') { ?>
              <a class="border-1 rounded-3xl border-green-700 text-green-700 py-2 px-4 my-2 w-full text-center" href="<?= base_url('admin/data/') ?>pilihObat/<?= $d->kode_pendaftaran ?>"><i class="fa-solid fa-circle-plus"></i> Tambahkan Obat</a>
              <a class="border-1 rounded-3xl border-red-700 text-red-700 py-2 px-4 my-2 w-full text-center" href="<?= base_url('admin/data/') ?>lanjutTagihanDaftar/<?= $d->kode_pendaftaran ?>"><i class="fa-solid fa-cash-register"></i> Lanjut Tagihan</a>
            <?php } ?>

            <?php if ($d->status_periksa == 'Tagihan Pembayaran') { ?>
              <a class="border-1 rounded-3xl border-black py-2 px-4 my-2 w-full text-center" href="<?= base_url('data/pembayaran/') ?><?= $d->id_transaksi ?>"><i class="fa-solid fa-eye"></i></a>
              <a class="border-1 rounded-3xl border-blue-700 text-blue-700 py-2 px-4 my-2 w-full text-center" href="<?= base_url('admin/data/') ?>selesaiDaftar/<?= $d->kode_pendaftaran ?>"><i class="fa-solid fa-list-check"></i> Selesai</a>
            <?php } ?>

            <?php if ($d->status_periksa == 'Selesai') { ?>
              <a class="border-1 rounded-3xl border-green-500 text-green-500 py-2 px-4 my-2 w-full text-center" href="<?= base_url('admin/laporan/') ?>pendaftar">Selesai</a>
              <a class="border-1 rounded-3xl border-black py-2 px-4 my-2 w-full text-center" href="<?= base_url('data/pembayaran/') ?><?= $d->id_transaksi ?>"><i class="fa-solid fa-eye"></i></a>
            <?php } ?>            
          
            </div>
          </td>
        </tr>
        <?php } ?>
      </table>
      </div>
    </main>