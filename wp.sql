-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 04:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(5) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(21, 'RM. PADANG CITRA MINANG SALEMBA'),
(22, 'RM. CITRA MINANG RAWASARI'),
(23, 'RM. PADANG PONDOK SALERO'),
(24, 'RM. BAHAGIA'),
(25, 'RM. SINAR BAHAGIA'),
(26, 'RM. KOMALA MINANG'),
(27, 'RM. TENDA BIRU'),
(28, 'RM. MINANG JAYA SENTIONG'),
(29, 'RM. LAPELAH SALERO'),
(30, 'RM. LENTERA BUNDO');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(21, 21, 0.093592829),
(22, 22, 0.093592829),
(23, 23, 0.119009005),
(24, 24, 0.071272705),
(25, 25, 0.071272705),
(26, 26, 0.071272705),
(27, 27, 0.131810369),
(28, 28, 0.125451225),
(29, 29, 0.093592829),
(30, 30, 0.129132802);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `kode_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` int(5) NOT NULL,
  `tipe` enum('cost','benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`, `tipe`) VALUES
(6, 'C1', 'Rasa Makanan', 9, 'benefit'),
(7, 'C2', 'Harga Makanan', 8, 'cost'),
(8, 'C3', 'Jarak', 6, 'benefit'),
(9, 'C4', 'Pelayanan', 7, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `opt_alternatif`
--

CREATE TABLE `opt_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `id_subkriteria` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabel ini digunakan agar kriteria nya bisa dinamis';

--
-- Dumping data for table `opt_alternatif`
--

INSERT INTO `opt_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `id_subkriteria`) VALUES
(101, 21, 6, 294),
(102, 21, 7, 295),
(103, 21, 8, 287),
(104, 21, 9, 292),
(105, 22, 6, 294),
(106, 22, 7, 295),
(107, 22, 8, 287),
(108, 22, 9, 292),
(109, 23, 6, 293),
(110, 23, 7, 286),
(111, 23, 8, 288),
(112, 23, 9, 291),
(113, 24, 6, 293),
(114, 24, 7, 295),
(115, 24, 8, 287),
(116, 24, 9, 291),
(117, 25, 6, 293),
(118, 25, 7, 295),
(119, 25, 8, 287),
(120, 25, 9, 291),
(121, 26, 6, 293),
(122, 26, 7, 295),
(123, 26, 8, 287),
(124, 26, 9, 291),
(125, 27, 6, 293),
(126, 27, 7, 286),
(127, 27, 8, 289),
(128, 27, 9, 291),
(129, 28, 6, 294),
(130, 28, 7, 286),
(131, 28, 8, 287),
(132, 28, 9, 292),
(133, 29, 6, 294),
(134, 29, 7, 295),
(135, 29, 8, 287),
(136, 29, 9, 292),
(137, 30, 6, 294),
(138, 30, 7, 295),
(139, 30, 8, 289),
(140, 30, 9, 292);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `bobot`) VALUES
(276, 6, 'TIDAK ENAK', 1),
(286, 7, '<= 20.000 (MURAH)', 1),
(287, 8, 'SANGAT DEKAT', 1),
(288, 8, 'CUKUP DEKAT', 3),
(289, 8, 'JAUH', 5),
(290, 9, 'BURUK', 1),
(291, 9, 'STANDAR', 3),
(292, 9, 'BAIK SEKALI', 5),
(293, 6, 'ENAK', 3),
(294, 6, 'ENAK SEKALI', 5),
(295, 7, '20.000-50.000 (SEDANG)', 3),
(296, 7, '>= 50.0000 (MAHAL)', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  ADD CONSTRAINT `opt_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `opt_alternatif_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `opt_alternatif_ibfk_3` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id_subkriteria`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
