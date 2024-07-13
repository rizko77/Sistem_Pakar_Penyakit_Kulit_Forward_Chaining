-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 05:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_kulit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kode_g` varchar(255) NOT NULL,
  `nama_g` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode_g`, `nama_g`) VALUES
(1, 'G01', 'Bersin dan Batuk'),
(2, 'G02', 'Sesak Nafas'),
(3, 'G03', 'Hidung Berair'),
(4, 'G04', 'Mata Merah'),
(5, 'G05', 'Mata Berair'),
(6, 'G06', 'Mata Gatal'),
(7, 'G07', 'Kulit Kering'),
(8, 'G08', 'Kulit Perih'),
(9, 'G09', 'Kulit Bersisik'),
(10, 'G10', 'Kulit Melepuh'),
(11, 'G11', 'Kulit Pecah-pecah'),
(12, 'G12', 'Ruam Kemerahan'),
(13, 'G13', 'Sulit Bicara atau menelan'),
(14, 'G14', 'Tekanan darah turun drastis'),
(15, 'G15', 'Denyut Nadi Cepat tapi Lemah'),
(16, 'G16', 'Gatal pada kulit yang mengalami ruam'),
(17, 'G17', 'Bengkak pada bagian tubuh yang terpapar dengan alergen'),
(18, 'G18', 'Pingsan atau tidak sadarkan diri'),
(19, 'G19', 'Bengkak pada lidah maupun bibir'),
(20, 'G20', 'Nyeri pada kulit yang mengalami ruam'),
(21, 'G21', 'Muncul benjolan seperti kutil'),
(22, 'G22', 'Muncul bentol tidak berisi'),
(23, 'G23', 'Infeksi Kulit Oleh Kuman'),
(24, 'G24', 'Bisul pada ketiak'),
(25, 'G25', 'Kulit bersisik pada area selangkangan'),
(26, 'G26', 'Kulit bersisik pada area kaki'),
(28, 'G27', 'Kulit bersisik pada area badan');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode_penyakit`, `nama`, `solusi`) VALUES
(1, 'A01', 'Dermatitis Alergi', 'Perbanyak Minum Air Putih'),
(2, 'A02', 'Dermatitis Iritan', 'Perbanyak Doa Kepada Tuhan'),
(3, 'A03', 'Erisipelas', 'Perbanyak Doa ya sayang'),
(4, 'A04', 'Veruka', 'Perbanyak doa aja yah sayang'),
(5, 'A05', 'Urtikaria', 'Perbanyak aja doa beb'),
(6, 'A06', 'Hidradenitis', 'Perbanyak Istigfar dan berdoa'),
(10, 'A07', 'Miliaria', 'Perbanyak Istigfar dan rajin beribadah'),
(11, 'A08', 'Tinea Corporis', 'Rajin rajin minum air putih jangan begadang'),
(12, 'A09', 'Tinea Pedis', 'Sering sering mengucap dan mengingat Tuhan'),
(14, 'A10', 'Tinea Cruris', 'Rajin berolahraga dan kurangi makan gula');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `id_penyakit`, `id_gejala`) VALUES
(11, 1, 1),
(12, 1, 2),
(13, 1, 3),
(14, 1, 5),
(15, 1, 6),
(17, 2, 4),
(18, 2, 8),
(19, 2, 10),
(20, 2, 12),
(21, 2, 20),
(22, 2, 23),
(23, 3, 12),
(24, 3, 19),
(25, 3, 20),
(26, 3, 14),
(27, 4, 24),
(28, 4, 17),
(29, 4, 21),
(30, 4, 16),
(32, 4, 22),
(33, 5, 17),
(34, 5, 16),
(35, 5, 10),
(36, 5, 22),
(37, 5, 21),
(38, 6, 21),
(39, 6, 8),
(40, 6, 10),
(42, 6, 9),
(43, 6, 20),
(44, 10, 12),
(45, 10, 10),
(46, 10, 8),
(47, 10, 17),
(48, 10, 20),
(49, 11, 6),
(50, 11, 12),
(51, 11, 16),
(52, 11, 20),
(53, 12, 12),
(54, 12, 16),
(55, 12, 9),
(57, 12, 23),
(58, 12, 28),
(59, 14, 12),
(60, 14, 9),
(61, 14, 17),
(62, 14, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rules_ibfk_1` (`id_penyakit`),
  ADD KEY `rules_ibfk_2` (`id_gejala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rules_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
