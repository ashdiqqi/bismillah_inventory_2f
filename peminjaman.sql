-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 10:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` enum('admin') NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nip`, `nama_lengkap`, `email`, `password`, `no_hp`, `level`, `foto`) VALUES
('100', 'Pak Sujadi', 'SujadiTI1@gmail.com', '321', '08123', 'admin', ''),
('200', 'Mbak Novi', 'NoviTI1@gmail.com', '123', '098937', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `maintainer` varchar(30) NOT NULL,
  `qty_tersedia` int(11) NOT NULL,
  `qty_total` int(11) NOT NULL,
  `foto_barang` blob NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `maintainer`, `qty_tersedia`, `qty_total`, `foto_barang`, `deskripsi`) VALUES
('1', 'Mouse', '100', 5, 10, 0x6d6f7573652e706e67, 'Mouse geming'),
('2', 'Crimping', '100', 9, 10, 0x6372696d70696e672e6a7067, 'Edit'),
('5', 'keyboard', '200', 10, 10, 0x70702e6a7067, '2312');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `id_peminjaman` varchar(20) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `nip` varchar(10) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`id_peminjaman`, `nim`, `id_barang`, `nip`, `tgl_pinjam`, `tgl_kembali`, `status`, `qty`) VALUES
('2', '666', '2', '200', '2023-12-17', '2023-12-17', 'Menunggu', 3),
('3', '555', '2', '100', '2023-12-17', '2023-12-17', 'Menunggu', 3),
('4', '555', '2', '100', '2023-12-18', '2023-12-25', 'Ditolak', 3),
('5', '666', '2', '100', '2023-12-17', '2023-12-17', 'Diterima', 2),
('6', '666', '2', '100', '2023-12-17', '2023-12-17', 'Ditolak', 1),
('7', '123', '2', '100', '2023-12-19', '2023-12-21', 'Diterima', 1),
('8', '123', '2', '100', '2023-12-27', '2023-12-27', 'Menunggu', 4),
('9', '123', '1', '100', '2023-12-27', '2023-12-27', 'Diterima', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nim` varchar(10) NOT NULL,
  `level` enum('user') NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `foto_mahasiswa` blob NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim`, `level`, `nama_lengkap`, `password`, `email`, `no_hp`, `foto_mahasiswa`, `kelas`) VALUES
('123', 'user', 'Muhammad Dayutirta Mahara', '321', 'Dayutirta20@gmail.com', '089661321786', 0x6261636b67726f756e642e6a7067, 'TI-2F'),
('555', 'user', 'ronaldi', '111', 'edittest@email', '09111555', 0x70702e6a7067, 'TI-2A'),
('666', 'user', 'ronaldo', '321', 'testingEdit@email', '089321666', 0x6368616e6e656c73345f70726f66696c652e6a7067, 'TI-2B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD CONSTRAINT `fk_pinjam_barang_admin` FOREIGN KEY (`nip`) REFERENCES `admin` (`nip`) ON DELETE CASCADE,
  ADD CONSTRAINT `pinjam_barang_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `user` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjam_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
