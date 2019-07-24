-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2019 at 03:56 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekg`
--

CREATE TABLE `ekg` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `irama` varchar(32) NOT NULL,
  `rate` varchar(32) NOT NULL,
  `axis` varchar(32) NOT NULL,
  `kelainan` varchar(32) NOT NULL,
  `kesimpulan` varchar(32) NOT NULL,
  `saran` varchar(32) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(16) NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ekg`
--

INSERT INTO `ekg` (`id`, `id_pasien`, `id_dokter`, `irama`, `rate`, `axis`, `kelainan`, `kesimpulan`, `saran`, `keterangan`, `status`, `hapus`, `tanggal`) VALUES
(1, 3, 2, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'Selesai', 0, '2019-07-21 19:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `jenis` varchar(16) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(8) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `hapus` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `jenis`, `stok`, `satuan`, `keterangan`, `tgl_masuk`, `hapus`, `updated_at`, `created_at`) VALUES
(1, 'Paracetamol', 'Tablet', 30, 'pcs', 'Obat penurun demam', '2019-04-06', 0, '2019-04-06 20:15:37', '2019-04-06 20:15:37'),
(2, 'Oskadon', 'Tablet', 23, 'pcs', 'Obat sakit kepala', '2019-04-05', 0, '2019-04-06 20:33:38', '2019-04-06 20:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `no_pasien` varchar(32) NOT NULL,
  `ktp` varchar(32) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `goldarah` varchar(2) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pekerjaan` varchar(32) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `hapus` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `no_pasien`, `ktp`, `nama`, `gender`, `tempat_lahir`, `tanggal_lahir`, `phone`, `goldarah`, `alamat`, `pekerjaan`, `tgl_daftar`, `hapus`, `updated_at`, `created_at`) VALUES
(3, 'MHS0003', '327507123242432', 'Ujang Suaep', 'P', 'Bekasi', '1998-07-15', '08323434893', 'A', 'Dimana aja', 'Nganggur', '2019-07-13', 0, '2019-07-13 18:41:31', '2019-07-13 18:41:31'),
(4, 'MHS0004', '3275071232423456', 'Sudirman', 'L', 'Rumah Sakit', '1992-06-07', '0812349248902', 'B', 'Boleh boleh', 'Bebas', '2019-06-21', 0, '2019-07-13 18:43:49', '2019-06-13 18:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `penanggung`
--

CREATE TABLE `penanggung` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `ktp` varchar(32) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pekerjaan` varchar(32) NOT NULL,
  `perusahaan` varchar(32) NOT NULL,
  `hubungan` varchar(32) NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekammedis`
--

CREATE TABLE `rekammedis` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `keluhan` varchar(32) NOT NULL,
  `diagnosa` varchar(32) NOT NULL,
  `tindakan` varchar(32) NOT NULL,
  `tanggal` date NOT NULL,
  `hapus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rekammedis`
--

INSERT INTO `rekammedis` (`id`, `id_pasien`, `id_dokter`, `id_obat`, `keluhan`, `diagnosa`, `tindakan`, `tanggal`, `hapus`) VALUES
(1, 3, 2, 1, 'Sakit Kepala', 'Migrain', 'Tidur', '2019-07-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rontgen`
--

CREATE TABLE `rontgen` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `cor` varchar(32) NOT NULL,
  `pulmo` varchar(32) NOT NULL,
  `costae` varchar(32) NOT NULL,
  `sinus` varchar(32) NOT NULL,
  `diapragma` varchar(32) NOT NULL,
  `jenis_periksa` varchar(32) NOT NULL,
  `kesan` varchar(32) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(16) NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rontgen`
--

INSERT INTO `rontgen` (`id`, `id_pasien`, `id_dokter`, `cor`, `pulmo`, `costae`, `sinus`, `diapragma`, `jenis_periksa`, `kesan`, `keterangan`, `status`, `hapus`, `tanggal`) VALUES
(1, 3, 2, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'Selesai', 0, '2019-07-21 19:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `spirometri`
--

CREATE TABLE `spirometri` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `nilai_prediksi` int(11) NOT NULL,
  `kvp` int(11) NOT NULL,
  `vep` int(11) NOT NULL,
  `ape` int(11) NOT NULL,
  `kesan` varchar(32) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(16) NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spirometri`
--

INSERT INTO `spirometri` (`id`, `id_pasien`, `id_dokter`, `nilai_prediksi`, `kvp`, `vep`, `ape`, `kesan`, `keterangan`, `status`, `hapus`, `tanggal`) VALUES
(1, 3, 2, 0, 0, 0, 0, 'test', 'test', 'Selesai', 0, '2019-07-21 19:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jabatan` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `spesialis` varchar(32) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `hapus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `alamat`, `jabatan`, `email`, `password`, `spesialis`, `gender`, `phone`, `picture`, `hapus`, `created_at`, `updated_at`) VALUES
(1, 999999, 'Administrator', 'Jl. Koperpu 31', 'Web Development', 'wahyu@sarjanaweb.com', '3b7375a688b1820b016224646365e127de125ff0', NULL, 'L', '085219842984', NULL, 0, '2019-04-04 21:10:03', '2019-04-07 12:13:20'),
(2, 31338, 'Dr. Allya', 'Bekasi', 'Dokter', 'allya@gmail.com', 'c39bd3bdad05f1fedccb3864e58912adacc9f228', 'Ahli Radiologi', 'P', '08324143829', NULL, 0, '2019-04-06 16:45:59', '2019-05-05 09:02:57'),
(3, 31339, 'Surya Kencana', 'Bekasi', 'Pegawai', 'surya@gmail.com', '1d2727face9e8a5171fd434ca9ac155020be70db', NULL, 'L', '084234188332', NULL, 0, '2019-04-06 17:32:32', '2019-04-07 12:13:30'),
(4, 31340, 'Diajeng Putri', 'Malang', 'Pegawai', 'putri@gmail.com', 'b9f08a0a16e7ed30ab463acaf6f15c46f9c5ff21', NULL, 'P', '081244359031', NULL, 0, '2019-04-06 17:35:11', '2019-04-11 20:07:56'),
(5, 31341, 'Dr. Riana Dewi', 'Bandung', 'Dokter', 'riana@gmail.com', 'bf67983bf7400cac1a51913d276301b38581f309', 'Kulit', 'P', '08522138921', NULL, 0, '2019-04-06 17:41:17', '2019-04-06 17:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `usg`
--

CREATE TABLE `usg` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hepar` text NOT NULL,
  `empedu` text NOT NULL,
  `pankreas` text NOT NULL,
  `lien` text NOT NULL,
  `ginjal` text NOT NULL,
  `bulibuli` text NOT NULL,
  `prostat` text NOT NULL,
  `kesan` text NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(16) NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usg`
--

INSERT INTO `usg` (`id`, `id_pasien`, `id_dokter`, `hepar`, `empedu`, `pankreas`, `lien`, `ginjal`, `bulibuli`, `prostat`, `kesan`, `keterangan`, `status`, `hapus`, `tanggal`) VALUES
(1, 3, 2, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'Selesai', 0, '2019-07-21 19:59:57'),
(2, 4, 1, '', '', '', '', '', '', '', '', '', 'Pending', 0, '2019-07-24 08:54:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekg`
--
ALTER TABLE `ekg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penanggung`
--
ALTER TABLE `penanggung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `rontgen`
--
ALTER TABLE `rontgen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `spirometri`
--
ALTER TABLE `spirometri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usg`
--
ALTER TABLE `usg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekg`
--
ALTER TABLE `ekg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penanggung`
--
ALTER TABLE `penanggung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekammedis`
--
ALTER TABLE `rekammedis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rontgen`
--
ALTER TABLE `rontgen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spirometri`
--
ALTER TABLE `spirometri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usg`
--
ALTER TABLE `usg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ekg`
--
ALTER TABLE `ekg`
  ADD CONSTRAINT `ekg_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ekg_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Constraints for table `penanggung`
--
ALTER TABLE `penanggung`
  ADD CONSTRAINT `penanggung_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Constraints for table `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD CONSTRAINT `rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`),
  ADD CONSTRAINT `rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rekammedis_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`);

--
-- Constraints for table `rontgen`
--
ALTER TABLE `rontgen`
  ADD CONSTRAINT `rontgen_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rontgen_ibfk_3` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Constraints for table `spirometri`
--
ALTER TABLE `spirometri`
  ADD CONSTRAINT `spirometri_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `spirometri_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Constraints for table `usg`
--
ALTER TABLE `usg`
  ADD CONSTRAINT `usg_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `usg_ibfk_3` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
