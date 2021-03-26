-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2021 at 03:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `night_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(130) NOT NULL,
  `keterangan` varchar(230) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(5) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Sepatu', 'Sepatu merk all star', 'Peralatan olahraga', 300000, 8, 'sepatu.jpg'),
(2, 'Kamera', 'Kamera CANON EOS 7000', 'Elektronik', 6000000, 5, 'kamera.jpeg'),
(3, 'Samsung S8', 'Samsung HP Terbaru', 'Elektronik', 9500000, 14, 'hp.jpeg'),
(4, 'Laptop MBP M1', 'Macbook Pro 256GB SSD', 'Elektronik', 15000000, 20, 'Laptop.jpeg'),
(5, 'T-shitr Flower', 'Bahan awet', 'Pakaian Anak-Anak', 400000, 2, 'bajuflower.jpeg'),
(6, 'Nike Ball', 'Bola Bliter', 'Peralatan Olahraga', 800000, 2, 'bola.png'),
(7, 'Raket Yonex', 'Kuat Tahan Banting', 'Peralatan Olahraga', 4500000, 2, 'raket.png'),
(12, 'Switer Yellow', 'Bahan Bagus', 'Pakaian Anak-Anak', 312000, 5, 'switer.png'),
(13, 'Sarung Tinju', 'kuat tak tertandingi', 'Peralatan Olahraga', 653000, 5, 'tinju.jpeg'),
(14, 'Dagadu', 'Bahan Awet', 'Pakaian Pria', 452200, 3, 'boyred.jpeg'),
(15, 'Bloods Shirt', 'Bahan cotton 30s', 'Pakaian Pria', 652100, 10, 'boywhite.jpeg'),
(16, 'Shirt Women', 'Bahan terbaru', 'Pakaian Wanita', 809999, 16, 'images.jpeg'),
(17, 'Baju Wanita', 'Bahan cotton 30s', 'Pakaian Wanita', 9500000, 13, 'merah.jpeg'),
(18, 'Baju wanita tosca', 'Baju Adem', 'Pakaian Wanita', 150000, 3, 'tosca.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hadiah`
--

CREATE TABLE `tb_hadiah` (
  `id` int(11) NOT NULL,
  `id_poin` int(11) NOT NULL,
  `hadiah_brg` varchar(100) NOT NULL,
  `stok_brg` int(11) NOT NULL,
  `nama_brg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hadiah`
--

INSERT INTO `tb_hadiah` (`id`, `id_poin`, `hadiah_brg`, `stok_brg`, `nama_brg`) VALUES
(1, 10, 'bola.png', 5, 'Bola'),
(2, 15, 'raket.png', 3, 'Raket Yonex');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(5, 'kirun', 'jakarta', '2021-03-26 00:46:38', '2021-03-27 00:46:38'),
(6, '', '', '2021-03-26 10:14:41', '2021-03-27 10:14:41'),
(7, '', '', '2021-03-26 10:15:51', '2021-03-27 10:15:51'),
(8, 'kirun', 'Bekasi', '2021-03-26 19:01:22', '2021-03-27 19:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 5, 1, 'Sepatu', 1, 300000, ''),
(2, 5, 2, 'Kamera', 1, 6000000, ''),
(3, 6, 1, 'Sepatu', 1, 300000, ''),
(4, 7, 3, 'Samsung S8', 1, 9500000, ''),
(5, 8, 1, 'Sepatu', 1, 300000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN 
UPDATE tb_barang SET stok = stok-NEW.jumlah
WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'Admin', 'admin', '123', 1),
(2, 'User', 'user', '123', 2),
(3, 'Kirun', 'Kirun', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_hadiah`
--
ALTER TABLE `tb_hadiah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_hadiah`
--
ALTER TABLE `tb_hadiah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
