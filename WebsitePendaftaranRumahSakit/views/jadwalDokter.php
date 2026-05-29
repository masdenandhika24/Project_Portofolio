<?php $arrPoli = array() ?>

<main class="container mx-auto">
      <img class="mx-auto" src="<?= base_url('assets/') ?>img/medicalInfoImage.png" width="800" alt="Welcome Image">
      <section class="bg-white px-4 flex justify-center items-start my-12 w-full rounded-3xl -translate-y-12 flex-wrap">
        
        <h1 class="absolute whitespace-nowrap left-0 -top-2">_*Siang 13:00 ~ 15:00, Malam 19:00 ~ 22:00</h1>

        <?php foreach ($dbResult as $d) {?>
          <?php if (in_array($d->id_poli, $arrPoli)) {} else { ?>
          <div class="dktExpand relative w-full my-10">
            <div class="peer text-center cursor-pointer">
              <h6 class="text-2xl"><?= $d->nama_poli ?> <i class="fa-solid fa-angle-down fa-sm"></i></h6>
            </div>

            <?php foreach ($dbResult as $dd) {?>
              <?php if ($d->id_poli === $dd->id_poli) { ?>
                <div class="relative md:peer-hover:hidden peer-hover:block hidden w-full">
              <div class="grid grid-cols-1">
                <div class="grid grid-cols-2 mb-4">
                  <span class="border-1 bg-ourCream text-center">Dokter</span>
                  <span class="border-1 bg-white text-center"><?= $dd->nama_dokter ?></span>

                  <span class="border-1 bg-ourCream text-center">Senin</span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>

                  <span class="border-1 bg-ourCream text-center">Selasa</span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>

                  <span class="border-1 bg-ourCream text-center">Rabu</span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>

                  <span class="border-1 bg-ourCream text-center">Kamis</span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>

                  <span class="border-1 bg-ourCream text-center">Jumat</span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>

                  <span class="border-1 bg-ourCream text-center">Sabtu</span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>
                </div>
                
              </div>
            </div>
            <div class="relative md:peer-hover:block peer-hover:hidden hidden w-full">
              <div class="grid grid-cols-7 ">
                  <span class="border-1 bg-ourCream text-center">Dokter</span>
                  <span class="border-1 bg-ourCream text-center">Senin</span>
                  <span class="border-1 bg-ourCream text-center">Selasa</span>
                  <span class="border-1 bg-ourCream text-center">Rabu</span>
                  <span class="border-1 bg-ourCream text-center">Kamis</span>
                  <span class="border-1 bg-ourCream text-center">Jumat</span>
                  <span class="border-1 bg-ourCream text-center">Sabtu</span>

                  <span class="border-1 bg-white text-center"><?= $dd->nama_dokter ?></span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>
                  <span class="border-1 bg-white text-center"><?= $dd->shift ?></span>
              </div>
            </div>
              <?php }
              array_push($arrPoli, $d->id_poli);
            } ?>



          </div>
          <?php } ?>
          <?php } ?>


      </section>
    </main>