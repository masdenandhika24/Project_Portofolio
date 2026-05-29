<main class="">
      <section class="py-4 px-8 flex flex-wrap items-center justify-evenly">

        <div class="flex flex-col bg-pasien m-4 w-72 h-48 justify-around items-center rounded-lg p-4 text-white">
          <span class="flex justify-around items-center w-full">
            <i class="fa-solid fa-people-group fa-2xl"></i> <span class="text-3xl"><?= $pasienRecord ?></span>
          </span>
          <span class="text-center text-2xl">
            Jumlah Pasien
          </span>
        </div>
        <div class="flex flex-col bg-dokter m-4 w-72 h-48 justify-around items-center rounded-lg p-4 text-white">
          <span class="flex justify-around items-center w-full">
            <i class="fa-solid fa-user-doctor fa-2xl"></i> <span class="text-3xl"><?= $dokterRecord ?></span>
          </span>
          <span class="text-center text-2xl">
            Jumlah Dokter
          </span>
        </div>
        <div class="flex flex-col bg-pendaftar m-4 w-72 h-48 justify-around items-center rounded-lg p-4 text-white">
          <span class="flex justify-around items-center w-full">
            <i class="fa-solid fa-hospital-user fa-2xl"></i> <span class="text-3xl"><?= $pendaftarRecord ?></span>
          </span>
          <span class="text-center text-2xl">
            Jumlah Pendaftar
          </span>
        </div>
        <div class="flex flex-col bg-poli m-4 w-72 h-48 justify-around items-center rounded-lg p-4 text-white">
          <span class="flex justify-around items-center w-full">
            <i class="fa-solid fa-house-medical fa-2xl"></i> <span class="text-3xl"><?= $poliRecord ?></span>
          </span>
          <span class="text-center text-2xl">
            Jumlah Poli
          </span>
        </div>
        <div class="flex flex-col bg-pembayaran m-4 w-72 h-48 justify-around items-center rounded-lg p-4 text-white">
          <span class="flex justify-around items-center w-full">
            <i class="fa-solid fa-money-bill-wave fa-2xl"></i> <span class="text-3xl"><?= $pembayaranRecord ?></span>
          </span>
          <span class="text-center text-2xl">
            Jumlah Pembayaran
          </span>
        </div>
        <div class="flex flex-col bg-telahDiperiksa m-4 w-72 h-48 justify-around items-center rounded-lg p-4 text-white">
          <span class="flex justify-around items-center w-full">
            <i class="fa-solid fa-check fa-2xl"></i> <span class="text-3xl"><?= $selesaiRecord ?></span>
          </span>
          <span class="text-center text-2xl">
            Jumlah Pasien Selesai Diperksa
          </span>
        </div>
        <div class="flex flex-col bg-belumDiperiksa m-4 w-72 h-48 justify-around items-center rounded-lg p-4 text-white">
          <span class="flex justify-around items-center w-full">
            <i class="fa-solid fa-x fa-2xl"></i> <span class="text-3xl"><?= $belumRecord ?></span>
          </span>
          <span class="text-center text-2xl">
            Jumlah Pasien Belum Diperiksa
          </span>
        </div>
        <div class="flex flex-col bg-obat m-4 w-72 h-48 justify-around items-center rounded-lg p-4 text-white">
          <span class="flex justify-around items-center w-full">
            <i class="fa-solid fa-capsules fa-2xl"></i> <span class="text-3xl"><?= $obatRecord ?></span>
          </span>
          <span class="text-center text-2xl">
            Jumlah Obat
          </span>
        </div>

      </section>
    </main>