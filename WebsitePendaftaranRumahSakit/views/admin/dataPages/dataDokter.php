<main class="ml-20 mx-auto float-none py-8">
  <section id="openState" class="hidden">
    <span class="text-xl md:text-4xl p-4">Tambah Dokter</span>
    <form method="POST" action="<?= base_url('admin/data/') ?>tambahDokter" class="text-lg flex flex-col">
      <label class="ml-20 mt-4">
        <span class="mr-12">NIK: </span>
        <input name="nik" type="text" minlength="16" maxlength="20" class="border-1 p-4 rounded-xl w-8/12 float-right mr-20" />
      </label>
      <?php echo form_error('nik','<div class="ml-20 text-lg text-red-500">','</div>') ?>
      <label class="ml-20 mt-4">
        <span class="mr-12">Poli: </span>
        <select name="poli" type="text" class="border-1 p-4 rounded-xl w-8/12 float-right mr-20">
          <option value="">--Pilih Poli--</option>
          <?php foreach ($allPoli as $d) { ?>
            <option value="<?= $d->id_poli ?>"><?= $d->nama_poli ?></option>
          <?php } ?>
        </select>
      </label>
      <?php echo form_error('poli','<div class="ml-20 text-lg text-red-500">','</div>') ?>
      <label class="ml-20 mt-4">
        <span class="mr-12">Nama Dokter: </span>
        <input name="nama" type="text" class="border-1 p-4 rounded-xl w-8/12 float-right mr-20" />
      </label>
      <?php echo form_error('nama','<div class="ml-20 text-lg text-red-500">','</div>') ?>
      <label class="ml-20 mt-4">
        <span class="mr-12">Shift: </span>
        <select name="shift" type="text" class="border-1 p-4 rounded-xl w-8/12 float-right mr-20">
          <option value="">--Pilih Shift--</option>
          <option value="Siang" >Siang</option>
          <option value="Malam" >Malam</option>
        </select>
      </label>
      <?php echo form_error('shift','<div class="ml-20 text-lg text-red-500">','</div>') ?>
      <label class="ml-20 mt-4">
        <span class="mr-12">Jenis Kelamin: </span>
        <select name="jenis_kelamin" type="text" class="border-1 p-4 rounded-xl w-8/12 float-right mr-20">
          <option value="">--Pilih Jenis Kelamin--</option>
          <option value="Laki-Laki" >Laki-Laki</option>
          <option value="Perempuan" >Perempuan</option>
        </select>
      </label>
      <?php echo form_error('jenis_kelamin','<div class="ml-20 text-lg text-red-500">','</div>') ?>
      <label class="ml-20 mt-4">
        <span class="mr-12">TTL: </span>
        <input name="ttl" type="text" class="border-1 p-4 rounded-xl w-8/12 float-right mr-20" />
      </label>
      <?php echo form_error('ttl','<div class="ml-20 text-lg text-red-500">','</div>') ?>
      <label class="ml-20 mt-4">
        <span class="mr-12">Alamat: </span>
        <input name="alamat" type="text" class="border-1 p-4 rounded-xl w-8/12 float-right mr-20" />
      </label>
      <?php echo form_error('alamat','<div class="ml-20 text-lg text-red-500">','</div>') ?>
      <button class="m-4 p-2  border-1 bg-white border-black text-black rounded-xl" type="submit">Tambah Dokter</button>
    </form>
  </section>

  <section id="closeState" class="flex mb-12">
    <button class="md:text-xl mx-4 py-4 px-8 border-1 bg-white border-black text-black rounded-xl" type="button">Tambah Dokter</button>
  </section>


  <span class="text-xl md:text-4xl p-4">Table Data Dokter: </span>
  <div class="overflow-x-auto">
  <table style="width: 90%;" class="mx-auto w-9/12 mt-8 ">
    <tr class="bg-ourAdminStyle">
      <th>NIK</th>
      <th>Poli</th>
      <th>Nama Dokter</th>
      <th>Shift</th>
      <th>Jenis Kelamin</th>
      <th>TTL</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
    <?php foreach ($allDokter as $d) { ?>
      <form method='POST' action="<?= base_url('admin/data/dokterEdit') ?>">
      <tr>
      <input type="hidden" name="id" value="<?= $d->id_dokter ?>" />
      <input type="hidden" name="image" value="<?= $d->image ?>" />
        <td><input disabled class="toggleInput" type="text" name="nik" value="<?= $d->nik ?>" /></td>
        <td><select disabled class="toggleInput" type="text" name="poli">
          <option  value="<?= $d->id_poli ?>"><?= $d->nama_poli ?></option>
          <?php foreach ($allPoli as $l) { ?>
            <option value="<?= $l->id_poli ?>"><?= $l->nama_poli ?></option>
          <?php } ?>
        </select></td>
        <td><input disabled class="toggleInput" type="text" name="dokter" value="<?= $d->nama_dokter ?>" /></td>

        <td><select disabled class="toggleInput" name="shift" value="<?= $d->shift ?>">
          <?php if ($d->shift === 'Siang') { ?>
            <option value="Siang">Siang</option>
            <option value="Malam">Malam</option>
          <?php } else { ?>
            <option value="Malam">Malam</option>
            <option value="Siang">Siang</option>
          <?php } ?>
        </select></td>
        <td><select disabled class="toggleInput" name="kelamin" value="<?= $d->jenis_kelamin ?>">
          <?php if ($d->jenis_kelamin === 'Laki-Laki') { ?>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          <?php } else { ?>
            <option value="Perempuan">Perempuan</option>
            <option value="Laki-Laki">Laki-Laki</option>
          <?php } ?>
        </select></td>

        <td><input disabled class="toggleInput" type="text" name="ttl" value="<?= $d->ttl ?>"></td>
        <td><input disabled class="toggleInput" type="text" name="alamat" value="<?= $d->alamat ?>" /></td>
        <th><a class="text-red-500" href="<?= base_url('admin/data/hapusDokter/') ?><?= $d->id_dokter ?>"><i class="fa-solid fa-trash fa-lg"></i></a>
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

<?php echo form_error('nik','<script> setTimeout(trig, 250) </script><p class="hidden">','</p>') ?>
<?php echo form_error('poli','<script> setTimeout(trig, 250) </script><p class="hidden">','</p>') ?>
<?php echo form_error('nama','<script> setTimeout(trig, 250) </script><p class="hidden">','</p>') ?>
<?php echo form_error('shift','<script> setTimeout(trig, 250) </script><p class="hidden">','</p>') ?>
<?php echo form_error('kelamin','<script> setTimeout(trig, 250) </script><p class="hidden">','</p>') ?>
<?php echo form_error('ttl','<script> setTimeout(trig, 250) </script><p class="hidden">','</p>') ?>
<?php echo form_error('alamat','<script> setTimeout(trig, 250) </script><p class="hidden">','</p>') ?>