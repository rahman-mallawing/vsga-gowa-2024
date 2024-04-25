-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for jwd_vsga
DROP DATABASE IF EXISTS `jwd_vsga`;
CREATE DATABASE IF NOT EXISTS `jwd_vsga` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `jwd_vsga`;

-- Dumping structure for table jwd_vsga.t_pesanan
CREATE TABLE IF NOT EXISTS `t_pesanan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `phone` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `jum_peserta` int DEFAULT NULL,
  `jum_hari` int DEFAULT NULL,
  `akomodasi` varchar(1) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `transportasi` varchar(1) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `service_makanan` varchar(1) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `harga_paket` double DEFAULT NULL,
  `total_tagihan` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table jwd_vsga.t_pesanan: ~12 rows (approximately)
INSERT INTO `t_pesanan` (`id`, `nama`, `phone`, `jum_peserta`, `jum_hari`, `akomodasi`, `transportasi`, `service_makanan`, `harga_paket`, `total_tagihan`) VALUES
	(1, 'LSP Informatika', '0983856664', 2, 2, 'Y', 'N', 'N', 1700000, 3400000),
	(2, 'Amir', '09374637885', 1, 2, 'N', 'Y', 'Y', 1400000, 3000000),
	(3, 'Merti', '0047656', 4, 3, 'N', 'Y', 'N', 1700000, 6000000),
	(4, 'Wawan', '09876547', 3, 3, 'N', 'Y', 'N', 750000, 7950000),
	(5, 'Jufri', '09876543', 2, 3, 'Y', 'Y', 'Y', 800000, 7500000),
	(6, 'Yuliana', '09876547', 3, 3, 'Y', 'N', 'Y', 350000, 4650000),
	(11, 'Slindi', '0853887456', 3, 2, 'Y', 'Y', 'N', 1000, 2206000),
	(12, 'Gifari', '087778987123', 3, 3, 'N', 'Y', 'N', 1000, 1209000),
	(17, 'RAHMAN', '8888888888', 3, 2, 'Y', 'N', 'Y', 1000, 1506000);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
