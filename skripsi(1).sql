-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2019 at 09:53 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `d_id` varchar(20) DEFAULT NULL,
  `d_pass` varchar(32) DEFAULT NULL,
  `d_role` varchar(20) DEFAULT NULL,
  `d_nama` varchar(50) DEFAULT NULL,
  `r_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `d_id`, `d_pass`, `d_role`, `d_nama`, `r_id`) VALUES
(2, 'kaprodi', '098f6bcd4621d373cade4e832627b4f6', 'kaprodi', 'Kaprodi', 'r0001'),
(3, 'rpl', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen RPL 1', 'r0001'),
(4, 'kbj', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen KBJ 1', 'r0002'),
(5, 'kcv', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen KCV 1', 'r0003'),
(6, 'ajk', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen AJK 1', 'r0004'),
(7, 'igs', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen IGS 1', 'r0005'),
(8, 'mi', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen MI 1', 'r0006'),
(9, 'alpro', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen ALPRO 1', 'r0007'),
(10, 'dtk', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen DTK 1', 'r0008'),
(11, 'rpl2', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen RPL 2', 'r0001'),
(12, 'kbj2', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen KBJ 2', 'r0002'),
(13, 'kcv2', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen KCV 2', 'r0003'),
(14, 'ajk2', '098f6bcd4621d373cade4e832627b4f6', 'rmk', 'Dosen AJK 2', 'r0004');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `m_id` varchar(20) DEFAULT NULL,
  `m_pass` varchar(32) DEFAULT NULL,
  `m_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `m_id`, `m_pass`, `m_nama`) VALUES
(1, 'mhs', '098f6bcd4621d373cade4e832627b4f6', 'Gilbert L Therry'),
(2, 'mhs2', '098f6bcd4621d373cade4e832627b4f6', 'aaaaaaaaaaaaaaaa'),
(3, 'mhs3', '098f6bcd4621d373cade4e832627b4f6', 'aassssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `p_id` int(11) NOT NULL,
  `r_id` varchar(5) DEFAULT NULL,
  `m_id` varchar(20) DEFAULT NULL,
  `p_judul` varchar(50) DEFAULT NULL,
  `p_deskripsi` varchar(200) DEFAULT NULL,
  `p_file` varchar(240) DEFAULT NULL,
  `p_status` varchar(40) DEFAULT NULL,
  `p_dosbing1` varchar(50) DEFAULT NULL,
  `p_dosbing2` varchar(50) DEFAULT NULL,
  `p_catatan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`p_id`, `r_id`, `m_id`, `p_judul`, `p_deskripsi`, `p_file`, `p_status`, `p_dosbing1`, `p_dosbing2`, `p_catatan`) VALUES
(10, 'r0003', 'mhs', 'as', 'as', 'ACFrOgDp0Jd4irgcy1Fmj05D981kkLSSbNOGi1MtCEtpF20zzQDL1J9Pkbg8q4DhHuUYqMGyAneiQLOdWtvCCLakbtb0cAsvWAZ2_iYyESx5jHLp_y55jUK.pdf', 'Ditolak', NULL, NULL, NULL),
(11, 'r0004', 'mhs', 'asd', 'asd', 'Ch12_Crypto6e(1).pdf', 'Diterima', ' RMK AJK ', ' RMK AJK ', NULL),
(12, 'r0002', 'mhs2', ' jaringan NCC ', ' NCC ', 'E-Sertifikat_Sekolah_Pasar_Modal_-_Gilbert_Lijaya_Therry.pdf', 'Diterima', ' Dosen KBJ 1 ', ' Dosen KBJ 1 ', 'nnnn'),
(13, 'r0001', 'mhs3', 'RPL', 'RPL1', 'E-Sertifikat_Sekolah_Pasar_Modal_-_Gilbert_Lijaya_Therry1.pdf', 'Tunggu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmk`
--

CREATE TABLE `rmk` (
  `id` int(11) NOT NULL,
  `r_id` varchar(5) DEFAULT NULL,
  `r_nama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rmk`
--

INSERT INTO `rmk` (`id`, `r_id`, `r_nama`) VALUES
(1, 'r0001', 'RPL'),
(2, 'r0002', 'KBJ'),
(3, 'r0003', 'KCV'),
(4, 'r0004', 'AJK'),
(6, 'r0005', 'IGS'),
(7, 'r0006', 'MI'),
(8, 'r0007', 'ALPRO'),
(9, 'r0008', 'DTK');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `d_role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `d_role`) VALUES
(2, 'kaprodi'),
(1, 'rmk');

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `t_id` int(11) NOT NULL,
  `t_penguji1` varchar(50) DEFAULT NULL,
  `t_penguji2` varchar(50) DEFAULT NULL,
  `t_tanggal` datetime DEFAULT NULL,
  `t_status` varchar(30) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `t_abstrak` varchar(250) DEFAULT NULL,
  `t_file` varchar(250) DEFAULT NULL,
  `t_nilai` varchar(2) DEFAULT NULL,
  `bimbingan_file` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`t_id`, `t_penguji1`, `t_penguji2`, `t_tanggal`, `t_status`, `p_id`, `t_abstrak`, `t_file`, `t_nilai`, `bimbingan_file`) VALUES
(11, ' Dosen AJK 1 ', ' Dosen AJK 1 ', '0000-00-00 00:00:00', 'Selesai', 11, 'bb', 'Transkrip_Mata_Kuliah.pdf', 'B', 'MeeberAppGilbertLijayaTherry.pdf'),
(12, ' Dosen KBJ 2 ', ' Dosen KBJ 1 ', '2019-04-20 00:00:00', 'Selesai', 12, 'ccccc', 'TUGAS_1_DATA_MINING1.pdf', 'B', 'kuncinya.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `d_role` (`d_role`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_id` (`m_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `id` (`p_id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `rmk`
--
ALTER TABLE `rmk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `r_id` (`r_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_desc` (`d_role`);

--
-- Indexes for table `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `p_id` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rmk`
--
ALTER TABLE `rmk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ta`
--
ALTER TABLE `ta`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `rmk` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_ibfk_3` FOREIGN KEY (`d_role`) REFERENCES `role` (`d_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_3` FOREIGN KEY (`m_id`) REFERENCES `mahasiswa` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proposal_ibfk_4` FOREIGN KEY (`r_id`) REFERENCES `rmk` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ta`
--
ALTER TABLE `ta`
  ADD CONSTRAINT `ta_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `proposal` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
