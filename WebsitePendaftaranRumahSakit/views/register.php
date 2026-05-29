<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="icon" href="<?= base_url('assets/') ?>img/Logo.png" />

	<!-- Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

	<!-- TailwindCss -->
	<script src="<?= base_url('assets/') ?>js/tailwind.js"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					colors: {
						'ourTeal': '#B4E9FE'
					},
					fontFamily: {
						josefinSans: 'Josefin Sans'
					},
					backgroundSize: {
						'100': '50% 50%',
					}
				}
			}
		}
	</script>

	<!-- JQuery -->
	<script src="<?= base_url('assets/') ?>vendor/jQuery/jQuery.js"></script>

	<!-- FontAwesome -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/fontAwesome/css/all.min.css" />
	<script src="<?= base_url('assets/') ?>vendor/fontAwesome/js/all.min.js"></script>


	<title> <?= $title ?> </title>
</head>

<body class='font-josefinSans overflow-x-hidden bg-cover text-2xl'>
	<main class="flex flex-wrap justify-evenly bg-ourTeal min-h-screen items-center bg-100 w-full">

		<header class="shadow-xl fixed top-0 left-0 right-0 bg-ourTeal secondForm hidden">
			<nav class="container flex justify-around items-center">
				<a href='<?= base_url() ?>' class="ml-5 md:ml-0 h-28 w-20">
					<img src="<?= base_url('assets/') ?>/img/Logo.png" alt='none' />
				</a>
				<h1 class="text-4xl"> Form Data Diri Pasien Rumah Sakit Sehat</h1>
			</nav>
		</header>

		<img class="firstForm max-w-3xl flex-1" src="<?= base_url('assets/') ?>img/authImage.png" alt="Gambar" />
		<form class='bg-cover flex justify-center flex-col px-28' method="POST" action="<?= base_url('Register') ?>">
			<h1 class="firstForm text-4xl text-center">Daftar</h1>

			<label class="secondForm hidden py-2 px-5">
				<span class="inline-block p-3 bg-white w-48 text-center">NIK</span><span class=" mx-20">:</span>
				<input id='nikPengguna' name="nik" type="text" class="inline-block p-3 bg-white w-2/3" />
				<?= form_error('nik', '<div class="text-red-500">', '</div>') ?>
			</label>

			<label class="py-2 px-5">
				<div class="firstForm">Nama:</div>
				<span class="secondForm hidden inline-block p-3 bg-white w-48 text-center">Nama</span><span class="secondForm hidden mx-20">:</span>
				<input required type="text" id='namaPengguna' name="nama" class="rounded-xl p-3" />
				<div class="text-red-500" id='namaWarn'></div>
				<?= form_error('nama', '<div class="text-red-500">', '</div>') ?>
			</label>

			<label class='firstForm py-2 px-5'>
				<div>Email:</div>
				<input type="text" id='emailPengguna' name="email" class="rounded-xl p-3" />
				<div class="text-red-500" id='emailWarn'></div>
				<?= form_error('email', '<div class="text-red-500">', '</div>') ?>
			</label>

			<label class="firstForm py-2  px-5">
				<div>Password:</div>
				<input type='password' id='passwordPengguna' name="password" class="rounded-xl p-3" />
				<div class="text-red-500" id='passwordWarn'></div>
				<?= form_error('password', '<div class="text-red-500">', '</div>') ?>
			</label>

			<button class="firstForm rounded-3xl mx-auto inline-block border-blue-400 border-2 text-blue-400 bg-white w-1/2 p-3 mt-3 shadow-xl" type="button" id='nextButton'>Selanjutnya</button>

			<label class="secondForm hidden px-5 py-2">
				<span class="inline-block p-3 bg-white w-48 text-center">Tanggal Lahir</span><span class=" mx-20" span>:</span>
				<input id="txtDate" type="date" name="tanggalLahir" class="inline-block p-3 bg-white w-80" />
				<?= form_error('tanggalLahir', '<div class="text-red-500">', '</div>') ?>
			</label>

			<span class="secondForm hidden px-5 py-2">
				<span class="inline-block p-3 bg-white w-48 text-center">Jenis Kelamin</span><span class=" mx-20">:</span>

				<input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-ourTeal checked:border-white focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer" id='jkl' value='Laki-Laki' type="radio" name="jk" />
				<label class="mr-10" for="jkl">Laki-Laki</label>

				<input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-ourTeal checked:border-white focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer" id='jkp' value='Perempuan' type="radio" name="jk" />
				<label for="jkp">Perempuan</label>
				<?= form_error('jk', '<div class="text-red-500">', '</div>') ?>
			</span>

			<label class="secondForm hidden px-5 py-2">
				<span class="inline-block p-3 bg-white w-48 text-center">Alamat</span><span class=" mx-20">:</span>
				<input id='alamat' type="text" name="alamat" class="inline-block p-3 bg-white w-2/3" />
				<?= form_error('alamat', '<div class="text-red-500">', '</div>') ?>
			</label>

			<label class="secondForm hidden px-5 py-2">
				<span class="inline-block p-3 bg-white w-48 text-center">Nama Orang Tua</span><span class=" mx-20">:</span>
				<input id='namaOrtu' type="text" name="namaOrtu" class="inline-block p-3 bg-white w-2/3" />
				<?= form_error('namaOrtu', '<div class="text-red-500">', '</div>') ?>
			</label>

			<div class="flex mt-20 justify-around">
				<button id='resetButton' class="secondForm hidden w-40 rounded-3xl  inline-block border-red-500 border-2 text-red-500 bg-white p-3 shadow-xl" type="reset"><i class="fa-solid fa-trash-can"></i> Reset</button>
				<button class="secondForm hidden w-40 rounded-3xl inline-block border-blue-400 border-2 text-blue-400 bg-white  p-3 shadow-xl" type="submit"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
			</div>
		</form>

	</main>
</body>

<script>
	let nama, email, password;

	$('#nextButton').on('click', function() {
		nama = $('#namaPengguna')[0].value;
		email = $('#emailPengguna')[0].value;
		password = $('#passwordPengguna')[0].value;

		if (nama.trim().length <= 0) {
			$('#namaWarn')[0].textContent = 'Nama is Required'
		}
		if (password.trim().length <= 0) {
			$('#passwordWarn')[0].textContent = 'Password is Required'
		}
		if (email.trim().length <= 0) {
			$('#emailWarn')[0].textContent = 'Email is Required'
		}

		if (nama.trim().length > 0 && password.trim().length > 0 && email.trim().length > 0) {
			$('#namaWarn')[0].textContent = ''
			$('#emailWarn')[0].textContent = ''
			$('#passwordWarn')[0].textContent = ''

			// 		background: url(images/bg.jpg) no-repeat center center fixed; 
			// 		-webkit-background-size: cover;
			// 		-moz-background-size: cover;
			//		-o-background-size: cover;
			//		background-size: cover;
			$('main').css('background', "linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),url('<?= base_url('assets/') ?>img/backgroundImage.png') #B4E9FE center center")
			$('main').css('-moz-background-size', "cover")
			$('main').css('-webkit-background-size', "cover")
			$('main').css('-o-background-size', "cover")
			$('main').css('background-size', "cover")

			$('main').toggleClass('items-center justify-center justify-evenly')
			$('form').toggleClass('mt-1/4')

			$('.firstForm').addClass('hidden')
			$('.secondForm').removeClass('hidden')


			$('main').toggleClass('bg-white bg-ourTeal justify-start justify-evenly')
			$('form').toggleClass('mt-40 w-3/4')
			$('#namaPengguna').toggleClass('rounded-xl inline-block bg-white disabled:bg-slate-100 w-2/3')
		}
	})

	$('#resetButton').on('click', function() {
		setTimeout(function() {
			$('#namaPengguna')[0].value = nama;
			$('#emailPengguna')[0].value = email;
			$('#passwordPengguna')[0].value = password;
		}, 10)
	});

	var dtToday = new Date();

	var month = dtToday.getMonth() + 1;
	var day = dtToday.getDate();
	var year = dtToday.getFullYear();

	if (month < 10)
		month = '0' + month.toString();
	if (day < 10)
		day = '0' + day.toString();

	var maxDate = year + '-' + month + '-' + day;
	$('#txtDate').attr('max', maxDate);
</script>

</html>