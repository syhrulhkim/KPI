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

-- Dumping structure for table kpimaster.bukti
CREATE TABLE IF NOT EXISTS `bukti` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `objektif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fungsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peratus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `threshold` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stretch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pencapaian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_sebenar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_KPI` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kpi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.bukti: ~0 rows (approximately)
/*!40000 ALTER TABLE `bukti` DISABLE KEYS */;
/*!40000 ALTER TABLE `bukti` ENABLE KEYS */;

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
  `jangkaan_hasil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peratus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_pekerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_penyelia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_sebenar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weightage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kecekapan: ~0 rows (approximately)
/*!40000 ALTER TABLE `kecekapan` DISABLE KEYS */;
INSERT INTO `kecekapan` (`id`, `kecekapan_teras`, `jangkaan_hasil`, `peratus`, `ukuran`, `skor_pekerja`, `skor_penyelia`, `skor_sebenar`, `grade`, `total_score`, `weightage`, `user_id`, `created_at`, `updated_at`, `tahun`, `bulan`) VALUES
	(9, 'Pengurusan Pelanggan', 'wwqewqewqe', '20%', 'Percentage (%)', '1', NULL, NULL, 'BRONZE', '25', '20%', '8', '2021-10-22 03:35:31', '2021-10-22 03:35:31', NULL, NULL);
/*!40000 ALTER TABLE `kecekapan` ENABLE KEYS */;

-- Dumping structure for table kpimaster.kpi
CREATE TABLE IF NOT EXISTS `kpi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fungsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objektif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peratus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `threshold` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stretch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pencapaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor_KPI` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor_sebenar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weightage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kpi: ~4 rows (approximately)
/*!40000 ALTER TABLE `kpi` DISABLE KEYS */;
INSERT INTO `kpi` (`id`, `fungsi`, `objektif`, `bukti`, `peratus`, `ukuran`, `threshold`, `base`, `stretch`, `pencapaian`, `skor_KPI`, `skor_sebenar`, `grade`, `total_score`, `weightage`, `user_id`, `created_at`, `updated_at`, `tahun`, `bulan`, `bukti_id`, `link`) VALUES
	(39, 'Pelanggan (Outer)', 'Memastikan persekitaran bersih', 'sedfeffes', '20', 'Date (dd/mm/yyyy)', '1', '2', '3', '18', '100', '20', 'BRONZE', '20', '20', '8', '2021-10-21 05:59:59', '2021-10-21 05:59:59', '2024', 'Mei', NULL, 'https://www.youtube.com/watch?v=bqF09gVdIDE'),
	(40, 'Pelanggan (Outer)', 'Memastikan persekitaran bersih', 'sefawfd', '20', 'Quantity', '1', '2', '3', '18', '100', '20', 'BRONZE', '20', '20', '8', '2021-10-21 06:21:52', '2021-10-21 06:21:52', '2023', 'Februari', NULL, 'https://www.youtube.com/watch?v=bqF09gVdIDE'),
	(41, 'Kecemerlangan Operasi', 'Memastikan persekitaran bersih', 'john', '20', 'Month/Year', '1', '2', '3', '18', '100', '20', 'BRONZE', '20', '20', '8', '2021-10-21 06:24:08', '2021-10-21 06:28:22', '2022', 'Mac', NULL, 'https://www.youtube.com/watch?v=neSHAWdE44c'),
	(42, 'Manusia & Proses (NCR/OFI)', 'Memastikan persekitaran bersih', 'awedaddawdw', '20', 'Quarter', '1', '2', '3', '18', '100', '20', 'BRONZE', '20', '20', '8', '2021-10-21 07:03:08', '2021-10-21 07:03:59', '2024', 'Julai', NULL, 'https://www.youtube.com/watch?v=hJqYc62NCKo');
/*!40000 ALTER TABLE `kpi` ENABLE KEYS */;

-- Dumping structure for table kpimaster.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.migrations: ~9 rows (approximately)
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
	(15, '2021_10_21_055438_kpi3', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table kpimaster.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nilai_teras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jangkaan_hasil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peratus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_pekerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_penyelia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_sebenar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weightage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.nilai: ~1 rows (approximately)
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` (`id`, `nilai_teras`, `jangkaan_hasil`, `peratus`, `ukuran`, `skor_pekerja`, `skor_penyelia`, `skor_sebenar`, `grade`, `total_score`, `weightage`, `user_id`, `created_at`, `updated_at`, `tahun`, `bulan`) VALUES
	(4, 'Pengurusan Pemegang Berkepentingan', 'wwqewqewqe', '20%', 'Percentage (%)', '1', NULL, NULL, 'BRONZE', '25', '20%', '8', '2021-10-22 03:37:40', '2021-10-22 03:37:40', NULL, NULL);
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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nostaff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `location`, `about`, `remember_token`, `created_at`, `updated_at`, `nostaff`, `position`, `department`, `unit`, `grade`, `role`, `profile_picture`, `age`, `hr`) VALUES
	(1, 'Admin User', 'admin@softui.com', '2021-10-06 06:50:45', '$2y$10$ycbsOuRpyvGAnsS17Doq8eWwUYjLuOxriN8XK2ymrfEHycpbH..uG', NULL, NULL, NULL, 'G3ZdPlLYp6MkSqRLR7FPx3r7WsDr6NSaZn35fFANl1uHXaPKI3mds6LvLNSW', '2021-10-06 06:50:45', '2021-10-06 06:50:45', NULL, 'Junior Non-Executive (NE1)', 'R&D', NULL, 'NE2', 'admin', NULL, '23', NULL),
	(2, 'Moderator User', 'moderator@gmail.com', '2021-10-06 06:50:57', '$2y$10$X79woze/Fu42cNJdVqJb8OiF2Io3JO0MVd27EJPIrQK9wwbbK3QN2', NULL, NULL, NULL, 'DQLSmjbFmmGr2YvNiPt6DsQ8tYFSA90GGjR683if7VoyVE1HtDM98tRptcKJ', '2021-10-06 06:50:57', '2021-10-06 06:50:57', 'A999', 'Junior Non-Executive (NE1)', 'COD', 'Alpha', 'NE2', 'moderator', NULL, '23', NULL),
	(3, 'Employee User', 'employee@gmail.com', NULL, '$2y$10$bBJo4BIBlhqsWGU/AEHpfu/vhOXJR4pm0XRWJVdu5EVzSCj1/HHsq', NULL, NULL, NULL, NULL, '2021-10-07 01:21:44', '2021-10-07 01:21:44', 'A002', 'Junior Non-Executive (NE1)', 'R&D', 'Web developer', 'NE2', 'employee', NULL, '23', NULL),
	(5, 'HR User', 'hr@gmail.com', NULL, '$2y$10$AjiY7RhfUc1rC.4L2JRiL.6V18VdSwvu.oM/zkvOhmo0k8/i3Jfii', NULL, NULL, NULL, NULL, '2021-10-07 09:19:46', '2021-10-07 09:19:46', NULL, 'Junior Non-Executive (NE1)', 'R&D', NULL, 'NE2', 'hr', NULL, '23', NULL),
	(6, 'Manager User', 'manager@gmail.com', NULL, '$2y$10$6UOL3ShPuorFXMtlnBtAMOIyXR/lyt0Vdl10x1DSohOJcurESIEH2', NULL, NULL, NULL, NULL, '2021-10-07 09:20:25', '2021-10-07 09:20:25', NULL, 'Deputy General Manager (UM1)', 'R&D', NULL, 'NE2', 'manager', NULL, '23', NULL),
	(7, 'Employee2 user', 'employee2@gmail.com', NULL, '$2y$10$EAsWLWd5ccaOVCiSR6.bYO0u890UoZUTbprz1/3Uq97JXTAqJ2EQy', NULL, NULL, NULL, NULL, '2021-10-09 02:40:36', '2021-10-09 02:40:36', 'A006', 'Deputy General Manager (UM1)', 'Marketing', 'Eagle', 'NE2', 'employee', NULL, NULL, NULL),
	(8, 'Employee3 user', 'employee3@gmail.com', NULL, '$2y$10$Ng7ikmKSNv2KJz0hDBlvKONkaVLoBPEAq0oPjQZGkjX2nh4MXylYe', NULL, NULL, NULL, NULL, '2021-10-09 02:44:56', '2021-10-09 02:44:56', 'A007', 'Deputy General Manager (UM1)', 'R&D', 'Tiger', 'NE2', 'employee', NULL, NULL, NULL),
	(10, 'Employee4 user', 'employee4@gmail.com', NULL, '$2y$10$cjD06VU48KnlOIktNOOt1OGxNoAAuIxiQFKFBboBIWaM67PqxaY9y', NULL, NULL, NULL, NULL, '2021-10-20 13:15:37', '2021-10-20 13:15:37', NULL, NULL, NULL, NULL, NULL, 'employee', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
