-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 02:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(50) NOT NULL,
  `nip` int(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tglmulai` int(20) NOT NULL,
  `blnmulai` varchar(20) NOT NULL,
  `tahunmulai` varchar(20) NOT NULL,
  `tglselesai` int(20) NOT NULL,
  `blnselesai` varchar(20) NOT NULL,
  `tahunselesai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nip`, `jabatan`, `tglmulai`, `blnmulai`, `tahunmulai`, `tglselesai`, `blnselesai`, `tahunselesai`) VALUES
(1, 10152569, 'Direktur', 17, 'Mei', '2011', 13, 'September', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_user` int(20) NOT NULL,
  `user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id_user`, `user`, `username`, `password`) VALUES
(1, 'Rizki', 'admin', 'admin'),
(2, 'Setiawan', 'kise', 'kise');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mutasi`
--

CREATE TABLE `tbl_mutasi` (
  `id_mutasi` int(50) NOT NULL,
  `nip` int(50) NOT NULL,
  `jenis_mutasi` varchar(50) NOT NULL,
  `no_sk` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mutasi`
--

INSERT INTO `tbl_mutasi` (`id_mutasi`, `nip`, `jenis_mutasi`, `no_sk`) VALUES
(1, 10152569, 'Masuk', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nip` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tgl` int(20) NOT NULL,
  `bln` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `stat_pernikahan` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nip`, `nama`, `tempat`, `tgl`, `bln`, `tahun`, `agama`, `jk`, `stat_pernikahan`, `alamat`, `email`) VALUES
(10152569, 'Rizki Setiawan', 'Banyumas', 17, 'Februari', '1990', ' Islam', 'Pria', 'Tidak Menikah', 'Karangnunggal, TasikMalaya', 'rzsetiawan17@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_data_pendidikan` int(50) NOT NULL,
  `nip` int(50) NOT NULL,
  `pendidikan_akhir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_data_pendidikan`, `nip`, `pendidikan_akhir`) VALUES
(1, 10152569, 'S1/D4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_mutasi`
--
ALTER TABLE `tbl_mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_data_pendidikan`),
  ADD KEY `nip` (`nip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD CONSTRAINT `tbl_jabatan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tbl_pegawai` (`nip`);

--
-- Constraints for table `tbl_mutasi`
--
ALTER TABLE `tbl_mutasi`
  ADD CONSTRAINT `tbl_mutasi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tbl_pegawai` (`nip`);

--
-- Constraints for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD CONSTRAINT `tbl_pendidikan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tbl_pegawai` (`nip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
