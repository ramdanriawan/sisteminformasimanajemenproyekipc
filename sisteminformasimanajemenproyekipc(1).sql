-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 08:09 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisteminformasimanajemenproyekipc`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_rencanas`
--

CREATE TABLE `jadwal_rencanas` (
  `id` int(11) NOT NULL,
  `uraian_kerja_detail_id` int(11) NOT NULL,
  `minggu_ke` int(3) NOT NULL,
  `bobot_rencana` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_rencanas`
--

INSERT INTO `jadwal_rencanas` (`id`, `uraian_kerja_detail_id`, `minggu_ke`, `bobot_rencana`) VALUES
(151, 24, 1, 1),
(152, 25, 1, 0),
(153, 26, 1, 0),
(154, 27, 1, 0),
(155, 28, 1, 0),
(156, 29, 1, 0),
(157, 30, 1, 0),
(158, 31, 1, 0),
(159, 32, 1, 0),
(160, 33, 1, 0),
(161, 34, 1, 0),
(162, 35, 1, 0),
(163, 36, 1, 0),
(164, 37, 1, 0),
(165, 38, 1, 0),
(166, 39, 1, 0),
(167, 40, 1, 0),
(168, 41, 1, 0),
(169, 42, 1, 0),
(170, 43, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proyeks`
--

CREATE TABLE `proyeks` (
  `id` int(11) NOT NULL,
  `nama_proyek` varchar(255) NOT NULL,
  `nomor_kontrak` varchar(40) NOT NULL,
  `nilai_kontrak` bigint(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyeks`
--

INSERT INTO `proyeks` (`id`, `nama_proyek`, `nomor_kontrak`, `nilai_kontrak`, `user_id`, `tanggal_mulai`, `tanggal_selesai`, `progress`) VALUES
(5, 'abcdefg', 'asddsf/sdfsdfsd/fs/df/sdf', 256000, 27, '2019-10-01', '2019-10-24', 100),
(6, 'proyek adaadadad', 'sdfdsf sdfs dfs fds', 2500000, 33, '2019-11-03', '2019-11-16', 35),
(7, 'gasdfsdfsfsdf', 'sdfsdfsdfsdf', 100000, 33, '2019-11-01', '2019-11-30', 12),
(8, 'proyek 123456789+4656', 'sdfdsf sdfs dfds sdf', 2500000, 33, '2019-11-14', '2019-11-30', 78);

-- --------------------------------------------------------

--
-- Table structure for table `realisasis`
--

CREATE TABLE `realisasis` (
  `id` int(11) NOT NULL,
  `uraian_kerja_detail_id` int(11) NOT NULL,
  `minggu_ke` int(11) NOT NULL,
  `volume_realisasi` int(11) NOT NULL,
  `item` int(3) NOT NULL,
  `bobot` int(3) NOT NULL,
  `deviasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasis`
--

INSERT INTO `realisasis` (`id`, `uraian_kerja_detail_id`, `minggu_ke`, `volume_realisasi`, `item`, `bobot`, `deviasi`) VALUES
(1, 24, 1, 10, 500, 60, 59),
(2, 25, 1, 95, 4750, 713, 713),
(3, 26, 1, 0, 0, 0, 0),
(4, 27, 1, 0, 0, 0, 0),
(5, 28, 1, 0, 0, 0, 0),
(6, 29, 1, 0, 0, 0, 0),
(7, 30, 1, 0, 0, 0, 0),
(8, 31, 1, 0, 0, 0, 0),
(9, 32, 1, 0, 0, 0, 0),
(10, 24, 1, 10, 0, 0, 0),
(11, 25, 1, 95, 0, 0, 0),
(12, 26, 1, 0, 0, 0, 0),
(13, 27, 1, 0, 0, 0, 0),
(14, 28, 1, 0, 0, 0, 0),
(15, 29, 1, 0, 0, 0, 0),
(16, 30, 1, 0, 0, 0, 0),
(17, 31, 1, 0, 0, 0, 0),
(18, 32, 1, 0, 0, 0, 0),
(19, 24, 2, 10, 0, 0, 0),
(20, 25, 2, 12, 0, 0, 0),
(21, 26, 2, 0, 0, 0, 0),
(22, 27, 2, 0, 0, 0, 0),
(23, 28, 2, 0, 0, 0, 0),
(24, 29, 2, 0, 0, 0, 0),
(25, 30, 2, 0, 0, 0, 0),
(26, 31, 2, 0, 0, 0, 0),
(27, 32, 2, 0, 0, 0, 0),
(28, 33, 2, 0, 0, 0, 0),
(29, 34, 2, 0, 0, 0, 0),
(30, 35, 2, 0, 0, 0, 0),
(31, 36, 2, 0, 0, 0, 0),
(32, 37, 2, 0, 0, 0, 0),
(33, 38, 2, 0, 0, 0, 0),
(34, 39, 2, 0, 0, 0, 0),
(35, 40, 2, 0, 0, 0, 0),
(36, 41, 2, 0, 0, 0, 0),
(37, 42, 2, 0, 0, 0, 0),
(38, 43, 2, 0, 0, 0, 0),
(39, 24, 2, 10, 0, 0, 0),
(40, 25, 2, 12, 0, 0, 0),
(41, 26, 2, 0, 0, 0, 0),
(42, 27, 2, 0, 0, 0, 0),
(43, 28, 2, 0, 0, 0, 0),
(44, 29, 2, 0, 0, 0, 0),
(45, 30, 2, 0, 0, 0, 0),
(46, 31, 2, 0, 0, 0, 0),
(47, 32, 2, 0, 0, 0, 0),
(48, 33, 2, 0, 0, 0, 0),
(49, 34, 2, 0, 0, 0, 0),
(50, 35, 2, 0, 0, 0, 0),
(51, 36, 2, 0, 0, 0, 0),
(52, 37, 2, 0, 0, 0, 0),
(53, 38, 2, 0, 0, 0, 0),
(54, 39, 2, 0, 0, 0, 0),
(55, 40, 2, 0, 0, 0, 0),
(56, 41, 2, 0, 0, 0, 0),
(57, 42, 2, 0, 0, 0, 0),
(58, 43, 2, 0, 0, 0, 0),
(59, 24, 1, 10, 500, 60, 59),
(60, 25, 1, 95, 4750, 713, 713),
(61, 26, 1, 0, 0, 0, 0),
(62, 27, 1, 0, 0, 0, 0),
(63, 28, 1, 0, 0, 0, 0),
(64, 29, 1, 0, 0, 0, 0),
(65, 30, 1, 0, 0, 0, 0),
(66, 31, 1, 0, 0, 0, 0),
(67, 32, 1, 0, 0, 0, 0),
(68, 33, 1, 0, 0, 0, 0),
(69, 34, 1, 0, 0, 0, 0),
(70, 35, 1, 0, 0, 0, 0),
(71, 36, 1, 0, 0, 0, 0),
(72, 37, 1, 0, 0, 0, 0),
(73, 38, 1, 0, 0, 0, 0),
(74, 39, 1, 0, 0, 0, 0),
(75, 40, 1, 0, 0, 0, 0),
(76, 41, 1, 0, 0, 0, 0),
(77, 42, 1, 0, 0, 0, 0),
(78, 43, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uraian_kerjas`
--

CREATE TABLE `uraian_kerjas` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `judul_uraian_kerja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uraian_kerjas`
--

INSERT INTO `uraian_kerjas` (`id`, `proyek_id`, `judul_uraian_kerja`) VALUES
(5, 5, 'pemasangan cctv');

-- --------------------------------------------------------

--
-- Table structure for table `uraian_kerja_details`
--

CREATE TABLE `uraian_kerja_details` (
  `id` int(11) NOT NULL,
  `uraian_kerja_id` int(11) NOT NULL,
  `uraian_kerja` varchar(255) NOT NULL,
  `satuan` enum('unit','m','Ls') DEFAULT NULL,
  `volume` int(4) DEFAULT NULL,
  `bobot_kontrak` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uraian_kerja_details`
--

INSERT INTO `uraian_kerja_details` (`id`, `uraian_kerja_id`, `uraian_kerja`, `satuan`, `volume`, `bobot_kontrak`) VALUES
(24, 5, 'pemasangan cctv 1', 'unit', 2, 12),
(25, 5, 'pemasangan cctv 1', 'm', 2, 15),
(26, 5, 'm', 'unit', 2, 2),
(27, 5, '2', 'm', 2, 2),
(28, 5, '2', 'unit', 2, 2),
(29, 5, '2', 'Ls', 2, 2),
(30, 5, '2', 'm', 2, 2),
(31, 5, '2', 'Ls', 2, 2),
(32, 5, '2', 'Ls', 2, 2),
(33, 5, '25', 'Ls', 2, 2),
(34, 5, '32', 'm', 2, 2),
(35, 5, '2', 'Ls', 2, 2),
(36, 5, '2', 'unit', 2, 2),
(37, 5, '2', 'm', 2, 2),
(38, 5, '22', 'm', 2, 2),
(39, 5, '2', 'm', 13, 2),
(40, 5, '1', 'unit', 12, 1),
(41, 5, '12', 'unit', 1, 12),
(42, 5, '12', 'unit', 12, 12),
(43, 5, '12', 'unit', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `password` varchar(75) NOT NULL,
  `tipe_user` enum('admin','manager','rekanan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama_lengkap`, `password`, `tipe_user`) VALUES
(16, 'ramdan3mts3', 'ramdan riawan', '$2y$10$QRYLbYE.grKwlOV7iOhuIepxW.wtDlSJI3uXHRDBCk12ADO7j50Me', 'manager'),
(25, 'ramdan4mts', 'ramdan riawan', '$2y$10$QRYLbYE.grKwlOV7iOhuIepxW.wtDlSJI3uXHRDBCk12ADO7j50Me', 'manager'),
(26, 'manager3', 'Manager', '$2y$10$kAjwGJv61m3bbHeMyHXtH.XcB1hb1PYm0VPfTJ2O/8ORMaJ5FmyFi', 'manager'),
(27, 'rekanan3', 'Rekanan 2', '$2y$10$VYRGtcNRucDSMusqCKe//OkGdoMltsb8YR8md4EW9z04m2j9zVvSW', 'rekanan'),
(28, 'ramdan3mts4', 'ramdan riawan', '$2y$10$QRYLbYE.grKwlOV7iOhuIepxW.wtDlSJI3uXHRDBCk12ADO7j50Me', 'manager'),
(29, 'ramdan3mts5', 'ramdan riawan', '$2y$10$QRYLbYE.grKwlOV7iOhuIepxW.wtDlSJI3uXHRDBCk12ADO7j50Me', 'manager'),
(33, 'rekanan9', 'Rekanan 3', '$2y$10$VYRGtcNRucDSMusqCKe//OkGdoMltsb8YR8md4EW9z04m2j9zVvSW', 'rekanan'),
(37, 'ramdan3mts33', 'ramdan riawan', '$2y$10$QRYLbYE.grKwlOV7iOhuIepxW.wtDlSJI3uXHRDBCk12ADO7j50Me', 'manager'),
(38, 'ramdan4mts3', 'ramdan riawan', '$2y$10$QRYLbYE.grKwlOV7iOhuIepxW.wtDlSJI3uXHRDBCk12ADO7j50Me', 'manager'),
(39, 'manager33', 'Manager', '$2y$10$kAjwGJv61m3bbHeMyHXtH.XcB1hb1PYm0VPfTJ2O/8ORMaJ5FmyFi', 'manager'),
(40, 'rekanan33', 'Rekanan 4', '$2y$10$VYRGtcNRucDSMusqCKe//OkGdoMltsb8YR8md4EW9z04m2j9zVvSW', 'rekanan'),
(41, 'ramdan3mts43', 'ramdan riawan', '$2y$10$QRYLbYE.grKwlOV7iOhuIepxW.wtDlSJI3uXHRDBCk12ADO7j50Me', 'manager'),
(42, 'ramdan3mts53', 'ramdan riawan', '$2y$10$QRYLbYE.grKwlOV7iOhuIepxW.wtDlSJI3uXHRDBCk12ADO7j50Me', 'manager'),
(43, 'rekanan93', 'Rekanan 5', '$2y$10$VYRGtcNRucDSMusqCKe//OkGdoMltsb8YR8md4EW9z04m2j9zVvSW', 'rekanan'),
(44, 'ramdan3mts83', 'ramdan riawan', '$2y$10$QRYLbYE.grKwlOV7iOhuIepxW.wtDlSJI3uXHRDBCk12ADO7j50Me', 'manager'),
(46, 'admin', 'admin', '$2y$10$MO69SeSNFU7j7vkvI1F5IegNW81aEtyI8jGFni0flQaa.Lc9hWXGy', 'admin'),
(47, 'manager', 'manager', '$2y$10$gtLNCgnUSf6DboqAkDve2uMjIdrYhXUX.dxmbg20t/ewUdK/wPi6W', 'manager'),
(48, 'rekanan', 'rekanan', '$2y$10$FRi7aVc45js.K0ZSgKc3weZl0lFwDMnLm1IiB1hrdbxsoaYEspZny', 'rekanan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_rencanas`
--
ALTER TABLE `jadwal_rencanas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uraian_kerja_detail_id` (`uraian_kerja_detail_id`);

--
-- Indexes for table `proyeks`
--
ALTER TABLE `proyeks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyeks_ibfk_1` (`user_id`);

--
-- Indexes for table `realisasis`
--
ALTER TABLE `realisasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uraian_kerja_detail_id` (`uraian_kerja_detail_id`);

--
-- Indexes for table `uraian_kerjas`
--
ALTER TABLE `uraian_kerjas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indexes for table `uraian_kerja_details`
--
ALTER TABLE `uraian_kerja_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uraian_kerja_id` (`uraian_kerja_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `tipe_user_id` (`tipe_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_rencanas`
--
ALTER TABLE `jadwal_rencanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `proyeks`
--
ALTER TABLE `proyeks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `realisasis`
--
ALTER TABLE `realisasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `uraian_kerjas`
--
ALTER TABLE `uraian_kerjas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uraian_kerja_details`
--
ALTER TABLE `uraian_kerja_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_rencanas`
--
ALTER TABLE `jadwal_rencanas`
  ADD CONSTRAINT `jadwal_rencanas_ibfk_1` FOREIGN KEY (`uraian_kerja_detail_id`) REFERENCES `uraian_kerja_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proyeks`
--
ALTER TABLE `proyeks`
  ADD CONSTRAINT `proyeks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `realisasis`
--
ALTER TABLE `realisasis`
  ADD CONSTRAINT `realisasis_ibfk_1` FOREIGN KEY (`uraian_kerja_detail_id`) REFERENCES `uraian_kerja_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uraian_kerjas`
--
ALTER TABLE `uraian_kerjas`
  ADD CONSTRAINT `uraian_kerjas_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `proyeks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uraian_kerja_details`
--
ALTER TABLE `uraian_kerja_details`
  ADD CONSTRAINT `uraian_kerja_details_ibfk_1` FOREIGN KEY (`uraian_kerja_id`) REFERENCES `uraian_kerjas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
