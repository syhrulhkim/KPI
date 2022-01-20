-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kpimaster
CREATE DATABASE IF NOT EXISTS `kpimaster` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kpimaster`;

-- Dumping structure for table kpimaster.date
CREATE TABLE IF NOT EXISTS `date` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.date: ~5 rows (approximately)
/*!40000 ALTER TABLE `date` DISABLE KEYS */;
INSERT INTO `date` (`id`, `year`, `month`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
	(13, '2025', 'May', '8', '2021-12-05 13:44:01', '2021-12-05 13:44:01', 'Not Submitted'),
	(14, '2024', 'April', '8', '2021-12-05 22:49:01', '2021-12-05 22:49:01', 'Not Submitted'),
	(15, '2037', 'October', '8', '2021-12-05 22:49:04', '2021-12-05 22:49:04', 'Not Submitted'),
	(16, '2037', 'May', '8', '2021-12-05 22:49:10', '2021-12-05 22:49:10', 'Not Submitted'),
	(17, '2040', 'August', '8', '2021-12-05 22:49:16', '2021-12-05 22:49:16', 'Not Submitted'),
	(18, '2021', 'December', '8', '2021-12-07 01:50:10', '2021-12-07 01:50:10', 'Not Submitted');
/*!40000 ALTER TABLE `date` ENABLE KEYS */;

-- Dumping structure for table kpimaster.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table kpimaster.kecekapan
CREATE TABLE IF NOT EXISTS `kecekapan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kecekapan_teras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peratus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_pekerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_penyelia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_sebenar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kecekapan: ~4 rows (approximately)
/*!40000 ALTER TABLE `kecekapan` DISABLE KEYS */;
INSERT INTO `kecekapan` (`id`, `kecekapan_teras`, `peratus`, `ukuran`, `skor_pekerja`, `skor_penyelia`, `skor_sebenar`, `weightage`, `user_id`, `created_at`, `updated_at`, `year`, `month`) VALUES
	(50, 'Keupayaan Inovatif', '20', 'Percentage (%)', '2', '4', '20', '20', '8', '2021-11-29 06:43:25', '2021-12-01 02:10:16', '2025', 'May'),
	(51, 'Pengurusan Pelanggan', '20', 'Percentage (%)', '4', '4', '20', '20', '8', '2021-11-29 06:43:37', '2021-12-01 01:51:53', '2025', 'May'),
	(52, 'Kepimpinan Organisasi', '20', 'Percentage (%)', '2', '3', '15', '20', '8', '2021-11-29 08:06:41', '2021-12-01 07:25:16', '2025', 'May'),
	(53, 'Pengurusan Pemegang Berkepentingan', '20', 'Percentage (%)', '3', '4', '20', '20', '8', '2021-11-29 08:32:59', '2021-12-06 01:53:19', '2025', 'May'),
	(54, 'Ketangkasan Dalam Organisasi', '20', 'Percentage (%)', '4', '4', '20', '20', '8', '2021-11-30 02:24:55', '2021-12-01 02:12:57', '2025', 'May'),
	(55, 'Pengurusan Pemegang Berkepentingan', '20', 'Percentage (%)', '3', NULL, NULL, '20', '8', '2021-12-02 09:27:48', '2021-12-02 09:27:56', '2024', 'July'),
	(56, 'Keupayaan Inovatif', '20', 'Percentage (%)', '4', NULL, NULL, '20', '8', '2021-12-06 04:25:51', '2021-12-06 04:25:51', '2040', 'August');
/*!40000 ALTER TABLE `kecekapan` ENABLE KEYS */;

-- Dumping structure for table kpimaster.kpi
CREATE TABLE IF NOT EXISTS `kpi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fungsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peratus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `threshold` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stretch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pencapaian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor_KPI` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor_sebenar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kpimaster_id` bigint(20) DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kpi: ~16 rows (approximately)
/*!40000 ALTER TABLE `kpi` DISABLE KEYS */;
INSERT INTO `kpi` (`id`, `fungsi`, `bukti`, `peratus`, `ukuran`, `threshold`, `base`, `stretch`, `pencapaian`, `skor_KPI`, `skor_sebenar`, `user_id`, `created_at`, `updated_at`, `kpimaster_id`, `year`, `month`) VALUES
	(3, 'Kad Skor Korporat', 'dcfgvhjn', '90', 'Percentage (%)', '1', '2', '3', '3', '100', '90', '8', '2021-11-29 04:36:40', '2021-11-29 09:36:28', 3, '2025', 'May'),
	(4, 'Kecemerlangan Operasi', 'tyuijkl;\'', '40', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '12.24', '8', '2021-11-29 04:39:20', '2021-11-29 04:39:20', 4, '2025', 'May'),
	(5, 'Manusia & Proses (NCROFI)', 'gcngc', '50', 'Percentage (%)', '1', '2', '3', '3', '100', '50', '8', '2021-11-29 06:31:38', '2021-11-29 06:31:38', 5, '2024', 'April'),
	(6, 'Kecemerlangan Operasi', 'srgsrdgf', '20', 'Month/Year', '30', '65', '100', '30.6', '30.60', '6.12', '8', '2021-12-02 09:17:16', '2021-12-02 09:17:16', 4, '2025', 'May'),
	(7, 'Manusia & Proses (NCROFI)', 'waedwed', '30', 'Quarter', '8', '9', '10', '3', '0', '0', '8', '2021-12-02 09:27:16', '2021-12-02 09:27:25', 6, '2025', 'May'),
	(8, 'Manusia & Proses (NCROFI)', '5teeferferf', '50', 'Month/Year', '1', '2', '3', '2.5', '82.50', '41.25', '8', '2021-12-06 01:34:21', '2021-12-06 01:34:21', 6, '2025', 'May'),
	(9, 'Kolaborasi', 'srtgfxbcbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '20', 'Ratio', '1', '2', '3', '3', '0', '0', '8', '2021-12-06 01:58:32', '2021-12-06 04:25:26', 7, '2025', 'May'),
	(10, 'Kolaborasi', 'wDWAD', '20', 'Rating', '1', '2', '3', '3', '100', '20', '8', '2021-12-06 02:43:21', '2021-12-06 03:37:45', 7, '2025', 'May'),
	(11, 'Kolaborasi', 'ascsxz', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2021-12-06 03:36:33', '2021-12-06 03:36:33', 7, '2025', 'May'),
	(12, 'Kad Skor Korporat', 'awedwed', '20', 'Ratio', '1', '2', '3', '3', '100', '20', '8', '2021-12-06 03:37:07', '2021-12-06 03:37:07', 3, '2025', 'May'),
	(13, 'Kad Skor Korporat', 'fcbfcxbcfb', '50', 'Percentage (%)', '1', '2', '3', '3', '100', '50', '8', '2021-12-07 01:50:59', '2021-12-07 01:50:59', 8, '2021', 'December'),
	(14, 'Kewangan', 'rdgfrdg', '20', 'Ratio', '1', '2', '3', '18', '100', '20', '8', '2021-12-07 01:51:51', '2021-12-07 01:51:51', 9, '2021', 'December'),
	(15, 'Pelanggan (Outer)', 'asdcasd', '20', 'Ratio', '1', '2', '3', '3', '100', '20', '8', '2021-12-07 02:39:07', '2021-12-07 02:39:07', 10, '2021', 'December'),
	(16, 'Kad Skor Korporat', 'ewdedewd', '40', 'Hours', '1', '2', '3', '3', '100', '40', '8', '2021-12-07 06:20:14', '2021-12-07 06:20:14', 8, '2021', 'December'),
	(17, 'Manusia & Proses (Training)', 'wdadawad', '20', 'Rating', '1', '2', '3', '3', '100', '20', '8', '2021-12-07 06:20:27', '2021-12-07 06:20:27', 11, '2021', 'December'),
	(18, 'Kad Skor Korporat', 'wdwe', '10', 'Rating', '1', '2', '3', '3', '100', '10', '8', '2021-12-07 06:21:03', '2021-12-07 06:21:03', 8, '2021', 'December'),
	(19, 'Pelanggan (Outer)', 'wqewqe', '5', 'Percentage (%)', '1', '2', '3', '3', '100', '5', '8', '2021-12-07 06:21:16', '2021-12-07 06:21:16', 10, '2021', 'December'),
	(20, 'Manusia & Proses (Training)', 'wdwed', '50', 'Percentage (%)', '1', '2', '3', '3', '100', '50', '8', '2021-12-07 06:23:01', '2021-12-07 06:23:01', 11, '2021', 'December');
/*!40000 ALTER TABLE `kpi` ENABLE KEYS */;

-- Dumping structure for table kpimaster.kpi_all
CREATE TABLE IF NOT EXISTS `kpi_all` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `grade_master` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightage_master` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_score_master` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_all` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_score_all` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `weightage_kecekapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_score_kecekapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightage_nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_score_nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kpi_all: ~6 rows (approximately)
/*!40000 ALTER TABLE `kpi_all` DISABLE KEYS */;
INSERT INTO `kpi_all` (`id`, `grade_master`, `weightage_master`, `total_score_master`, `grade_all`, `total_score_all`, `user_id`, `created_at`, `updated_at`, `weightage_kecekapan`, `total_score_kecekapan`, `weightage_nilai`, `total_score_nilai`, `year`, `month`, `status`) VALUES
	(75, 'LOW SILVER', '110', '58.25', 'LOW SILVER', '57.35', '8', '2021-11-29 04:36:40', '2021-12-06 03:41:18', '100', '95', '60', '15', '2025', 'May', 'Not Submitted'),
	(76, 'NO GRED', '40', '0', 'NO GRED', '0', '8', '2021-11-29 06:31:38', '2021-11-29 06:31:38', NULL, NULL, NULL, NULL, '2024', 'April', 'Not Submitted'),
	(77, NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted'),
	(78, NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted'),
	(79, NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted'),
	(80, NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted'),
	(81, 'BRONZE', '60', '20', 'BRONZE', '16', '8', '2021-12-07 01:50:59', '2021-12-07 06:21:03', NULL, NULL, NULL, NULL, '2021', 'December', NULL);
/*!40000 ALTER TABLE `kpi_all` ENABLE KEYS */;

-- Dumping structure for table kpimaster.kpi_master
CREATE TABLE IF NOT EXISTS `kpi_master` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fungsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_master` double DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objektif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pencapaian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_KPI` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_sebenar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kpiall_id` bigint(20) DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kpi_master: ~9 rows (approximately)
/*!40000 ALTER TABLE `kpi_master` DISABLE KEYS */;
INSERT INTO `kpi_master` (`id`, `fungsi`, `percent_master`, `link`, `objektif`, `pencapaian`, `skor_KPI`, `skor_sebenar`, `user_id`, `created_at`, `updated_at`, `kpiall_id`, `year`, `month`) VALUES
	(3, 'Kad Skor Korporat', 30, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan keputusan yang cemerlang melalui proses yang konsisten', '110', '100', '30', '8', '2021-11-29 04:36:40', '2021-12-06 03:37:07', 75, '2025', 'May'),
	(4, 'Kecemerlangan Operasi', 20, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan persekitaran bersih', '18.36', '0', '0', '8', '2021-11-29 04:39:20', '2021-12-02 09:17:16', 75, '2025', 'May'),
	(5, 'Manusia & Proses (NCROFI)', NULL, NULL, NULL, '50', NULL, NULL, '8', '2021-11-29 06:31:38', NULL, 76, '2024', 'April'),
	(6, 'Manusia & Proses (NCROFI)', 20, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan persekitaran bersih', '41.25', '41.25', '8.25', '8', '2021-12-02 09:27:16', '2021-12-06 03:41:18', 75, '2025', 'May'),
	(7, 'Kolaborasi', 40, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan persekitaran bersih', '50', '50', '20', '8', '2021-12-06 01:58:17', '2021-12-06 03:37:36', 75, '2025', 'May'),
	(8, 'Kad Skor Korporat', 20, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan persekitaran bersih', '100', '100', '20', '8', '2021-12-07 01:50:59', '2021-12-07 06:21:03', 81, '2021', 'December'),
	(9, 'Kewangan', 20, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan persekitaran bersih', '20', '0', '0', '8', '2021-12-07 01:51:51', '2021-12-07 02:14:18', 81, '2021', 'December'),
	(10, 'Pelanggan (Outer)', 20, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan persekitaran bersih', '25', '0', '0', '8', '2021-12-07 02:39:07', '2021-12-07 06:21:16', 81, '2021', 'December'),
	(11, 'Manusia & Proses (Training)', NULL, NULL, NULL, '70', '70', '0', '8', '2021-12-07 06:20:27', '2021-12-07 06:23:01', 81, '2021', 'December');
/*!40000 ALTER TABLE `kpi_master` ENABLE KEYS */;

-- Dumping structure for table kpimaster.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.migrations: ~32 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_09_27_042854_edit_user', 1),
	(5, '2021_09_27_065449_edit_user2', 1),
	(6, '2021_09_30_040451_kecekapan', 1),
	(7, '2021_09_30_040624_nilai', 1),
	(8, '2021_09_30_062618_kpi', 1),
	(9, '2021_10_06_035309_bukti', 1),
	(11, '2021_10_13_044922_bukti2', 2),
	(12, '2021_10_13_084726_user2', 2),
	(13, '2021_10_15_064925_bukti3', 3),
	(14, '2021_10_16_075347_kpi2', 4),
	(15, '2021_10_21_055438_kpi3', 5),
	(16, '2021_10_24_065912_user3', 6),
	(18, '2021_11_01_080102_kpi_master', 7),
	(19, '2021_11_03_065003_kpi4', 8),
	(20, '2021_11_11_145331_bukti4', 9),
	(21, '2021_11_11_145542_user4', 10),
	(22, '2021_11_11_145936_nilai2', 11),
	(23, '2021_11_11_150234_kecekapan2', 12),
	(24, '2021_11_11_150413_kpi5', 13),
	(28, '2021_11_20_035153_kpi_all', 14),
	(29, '2021_11_20_044815_kpi_master2', 15),
	(30, '2021_11_22_034025_kpi_all2', 16),
	(31, '2021_11_25_034257_kpi_all3', 17),
	(32, '2021_11_27_080647_kpi_all4', 18),
	(34, '2021_11_29_012501_date2', 19),
	(36, '2021_11_29_015748_kpi6', 20),
	(37, '2021_11_29_020954_kpimaster3', 21),
	(38, '2021_11_29_030707_kecekapan3', 22),
	(39, '2021_11_29_031137_nilai3', 23),
	(40, '2021_11_29_071830_kpi_all5', 24),
	(41, '2021_12_01_042746_date3', 25),
	(42, '2021_12_01_070929_user5', 26);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table kpimaster.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nilai_teras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peratus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_pekerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_penyelia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_sebenar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.nilai: ~2 rows (approximately)
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` (`id`, `nilai_teras`, `peratus`, `ukuran`, `skor_pekerja`, `skor_penyelia`, `skor_sebenar`, `weightage`, `user_id`, `created_at`, `updated_at`, `year`, `month`) VALUES
	(71, 'Keputusan', '20', 'Percentage (%)', '1', NULL, '10', '20', '8', '2021-11-29 08:54:59', '2021-12-02 04:53:05', '2025', 'May'),
	(72, 'Sumbangan', '20', 'Percentage (%)', '2', NULL, '5', '20', '8', '2021-11-29 08:55:04', '2021-12-02 09:28:15', '2025', 'May'),
	(73, 'Kepimpinan', '20', 'Percentage (%)', '4', NULL, NULL, '20', '8', '2021-11-29 08:57:46', '2021-11-29 08:57:46', '2025', 'May'),
	(74, 'Perkembangan', '20', 'Percentage (%)', '4', NULL, NULL, '20', '8', '2021-12-02 09:28:07', '2021-12-02 09:28:07', '2025', 'May');
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

-- Dumping structure for table kpimaster.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table kpimaster.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nostaff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.users: ~17 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nostaff`, `position`, `department`, `unit`, `grade`, `role`) VALUES
	(1, 'Admin User', 'admin@softui.com', '2021-10-06 06:50:45', '$2y$10$ycbsOuRpyvGAnsS17Doq8eWwUYjLuOxriN8XK2ymrfEHycpbH..uG', 'j3YLZLBuRW3qGj6XKxsoj74gq3kGVRQvYG9PB4Mwh2RwClF5kJqqZX24s4NA', '2021-10-06 06:50:45', '2021-10-06 06:50:45', 'A001', 'Junior Non-Executive (NE1)', 'Research & Development (R&D)', 'Web developer', 'NE2', 'admin'),
	(2, 'Moderator User', 'moderator@gmail.com', '2021-10-06 06:50:57', '$2y$10$X79woze/Fu42cNJdVqJb8OiF2Io3JO0MVd27EJPIrQK9wwbbK3QN2', '5dMLJ0s39RRUp1O2FhPjWZZ8vJmY4hbDB371H3o3aMYSGf1NE8VTlWm5ZOxP', '2021-10-06 06:50:57', '2021-10-06 06:50:57', 'A001', 'Junior Non-Executive (NE1)', 'CEO Office', 'Alpha', 'NE2', 'moderator'),
	(3, 'Employee User', 'employee@gmail.com', NULL, '$2y$10$bBJo4BIBlhqsWGU/AEHpfu/vhOXJR4pm0XRWJVdu5EVzSCj1/HHsq', NULL, '2021-10-07 01:21:44', '2021-11-03 07:58:49', 'A001', 'Deputy General Manager (UM1)', 'Research & Development (R&D)', 'Web developer', 'NE2', 'employee'),
	(5, 'HR User', 'hr@gmail.com', NULL, '$2y$10$AjiY7RhfUc1rC.4L2JRiL.6V18VdSwvu.oM/zkvOhmo0k8/i3Jfii', NULL, '2021-10-07 09:19:46', '2021-10-07 09:19:46', 'A001', 'Junior Non-Executive (NE1)', 'Research & Development (R&D)', 'Web developer', 'NE2', 'hr'),
	(6, 'Manager User', 'manager@gmail.com', NULL, '$2y$10$6UOL3ShPuorFXMtlnBtAMOIyXR/lyt0Vdl10x1DSohOJcurESIEH2', NULL, '2021-10-07 09:20:25', '2021-10-07 09:20:25', 'A001', 'Deputy General Manager (UM1)', 'Research & Development (R&D)', 'Web developer', 'NE2', 'manager'),
	(7, 'Employee2 user', 'employee2@gmail.com', NULL, '$2y$10$EAsWLWd5ccaOVCiSR6.bYO0u890UoZUTbprz1/3Uq97JXTAqJ2EQy', NULL, '2021-10-09 02:40:36', '2021-11-17 02:42:08', 'A001', 'Deputy General Manager (UM1)', 'Marketing', 'Eagle', 'NE2', 'employee'),
	(8, 'Muhammad john', 'employee3@gmail.com', NULL, '$2y$10$Ng7ikmKSNv2KJz0hDBlvKONkaVLoBPEAq0oPjQZGkjX2nh4MXylYe', NULL, '2021-10-09 02:44:56', '2021-12-02 04:40:38', 'A023', 'Executive (E2)', 'Research & Development (R&D)', 'Web Developer', 'NE2', 'employee'),
	(12, 'Employee6 user', 'employee6@gmail.com', NULL, '$2y$10$LhhkVwoiE03f1nT6Lg/i9.CmuZN.5JzQqiFMD0jmd188lSRnIZTA.', NULL, '2021-10-24 09:09:10', '2021-10-24 09:09:10', 'A001', 'COO (UM4)', 'Research & Development (R&D)', 'Hawk', 'NE2', 'employee'),
	(13, 'Employee7 user', 'employee7@gmail.com', NULL, '$2y$10$aT1HB9gEtqGbVq/M6pLlPOMmsrDxiIEUB7a.0eQZutppT5AwWqsb.', NULL, '2021-10-25 02:24:14', '2021-10-28 06:38:09', 'A001', NULL, 'Research & Development (R&D)', NULL, 'NE2', 'employee'),
	(15, 'Employee4 user', 'employee4@gmail.com', NULL, '$2y$10$oYUmjDs7KSrXOG39cysdfOA.2U.RJOU2AHqAoOy3tvsX3hf.crq0W', NULL, '2021-11-13 11:18:16', '2021-11-13 11:18:16', 'A001', 'Executive (E2)', 'Human Resource (HR) & Administration', NULL, 'NE2', 'employee'),
	(16, 'Muhammad Hakim', 'hakimhambali99@gmail.com', NULL, '$2y$10$o9skYkPdjKeu2CviwshyZueJQXC.jsEsp3dS5D5HVQahWpuaQb0iW', NULL, '2021-11-14 05:33:17', '2021-11-14 05:34:10', 'A023', 'CEO (TM2)', 'Human Resource (HR) & Administration', 'Web Designer', NULL, 'employee'),
	(17, 'Muhammad Hakim Bin Md Hambali', 'hakimhambali77@gmail.com', NULL, '$2y$10$RF9RraJ1qb5FhU.Cek43AO96P3B9KvJ6pqGBaueQG2WtFe53fpbNq', NULL, '2021-11-15 11:58:00', '2021-11-15 11:58:00', 'A001', 'Executive (E2)', 'Research & Development (R&D)', 'Web Developer', NULL, 'employee'),
	(19, 'Haikal', 'haikalsidek77@gmail.com', NULL, '$2y$10$kogCk6Pb/GTwg7e8HBjIBOAIObv/bMXTsPLngPscOtdcB/ZL7J2OO', NULL, '2021-11-15 22:56:25', '2021-11-15 22:56:25', 'A007', 'CEO (TM2)', 'Marketing', 'Account Receivable', NULL, 'employee'),
	(20, 'Muhammad Hakim ', 'hakimhambali88@gmail.com', NULL, '$2y$10$M1yJ9CLoZVkzPYPxH.Gno.VPD/ZsnMSon7KMgqcq2tvFiyJ4vXBVy', NULL, '2021-11-16 09:59:02', '2021-11-16 09:59:02', NULL, NULL, NULL, NULL, NULL, 'manager'),
	(25, 'Test', 'test77@gmail.com', NULL, '$2y$10$8/Y7vVEneP29fhs6kn9rd.thch7UEFhaiOksSdl3ygMQlNxU6Kb5y', NULL, '2021-11-20 06:44:34', '2021-11-20 06:44:34', 'A007', 'General Manager (UM2)', 'Sales', 'Inventory & Logistic', NULL, 'employee'),
	(26, 'Test', 'test67@gmail.com', NULL, '$2y$10$t0ZqpCSiy9wbxJ/72cHwq.SWCkUbT/wMKdBkvps08t8nC5ofelj7.', NULL, '2021-11-20 06:56:41', '2021-11-20 06:56:41', 'A001', 'Senior General Manager (UM3)', 'Human Resource (HR) & Administration', 'Inventory & Logistic', NULL, 'employee'),
	(27, 'Muhammad Hakim', 'hakimhambali55@gmail.com', NULL, '$2y$10$KnY/IRQxW6Pdl046/Dpsiuf1L8lAbywFCDp8kgAea5GSML9r.uxtq', NULL, '2021-11-26 01:53:39', '2021-11-26 01:53:39', 'A007', 'Executive (E2)', 'Research & Development (R&D)', 'Web Developer', NULL, 'employee');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
