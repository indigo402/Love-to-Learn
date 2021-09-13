-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 08:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nik` int(15) NOT NULL,
  `nama` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kategori` varchar(75) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `kategori`) VALUES
(481709021, 'Indigo', 'Jakarta', '1999-01-16', 'l', 'p'),
(481709022, 'Aninda Safira', 'Jakarta Timur', '1999-02-16', 'p', 'p'),
(489231321, 'Ardiansyah', 'Dadap', '2000-05-25', 'l', 's');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(9) NOT NULL,
  `judul` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pengarang` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `penerbit` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tahun_terbit` varchar(4) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isbn` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jumlah_buku` int(4) NOT NULL,
  `lokasi` enum('rak1','rak2','rak3') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(1, 'Profil masyarakat adat Cek Bocek Selesek Reen Sury dan rencana tata ruang wilayah adat', 'Febriyan Anindita, Dianto, Jasardi Gunawan', 'Bania Publishing', '2020', '978-602-9043-40-2', 12, 'rak1', '2020-11-23'),
(2, 'The dynamics of law and politics in Southeast Asia', 'editor, Suyatno Ladiqi ... [et al.]', 'Airlangga University Press', '2020', '978-602-473-667-5', 5, 'rak2', '2020-11-22'),
(3, 'Landasan-landasan pembelajaran sains', 'Yusuf Hilmi Adisendjaja ; editor, Sri Redjeki', 'UPI Press', '2020', '978-623-7776-79-6', 15, 'rak1', '2020-11-21'),
(4, 'Pembelajaran masyarakat menuju kemandirian dan keteraturan sosial', 'Sahroni ; editor, Yadi Mulyadi', 'UPI Press', '2020', '978-623-7776-80-2', 5, 'rak1', '2020-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tranksaksi`
--

CREATE TABLE `tb_tranksaksi` (
  `id` int(9) NOT NULL,
  `judul` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `nik` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `tgl_pinjam` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tgl_kembali` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_tranksaksi`
--

INSERT INTO `tb_tranksaksi` (`id`, `judul`, `nik`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 'The dynamics of law and politics in Southeast Asia', '481709021', 'Indigo ', '04-11-2020', '24-11-2020', 'Pinjam'),
(2, 'Landasan-landasan pembelajaran sains', '481709022', 'Aninda Safira', '15-11-2020', '25-11-2020', 'Pinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tranksaksi`
--
ALTER TABLE `tb_tranksaksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `nik` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_tranksaksi`
--
ALTER TABLE `tb_tranksaksi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
