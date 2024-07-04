-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 06:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` char(5) NOT NULL,
  `nama_obat` varchar(16) NOT NULL,
  `jenis_obat` varchar(25) NOT NULL,
  `harga_obat` int(11) NOT NULL,
  `stok` int(9) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `jenis_obat`, `harga_obat`, `stok`, `tanggal_kadaluarsa`) VALUES
('a1', 'bodrex', 'pusing', 2400, 12, '2024-04-12'),
('a2', 'paramex', 'pusing', 3000, 50, '2025-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` char(5) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `tanggal_registrasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telepon`, `email`, `tanggal_registrasi`) VALUES
('aa1', 'ucok', 'jln.restu', '0865444412344', 'ucok123@gmail.com', '2024-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `Id_transaksi` char(5) NOT NULL,
  `id_obat` char(5) NOT NULL,
  `id_pelanggan` char(5) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `metode_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`Id_transaksi`, `id_obat`, `id_pelanggan`, `jumlah_obat`, `total_harga`, `tanggal_transaksi`, `metode_pembayaran`) VALUES
('1a', 'a2', 'aa1', 2, 6000, '2024-02-23', 'Debit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`Id_transaksi`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
