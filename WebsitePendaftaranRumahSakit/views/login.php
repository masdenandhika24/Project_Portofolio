<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="<?= base_url('assets/') ?>img/Logo.png" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/styles.css" />

    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/fontAwesome/css/all.min.css" />
    <script src="<?= base_url('assets/') ?>vendor/fontAwesome/js/all.min.js"></script>

    <!-- JQuery -->
    <script src="<?= base_url('assets/') ?>vendor/jQuery/jQuery.js"></script>

    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body
    class="font-josefinSans bg-ourCyan overflow-x-hidden"
    style="background-color: #b4e9fe"
  >
    <!-- Main Content -->
    <main class="container mx-auto">
      <div class="flex flex-wrap w-full md:flex-nowrap min-h-screen">
        <img
          class="m-auto md:w-5/6 md:h-1/2 bg-contain"
          src="<?= base_url('assets/') ?>img/authImage.png"
          alt="Welcome Image"
        />
        <form action="<?= base_url('auth/') ?>login" method="POST" class="flex flex-col justify-center w-full md:w-5/6">
          <h1 class="mx-auto text-center md:pr-52 py-4 text-3xl font-bold">Login</h1>
          <label class="my-2 mx-auto">
            <span class="text-lg block">Email</span>
            <input name="username" class="rounded-lg py-2 px-2 md:w-72" type="email" />
            <?php echo form_error('username','<div class="text-lg text-red-500">','</div>') ?>
          </label>
          <label class="my-2 mx-auto">
            <span class="text-lg block">Password</span>
            <input name="password" class="rounded-lg py-2 px-2 md:w-72" type="password" />
            <?php echo form_error('password','<div class="text-lg text-red-500">','</div>') ?>
          </label>
          <h6 class="pr-12 mx-auto">Tidak Punya Akun? <a class="text-blue-500" href="<?= base_url('register') ?>">Daftar Disini</a></h6>
          <button class="m-4 p-2 mx-auto border-1 bg-white border-blue-500 text-blue-500 rounded-xl w-24" type="submit">Log in</button>
        </form>
      </div>
    </main>
    <!-- Close Main Content -->
  </body>
</html>
