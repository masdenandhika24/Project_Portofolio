<main class="mx-auto float-none py-8">
  <form class="border-2 flex items-center justify-center w-1/3 mx-auto text-4xl rounded-3xl p-4">
    <input class="focus:outline-none" placeholder="Cari Obat Disini" type="search" /> <i class="fa-solid fa-magnifying-glass"></i>
  </form>
  <section class="mt-12 text-red-500 grid gap-4 grid-cols-4 px-20 items-center justify-evenly">

    <?php foreach ($allObat as $d) { ?>
      <div class="my-4 text-3xl border-1 rounded-2xl flex items-center justify-around px-6 py-4">
        <i class="fa-solid fa-tablets"></i>
        <span class="m-4"><?= $d->nama_obat ?></span>
        <a href="<?= base_url('admin/data/tambahTransaksiObat/') ?><?= $kode_daftar ?>/<?= $d->id_obat ?>"><i class="fa-solid fa-circle-plus"></i></a>
      </div>
      <script>
        console.log(<?= $d->nama_obat ?>);
      </script>
    <?php } ?>

  </section>
</main>