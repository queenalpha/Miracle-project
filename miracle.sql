  -- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 04:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miracle`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `ID_akun` int(11) NOT NULL,
  `nama_akun` varchar(200) NOT NULL,
  `email_akun` varchar(150) NOT NULL,
  `pass_akun` varchar(150) NOT NULL,
  `Telephone` varchar(100) NOT NULL,
  `pict_akun` varchar(250) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`ID_akun`, `nama_akun`, `email_akun`, `pass_akun`, `Telephone`, `pict_akun`, `status`) VALUES
(1, 'miracle admin', 'miracle@company.com', 'miracle123', '111-210-122', NULL, 'admin'),
(14, 'fahri', 'fahri@gmail.com', '123', '0897865', NULL, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `ID_campaign` int(11) NOT NULL,
  `nama_campaign` varchar(250) NOT NULL,
  `deskripsi` varchar(400) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`ID_campaign`, `nama_campaign`, `deskripsi`, `foto`, `target`) VALUES
(1, 'Bantu si hebat berkebutuhan', 'si hebat berkebutuhan, anak yang baik', '1.jpg', 1000000),
(2, 'Donasi untuk ariel', 'Ariel, gadis kecil 12 tahun sedang berjuang untuk kesembuhannya', 'cancer.jpg', 500000),
(7, 'Ramdhan test', 'bantu ramdhan untuk bisa main game lagi main the forest', 'dan.jpg', 1400000),
(13, 'test', 'test', '', 100000),
(14, 'test', 'test', '', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `ID_donatur` int(11) NOT NULL,
  `nama_donatur` varchar(250) NOT NULL,
  `email_donatur` varchar(200) NOT NULL,
  `telp_donatur` varchar(100) NOT NULL,
  `jumlah_donasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`ID_akun`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`ID_campaign`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`ID_donatur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `ID_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `ID_campaign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `ID_donatur` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
