-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2018 at 12:22 
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siparkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktifitas`
--

CREATE TABLE IF NOT EXISTS `aktifitas` (
`id` int(11) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `tgl2` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktifitas`
--

INSERT INTO `aktifitas` (`id`, `tgl`, `tgl2`, `keterangan`) VALUES
(1, '2018-04-22 02:16:02', '2018-04-22', 'CakMan telah memasukkan mobil berjenis Toyota <br>dengan plat nomor W9988787XX'),
(2, '2018-04-22 02:16:19', '2018-04-22', 'CakMan telah memasukkan mobil berjenis JKJJJ <br>dengan plat nomor GGGGGGGG'),
(3, '2018-04-22 02:16:31', '2018-04-22', 'CakMan telah memasukkan mobil berjenis  <br>dengan plat nomor WWWWW'),
(4, '2018-04-22 02:16:38', '2018-04-22', 'CakMan telah memasukkan mobil berjenis Daihatsu <br>dengan plat nomor WWW123DS'),
(5, '2018-04-22 02:16:50', '2018-04-22', 'CakMan mencatat bahwa mobil<br>dengan plat nomor W9988787XX <br>berada di ruang 101'),
(6, '2018-04-22 02:16:54', '2018-04-22', 'CakMan mencatat bahwa mobil<br>dengan plat nomor WWWWW <br>berada di ruang 103'),
(7, '2018-04-22 02:17:04', '2018-04-22', 'CakMan mencatat bahwa mobil<br>dengan plat nomor GGGGGGGG <br>berada di ruang 100'),
(8, '2018-04-22 02:17:12', '2018-04-22', 'CakMan mencatat bahwa mobil<br>dengan plat nomor WWW123DS <br>berada di ruang 102'),
(9, '2018-04-23 04:48:30', '2018-04-23', 'CakMan mencatat bahwa mobil<br>dengan plat nomor W9988787XX <br>keluar dari ruangan'),
(10, '2018-04-23 04:52:19', '2018-04-23', 'CakMan telah memasukkan mobil berjenis Camaro <br>dengan plat nomor DFSSSWWW'),
(11, '2018-04-23 04:52:33', '2018-04-23', 'CakMan mencatat bahwa mobil<br>dengan plat nomor DFSSSWWW <br>berada di ruang 101');

-- --------------------------------------------------------

--
-- Table structure for table `laporankeuangan`
--

CREATE TABLE IF NOT EXISTS `laporankeuangan` (
`idtransaksi` int(11) NOT NULL,
  `no_plat` varchar(16) NOT NULL,
  `tgl_masuk` varchar(10) NOT NULL,
  `bulan` varchar(8) NOT NULL,
  `bayar` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporankeuangan`
--

INSERT INTO `laporankeuangan` (`idtransaksi`, `no_plat`, `tgl_masuk`, `bulan`, `bayar`) VALUES
(1, 'W9988787XX', '2018-04-22', '04-2018', 5000),
(2, 'GGGGGGGG', '2018-04-22', '04-2018', 5000),
(3, 'WWWWW', '2018-04-22', '04-2018', 5000),
(4, 'WWW123DS', '2018-04-22', '04-2018', 5000),
(5, 'DFSSSWWW', '2018-04-23', '04-2018', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `mobilaktif`
--

CREATE TABLE IF NOT EXISTS `mobilaktif` (
`idmobilaktif` int(11) NOT NULL,
  `plat_nomor` varchar(16) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `waktu_masuk` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobilaktif`
--

INSERT INTO `mobilaktif` (`idmobilaktif`, `plat_nomor`, `jenis`, `waktu_masuk`) VALUES
(1, 'W9988787XX', 'Toyota', '2018-04-22 02:16:02'),
(2, 'GGGGGGGG', 'JKJJJ', '2018-04-22 02:16:19'),
(3, 'WWWWW', '', '2018-04-22 02:16:31'),
(4, 'WWW123DS', 'Daihatsu', '2018-04-22 02:16:38'),
(5, 'DFSSSWWW', 'Camaro', '2018-04-23 04:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `parkir`
--

CREATE TABLE IF NOT EXISTS `parkir` (
`idparkir` int(255) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `plat_nomor` varchar(16) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `waktu_masuk_parkir` varchar(30) NOT NULL,
  `waktu_keluar_parkir` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkir`
--

INSERT INTO `parkir` (`idparkir`, `ruang`, `plat_nomor`, `posisi`, `waktu_masuk_parkir`, `waktu_keluar_parkir`, `status`) VALUES
(1, '100', 'GGGGGGGG', 'kanan', '2018-04-22 02:17:04', '', '0'),
(2, '101', 'DFSSSWWW', 'kiri', '2018-04-23 04:52:33', '', '0'),
(3, '102', 'WWW123DS', 'kanan', '2018-04-22 02:17:12', '', '0'),
(4, '103', 'WWWWW', 'kiri', '2018-04-22 02:16:54', '', '0'),
(5, '105', '', 'kiri', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbmobil`
--

CREATE TABLE IF NOT EXISTS `tbmobil` (
`idmobil` int(11) NOT NULL,
  `plat_nomor` varchar(16) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `waktu_masuk` varchar(30) NOT NULL,
  `waktu_masuk_ruang` varchar(30) NOT NULL,
  `waktu_keluar_ruang` varchar(30) NOT NULL,
  `waktu_keluar` varchar(30) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmobil`
--

INSERT INTO `tbmobil` (`idmobil`, `plat_nomor`, `jenis`, `waktu_masuk`, `waktu_masuk_ruang`, `waktu_keluar_ruang`, `waktu_keluar`, `ruang`, `status`) VALUES
(1, 'W9988787XX', 'Toyota', '2018-04-22 02:16:02', '2018-04-22 02:16:50', '2018-04-23 04:48:30', '', '101', 'Keluar Parkir'),
(2, 'GGGGGGGG', 'JKJJJ', '2018-04-22 02:16:19', '2018-04-22 02:17:04', '', '', '100', 'Masuk Ruangan'),
(3, 'WWWWW', '', '2018-04-22 02:16:31', '2018-04-22 02:16:54', '', '', '103', 'Masuk Ruangan'),
(4, 'WWW123DS', 'Daihatsu', '2018-04-22 02:16:38', '2018-04-22 02:17:12', '', '', '102', 'Masuk Ruangan'),
(5, 'DFSSSWWW', 'Camaro', '2018-04-23 04:52:19', '2018-04-23 04:52:33', '', '', '101', 'Masuk Ruangan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `namalengkap` varchar(30) NOT NULL,
  `kelamin` varchar(12) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `namalengkap`, `kelamin`, `no_hp`, `shift`, `level`) VALUES
(1, 'admin', 'admin', 'CakMan', '', '', '', 'admin'),
(2, 'numan', 'numan', 'Numan', 'Laki-laki', '083832183826', 'Malam', 'kr'),
(6, 'ciciko', 'ciciko', 'Ciciko', 'Laki-laki', '089998876667', 'Pagi', 'kr'),
(7, 'adudu', 'adudu', 'Adudu', 'Laki-laki', '12345677889', 'Sore', 'kp1'),
(8, 'gopal', 'gopal', 'Gopal', 'Laki-laki', '08989898989', 'Pagi', 'kp2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktifitas`
--
ALTER TABLE `aktifitas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporankeuangan`
--
ALTER TABLE `laporankeuangan`
 ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `mobilaktif`
--
ALTER TABLE `mobilaktif`
 ADD PRIMARY KEY (`idmobilaktif`);

--
-- Indexes for table `parkir`
--
ALTER TABLE `parkir`
 ADD PRIMARY KEY (`idparkir`);

--
-- Indexes for table `tbmobil`
--
ALTER TABLE `tbmobil`
 ADD PRIMARY KEY (`idmobil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktifitas`
--
ALTER TABLE `aktifitas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `laporankeuangan`
--
ALTER TABLE `laporankeuangan`
MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mobilaktif`
--
ALTER TABLE `mobilaktif`
MODIFY `idmobilaktif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `parkir`
--
ALTER TABLE `parkir`
MODIFY `idparkir` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbmobil`
--
ALTER TABLE `tbmobil`
MODIFY `idmobil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
