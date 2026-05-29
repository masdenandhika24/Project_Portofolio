<main class="container mx-auto">
  <img class="mx-auto" src="<?= base_url('assets/') ?>img/medicalInfoDoctorImage.png" width="800" alt="Welcome Image">
  <section class="flex flex-wrap justify-around items-start my-12 w-full rounded-3xl -translate-y-12 min-h-screen">

    <?php foreach ($dbResult as $d) { ?>
      <div class="transition-all m-8 bg-ourDarkCyan text-white h-48 w-44 hover:h-64 overflow-hidden md:h-100 md:hover:h-110 md:w-96 rounded-xl">
        <img src="<?= base_url('assets/') ?>img/doctor/<?= $d->image ?>" class="border-b h-48 md:h-100 w-full bg-contain" />
        <div class="text-center mt-2">
          <h1 class="mx-auto text-lg font-bold"><?= $d->nama_dokter ?></h1>
          <h6 class="mx-auto"><?= $d->nama_poli ?></h6>
        </div>
      </div>
    <?php } ?>
  </section>
</main>