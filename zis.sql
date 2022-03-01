-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 09:06 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `jabatan`, `nama`, `username`, `password`, `alamat`, `no_telp`, `role`) VALUES
('AML001', 'Amil', 'ddd d', 'amil', '5f171c573eda1d9eba4e5925670a6b83', 'pinus 2', '081234445656', 3),
('BDR001', 'Bendahara', 'Agus Dermawan', 'agus', 'fdf169558242ee051cca1479770ebac3', 'jl.Lembah Pinus Barat', '081319561535', 2),
('DKM001', 'DKM', 'DKM', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'serang', '0813195615', 1);

-- --------------------------------------------------------

--
-- Table structure for table `infaq_shodaqoh`
--

CREATE TABLE `infaq_shodaqoh` (
  `id_infaq` int(11) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masuk` int(10) NOT NULL,
  `jumlah_keluar` int(10) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `infaq_shodaqoh`
--
DELIMITER $$
CREATE TRIGGER `HAPUS` AFTER DELETE ON `infaq_shodaqoh` FOR EACH ROW INSERT INTO log (status, id_admin,keterangan,kategori,tanggal,jumlah_masuk,jumlah_keluar) VALUES ('HAPUS DATA INFAQ_SHADAQOH', old.id_admin, old.keterangan, old.kategori, old.tanggal, old.jumlah_masuk, old.jumlah_keluar)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TAMBAH` AFTER INSERT ON `infaq_shodaqoh` FOR EACH ROW INSERT INTO log (status, id_admin,keterangan,kategori,tanggal,jumlah_masuk,jumlah_keluar) VALUES ('TAMBAH DATA INFAQ_SHADAQOH', new.id_admin, new.keterangan, new.kategori, new.tanggal, new.jumlah_masuk, new.jumlah_keluar)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UPDATE` AFTER UPDATE ON `infaq_shodaqoh` FOR EACH ROW INSERT INTO log (status, id_admin,keterangan,kategori,tanggal,jumlah_masuk,jumlah_keluar) VALUES ('UPDATE DATA INFAQ_SHADAQOH', new.id_admin, new.keterangan, new.kategori, new.tanggal, new.jumlah_masuk, new.jumlah_keluar)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masuk` int(10) NOT NULL,
  `jumlah_keluar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `id_admin`, `kategori`, `status`, `keterangan`, `tanggal`, `jumlah_masuk`, `jumlah_keluar`) VALUES
(41, 'DKM001', 'Kotak Amal Sholat Tarawih', 'HAPUS DATA INFAQ_SHADAQOH', '  OK', '2021-11-16', 1, 0),
(42, 'DKM001', 'Kotak Amal Sholat Jumat', 'TAMBAH DATA INFAQ_SHADAQOH', 'test', '2021-11-20', 1, 0),
(43, 'DKM001', 'Kotak Amal Sholat Jumat', 'UPDATE DATA INFAQ_SHADAQOH', ' test', '2021-11-20', 100000, 0),
(44, 'DKM001', 'Kotak Amal Sholat Jumat', 'HAPUS DATA INFAQ_SHADAQOH', ' test', '2021-11-20', 100000, 0),
(45, 'DKM001', 'Infaq Shodaqoh', 'TAMBAH DATA INFAQ_SHADAQOH', 'pemasukan ', '2021-11-20', 100000, 0),
(46, 'DKM001', 'Infaq Shodaqoh', 'UPDATE DATA INFAQ_SHADAQOH', ' pemasukan ', '2021-11-20', 3, 0),
(47, 'DKM001', 'Infaq Shodaqoh', 'HAPUS DATA INFAQ_SHADAQOH', ' pemasukan ', '2021-11-20', 3, 0),
(48, 'DKM001', 'Kegiatan Operasional masjid', 'TAMBAH DATA INFAQ_SHADAQOH', 'e', '2021-11-21', 0, 100000),
(49, 'DKM001', 'Kegiatan Santunan Kemanusian', 'TAMBAH DATA INFAQ_SHADAQOH', 'eeee', '2021-11-21', 0, 100000),
(50, 'DKM001', 'Kegiatan Operasional masjid', 'UPDATE DATA INFAQ_SHADAQOH', 'e', '2021-11-21', 0, 100000),
(51, 'DKM001', 'Kegiatan Operasional masjid', 'HAPUS DATA INFAQ_SHADAQOH', 'e', '2021-11-21', 0, 100000),
(52, 'DKM001', 'Kegiatan Santunan Kemanusian', 'HAPUS DATA INFAQ_SHADAQOH', 'eeee', '2021-11-21', 0, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `mustahiq`
--

CREATE TABLE `mustahiq` (
  `id_mustahiq` varchar(25) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mustahiq`
--

INSERT INTO `mustahiq` (`id_mustahiq`, `id_admin`, `nama`, `alamat`, `kategori`) VALUES
('MTQ001', 'AML001', 'rinto', 'pinang 2', 'Ibnu Sabil'),
('MTQ003', 'AML001', 'rissa', 'jalan lembah pinus A3/65', 'Miskin'),
('MTQ004', 'AML001', 'wini', 'pondok cabe', 'Gharimin'),
('MTQ005', 'AML001', 'rere', 'pinus', 'Fi sabilillah'),
('MTQ006', 'AML001', 'tito oke', '', 'Fi sabilillah'),
('MTQ201811001', 'AML001', 'roro', 'pinus', 'Fakir'),
('MTQ20181115221333001', 'AML001', 'rifqi', 'jalan lembah pinus A3/65', 'Miskin'),
('MTQ20181115221740001', 'AML001', 'koko', 'jalan lembah pinus A3/65', 'Gharimin');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` varchar(25) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `id_admin`, `nama`, `alamat`, `pekerjaan`, `no_telp`) VALUES
('MZ001', 'AML001', 'Desta dwi h', 'kawasan industri cikande', 'swasta', '081319561530'),
('MZ003', 'AML001', 'nurul huda hakim', 'jalan lembah pinus A3/65', 'wiraswasta', '081001222001'),
('MZ004', 'AML001', 'moh adriansyah', 'jalan lembah pinus A3/64', 'wiraswasta', '08127889982'),
('MZ201811001', 'AML001', 'rifqi', 'jalan lembah pinus A3/65', 'Programer ', '081319561535'),
('MZ20181115222054001', 'AML001', 'Yunika Ratna', 'Cikande Rt 01 / 02', 'Guru', '08200202');

-- --------------------------------------------------------

--
-- Table structure for table `pembagian_zakat`
--

CREATE TABLE `pembagian_zakat` (
  `id_pembagian_zakat` int(11) NOT NULL,
  `id_mustahiq` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_keluar` int(10) NOT NULL,
  `beras_keluar` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembagian_zakat`
--

INSERT INTO `pembagian_zakat` (`id_pembagian_zakat`, `id_mustahiq`, `tanggal`, `jumlah_keluar`, `beras_keluar`) VALUES
(15, 'MTQ003', '2021-10-19', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `waqaf`
--

CREATE TABLE `waqaf` (
  `id_waqaf` int(11) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masuk` int(10) NOT NULL,
  `jumlah_keluar` int(10) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waqaf`
--

INSERT INTO `waqaf` (`id_waqaf`, `id_admin`, `keterangan`, `tanggal`, `jumlah_masuk`, `jumlah_keluar`, `foto`) VALUES
(2, 'BDR001', '     Dari Hamba Allah', '2018-10-22', 50000000, 0, '0'),
(3, 'BDR001', 'Pembayaran Tukang', '2018-09-22', 0, 3500000, '15102018113958131020181135434911064_8a2e2665-620e-4188-b043-f0ec4772a3f1.jpg'),
(5, 'BDR001', 'pembelian semen 12 pcs', '2018-09-22', 0, 2000000, '15102018114016131020181135434911064_8a2e2665-620e-4188-b043-f0ec4772a3f1.jpg'),
(6, 'BDR001', ' Rt 003/023', '2018-09-24', 900000, 0, ''),
(7, 'BDR001', 'rifqi', '2018-09-23', 0, 2000, '15102018114027131020181135434911064_8a2e2665-620e-4188-b043-f0ec4772a3f1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `zakat`
--

CREATE TABLE `zakat` (
  `id_zakat` int(11) NOT NULL,
  `id_muzakki` varchar(25) NOT NULL,
  `jenis_zakat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `beras` varchar(3) NOT NULL,
  `dibuat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zakat`
--

INSERT INTO `zakat` (`id_zakat`, `id_muzakki`, `jenis_zakat`, `tanggal`, `jumlah`, `beras`, `dibuat`) VALUES
(42, 'MZ001', 'Zakat Fitrah', '2021-10-20', 0, '3', ''),
(43, 'MZ004', 'Zakat Fitrah', '2021-10-20', 0, '3', ''),
(44, 'MZ003', 'Zakat Fitrah', '2021-10-20', 0, '3', ''),
(45, 'MZ20181115222054001', 'Zakat Fitrah', '2021-10-19', 0, '3', '20/10/2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `infaq_shodaqoh`
--
ALTER TABLE `infaq_shodaqoh`
  ADD PRIMARY KEY (`id_infaq`) USING BTREE,
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mustahiq`
--
ALTER TABLE `mustahiq`
  ADD PRIMARY KEY (`id_mustahiq`) USING BTREE,
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`),
  ADD KEY `muzakki_ibfk_1` (`id_admin`);

--
-- Indexes for table `pembagian_zakat`
--
ALTER TABLE `pembagian_zakat`
  ADD PRIMARY KEY (`id_pembagian_zakat`),
  ADD KEY `id_muzakki` (`id_mustahiq`);

--
-- Indexes for table `waqaf`
--
ALTER TABLE `waqaf`
  ADD PRIMARY KEY (`id_waqaf`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `zakat`
--
ALTER TABLE `zakat`
  ADD PRIMARY KEY (`id_zakat`) USING BTREE,
  ADD KEY `id_muzakki` (`id_muzakki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infaq_shodaqoh`
--
ALTER TABLE `infaq_shodaqoh`
  MODIFY `id_infaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pembagian_zakat`
--
ALTER TABLE `pembagian_zakat`
  MODIFY `id_pembagian_zakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `waqaf`
--
ALTER TABLE `waqaf`
  MODIFY `id_waqaf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `zakat`
--
ALTER TABLE `zakat`
  MODIFY `id_zakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `infaq_shodaqoh`
--
ALTER TABLE `infaq_shodaqoh`
  ADD CONSTRAINT `infaq_shodaqoh_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `mustahiq`
--
ALTER TABLE `mustahiq`
  ADD CONSTRAINT `mustahiq_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD CONSTRAINT `muzakki_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembagian_zakat`
--
ALTER TABLE `pembagian_zakat`
  ADD CONSTRAINT `pembagian_zakat_ibfk_1` FOREIGN KEY (`id_mustahiq`) REFERENCES `mustahiq` (`id_mustahiq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waqaf`
--
ALTER TABLE `waqaf`
  ADD CONSTRAINT `waqaf_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `zakat`
--
ALTER TABLE `zakat`
  ADD CONSTRAINT `zakat_ibfk_1` FOREIGN KEY (`id_muzakki`) REFERENCES `muzakki` (`id_muzakki`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
