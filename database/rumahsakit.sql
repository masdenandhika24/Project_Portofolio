-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2022 at 12:38 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_obat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_obat`) VALUES
(5, 2, 2),
(6, 2, 2),
(7, 2, 1),
(8, 3, 2),
(9, 3, 1),
(10, 3, 1),
(11, 4, 2),
(12, 4, 1),
(13, 5, 2),
(14, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int NOT NULL,
  `id_poli` varchar(3) NOT NULL,
  `nik` bigint NOT NULL,
  `nama_dokter` varchar(32) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `shift` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_poli`, `nik`, `nama_dokter`, `jenis_kelamin`, `ttl`, `alamat`, `shift`, `image`) VALUES
(2, 'PTH', 3376051906020009, 'Rafi Zuhud Agungsyah, Sp.THT', 'Laki-Laki', 'Depok, 19 Juni 2002', 'Kp. Sugutamu RT 001/021 Sukmajaya-Depok', 'Malam', 'Man.png'),
(3, 'PKK', 3173022910021003, 'Ganang Aryo Wibowo, Sp.KK', 'Laki-Laki', 'Jakarta, 29 Oktober 2002', 'Jl. Sukajaya II No.19 Jelambar - Grogol, Petamburan', 'Siang', 'Man.png'),
(4, 'PP', 3276052702020005, 'Febriansyah, SpGK', 'Laki-Laki', 'Depok, 27 Februari 2002', 'KP. Cipayung', 'Malam', 'Man.png');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `harga`) VALUES
(1, 'Oskadon', 5000),
(2, 'Bodrex', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int NOT NULL,
  `id_user` int NOT NULL,
  `nik` bigint NOT NULL,
  `nama_pasien` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_ortu` varchar(32) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_user`, `nik`, `nama_pasien`, `tanggal_lahir`, `alamat`, `nama_ortu`, `jenis_kelamin`) VALUES
(5, 2, 1111111111111111, 'a', '2022-04-25', 'a', 'a', 'Laki-Laki'),
(7, 3, 1111111111111111, 'b', '2022-04-26', 'b', 'b', 'Laki-Laki'),
(8, 4, 3333333333333333, 'c', '2022-03-17', 'c', 'c', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `kode_pendaftaran` int NOT NULL,
  `id_pasien` int NOT NULL,
  `id_poli` varchar(5) NOT NULL,
  `id_dokter` int NOT NULL,
  `pembayaran` enum('Asuransi','Pribadi') NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status_periksa` enum('Belum Diperiksa','Tagihan Pembayaran','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Belum Diperiksa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`kode_pendaftaran`, `id_pasien`, `id_poli`, `id_dokter`, `pembayaran`, `tgl_daftar`, `status_periksa`) VALUES
(9, 7, 'PP', 4, 'Pribadi', '2022-05-31', 'Selesai'),
(10, 8, 'PKK', 3, 'Asuransi', '2022-05-27', 'Selesai'),
(11, 8, 'PP', 4, 'Pribadi', '2022-05-26', 'Selesai'),
(13, 7, 'PP', 4, 'Asuransi', '2022-05-11', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` varchar(3) NOT NULL,
  `nama_poli` varchar(32) NOT NULL,
  `poli_image` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`, `poli_image`) VALUES
('PA', 'Poli Anak', 'Anak.png'),
('PK', 'Poli Kandungan', 'Obgyn.png'),
('PKK', 'Poli Kulit dan Kelamin', 'KulitKelamin.png'),
('PM', 'Poli Mata', 'Mata.png'),
('PO', 'Poli Orthopedia', 'Orthopedi.png'),
('PP', 'Poli Paru', 'Paru.png'),
('PPD', 'Poli Penyakit Dalam', 'PenyakitDalam.png'),
('PR', 'Poli Radiologi', 'Radiologi.png'),
('PTH', 'Poli THT', 'THT.png'),
('PU', 'Poli Urologi', 'Urologi.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `kode_pendaftaran` int NOT NULL,
  `id_dokter` int NOT NULL,
  `status_pembayaran` enum('Tagihan Pembayaran','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_pendaftaran`, `id_dokter`, `status_pembayaran`) VALUES
(2, 9, 4, 'Selesai'),
(3, 10, 3, 'Selesai'),
(4, 13, 4, 'Selesai'),
(5, 11, 4, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(2, 'a@a.a', '0cc175b9c0f1b6a831c399e269772661', 'admin'),
(3, 'b@b.b', '92eb5ffee6ae2fec3ad71c777531578f', 'user'),
(4, 'c@c.c', '4a8a08f09d37b73795649038408b5f33', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`kode_pendaftaran`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `kode_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
