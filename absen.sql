-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 07:22 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl_absen` date NOT NULL,
  `absen_masuk` time NOT NULL,
  `absen_pulang` time DEFAULT NULL,
  `keterangan_absen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_user`, `tgl_absen`, `absen_masuk`, `absen_pulang`, `keterangan_absen`) VALUES
(6, 1, '2021-09-05', '00:19:00', '00:20:54', 'Bekerja Di Kantor'),
(7, 2, '2021-09-05', '00:21:00', '00:21:19', 'Bekerja Di Kantor');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(5) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `jam_masuk` time NOT NULL,
  `bts_absen_masuk` time NOT NULL,
  `bts_absen_pulang` time NOT NULL,
  `logo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `instansi`, `jam_masuk`, `bts_absen_masuk`, `bts_absen_pulang`, `logo`) VALUES
(1, 'MI Muhammadiyah Debong Wetan', '06:30:00', '08:00:00', '15:30:00', 'Logo_Instansi210904-5470ab7570.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` int(2) NOT NULL COMMENT '0=User, 1=Admin	',
  `foto` varchar(40) DEFAULT NULL,
  `dibuat` timestamp NULL DEFAULT NULL,
  `diubah` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `role`, `foto`, `dibuat`, `diubah`) VALUES
(1, 'admin', '$2y$10$QaPqCPEc66/Oix9DQRPUSOTMM/p49NB/q7xtu7Ty5VDLmPFMeiDQy', 'Zamghoni Mukhotob', 1, 'Foto_User210904-0fba596106.png', '2021-09-04 07:39:00', '2021-09-04 12:25:34'),
(2, 'user', '$2y$10$MHhVzKyOvjKcSOC3cCME3.zj9xC.vWPIGuI/gghvpzhnZjkJtu.pu', 'Joyboy', 0, '', '2021-09-04 16:37:43', '2021-09-04 16:43:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
