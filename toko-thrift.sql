-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 02:05 AM
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
-- Database: `toko-thrift`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_diskon` varchar(125) DEFAULT NULL,
  `diskon` varchar(125) DEFAULT NULL,
  `tgl_selesai` varchar(50) DEFAULT NULL,
  `member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `nama_diskon`, `diskon`, `tgl_selesai`, `member`) VALUES
(6, 4, '0', '0', NULL, 1),
(7, 4, '0', '0', '0', 2),
(8, 4, '0', '0', NULL, 3),
(12, 6, 'Gratis Ongkir', '20000', '2022-11-11', 1),
(13, 6, '0', '0', NULL, 2),
(14, 6, '0', '0', '0', 3),
(15, 7, '0', '0', NULL, 1),
(16, 7, '0', '0', NULL, 2),
(17, 7, '0', '0', NULL, 3),
(18, 8, 'Promo Tanggal Kembar', '15', '2022-11-11', 1),
(19, 8, '0', '0', NULL, 2),
(20, 8, '0', '0', NULL, 3),
(21, 9, '0', '0', NULL, 1),
(22, 9, '0', '0', NULL, 2),
(23, 9, '0', '0', NULL, 3),
(24, 10, '0', '0', NULL, 1),
(25, 10, '0', '0', NULL, 2),
(26, 10, '0', '0', NULL, 3),
(27, 11, '0', '0', NULL, 1),
(28, 11, 'Promo Tanggal Kembar', '10000', '2022-11-11', 2),
(29, 11, '0', '0', NULL, 3),
(30, 12, '0', '0', NULL, 1),
(31, 12, '0', '0', NULL, 2),
(32, 12, '0', '0', NULL, 3),
(33, 13, '0', '0', NULL, 1),
(34, 13, '0', '0', NULL, 2),
(35, 13, '0', '0', NULL, 3),
(36, 14, '0', '0', NULL, 1),
(37, 14, '0', '0', NULL, 2),
(38, 14, '0', '0', NULL, 3),
(39, 15, '0', '0', NULL, 1),
(40, 15, '0', '0', NULL, 2),
(41, 15, '0', '0', NULL, 3),
(42, 16, '0', '0', NULL, 1),
(43, 16, '0', '0', NULL, 2),
(44, 16, '0', '0', NULL, 3),
(45, 17, '0', '0', NULL, 1),
(46, 17, '0', '0', NULL, 2),
(47, 17, '0', '0', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `keterangan`, `img`) VALUES
(1, 2, 'j', 'a21.jpg'),
(2, 1, 'k', 'c11.jpg'),
(4, 5, 'Adidas', 'pembuatan-sepatu-adidas1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar`) VALUES
(2, 'Model Anak-anak', 'category-3.jpg'),
(5, 'Accessories', 'category-5.jpg'),
(6, 'Model Perempuan', '2ec2a93b-7e7c-4e69-9d7f-d438e260f8ae_169.jpeg'),
(7, 'Model Laki-laki', 'kemeja-pria.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(125) DEFAULT NULL,
  `lokasi` int(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_toko`, `lokasi`, `alamat`) VALUES
(1, 'Toko Thrift', 211, 'Kuningan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(125) DEFAULT NULL,
  `jenis_kel` varchar(20) NOT NULL,
  `email` varchar(125) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `no_tlpn` varchar(15) DEFAULT NULL,
  `point` bigint(11) DEFAULT NULL,
  `level_member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kel`, `email`, `password`, `alamat`, `kode_pos`, `no_tlpn`, `point`, `level_member`) VALUES
(1, 'siti', '1', 'siti@gmail.com', '12345', 'Kuningan Jawa barat', '1234', '8372907302', 161080, 2),
(2, 'andi', '2', 'rizkihasbiallah06@gmail.com', '12345678', 'Kuningan Jawa barat', '1234', '8372907302', 976, 3),
(3, 'sasa', '1', 'silva@gmail.com', '12341234', 'Kuningan Jawa barat', '1234', '8372907302', 161080, 2),
(4, 'dadi', '2', 'hai@gmail.com', 'sayakamu', 'Kuningan Jawa barat', '1234', '0921829108', 161080, 2),
(5, 'ds', '1', 'fauziatresnawati@gmail.com', 'A12345saya@', 'waduk darma', '41231', NULL, 0, 3),
(6, 'Fahri Hairil', '2', 'Fahri@gmail.com', 'Fahri123', 'Cipondok', '45561', NULL, 0, 3),
(7, 'Lita Fujianti', '1', 'lita@gmail.com', 'Litaf123', 'Cineumbeuy', '45574', NULL, 2955, 2),
(8, 'Elin Ayi', '1', 'elinayi@gmail.com', 'Elina123', 'Langseb', '45574', NULL, 1820, 2),
(9, 'Tiar Pratiwi', '1', 'Tiar@gmail.com', 'Tiarp123', 'Langseb', '45574', NULL, 2480, 2),
(10, 'Holillah', '1', 'Holillah@gmai.com', 'Holillah123', 'Cinagara', '45574', NULL, 2480, 2),
(11, 'Amalia Dewi', '1', 'amalia@gmail.com', 'Amalia123', 'Langseb', '45574', NULL, 660, 3),
(12, 'Tia Pratiwi', '1', 'tia@gmail.com', 'Tiap1234', 'Cipetir', '45571', NULL, 2540, 2),
(13, 'Fahri Hairil', '2', 'fahriha@gmail.com', 'Fahri1234', 'cipetir', '45565', NULL, 348040, 3),
(14, 'Dian Diana', '1', 'dian@gmail.com', 'Dian1234', 'Jalaksana', '45564', NULL, 0, 3),
(15, 'Lilis Suhaeti', '1', 'lilis@gmail.com', 'Lilis123', 'Maleber', '45575', NULL, 346650, 3),
(16, 'ari', '2', 'ari@gmail.com', 'Ari12345@', 'jakarta selatan', '2131', NULL, 0, 3),
(17, 'Sintia Bella', '1', 'sintia1@gmail.com', 'Sintia123', 'Kadugede', '45561', NULL, 0, 3),
(18, 'Lina Aminati', '1', 'lina@gmail.com', 'Linaa123', '-', '', NULL, 655, 3),
(19, 'jablay', '1', 'jablay@gmail.com', 'Asu123456@', 'jablay', '12121', NULL, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(125) DEFAULT NULL,
  `berat` varchar(50) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `deskripsi` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `berat`, `images`, `deskripsi`) VALUES
(4, 6, 'Kemeja Linen', '500', '2130004-20211018214125-67885220249887884.jpg', 'Bahan adem'),
(6, 5, 'Interior Kursi', '2000', 'g6-1170327fdf4896f574bff9fd355cbbaf.jpg', 'Nyaman dan Kokoh'),
(7, 2, 'Baju daster anak', '300', '20210917-161420_fit-1631870060_model-1-410x470.jpg', 'Nyaman dipakai'),
(8, 7, 'Kemeja Pria', '500', 'aeacba83bddf282f1fa3324a8a043e00527b385f_0.jpg', 'Bahan adem dan tidak menerawang'),
(9, 6, 'Gwina Shirt', '400', '1-16.jpg', 'Wudlu Friendly'),
(10, 6, 'ASHA BLOUSE', '350', 'ASHA_BLOUSE.JPG', 'Tali serut'),
(11, 6, 'LUCIA KNITE', '400', 'LUCIA_KNITE.JPG', 'Kancing Hidup Rajut tebal'),
(12, 6, 'ASTREED BLOUSE', '400', 'ASTREED_BLOUSE.JPG', '•Kancing Aktif •Busui Friendly •Wudlu Friendly'),
(13, 2, 'GAMIS ANAK', '300', 'GAMIS_ANAK.JPG', 'MATERIAL SAKILLA'),
(14, 2, 'KEMEJA ANAK', '300', 'KEMEJA_ANAK.JPG', 'Full Kancing hidup'),
(15, 2, 'KAOS ANAK', '300', 'KAOS_ANAK.JPG', 'MATERIAL KAOS POLO'),
(16, 2, 'BLOUSE ANAK', '350', 'BLOUSE_ANAK.JPG', 'MATERIAL KNITE'),
(17, 7, 'kayu manis', '12', 'product-81.jpg', 'bahan ktun halus');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `atas_nama`, `no_rek`) VALUES
(1, 'BRI', 'siti', '32412356453'),
(2, 'BNI', 'janela', '54235653232');

-- --------------------------------------------------------

--
-- Table structure for table `rinci_transaksi`
--

CREATE TABLE `rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_diskon` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_size` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rinci_transaksi`
--

INSERT INTO `rinci_transaksi` (`id_rinci`, `no_order`, `id_diskon`, `id_produk`, `id_size`, `qty`) VALUES
(1, '20220916G2N80NF4', 9, 4, 4, 1),
(2, '20220916PNMGRX5S', 6, 3, 3, 5),
(3, '20220916PNMGRX5S', 9, 4, 4, 8),
(4, '202209198GNRTNMS', 8, 8, NULL, 1),
(5, '20220920H20ITXJL', 14, 6, 7, 1),
(6, '20220920YLXPGDQE', 8, 4, 8, 1),
(7, '20220920OBZ2WFNR', 17, 7, 6, 1),
(8, '20220920LVBXWH8C', 14, 6, 7, 1),
(9, '20220920OP9FUJNV', 14, 6, 7, 1),
(10, '20220920MCIPZFKF', 14, 6, 7, 1),
(11, '20220920MCIPZFKF', 8, 4, 8, 1),
(12, '202209219M8LSKKZ', 14, 6, 7, 1),
(13, '202209219M8LSKKZ', 8, 4, 8, 1),
(14, '20220921HYUPVG1G', 8, 4, 8, 1),
(15, '20220921WTSOM6JA', 15, 6, NULL, 1),
(16, '20220921WTSOM6JA', 12, 7, NULL, 1),
(17, '20220921WTSOM6JA', 18, 9, NULL, 1),
(18, '20220921NEOMBMJZ', 8, 4, 8, 1),
(19, '20220921VSXZJV0H', 14, 6, 7, 1),
(20, '20220921VSXZJV0H', 17, 7, 6, 1),
(21, '20220928DSELOW9Y', 17, 7, 6, 1),
(22, '202210043LHR1KCU', 14, 6, 7, 1),
(23, '20221004TOPD4GLY', 20, 8, 9, 1),
(24, '20221004TOPD4GLY', 17, 7, 6, 1),
(25, '20221006E9743OJD', 29, 11, 20, 1),
(26, '20221006E9743OJD', 23, 9, 18, 1),
(27, '20221006E9743OJD', 14, 6, 7, 1),
(28, '202210061UR6L3XK', 29, 11, 20, 1),
(29, '20221017XQJPG4TE', 38, 14, 16, 1),
(30, '20221017M5FH4VYJ', 18, 9, NULL, 1),
(31, '20221021XFIRPQS7', 16, 7, 6, 1),
(32, '20221030LTWK7DZR', 27, 20, 20, 1),
(33, '20221030LTWK7DZR', 18, 9, 9, 1),
(34, '20221030L8LSAMO3', 25, 10, 19, 1),
(35, '20221030ZR6X19S0', 13, 6, 7, 1),
(36, '20221030D8OJQFGR', 28, 11, 20, 1),
(37, '20221030KHBKVG7L', 13, 6, 7, 1),
(38, '20221030FMKHN70I', 13, 6, 7, 1),
(39, '20221030HPWOQMXN', 22, 9, 18, 1),
(40, '20230806M9TITMXU', 17, 7, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `riview`
--

CREATE TABLE `riview` (
  `id_riview` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(125) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `status` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riview`
--

INSERT INTO `riview` (`id_riview`, `id_pelanggan`, `id_produk`, `nama_pelanggan`, `tanggal`, `isi`, `status`) VALUES
(1, 1, 2, 'siti', '2022-09-14', 'mantep', 1),
(2, 1, 2, 'siti', '2022-09-14', 'faha', 1),
(3, 7, 6, 'Lita Fujianti', '2022-09-20', 'sanngat bagus', 1),
(4, 8, 6, 'Elin Ayi', '2022-09-20', 'paket nyampe', 1),
(5, 9, 6, 'Tiar Pratiwi', '2022-09-20', 'barang sudah sampai', 1),
(6, 10, 6, 'Holillah', '2022-09-21', 'paket sudah sampai', 1),
(7, 11, 4, 'Amalia Dewi', '2022-09-21', 'paket sudah sampai', 1),
(8, 12, 6, 'Tia Pratiwi', '2022-09-21', 'Terimakasih paketnya sudah sampai', 1),
(9, 13, 6, 'Fahri Hairil', '2022-10-04', 'sudah sampai', 1),
(10, 13, 6, 'Fahri Hairil', '2022-10-04', 'paket sudah sampai', 1),
(11, 13, 6, 'Fahri Hairil', '2022-10-04', 'pak', 1),
(12, 15, 11, 'Lilis Suhaeti', '2022-10-06', 'paket sudah sampai', 1),
(13, 18, 11, 'Lina Aminati', '2022-10-06', 'paket sudah sampai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `warna` varchar(12) DEFAULT NULL,
  `stock` varchar(25) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id_size`, `id_produk`, `size`, `warna`, `stock`, `harga`) VALUES
(1, 2, 'M', NULL, '2', '15000'),
(2, 1, 'M', NULL, '12', '15000'),
(6, 7, 'M', NULL, '50', '120000'),
(7, 6, '2x2 M', NULL, '20', '350000'),
(8, 4, 'M', NULL, '35', '125000'),
(9, 8, 'L', NULL, '20', '150000'),
(10, 16, 's', NULL, '10', '85000'),
(12, 15, '6', NULL, '8', '70000'),
(16, 14, 'S M L XL', NULL, '12', '90000'),
(17, 13, '4 6 8 12 ', NULL, '11', '90000'),
(18, 9, '14 16 18 20', NULL, '13', '162000'),
(19, 10, '20 22 24 ', NULL, '15', '105000'),
(20, 11, '1150/50', NULL, '10', '119000'),
(21, 12, '126/68/75', NULL, '10', '135000'),
(22, 16, 'm', NULL, '12', '1000'),
(23, 16, 'xl', NULL, '65', '430000'),
(24, 17, '12', 'merah', '50', '1210000'),
(25, 17, '12', 'hitam', '50', '1210000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(50) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `no_tlpn` varchar(15) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `ditempat` varchar(25) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `expedisi` varchar(50) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` bigint(50) DEFAULT NULL,
  `grand_total` bigint(11) DEFAULT NULL,
  `total_bayar` bigint(11) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(10) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_depan`, `nama_belakang`, `no_tlpn`, `provinsi`, `ditempat`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_order`, `status_bayar`, `atas_nama`, `nama_bank`, `bukti_bayar`, `no_resi`) VALUES
(1, 1, '20220523POYZMD6Q', '2022-05-23', 'siti', 'jamilah', '085731639595', 'Kalimantan Utara', NULL, 'Tana Tidung', 'Ciawilor', '45591', 'jne', 'OKE', '5-7 Hari', 73000, 270, 304050, 377050, 3, 1, 'opik', 'bri', 'thumb-1.jpg', '12981721'),
(14, 1, '20220921WTSOM6JA', '2022-09-21', NULL, NULL, '8372907302', 'Jawa Barat', NULL, 'Kuningan', 'Kuningan Jawa barat', '1234', 'jne', 'CTC', '1-2 Hari', 21000, 2800, 620000, 641000, 3, 1, NULL, 'BRI', 'Penguins1.jpg', NULL),
(15, 11, '20220921NEOMBMJZ', '2022-09-21', NULL, NULL, NULL, 'Jawa Barat', NULL, 'Kuningan', 'Langseb', '45574', 'jne', 'CTC', '1-2 Hari', 7000, 500, 125000, 132000, 3, 1, NULL, 'bca', 'Koala5.jpg', '8752579054'),
(16, 12, '20220921VSXZJV0H', '2022-09-21', NULL, NULL, NULL, 'Jawa Tengah', NULL, 'Brebes', 'Cipetir', '45571', 'jne', 'OKE', '3-6 Hari', 38000, 2300, 470000, 508000, 3, 1, NULL, 'BRI', 'Lighthouse1.jpg', '657543289'),
(17, 7, '20220928DSELOW9Y', '2022-09-28', NULL, NULL, NULL, 'Kalimantan Timur', NULL, 'Kutai Barat', 'Cineumbeuy', '45574', 'jne', 'OKE', '5-7 Hari', 66000, 300, 120000, 186000, 3, 0, NULL, NULL, NULL, NULL),
(18, 13, '202210043LHR1KCU', '2022-10-04', NULL, NULL, NULL, 'Jawa Timur', NULL, 'Malang', 'cipetir', '45565', 'jne', 'OKE', '2-3 Hari', 42000, 2000, 69650000, 69608000, 3, 1, NULL, 'mandiri', 'bukti_tf.jpg', '6729264528'),
(19, 13, '20221004TOPD4GLY', '2022-10-04', NULL, NULL, NULL, 'Bengkulu', NULL, 'Bengkulu Tengah', 'cipetir', '45565', 'jne', 'OKE', '3-6 Hari', 49000, 800, 270000, 319000, 3, 1, NULL, 'mandiri', 'bukti_tf1.jpg', '86352'),
(20, 15, '20221006E9743OJD', '2022-10-06', NULL, NULL, NULL, 'Jawa Barat', NULL, 'Kuningan', 'Maleber', '45575', 'jne', 'CTC', '1-2 Hari', 21000, 2800, 69351000, 69330000, 3, 1, NULL, 'mandiri', 'bukti_tf2.jpg', '6729264528'),
(21, 18, '202210061UR6L3XK', '2022-10-06', NULL, NULL, NULL, 'Jawa Barat', NULL, 'Bogor', '-', '', 'jne', 'OKE', '2-3 Hari', 12000, 400, 119000, 131000, 3, 1, NULL, 'mandiri', 'bukti_tf3.jpg', '2021080223'),
(22, 1, '20221017XQJPG4TE', '2022-10-17', NULL, NULL, '8372907302', NULL, 'ditempat', NULL, 'Kuningan Jawa barat', '1234', NULL, NULL, NULL, NULL, 300, 90000, 0, 3, 1, NULL, NULL, NULL, '-'),
(23, 1, '20221017M5FH4VYJ', '2022-10-17', NULL, NULL, '8372907302', 'Kalimantan Utara', NULL, 'Bulungan (Bulongan)', 'Kuningan Jawa barat', '1234', 'jne', 'OKE', '5-7 Hari', 63000, 500, 150000, 213000, 0, 0, NULL, NULL, NULL, NULL),
(24, 1, '20221021XFIRPQS7', '2022-10-21', NULL, NULL, '8372907302', 'Bangka Belitung', NULL, 'Bangka Barat', 'Kuningan Jawa barat', '1234', 'ditempat', '', '', 0, 300, 120000, 0, 3, 1, NULL, 'bca', 'ktp.jpeg', NULL),
(25, 1, '20221030LTWK7DZR', '2022-10-30', NULL, NULL, '8372907302', '---Pilih Provinsi---', NULL, NULL, 'Kuningan Jawa barat', '1234', NULL, NULL, '', 0, 900, 246500, 0, 0, 0, NULL, NULL, NULL, NULL),
(26, 1, '20221030L8LSAMO3', '2022-10-30', NULL, NULL, '8372907302', NULL, NULL, NULL, 'Kuningan Jawa barat', '1234', NULL, NULL, NULL, NULL, 350, 105000, 0, 0, 0, NULL, NULL, NULL, NULL),
(27, 1, '20221030ZR6X19S0', '2022-10-30', NULL, NULL, '8372907302', NULL, NULL, NULL, 'Kuningan Jawa barat', '1234', NULL, NULL, NULL, NULL, 2000, 350000, 0, 0, 0, NULL, NULL, NULL, NULL),
(28, 1, '20221030D8OJQFGR', '2022-10-30', NULL, NULL, '8372907302', NULL, 'ditempat', NULL, 'Kuningan Jawa barat', '1234', NULL, NULL, NULL, NULL, 400, -11781000, 0, 0, 0, NULL, NULL, NULL, NULL),
(29, 1, '20221030KHBKVG7L', '2022-10-30', NULL, NULL, '8372907302', 'Kalimantan Tengah', NULL, 'Palangka Raya', 'Kuningan Jawa barat', '1234', 'jne', 'OKE', '3-5 Hari', 92000, 2000, 350000, 442000, 0, 0, NULL, NULL, NULL, NULL),
(30, 1, '20221030FMKHN70I', '2022-10-30', NULL, NULL, '8372907302', 'Kepulauan Riau', NULL, 'Lingga', 'Kuningan Jawa barat', '1234', 'jne', 'OKE', '3-6 Hari', 100000, 2000, 350000, 450000, 0, 0, NULL, NULL, NULL, NULL),
(31, 1, '20221030HPWOQMXN', '2022-10-30', NULL, NULL, '8372907302', NULL, 'ditempat', NULL, 'Kuningan Jawa barat', '1234', NULL, NULL, NULL, NULL, 400, 162000, 0, 0, 0, NULL, NULL, NULL, NULL),
(32, 1, '20230806M9TITMXU', '2023-08-06', NULL, NULL, '8372907302', 'Kalimantan Timur', NULL, 'Paser', 'Kuningan Jawa barat', '1234', 'jne', 'OKE', '5-7 Hari', 68000, 300, 120000, 188000, 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1),
(2, 'pemilik', 'pemilik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `rinci_transaksi`
--
ALTER TABLE `rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `riview`
--
ALTER TABLE `riview`
  ADD PRIMARY KEY (`id_riview`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rinci_transaksi`
--
ALTER TABLE `rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `riview`
--
ALTER TABLE `riview`
  MODIFY `id_riview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
