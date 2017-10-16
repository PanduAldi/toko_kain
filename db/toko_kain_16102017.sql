-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2017 at 04:55 
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toko_kain`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
`id_bank` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `no_rek` varchar(12) NOT NULL,
  `an` varchar(150) NOT NULL,
  `img` varchar(140) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `bank`
--

TRUNCATE TABLE `bank`;
--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama`, `no_rek`, `an`, `img`) VALUES
(1, 'bank bri', '123-0293-901', 'badjatex', 'Logo_BRI.png'),
(2, 'BANK MANDIRI', '123-456-7687', 'BADJATEX', 'mandiri_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

DROP TABLE IF EXISTS `detail_transaksi`;
CREATE TABLE IF NOT EXISTS `detail_transaksi` (
`id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `detail_transaksi`
--

TRUNCATE TABLE `detail_transaksi`;
-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode` varchar(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `kategori`
--

TRUNCATE TABLE `kategori`;
--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `kode`) VALUES
(1, 'kain taslan', 'TSL'),
(2, 'kain parasut', 'PRS'),
(3, 'kain gamis', 'GMS'),
(4, 'kain kanvas', 'KNV');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pelanggan` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `alamat` text NOT NULL,
  `id_prov` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `pelanggan`
--

TRUNCATE TABLE `pelanggan`;
--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `jk`, `email`, `password`, `alamat`, `id_prov`, `provinsi`, `id_kab`, `kabupaten`, `telp`, `create_date`) VALUES
(1, 'Pandu Aldi Pratama', 'l', 'pandu@pandu.com', '290f138c376f2a1e018b36d470e07586ed9c4bb4', 'alamat contoh', 10, 'Jawa Tengah', 92, 'Brebes', '0895398992', '2017-10-15 21:35:32'),
(2, 'aldi', 'l', 'aldi@aldi.om', '93c213f7e4e70b6340d7312605ab9c3e42f0ac44', 'alamat contoh', 2, 'Bangka Belitung', 29, 'Bangka Selatan', '0895398992', '2017-10-15 21:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
`id_pembayaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `no_rek` int(11) NOT NULL,
  `an` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `pembayaran`
--

TRUNCATE TABLE `pembayaran`;
-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `img` varchar(150) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `terjual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `user_update` varchar(100) NOT NULL,
  `user_create` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `produk`
--

TRUNCATE TABLE `produk`;
--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `id_kategori`, `img`, `nama`, `terjual`, `stok`, `harga`, `create_date`, `date_update`, `user_update`, `user_create`, `deskripsi`) VALUES
(1, 'TSL001', 1, 'milky.jpg', 'Kain Taslan Milky Kode TSL-9999', 0, 12, 60000, '2017-09-30 15:01:36', '2017-10-08 07:10:18', 'admin', 'admin', 'ini adlaah deskripsi dari produk ini'),
(2, 'TSL002', 1, 'taslan-bening.jpg', 'Kain Taslan Coating Bening Kode TSL-9998', 0, 12, 50000, '2017-09-30 15:03:25', '2017-09-30 15:03:25', '-', 'admin', '12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `transaksi`
--

TRUNCATE TABLE `transaksi`;
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_full_name` varchar(150) NOT NULL,
  `user_password` varchar(70) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_last_login` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_full_name`, `user_password`, `user_email`, `user_last_login`, `create_date`, `status`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '111', '2017-10-07 22:51:29', '2017-09-30 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
 ADD PRIMARY KEY (`id_detail_transaksi`), ADD KEY `id_transaksi` (`id_transaksi`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`id_pembayaran`), ADD KEY `id_pelanggan` (`id_pelanggan`), ADD KEY `id_transaksi` (`id_transaksi`), ADD KEY `id_pelanggan_2` (`id_pelanggan`,`id_transaksi`,`id_bank`), ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`), ADD UNIQUE KEY `no_invoice` (`no_invoice`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
