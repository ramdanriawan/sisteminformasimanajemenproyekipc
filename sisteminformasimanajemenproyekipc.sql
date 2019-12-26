-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 10:55 AM
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
(1, 6, 1, 2),
(2, 7, 1, 2),
(3, 8, 1, 0),
(4, 9, 1, 0),
(5, 10, 1, 0),
(6, 11, 1, 0),
(7, 12, 1, 0),
(8, 13, 1, 0),
(9, 6, 2, 4),
(10, 7, 2, 3),
(11, 8, 2, 0),
(12, 9, 2, 0),
(13, 10, 2, 0),
(14, 11, 2, 0),
(15, 12, 2, 0);

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
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyeks`
--

INSERT INTO `proyeks` (`id`, `nama_proyek`, `nomor_kontrak`, `nilai_kontrak`, `user_id`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 'Pengadaan dan pemasangan perangkat CCTV di Pelabuhan Talang Duku Jambi', 'PD02/31/5/1/D5/GM/C.JBI-19', 755400000, 3, '2019-05-31', '2019-09-22'),
(2, 'Pekerjaan Peningkatan Infrastruktur, Jaringan, Dan Teknologi Informasi Untuk Menunjang Digital Port Di Pelabuhan Talang Duku dan Muara Sabak', 'PD02/15/5/2/D5/GM/C.JBI-19', 1250550000, 4, '2019-05-15', '2019-11-11'),
(3, 'Pengembangan Aplikasi dan Infrastruktur Kegiatan CFS Cabang Pelabuhan Jambi Tahun 2019', 'PD02/10/3/1/D5/GM/C.JBI-19', 512725000, 5, '2019-03-10', '2019-07-08'),
(4, 'Pembuatan Ruang Information Center di Pelabuhan Talang Duku Jambi', 'PD02/10/3/1/D5/GM/C.JBI-19', 1525800000, 6, '2019-02-12', '2019-08-11'),
(5, 'Pekerjaan Infrastruktur Pendukung Kegiatan Digitalisasi Operasional CFS di Pelabuhan Indonesia II (Persero) Cabang Jambi', 'sdfsdfdsf dsf', 1000000000, 7, '2019-11-01', '2019-12-25');

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
(1, 6, 2, 0, 0, 10, -4),
(2, 7, 2, 0, 0, 10, -3),
(3, 8, 2, 0, 0, 10, 0),
(4, 9, 2, 0, 0, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tagihans`
--

CREATE TABLE `tagihans` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `nama_tagihan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `presentase` int(11) NOT NULL,
  `nilai_tagihan` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihans`
--

INSERT INTO `tagihans` (`id`, `proyek_id`, `nama_tagihan`, `tanggal`, `presentase`, `nilai_tagihan`, `note`) VALUES
(1, 1, 'Pembayaran Termy 1', '2019-06-01', 25, 188850000, 'Mohon Pembayaran tersebut dapat ditransfer ke:\r\n- Nama Bank: Mandiri\r\n- Nomor Rekening: 12000007768513\r\n- a.n. Nama Rekening: PT. DATA SOLUSINDO'),
(2, 1, 'Pembayaran Termy 2', '2019-08-01', 25, 188850000, 'Mohon Pembayaran tersebut dapat ditransfer ke:\r\n- Nama Bank: Mandiri\r\n- Nomor Rekening: 12000007768513\r\n- a.n. Nama Rekening: PT. DATA SOLUSINDO');

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
(1, 1, 'Pemasangan Perangkat CCTV (IP Camera)'),
(2, 1, 'Pemasangan Perangkat Pendukung dan Aksesoris'),
(3, 1, 'Installasi Software dan Testing'),
(4, 2, 'sdfsdfsdfdsf'),
(5, 2, 'in idalah contoh judul uraian kerja'),
(6, 3, 'sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `uraian_kerja_details`
--

CREATE TABLE `uraian_kerja_details` (
  `id` int(11) NOT NULL,
  `uraian_kerja_id` int(11) NOT NULL,
  `uraian_kerja` varchar(255) NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `volume` int(4) DEFAULT NULL,
  `bobot_kontrak` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uraian_kerja_details`
--

INSERT INTO `uraian_kerja_details` (`id`, `uraian_kerja_id`, `uraian_kerja`, `satuan`, `volume`, `bobot_kontrak`) VALUES
(6, 1, 'Pemasangan Ip Camera Outdoor', 'unit', 5, 20),
(7, 1, 'Pemasangan Ip Camera Indoor', 'unit', 5, 15),
(8, 1, 'Pemasangan Network video recorder ', 'unit', 2, 10),
(9, 1, 'Pemasangan Storage Disk dan Power Suply', 'unit', 10, 10),
(10, 2, 'Pemasangan Kabel UTP', 'm', 100, 10),
(11, 2, 'Pemasangan Kabel Eterna', 'm', 50, 5),
(12, 2, 'Pemasangan Pipca Conduct', 'Ls', 1, 15),
(13, 3, 'Installasi Camera Test dan Commisioning', 'Ls', 2, 15),
(15, 4, 'sdfds', 'unit', 2, 2),
(16, 5, 'contoh nama uraian kerja', 'ton', 100, 10),
(17, 5, 'ini adalah contoh nama uraian kerja', 'Ls', 30, 5),
(18, 6, 'sdfsdf', 'dsfdsf', 234, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `tipe_user` enum('admin','manager','rekanan','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama_lengkap`, `password`, `tipe_user`) VALUES
(1, 'admin', 'admin', '$2y$10$1gzjN0W63bTm4GjVeZ853O.ASsaVtIsNY31m221TnvcHN.KHWA5/e', 'superadmin'),
(2, 'manager', 'Manager', '$2y$10$3g9bqTOhBDqSa/fjk7ncfelW1J4PuSf7qmzUNydTolQV9C4WmmEF6', 'manager'),
(3, 'user003', 'PT. DATA SOLUSINDO', '$2y$10$I0f.FIesnUAZLoFB2wwE5euomYV30KnHML3U0WuIdamR3AXtxgFVK', 'rekanan'),
(4, 'user004', 'PT. Elektronik Komunika Informasi', '$2y$10$9n/5EwLzPb2Hbry5ltp3A.AS8uaNU9mOMQoa3edWkDej1QZ3IOH5C', 'rekanan'),
(5, 'user005', 'PT. Aplikasi Anak Bangsa', '$2y$10$SY3Bkb1Kx44ceY.hVKlUnuTE/eREizCcaKw44gQ2m9zPxWmemKfDy', 'rekanan'),
(6, 'user006', 'PT. ARYA DUTA MANDIRI', '$2y$10$Apj69BqSZ3m2fyT9Yql7o.6hJ0DKpgmigjeszV6akS1J1nWatjlPq', 'rekanan'),
(7, 'user007', 'PT. Sigma Solusi Data', '$2y$10$ewvwyRJLYBHng9I4baEiM.cRG.1hOQ3Ise/4vBLCIdKMGtdoTKnc6', 'rekanan'),
(8, 'sdfsdfsdf', 'sdfdsf', '$2y$10$2kPz4JkDRDzlkktQGL/YqukZtZmgCsR0mwflTLaBUL103iCV.aL5K', 'rekanan'),
(9, 'admin2', 'admin2', '$2y$10$7/FcU43hSm/TGdgKmbIrL.tn6hM1Vo0Bgr3NufQAxy8uW38UkPeBC', 'admin'),
(10, 'admin3', 'admin3', '$2y$10$ESnGLEcGw.Jyal.MnQcOfuUe.E0RK38ubGsYo11F8JSjuULyyKzui', 'admin');

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
-- Indexes for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyek_id` (`proyek_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `proyeks`
--
ALTER TABLE `proyeks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `realisasis`
--
ALTER TABLE `realisasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uraian_kerjas`
--
ALTER TABLE `uraian_kerjas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uraian_kerja_details`
--
ALTER TABLE `uraian_kerja_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD CONSTRAINT `tagihans_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `proyeks` (`id`) ON DELETE CASCADE;

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
