-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for testing_nibras
CREATE DATABASE IF NOT EXISTS `testing_nibras` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `testing_nibras`;

-- Dumping structure for table testing_nibras.mst_ukuran
CREATE TABLE IF NOT EXISTS `mst_ukuran` (
  `kode_ukuran` varchar(255) COLLATE armscii8_bin NOT NULL,
  `ukuran` text COLLATE armscii8_bin,
  PRIMARY KEY (`kode_ukuran`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table testing_nibras.mst_ukuran: ~0 rows (approximately)
/*!40000 ALTER TABLE `mst_ukuran` DISABLE KEYS */;
INSERT INTO `mst_ukuran` (`kode_ukuran`, `ukuran`) VALUES
	('lat3', 'latihan3');
/*!40000 ALTER TABLE `mst_ukuran` ENABLE KEYS */;

-- Dumping structure for table testing_nibras.mst_warna
CREATE TABLE IF NOT EXISTS `mst_warna` (
  `kode_warna` varchar(255) COLLATE armscii8_bin NOT NULL,
  `nama_warna` tinytext COLLATE armscii8_bin,
  PRIMARY KEY (`kode_warna`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table testing_nibras.mst_warna: ~0 rows (approximately)
/*!40000 ALTER TABLE `mst_warna` DISABLE KEYS */;
INSERT INTO `mst_warna` (`kode_warna`, `nama_warna`) VALUES
	('lat1', 'latihan');
/*!40000 ALTER TABLE `mst_warna` ENABLE KEYS */;

-- Dumping structure for table testing_nibras.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `kode_barang` varchar(255) COLLATE armscii8_bin NOT NULL,
  `nama_barang` text COLLATE armscii8_bin,
  `kode_ukuran` text COLLATE armscii8_bin,
  `kode_warna` text COLLATE armscii8_bin,
  `harga` text COLLATE armscii8_bin,
  `harga_dasar` text COLLATE armscii8_bin,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table testing_nibras.produk: ~0 rows (approximately)
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` (`kode_barang`, `nama_barang`, `kode_ukuran`, `kode_warna`, `harga`, `harga_dasar`) VALUES
	('lat2', 'latihan2', 'latihan2', 'latihan2', 'latihan2', 'latihan2');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
