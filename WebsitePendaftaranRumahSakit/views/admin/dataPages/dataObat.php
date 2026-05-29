<main class="ml-20 mx-auto float-none py-8">
  <section id="openState" class="hidden">
    <span class="text-xl md:text-4xl p-4">Tambah Obat: </span>
    <form method="POST" action="<?= base_url('admin/data/') ?>tambahObat" class="text-lg flex flex-col">
      <label class="ml-20 mt-4">
        <span class="mr-12">Nama Obat: </span>
        <input name="nama" type="text" class="border-1 p-4 rounded-xl w-8/12 float-right mr-20" />
      </label>
      <?php echo form_error('nama','<div class="ml-20 text-lg text-red-500">','</div>') ?>
      <label class="ml-20 mt-4">
        <span class="mr-12">Harga Obat: </span>
        <input name="harga" type="number" class="border-1 p-4 rounded-xl w-8/12 float-right mr-20" />
      </label>
      <?php echo form_error('harga','<div class="ml-20 text-lg text-red-500">','</div>') ?>
      <button class="m-4 p-2  border-1 bg-white border-black text-black rounded-xl" type="submit">Tambah Obat</button>
    </form>
  </section>

  <section id="closeState" class="flex mb-12">
    <button class="md:text-xl mx-4 py-4 px-8 border-1 bg-white border-black text-black rounded-xl" type="button">Tambah Obat</button>
  </section>

  <span class="text-xl md:text-4xl p-4">Table Data Obat: </span>
  <div class="overflow-x-auto">
  <table style="width: 90%;" class="mx-auto w-9/12 mt-8">
    <tr class="bg-ourAdminStyle">
      <th>Id Obat</th>
      <th>Nama Obat</th>
      <th>Harga Obat</th>
      <th>Aksi</th>
    </tr>
    <?php foreach ($allObat as $d) { ?>
      <form method="POST" action="<?= base_url('admin/data/obatEdit') ?>">
        <tr>
          <td><input class="toggleInput" name='id' disabled type="text" value="<?= $d->id_obat ?>" /></td>
          <td><input name='nama' class="toggleInput" disabled type="text" value="<?= $d->nama_obat ?>" /></td>
          <td>Rp. <input name='harga' class="toggleInput" disabled type="text" value="<?= $d->harga ?>" /></td>
          <th>
            <a class="text-red-500" href="<?= base_url('admin/data/hapusObat/') ?><?= $d->id_obat ?>"><i class="fa-solid fa-trash fa-lg"></i></a>
            <button id="" type="button" class="btnToggle text-blue-500"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
            <button id="" type="submit" class="btnSub text-blue-500 hidden"><i class="fa-solid fa-check fa-lg"></i></a>
          </th>
        </tr>
      </form>
    <?php } ?>
  </table>
  </div>
</main>



<script>
  $('#closeState').on('click', () => {
    $('#closeState').hide()
    $('#openState').show()
  })

  $('.btnToggle').on('click', () => {
    $('.btnSub').removeClass('hidden')
    $('.btnToggle').addClass('hidden')
    $('.toggleInput').removeAttr('disabled')
  })

  function trig () {
    document.getElementById('closeState').click();
  }
</script>

<?php echo form_error('nama','<script> setTimeout(trig, 250) </script><p class="hidden">','</p>') ?>
<?php echo form_error('harga','<script> setTimeout(trig, 250) </script><p class="hidden">','</p>') ?>