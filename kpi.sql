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

-- Dumping structure for table kpimaster.announcement
CREATE TABLE IF NOT EXISTS `announcement` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `announcement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.announcement: ~0 rows (approximately)
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` (`id`, `announcement`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'saxsax', '47', NULL, '2022-03-02 01:34:51');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;

-- Dumping structure for table kpimaster.complaint
CREATE TABLE IF NOT EXISTS `complaint` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.complaint: ~2 rows (approximately)
/*!40000 ALTER TABLE `complaint` DISABLE KEYS */;
INSERT INTO `complaint` (`id`, `location`, `office`, `level`, `category`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
	(3, 'Johor Bahru', '["Pejabat 1","Pejabat 2","Pejabat 3"]', 'sefesf', '["Kebocoran Tangki \\/ Saluran Tersumbat","Paip rosak","Penghawa Dingin","Gangguan elektrik"]', 'esfesf', '46', '2022-02-22 02:50:44', '2022-02-22 02:50:44'),
	(4, 'Shah Alam', '["Pejabat 1","Pejabat 2"]', 'level 1', '["Kebocoran Tangki \\/ Saluran Tersumbat","Paip rosak","Penghawa Dingin","Gangguan elektrik"]', 'dawdsfsefserdgsdg', '46', '2022-02-23 03:03:37', '2022-02-23 03:03:37'),
	(6, 'Johor Bahru', '["Pejabat 1"]', 'asfasd', '["Paip rosak"]', 'asdasd', '46', '2022-03-02 07:22:25', '2022-03-02 07:22:25');
/*!40000 ALTER TABLE `complaint` ENABLE KEYS */;

-- Dumping structure for table kpimaster.date
CREATE TABLE IF NOT EXISTS `date` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_manager` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_hr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.date: ~15 rows (approximately)
/*!40000 ALTER TABLE `date` DISABLE KEYS */;
INSERT INTO `date` (`id`, `year`, `month`, `user_id`, `created_at`, `updated_at`, `status`, `message_manager`, `message_hr`, `manager_id`, `hr_id`) VALUES
	(36, '2031', 'September', '8', '2022-01-05 07:48:50', '2022-01-19 07:37:39', 'Not Submitted', NULL, NULL, NULL, NULL),
	(37, '2028', 'May', '8', '2022-01-06 07:23:32', '2022-01-19 07:39:15', 'Not Submitted', NULL, NULL, NULL, NULL),
	(38, '2031', 'January', '8', '2022-01-06 07:23:35', '2022-01-06 23:45:50', 'Not Submitted', NULL, NULL, NULL, NULL),
	(39, '2022', 'January', '44', '2022-01-07 06:56:22', '2022-01-07 07:38:38', 'Completed', NULL, NULL, NULL, NULL),
	(40, '2027', 'June', '8', '2022-01-10 15:15:35', '2022-02-24 07:32:40', 'Not Submitted', 'kecekapan teras anda tak cukup', '', '6', ''),
	(41, '2022', 'January', '46', '2022-01-17 03:10:11', '2022-01-17 03:32:07', 'Submitted', NULL, NULL, NULL, NULL),
	(42, '2028', 'July', '47', '2022-01-18 01:25:24', '2022-01-19 07:36:20', 'Not Submitted', NULL, NULL, NULL, NULL),
	(43, '2025', 'May', '47', '2022-01-19 03:01:53', '2022-01-19 03:01:53', 'Not Submitted', NULL, NULL, NULL, NULL),
	(45, '2025', 'July', '47', '2022-01-19 03:02:43', '2022-01-19 03:02:43', 'Not Submitted', NULL, NULL, NULL, NULL),
	(46, '2028', 'June', '47', '2022-01-19 03:02:56', '2022-01-19 03:27:25', 'Not Submitted', NULL, NULL, NULL, NULL),
	(47, '2031', 'June', '47', '2022-01-19 03:03:32', '2022-01-19 07:43:14', 'Not Submitted', NULL, NULL, NULL, NULL),
	(48, '2029', 'September', '47', '2022-01-19 03:27:13', '2022-01-19 03:27:13', 'Not Submitted', NULL, NULL, NULL, NULL),
	(49, '2026', 'April', '6', '2022-01-23 03:08:05', '2022-01-23 03:08:05', 'Not Submitted', NULL, NULL, NULL, NULL),
	(50, '2025', 'April', '5', '2022-01-23 04:06:31', '2022-01-23 04:06:31', 'Not Submitted', NULL, NULL, NULL, NULL),
	(52, '2025', 'October', '6', '2022-01-23 07:42:27', '2022-01-23 07:42:27', 'Not Submitted', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `date` ENABLE KEYS */;

-- Dumping structure for table kpimaster.department
CREATE TABLE IF NOT EXISTS `department` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.department: ~8 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'CEO Office', NULL, NULL),
	(2, 'Human Resource (HR) & Administration', NULL, NULL),
	(3, 'Account & Finance (A&F)', NULL, NULL),
	(4, 'Sales', NULL, NULL),
	(5, 'Marketing', NULL, NULL),
	(6, 'Operation', NULL, NULL),
	(7, 'High Network Client (HNC)', NULL, NULL),
	(8, 'Research & Development (R&D)', NULL, NULL);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

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
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_penyelia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_sebenar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_pekerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peratus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kecekapan: ~19 rows (approximately)
/*!40000 ALTER TABLE `kecekapan` DISABLE KEYS */;
INSERT INTO `kecekapan` (`id`, `kecekapan_teras`, `user_id`, `created_at`, `updated_at`, `year`, `month`, `skor_penyelia`, `weightage`, `skor_sebenar`, `skor_pekerja`, `ukuran`, `peratus`) VALUES
	(55, 'Pengurusan Pemegang Berkepentingan', '8', '2021-12-02 09:27:48', '2021-12-02 09:27:56', '2024', 'July', NULL, NULL, NULL, NULL, NULL, NULL),
	(56, 'Keupayaan Inovatif', '8', '2021-12-06 04:25:51', '2021-12-06 04:25:51', '2040', 'May', NULL, NULL, NULL, NULL, NULL, NULL),
	(57, 'Kepimpinan Organisasi', '8', '2021-12-08 01:56:13', '2021-12-08 01:56:13', '2036', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(58, 'Keupayaan Inovatif', '8', '2021-12-08 01:56:18', '2021-12-08 01:56:18', '2036', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(59, 'Pengurusan Pelanggan', '8', '2021-12-08 01:56:23', '2021-12-08 01:56:23', '2036', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(60, 'Pengurusan Pemegang Berkepentingan', '8', '2021-12-08 01:56:32', '2021-12-08 01:56:32', '2036', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(61, 'Ketangkasan Dalam Organisasi', '8', '2021-12-08 01:56:35', '2021-12-08 01:56:35', '2036', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(67, 'Pengurusan Pemegang Berkepentingan', '8', '2021-12-13 02:44:29', '2021-12-13 02:44:29', '2036', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(73, 'Kepimpinan Organisasi', '44', '2022-01-07 07:09:45', '2022-01-07 07:26:45', '2028', 'December', NULL, NULL, NULL, NULL, NULL, NULL),
	(74, 'Kepimpinan Organisasi', '8', '2022-01-12 14:58:57', '2022-01-17 07:31:28', '2027', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(75, 'Kepimpinan Organisasi', '46', '2022-01-17 03:24:17', '2022-01-17 03:24:45', '2028', 'December', NULL, NULL, NULL, NULL, NULL, NULL),
	(76, 'Pengurusan Pelanggan', '46', '2022-01-17 03:25:03', '2022-01-17 03:25:03', '2028', 'December', NULL, NULL, NULL, NULL, NULL, NULL),
	(77, 'Pengurusan Pemegang Berkepentingan', '8', '2022-01-17 07:14:21', '2022-01-17 07:14:21', '2027', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(78, 'Ketangkasan Dalam Organisasi', '8', '2022-01-17 07:14:41', '2022-01-18 02:05:10', '2027', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(79, 'Kepimpinan Organisasi', '47', '2022-01-18 01:43:56', '2022-01-18 01:43:56', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(80, 'Keupayaan Inovatif', '47', '2022-01-18 01:44:04', '2022-01-18 01:44:04', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(81, 'Pengurusan Pelanggan', '47', '2022-01-18 01:44:08', '2022-01-18 01:44:08', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(82, 'Pengurusan Pemegang Berkepentingan', '47', '2022-01-18 01:44:47', '2022-01-18 01:44:47', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(83, 'Ketangkasan Dalam Organisasi', '47', '2022-01-18 01:44:56', '2022-01-18 01:44:56', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(84, 'Keupayaan Inovatif', '6', '2022-01-23 06:49:52', '2022-01-23 06:49:52', '2026', 'April', NULL, '20', NULL, '4', 'Percentage (%)', '20');
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
  `bukti_path` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kpi: ~30 rows (approximately)
/*!40000 ALTER TABLE `kpi` DISABLE KEYS */;
INSERT INTO `kpi` (`id`, `fungsi`, `bukti`, `peratus`, `ukuran`, `threshold`, `base`, `stretch`, `pencapaian`, `skor_KPI`, `skor_sebenar`, `user_id`, `created_at`, `updated_at`, `kpimaster_id`, `year`, `month`, `bukti_path`) VALUES
	(78, 'Manusia & Proses (Training)', 'booooooooooo', '50', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '15.30', '8', '2022-01-05 06:15:59', '2022-01-06 23:52:45', 37, '2027', 'June', ''),
	(80, 'Manusia & Proses (Training)', 'esfesf', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2022-01-07 01:31:06', '2022-01-07 01:31:06', 37, '2027', 'June', ''),
	(82, 'Kad Skor Korporat', 'Membantu CEO mencapai objektif syarikat', '100', 'Percentage (%)', '30', '65', '100', '47.2', '47.20', '47.20', '44', '2022-01-07 06:59:58', '2022-01-07 06:59:58', 40, '2023', 'December', ''),
	(86, 'Manusia & Proses (NCROFI)', 'sefeasfewfewf', '50', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '15.30', '8', '2022-01-11 04:54:16', '2022-01-11 04:54:16', 42, '2027', 'June', ''),
	(100, 'Kewangan', 'esfsefse', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2022-01-12 15:40:52', '2022-01-12 15:40:52', 44, '2027', 'June', '\\storage\\filebukti\\MEMO_1642002052.pdf'),
	(101, 'Kewangan', 'asdaswd', '60', 'Percentage (%)', '1', '2', '3', '3', '100', '60', '8', '2022-01-12 15:41:26', '2022-01-18 02:13:31', 44, '2027', 'June', '\\storage\\filebukti\\logo_1642002086.png'),
	(102, 'Kewangan', 'asdsadxzcscxs', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2022-01-12 15:41:59', '2022-01-12 15:41:59', 44, '2027', 'June', '\\storage\\filebukti\\cropped-logo-momentum-4_1642002119.jpg'),
	(103, 'Pelanggan (Outer)', 'awdawd', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2022-01-13 02:04:43', '2022-01-13 02:04:43', 38, '2027', 'June', '\\storage\\filebukti\\logo_1642039483.png'),
	(104, 'Kad Skor Korporat', 'Memudahkan kerja CEO', '100', 'Percentage (%)', '30', '65', '100', '48', '48.00', '48.00', '46', '2022-01-17 03:15:55', '2022-01-17 03:15:55', 45, '2023', 'December', '\\storage\\filebukti\\MEMO_1642389355.pdf'),
	(105, 'Manusia & Proses (Training)', 'Melatih pekerja baru', '100', 'Percentage (%)', '30', '65', '100', '50', '50.00', '50.00', '46', '2022-01-17 03:16:54', '2022-01-17 03:16:54', 46, '2023', 'December', '\\storage\\filebukti\\logopng_1642389414.png'),
	(106, 'Kolaborasi', 'awdawdawd', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2022-01-17 06:51:21', '2022-01-17 06:53:08', 39, '2027', 'June', '\\storage\\filebukti\\IC Hakim_1642402281.pdf'),
	(107, 'Kolaborasi', 'w3erw3e3rw4e', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2022-01-17 06:51:53', '2022-01-17 06:52:52', 39, '2027', 'June', '\\storage\\filebukti\\IC Hakim_1642402313.pdf'),
	(108, 'Kad Skor Korporat', 'Memudahkan kerja CEO', '100', 'Percentage (%)', '30', '65', '100', '48', '48.00', '48.00', '47', '2022-01-18 01:30:54', '2022-01-19 01:58:10', 47, '2031', 'June', '\\storage\\filebukti\\MEMO_1642469545.pdf'),
	(109, 'Kewangan', '1. Membantu Manager\r\n2. Membantu HR', '50', 'Percentage (%)', '30', '65', '100', '50', '50.00', '25.00', '47', '2022-01-18 01:34:47', '2022-01-19 01:58:10', 48, '2031', 'June', '\\storage\\filebukti\\MEMO_1642469687.pdf'),
	(110, 'Kewangan', 'memastikan persekitaran  bersih', '50', 'Percentage (%)', '30', '65', '100', '50', '0', '0', '47', '2022-01-18 01:42:01', '2022-01-19 01:58:10', 48, '2031', 'June', '\\storage\\filebukti\\MEMO_1642470121.pdf'),
	(122, 'Kad Skor Korporat', 'sadadwdad', '10', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '3.06', '8', '2022-01-19 00:33:40', '2022-01-19 00:33:40', 43, '2027', 'June', '\\storage\\filebukti\\MEMO_1642552420.pdf'),
	(123, 'Kad Skor Korporat', 'wadawd', '10', 'Percentage (%)', '30', '65', '100', '20', '0', '0', '8', '2022-01-19 00:34:05', '2022-01-19 00:34:05', 43, '2027', 'June', NULL),
	(124, 'Kad Skor Korporat', 'awdawdwad', '50', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '15.30', '8', '2022-01-19 00:34:33', '2022-01-19 00:34:33', 43, '2027', 'June', '\\storage\\filebukti\\MEMO_1642552473.pdf'),
	(125, 'Kad Skor Korporat', 'awdawdwd', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2022-01-19 00:35:02', '2022-01-19 00:35:02', 43, '2027', 'June', NULL),
	(126, 'Manusia & Proses (Training)', 'sdfcsedf', '100', 'Percentage (%)', '1', '2', '3', '3', '100', '100', '6', '2022-01-23 03:08:31', '2022-01-23 03:08:31', 49, '2026', 'April', '\\storage\\filebukti\\Screenshot (6)_1642907311.png'),
	(133, 'Manusia & Proses (NCROFI)', 'wadxawdawd', '50', 'Percentage (%)', '30', '65', '100', '100', '100', '50', '8', '2022-01-24 07:02:37', '2022-01-24 07:02:37', 51, '2031', 'January', NULL),
	(158, 'Kad Skor Korporat', 'asdad', '40', 'Percentage (%)', '10', '20', '30', '27', '89.50', '35.80', '8', '2022-01-24 08:29:39', '2022-01-24 08:29:39', 55, '2031', 'January', NULL),
	(159, 'Kad Skor Korporat', 'awdwadwad', '50', 'Percentage (%)', '10', '6', '0', '0', '100', '50', '8', '2022-01-24 08:31:07', '2022-01-24 08:31:07', 55, '2031', 'January', NULL),
	(160, 'Pelanggan (Outer)', 'waedawd', '50', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '15.30', '8', '2022-01-24 08:39:28', '2022-01-24 08:39:28', 56, '2031', 'January', NULL),
	(161, 'Kecemerlangan Operasi1', 'wefewfewf', '50', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '15.30', '8', '2022-01-26 08:52:03', '2022-01-26 08:52:03', 57, '2031', 'September', '\\storage\\filebukti\\database_1643187123.png'),
	(162, 'Kecemerlangan Operasi1', 'sefsef', '50', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '15.30', '8', '2022-01-26 08:52:55', '2022-01-26 08:52:55', 57, '2031', 'September', NULL),
	(163, 'Kewangan1', 'et5rertge', '20', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '6.12', '8', '2022-01-27 08:01:41', '2022-01-27 08:01:41', 58, '2027', 'June', '\\storage\\filebukti\\logopng_1643270501.png'),
	(164, 'Kewangan2', 'erfregf', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2022-01-27 08:02:00', '2022-01-27 08:02:00', 59, '2027', 'June', '\\storage\\filebukti\\logopng_1643270520.png'),
	(165, 'Kewangan3', 'wedrrwer', '20', 'Percentage (%)', '1', '2', '3', '3', '100', '20', '8', '2022-01-27 08:02:19', '2022-01-27 08:02:19', 60, '2027', 'June', '\\storage\\filebukti\\logopng_1643270539.png'),
	(166, 'Kewangan4', 'werer', '20', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '6.12', '8', '2022-01-27 08:02:34', '2022-01-27 08:02:34', 61, '2027', 'June', '\\storage\\filebukti\\logopng_1643270554.png'),
	(167, 'Kewangan5', 'ewrwer', '20', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '6.12', '8', '2022-01-27 08:02:49', '2022-01-27 08:02:49', 62, '2027', 'June', '\\storage\\filebukti\\logopng_1643270569.png'),
	(168, 'Kecemerlangan Operasi2', 'aSDASAs', '50', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '15.30', '8', '2022-03-02 01:57:17', '2022-03-02 01:57:17', 63, '2027', 'June', '\\storage\\filebukti\\Screenshot (6)_1646186237.png'),
	(169, 'Kecemerlangan Operasi2', 'asdasd', '50', 'Percentage (%)', '30', '65', '100', '30.6', '30.60', '15.30', '8', '2022-03-02 01:57:40', '2022-03-02 01:57:40', 63, '2027', 'June', '\\storage\\filebukti\\Screenshot (6)_1646186260.png');
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
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightage_kecekapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_score_kecekapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightage_nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_score_nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kpi_all: ~7 rows (approximately)
/*!40000 ALTER TABLE `kpi_all` DISABLE KEYS */;
INSERT INTO `kpi_all` (`id`, `grade_master`, `weightage_master`, `total_score_master`, `grade_all`, `total_score_all`, `user_id`, `created_at`, `updated_at`, `year`, `month`, `weightage_kecekapan`, `total_score_kecekapan`, `weightage_nilai`, `total_score_nilai`) VALUES
	(90, 'BRONZE', '45', '9.765', 'BRONZE', '7.812', '8', '2022-01-05 06:10:16', '2022-01-24 04:41:35', '2027', 'June', NULL, NULL, NULL, NULL),
	(91, 'BRONZE', '60', '38.44', 'BRONZE', '34.752', '44', '2022-01-07 06:59:58', '2022-01-07 07:35:08', '2028', 'December', NULL, NULL, NULL, NULL),
	(92, 'BRONZE', '30', '14.6', 'BRONZE', '11.68', '46', '2022-01-17 03:15:55', '2022-01-17 03:20:32', '2028', 'December', NULL, NULL, NULL, NULL),
	(93, 'BRONZE', '60', '28.8', 'BRONZE', '23.04', '47', '2022-01-18 01:30:53', '2022-01-19 01:58:10', '2031', 'June', NULL, NULL, NULL, NULL),
	(94, 'NO GRED', '0', '0', 'NO GRED', '0', '6', '2022-01-23 03:08:30', '2022-01-23 03:08:31', '2026', 'April', NULL, NULL, NULL, NULL),
	(95, 'NO GRED', '0', '0', 'NO GRED', '0', '8', '2022-01-24 04:43:58', '2022-01-24 04:43:58', '2028', 'May', NULL, NULL, NULL, NULL),
	(96, 'NO GRED', '0', '0', 'NO GRED', '0', '8', '2022-01-24 04:44:57', '2022-01-24 04:44:57', '2031', 'January', NULL, NULL, NULL, NULL),
	(97, 'NO GRED', '0', '0', 'NO GRED', '0', '8', '2022-01-26 08:52:03', '2022-01-26 08:52:03', '2031', 'September', NULL, NULL, NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.kpi_master: ~22 rows (approximately)
/*!40000 ALTER TABLE `kpi_master` DISABLE KEYS */;
INSERT INTO `kpi_master` (`id`, `fungsi`, `percent_master`, `link`, `objektif`, `pencapaian`, `skor_KPI`, `skor_sebenar`, `user_id`, `created_at`, `updated_at`, `kpiall_id`, `year`, `month`) VALUES
	(37, 'Manusia & Proses (Training)', 5, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan persekitaran bersih', '35.3', '35.3', '1.765', '8', '2022-01-05 06:15:59', '2022-01-07 01:31:06', 90, '2027', 'June'),
	(38, 'Pelanggan (Outer)', 20, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan keputusan yang cemerlang melalui proses yang konsisten', '20', '0', '0', '8', '2022-01-07 01:30:53', '2022-01-07 01:47:32', 90, '2027', 'June'),
	(39, 'Kolaborasi', 20, NULL, 'Memastikan keputusan yang cemerlang melalui proses yang konsisten', '40', '40', '8', '8', '2022-01-07 01:31:23', '2022-01-17 06:52:36', 90, '2027', 'June'),
	(40, 'Kad Skor Korporat', 20, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Membantu CEO mencapai objektif-objektif KPI korporat', '47.2', '47.2', '9.44', '44', '2022-01-07 06:59:58', '2022-01-07 07:03:33', 91, '2028', 'December'),
	(42, 'Manusia & Proses (NCROFI)', NULL, NULL, NULL, '15.3', '0', '0', '8', '2022-01-11 04:54:16', '2022-01-24 04:41:35', 90, '2027', 'June'),
	(43, 'Kad Skor Korporat', NULL, NULL, NULL, '38.36', '38.36', '0', '8', '2022-01-11 05:01:05', '2022-01-19 00:35:02', 90, '2027', 'June'),
	(44, 'Kewangan', NULL, NULL, NULL, '60', '60', '0', '8', '2022-01-11 07:00:21', '2022-01-12 15:41:59', 90, '2027', 'June'),
	(45, 'Kad Skor Korporat', 20, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan keputusan yang cemerlang melalui proses yang konsisten', '48', '48', '9.6', '46', '2022-01-17 03:15:55', '2022-01-17 03:20:00', 92, '2028', 'December'),
	(46, 'Manusia & Proses (Training)', 10, NULL, 'Membantu CEO mencapai objektif-objektif KPI korporat', '50', '50', '5', '46', '2022-01-17 03:16:54', '2022-01-17 03:20:32', 92, '2028', 'December'),
	(47, 'Kad Skor Korporat', 40, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Membantu CEO mencapai objektif-objektif KPI korporat', '48', '48', '19.2', '47', '2022-01-18 01:30:53', '2022-01-19 01:58:10', 93, '2031', 'June'),
	(48, 'Kewangan', 20, 'https://www.youtube.com/watch?v=bqF09gVdIDE', 'Memastikan persekitaran bersihfsef', '25', '0', '0', '47', '2022-01-18 01:34:33', '2022-01-19 01:58:10', 93, '2031', 'June'),
	(49, 'Manusia & Proses (Training)', NULL, NULL, NULL, '100', NULL, NULL, '6', '2022-01-23 03:08:30', NULL, 94, '2026', 'April'),
	(50, 'Manusia & Proses (NCROFI)', NULL, NULL, NULL, '0', NULL, NULL, '8', '2022-01-24 04:43:58', NULL, 95, '2028', 'May'),
	(51, 'Manusia & Proses (NCROFI)', NULL, NULL, NULL, '100', '100', '0', '8', '2022-01-24 04:44:57', '2022-01-24 07:08:28', 96, '2031', 'January'),
	(52, 'Kolaborasi', NULL, NULL, NULL, '0', NULL, NULL, '8', '2022-01-24 04:47:25', NULL, 96, '2031', 'January'),
	(55, 'Kad Skor Korporat', NULL, NULL, NULL, '85.8', '85.8', '0', '8', '2022-01-24 07:34:29', '2022-01-24 08:31:07', 96, '2031', 'January'),
	(56, 'Pelanggan (Outer)', NULL, NULL, NULL, '15.30', NULL, NULL, '8', '2022-01-24 08:39:28', NULL, 96, '2031', 'January'),
	(57, 'Kecemerlangan Operasi1', NULL, NULL, NULL, '30.6', '30.6', '0', '8', '2022-01-26 08:52:03', '2022-01-26 08:52:55', 97, '2031', 'September'),
	(58, 'Kewangan1', NULL, NULL, NULL, '6.12', NULL, NULL, '8', '2022-01-27 08:01:41', NULL, 90, '2027', 'June'),
	(59, 'Kewangan2', NULL, NULL, NULL, '35.3', '35.3', '0', '8', '2022-01-27 08:02:00', '2022-02-11 09:43:14', 90, '2027', 'June'),
	(60, 'Kewangan3', NULL, NULL, NULL, '20', NULL, NULL, '8', '2022-01-27 08:02:19', NULL, 90, '2027', 'June'),
	(61, 'Kewangan4', NULL, NULL, NULL, '6.12', NULL, NULL, '8', '2022-01-27 08:02:34', NULL, 90, '2027', 'June'),
	(62, 'Kewangan5', NULL, NULL, NULL, '6.12', NULL, NULL, '8', '2022-01-27 08:02:49', NULL, 90, '2027', 'June'),
	(63, 'Kecemerlangan Operasi2', NULL, NULL, NULL, '30.6', '30.6', '0', '8', '2022-03-02 01:57:17', '2022-03-02 01:57:40', 90, '2027', 'June');
/*!40000 ALTER TABLE `kpi_master` ENABLE KEYS */;

-- Dumping structure for table kpimaster.memo
CREATE TABLE IF NOT EXISTS `memo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.memo: ~13 rows (approximately)
/*!40000 ALTER TABLE `memo` DISABLE KEYS */;
INSERT INTO `memo` (`id`, `title`, `memo_path`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
	(18, 'awdad', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644826353.pdf', 'waddw', '8', '2022-02-14 08:12:33', '2022-02-14 08:12:33'),
	(20, 'supper', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644829931.pdf', 'awdawdwad', '8', '2022-02-14 08:12:53', '2022-02-14 09:12:11'),
	(21, 'Reflections', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644826565.pdf', 'adawdwa', '8', '2022-02-14 08:16:05', '2022-02-14 08:16:05'),
	(22, 'Reflections', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644826778.pdf', 'sadasd', '8', '2022-02-14 08:19:38', '2022-02-14 08:19:38'),
	(23, 'sadsad', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644830052.pdf', 'asdasdasd', '8', '2022-02-14 09:13:58', '2022-02-14 09:14:12'),
	(24, 'Super ring', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644892240.pdf', 'Sedap Giler', '5', '2022-02-15 02:30:40', '2022-02-15 02:30:40'),
	(26, 'sefsef', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644910369.pdf', 'esfsef', '5', '2022-02-15 07:32:49', '2022-02-15 07:32:49'),
	(27, 'dsfdsfds', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644910397.pdf', 'dsfdf', '5', '2022-02-15 07:33:18', '2022-02-15 07:33:18'),
	(28, 'sdfdsf', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644910412.pdf', 'sdfsdfsdf', '5', '2022-02-15 07:33:32', '2022-02-15 07:33:32'),
	(29, 'sdfdsf', '\\storage\\filememo\\ebook onlinekan bisnes tanpa kos_1644910422.pdf', 'sdfdsf', '5', '2022-02-15 07:33:42', '2022-02-15 07:33:42'),
	(30, 'Reflections', '\\storage\\filememo\\Interview Question_1645423932.pdf', 'asdasdsad', '47', '2022-02-21 06:12:12', '2022-02-21 06:12:12'),
	(31, 'Reflections', '\\storage\\filememo\\Interview Question_1645429854.pdf', 'asdasdsad', '47', '2022-02-21 07:50:54', '2022-02-21 07:50:54'),
	(32, 'Reflections', '\\storage\\filememo\\Interview Question_1645430173.pdf', 'asdasd', '47', '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	(33, 'Internship Self Reflection', '\\storage\\filememo\\Interview Question_1645430261.pdf', 'adadwadwd', '47', '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	(34, 'Reflections', '\\storage\\filememo\\Screenshot (6)_1646277617.png', 'asasdsaddsa', '47', '2022-03-03 03:20:17', '2022-03-03 03:20:17'),
	(35, 'asdasdasd', '\\storage\\filememo\\Screenshot (6)_1646277634.png', 'asdasd', '47', '2022-03-03 03:20:34', '2022-03-03 03:20:34');
/*!40000 ALTER TABLE `memo` ENABLE KEYS */;

-- Dumping structure for table kpimaster.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.migrations: ~45 rows (approximately)
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
	(42, '2021_12_01_070929_user5', 26),
	(43, '2021_12_21_073036_kpi_all6', 27),
	(46, '2022_01_10_080008_message', 28),
	(47, '2022_01_10_224649_bukti_path', 29),
	(48, '2022_01_11_022954_message2', 30),
	(49, '2022_01_20_090217_kecekapan4', 31),
	(50, '2022_01_20_090237_nilai4', 31),
	(51, '2022_01_20_093002_kecekapan5', 31),
	(52, '2022_01_20_093127_nilai5', 31),
	(53, '2022_01_20_094142_kecekapan6', 32),
	(54, '2022_01_20_094724_nilai6', 32),
	(55, '2022_01_20_095213_kpiall7', 32),
	(56, '2022_01_20_095640_kecekapan7', 32),
	(57, '2022_01_20_095734_nilai7', 32),
	(58, '2022_01_20_100003_kpiall8', 32),
	(60, '2022_02_10_081948_memo', 33),
	(62, '2022_02_16_050029_sop', 34),
	(63, '2022_02_17_093948_policy', 35),
	(66, '2022_02_18_033824_complaint', 36),
	(67, '2022_02_21_025653_create_notifications_table', 37),
	(68, '2022_02_22_013915_department', 38),
	(71, '2022_02_23_082750_announcement', 39),
	(73, '2022_03_02_083045_sop2', 40);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table kpimaster.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nilai_teras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_penyelia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_sebenar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_pekerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peratus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.nilai: ~19 rows (approximately)
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` (`id`, `nilai_teras`, `user_id`, `created_at`, `updated_at`, `year`, `month`, `skor_penyelia`, `weightage`, `skor_sebenar`, `skor_pekerja`, `ukuran`, `peratus`) VALUES
	(77, 'Sumbangan', '8', '2021-12-11 02:45:15', '2021-12-11 02:45:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(78, 'Kepimpinan', '8', '2021-12-11 02:45:25', '2021-12-11 02:45:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(79, 'Keputusan', '8', '2021-12-11 02:53:48', '2021-12-11 02:53:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(80, 'Keluarga', '8', '2021-12-11 03:05:04', '2021-12-11 03:05:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(81, 'Rohani', '8', '2021-12-16 03:21:16', '2021-12-16 03:21:16', '2030', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(82, 'Kepimpinan', '8', '2021-12-21 01:54:49', '2022-01-17 08:06:54', '2027', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(83, 'Perkembangan', '8', '2021-12-21 01:54:53', '2022-01-17 07:51:59', '2027', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(84, 'Keputusan', '8', '2021-12-21 01:54:56', '2021-12-21 01:54:56', '2027', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(87, 'Keluarga', '8', '2021-12-21 01:55:14', '2022-01-12 15:06:53', '2027', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(88, 'Keputusan', '44', '2022-01-07 07:10:48', '2022-01-07 07:35:08', '2028', 'December', NULL, NULL, NULL, NULL, NULL, NULL),
	(89, 'Rohani', '44', '2022-01-07 07:11:59', '2022-01-07 07:35:02', '2028', 'December', NULL, NULL, NULL, NULL, NULL, NULL),
	(90, 'Perkembangan', '46', '2022-01-17 03:27:46', '2022-01-17 03:27:46', '2028', 'December', NULL, NULL, NULL, NULL, NULL, NULL),
	(93, 'Rohani', '8', '2022-01-17 07:52:44', '2022-01-17 07:52:57', '2027', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(94, 'Kepimpinan', '47', '2022-01-18 01:45:10', '2022-01-18 01:45:10', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(95, 'Perkembangan', '47', '2022-01-18 01:45:15', '2022-01-18 01:45:15', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(96, 'Keputusan', '47', '2022-01-18 01:45:20', '2022-01-18 01:45:20', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(97, 'Sumbangan', '47', '2022-01-18 01:45:25', '2022-01-18 01:45:25', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(98, 'Rohani', '47', '2022-01-18 01:45:30', '2022-01-18 01:45:30', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(99, 'Keluarga', '47', '2022-01-18 01:45:35', '2022-01-18 01:45:35', '2031', 'June', NULL, NULL, NULL, NULL, NULL, NULL),
	(100, 'Keputusan', '6', '2022-01-23 07:38:57', '2022-01-23 07:38:57', '2026', 'April', NULL, '20', NULL, '4', 'Percentage (%)', '20'),
	(101, 'Sumbangan', '6', '2022-01-23 07:39:00', '2022-01-23 07:39:00', '2026', 'April', NULL, '20', NULL, '4', 'Percentage (%)', '20');
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

-- Dumping structure for table kpimaster.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.notifications: ~84 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('04b97237-0505-49a0-95f0-8c41ee07a73e', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 16, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('05dfd469-28a2-489c-992f-1469fd3d7eee', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 41, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('0b83389a-bd3c-4c56-8590-3e2b220682a0', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 3, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('0f0ee969-bd7e-4c33-89a2-619d257b9795', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 41, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('116eaa4e-0428-4d79-ae28-a23613ad9312', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 28, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('18fdb40e-8d7d-4d02-9c86-9df74a4dd498', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 40, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('1c60e58d-e377-4d9f-9208-bffaa5c7ac95', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 15, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('1e3b17f7-5364-4040-a994-b4688454c1d7', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 44, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('23c66f94-58e8-474c-8171-7d8a73ed6b7e', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 1, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('2d9ca872-7408-4259-9e1f-176349a2fbbd', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 17, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('30e26291-090d-43f8-9c8d-37b57ca80079', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 20, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('320a8dee-ba31-4bb7-87ed-723b7054d36d', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 5, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('321ad7bd-a7d1-4558-b385-62b8d0e99c3a', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 42, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('325fe7e2-7fcb-4778-91ba-ec6c03070cb3', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 29, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('33856d24-4c82-4c3e-b837-5f3e77d85163', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 20, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('38f4a770-7c06-46f7-b779-dfc4b4f6916b', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 47, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('3ac66e27-da67-4284-a9ac-3993ef962d53', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 13, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('40d89211-d82c-456a-b0dd-d1f32aa07351', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 8, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('415a1fb2-fe4e-49e8-b682-2df2a45b7b3a', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 41, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('441c085b-462b-4810-878f-5f087e0b8c0d', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 20, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('481ee8f2-f5e8-4cfc-b83e-91de15020860', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 42, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('48ce10b9-c8ec-4288-a29f-007d609e2510', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 6, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('4c117d54-cc6c-4bfa-862a-08938482cbd7', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 47, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('4fa20822-6639-46d9-b869-aa46a2021e90', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 3, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('5347cb12-dbc7-457a-952f-6aa7d08db2a4', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 16, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('54bcd4d3-601c-4725-8e34-ce47029f2896', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 43, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('55182c76-1751-43fc-a5e0-f1d79270a8d4', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 17, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('5b550413-274f-4203-831e-20f271c175fd', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 15, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('5c483286-8b59-4d40-b5e0-a2cca71ede76', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 42, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('5e1d0a1d-697c-447b-915d-735c14c84ca5', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 13, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('660cdf40-a9d2-4504-88f0-c432608e372a', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 3, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('6a62dc1b-ee1c-4ccb-ab5d-ed84e0c0137b', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 16, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('6ac3a97b-453c-4b7e-8f08-fa3417565c3c', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 5, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('6b737193-2a03-4576-a33e-1417f7913012', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 42, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('6be838cb-3d24-4e44-83cc-0e441aa25444', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 8, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('6bf5aa90-c8ba-4409-a2e4-d425c389dceb', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 15, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('6c2068fc-5800-4b8a-998e-ddf949b01290', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 13, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('744446c4-52ec-46c8-81f8-b30270717b28', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 1, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('7939b5b6-fea3-443c-8ec5-48aec9bfab0f', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 5, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('79b5d91b-0533-4b13-80ed-172103755cb8', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 44, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('7df182f2-016e-4dba-9653-f8be86a024b2', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 8, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('7f2bd50a-8d14-4710-9753-bd3db4144dfd', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 40, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('8121674a-bd9e-4d73-9d64-bb94b251942f', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 44, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('8413b396-23da-4c7a-87fd-561825cc2b39', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 5, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('843b209e-1300-4259-bfce-719cff9e550c', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 46, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('8ab0e107-422c-467a-a746-753e624829ad', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 28, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('8db37d31-cfef-4c84-907e-e563e56bb01a', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 15, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('93493938-4e4a-4e37-ab0d-24138c27a13b', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 6, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('939adbb0-fb96-4ac4-a600-f8398fb28f38', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 7, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('9a816375-22b6-4633-9960-ff7e03b22228', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 43, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('9bb6df61-a0ad-4326-970c-af90bb59ab60', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 3, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('9e68f574-699d-44fd-886d-742c63316e82', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 8, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('a01e12c0-90c5-4f17-a6a0-2590ce2316c0', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 7, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('a1e00924-fcd0-405a-9dc9-6d4f0cd3c77a', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 46, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('a29fa970-55b8-4aad-9137-e27a146c0a29', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 43, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('aaeccb20-c150-4445-9253-699fe73a266c', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 47, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('acac60f9-6823-4b08-b817-197901094d37', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 45, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('acb6ee3f-6c9c-4771-bd40-f2e4fc4aec52', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 1, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('ad929590-124c-4ad7-8e3f-caad8ac2c1ab', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 46, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('af58af2e-8137-429f-8c01-792409f24dc2', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 45, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('b220997b-0099-4ff1-ab1d-e99437c3ea19', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 40, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('b489aa26-9d1c-4abd-923d-dfe4a9f4bdc3', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 29, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('b57ba01c-c78f-4180-9ade-95eb1718d782', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 44, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('bae213ba-a5b9-49c6-8389-47d9a436eb1f', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 40, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('be685d0c-1613-4a65-aea1-363a9a83670f', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 17, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('bfe6d42b-940d-4410-8c69-997a13fa533c', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 17, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('c0928077-d373-45e4-b3b0-b99624810a7a', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 28, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('c25e2124-0318-4ba0-9684-69ac0d9cff9e', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 16, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('c2e09e9e-4406-4739-bea0-98af7bc35844', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 29, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('c4e3a331-1052-4b5c-805e-270bf98029e5', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 6, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('c78e9ca2-e9c4-442b-b75a-930d8fcd1671', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 46, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('c87caef7-d84a-4b65-b0f5-f87275cd2a65', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 6, '{"title":"asdasdasd"}', NULL, '2022-03-03 03:20:34', '2022-03-03 03:20:34'),
	('d5d15f66-fa7f-45a9-b83f-7fdf31090659', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 28, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('d83daea8-e520-499a-a4ff-25187180fdb2', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 43, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('d99fb8f4-f5e3-45e7-8b56-ec8e9e15f58e', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 29, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('e0ec6330-5bda-4abf-9a20-95304ab92292', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 20, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('e176bdf2-e77b-448a-a423-35c1b8a4abd2', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 7, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('e34f508b-8715-4722-a14d-c7280ff77b48', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 45, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('edf36ca9-38c3-415b-85a5-e90eb7dc361b', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 45, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('eee65034-e646-4087-bb2e-d8cbb4bfec1c', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 7, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41'),
	('ef11906a-24b5-468f-bcae-ae4ab1c6068f', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 41, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('f528ce72-0708-4774-a0fe-074c74640157', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 47, '{"title":"Reflections"}', NULL, '2022-03-03 03:20:18', '2022-03-03 03:20:18'),
	('f8fb20e2-f790-42e9-95f8-22e0bc82d461', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 13, '{"title":"Reflections"}', NULL, '2022-02-21 07:56:13', '2022-02-21 07:56:13'),
	('fcb593fd-8c82-482f-a3c5-a46c660001dc', 'App\\Notifications\\MemoNotification', 'App\\Models\\User', 1, '{"title":"Internship Self Reflection"}', NULL, '2022-02-21 07:57:41', '2022-02-21 07:57:41');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

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

-- Dumping structure for table kpimaster.policy
CREATE TABLE IF NOT EXISTS `policy` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.policy: ~0 rows (approximately)
/*!40000 ALTER TABLE `policy` DISABLE KEYS */;
INSERT INTO `policy` (`id`, `title`, `policy_path`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Reflectionsasdasd', '\\storage\\filepolicy\\ebook onlinekan bisnes tanpa kos_1645090974.pdf', 'sadsadsad', '47', '2022-02-17 09:42:54', '2022-02-17 09:43:07');
/*!40000 ALTER TABLE `policy` ENABLE KEYS */;

-- Dumping structure for table kpimaster.sop
CREATE TABLE IF NOT EXISTS `sop` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentview` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sop_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.sop: ~5 rows (approximately)
/*!40000 ALTER TABLE `sop` DISABLE KEYS */;
INSERT INTO `sop` (`id`, `title`, `department`, `departmentview`, `part`, `sop_path`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
	(5, 'asdsad', 'CEO Office', '["Human Resource (HR) & Administration","Account & Finance (A&F)"]', '01 FORM', '\\storage\\filesop\\ebook onlinekan bisnes tanpa kos_1645062782.pdf', 'asdsad', '5', '2022-02-17 01:53:02', '2022-02-17 01:53:02'),
	(6, 'Reflections', 'Sales', '["Human Resource (HR) & Administration","Account & Finance (A&F)","Sales"]', '03 WORK INSTRUCTION', '\\storage\\filesop\\ebook onlinekan bisnes tanpa kos_1645063195.pdf', 'esfesff', '5', '2022-02-17 01:59:55', '2022-02-17 01:59:55'),
	(7, 'eafd', 'CEO Office', '["Marketing","Operation","High Network Client (HNC)","Research & Development (R&D)"]', '01 FORM', '\\storage\\filesop\\ebook onlinekan bisnes tanpa kos_1645063238.pdf', 'awed', '5', '2022-02-17 02:00:38', '2022-03-02 08:29:04'),
	(8, 'aedaewd', 'CEO Office', '["Human Resource (HR) & Administration","Account & Finance (A&F)"]', '01 FORM', '\\storage\\filesop\\ebook onlinekan bisnes tanpa kos_1645069244.pdf', 'awdwad', '5', '2022-02-17 03:40:44', '2022-02-17 03:40:44'),
	(9, 'Try', 'CEO Office', '["Sales","Marketing","Operation"]', '01 FORM', '\\storage\\filesop\\ebook onlinekan bisnes tanpa kos_1645080977.pdf', 'zscdsgbvdfhbft', '5', '2022-02-17 06:56:17', '2022-02-17 06:56:17');
/*!40000 ALTER TABLE `sop` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kpimaster.users: ~18 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nostaff`, `position`, `department`, `unit`, `grade`, `role`) VALUES
	(1, 'Admin User', 'admin@softui.com', '2021-10-06 06:50:45', '$2y$10$ycbsOuRpyvGAnsS17Doq8eWwUYjLuOxriN8XK2ymrfEHycpbH..uG', 'zVF1oIS7rkhJ73ersPXTdvFa7FLVaDnYeNDFpjc0wSYOhY8GpeUfCmlBXP5H', '2021-10-06 06:50:45', '2021-10-06 06:50:45', 'A001', 'Junior Non-Executive (NE1)', 'Research & Development (R&D)', 'Web developer', 'NE2', 'admin'),
	(3, 'Employee User', 'employee@gmail.com', NULL, '$2y$10$bBJo4BIBlhqsWGU/AEHpfu/vhOXJR4pm0XRWJVdu5EVzSCj1/HHsq', NULL, '2021-10-07 01:21:44', '2021-11-03 07:58:49', 'A001', 'Deputy General Manager (UM1)', 'Research & Development (R&D)', 'Web developer', 'NE2', 'employee'),
	(5, 'DC User', 'dc@gmail.com', NULL, '$2y$10$AjiY7RhfUc1rC.4L2JRiL.6V18VdSwvu.oM/zkvOhmo0k8/i3Jfii', NULL, '2021-10-07 09:19:46', '2021-10-07 09:19:46', 'A001', 'Junior Non-Executive (NE1)', 'Research & Development (R&D)', 'Web developer', 'NE2', 'dc'),
	(6, 'Manager User', 'manager@gmail.com', NULL, '$2y$10$6UOL3ShPuorFXMtlnBtAMOIyXR/lyt0Vdl10x1DSohOJcurESIEH2', NULL, '2021-10-07 09:20:25', '2021-10-07 09:20:25', 'A001', 'Deputy General Manager (UM1)', 'Research & Development (R&D)', 'Web developer', 'NE2', 'manager'),
	(7, 'Employee2 user', 'employee2@gmail.com', NULL, '$2y$10$EAsWLWd5ccaOVCiSR6.bYO0u890UoZUTbprz1/3Uq97JXTAqJ2EQy', NULL, '2021-10-09 02:40:36', '2021-11-17 02:42:08', 'A001', 'Deputy General Manager (UM1)', 'Marketing', 'Eagle', 'NE2', 'employee'),
	(8, 'Muhammad john', 'employee3@gmail.com', NULL, '$2y$10$Ng7ikmKSNv2KJz0hDBlvKONkaVLoBPEAq0oPjQZGkjX2nh4MXylYe', NULL, '2021-10-09 02:44:56', '2022-02-10 10:07:19', 'A023', 'Executive (E2)', 'Operation', 'Head Department', 'NE2', 'employee'),
	(13, 'Employee7 user', 'employee7momentum@gmail.com', NULL, '$2y$10$0KwTpHFbEfIab5ez9yArZ.M6Yni9MeiLGPp0Rpc4cw352QVDjDzme', NULL, '2021-10-25 02:24:14', '2022-01-07 07:41:48', 'A001', 'Junior Non-Executive (NE1)', 'Research & Development (R&D)', 'Web developer', 'NE2', 'employee'),
	(15, 'Employee4 user', 'employee4@gmail.com', NULL, '$2y$10$oYUmjDs7KSrXOG39cysdfOA.2U.RJOU2AHqAoOy3tvsX3hf.crq0W', NULL, '2021-11-13 11:18:16', '2021-11-13 11:18:16', 'A001', 'Executive (E2)', 'Human Resource (HR) & Administration', 'Web developer', 'NE2', 'employee'),
	(16, 'Muhammad Hakim', 'hakimhambali99@gmail.com', NULL, '$2y$10$o9skYkPdjKeu2CviwshyZueJQXC.jsEsp3dS5D5HVQahWpuaQb0iW', NULL, '2021-11-14 05:33:17', '2021-11-14 05:34:10', 'A023', 'CEO (TM2)', 'Human Resource (HR) & Administration', 'Web Designer', 'NE2', 'employee'),
	(17, 'Muhammad Hakim Bin Md Hambali', 'hakimhambali77@gmail.com', NULL, '$2y$10$RF9RraJ1qb5FhU.Cek43AO96P3B9KvJ6pqGBaueQG2WtFe53fpbNq', NULL, '2021-11-15 11:58:00', '2021-11-15 11:58:00', 'A001', 'Executive (E2)', 'Research & Development (R&D)', 'Web Developer', 'NE2', 'employee'),
	(20, 'Muhammad Hakim ', 'hakimhambali88@gmail.com', NULL, '$2y$10$M1yJ9CLoZVkzPYPxH.Gno.VPD/ZsnMSon7KMgqcq2tvFiyJ4vXBVy', NULL, '2021-11-16 09:59:02', '2021-11-16 09:59:02', NULL, 'Junior Non-Executive (NE1)', NULL, 'Web developer', 'NE2', 'manager'),
	(28, 'Moderator Useraw', 'moderator@gmail.com', NULL, '$2y$10$ycI3y3WDYypCyJsqCHMeMO9Jy1ZZLcqgG9H2WahPXYxqKcgObBfIG', NULL, '2021-12-27 07:37:47', '2021-12-28 03:47:57', NULL, 'Junior Non-Executive (NE1)', NULL, 'Web developer', 'NE2', 'moderator'),
	(29, 'Moderator User3', 'moderator3@gmail.com', NULL, '$2y$10$ciWO/UGRUK9s6VQsAyyk7uT4mf6VWY.t81GbGNk98Ij5ezdFLpiAq', NULL, '2021-12-27 07:48:25', '2021-12-27 07:48:25', NULL, 'Junior Non-Executive (NE1)', NULL, 'Web developer', 'NE2', 'moderator'),
	(40, 'Test', 'test77@gmail.com', NULL, '$2y$10$jsn3Cb7AVIVoBfUcdRthz.ll/3Kw46j8g/g06P8OriwecV9Cc8lUe', NULL, '2021-12-28 03:59:11', '2021-12-28 03:59:11', NULL, 'Junior Non-Executive (NE1)', NULL, 'Web developer', 'NE2', 'employee'),
	(41, 'Test', 'test7wefd7@gmail.com', NULL, '$2y$10$gsA5e3taGhjpAcrsRyxl/uKpU7O62rPRnbin9VXnHygkQhWmOcsJW', NULL, '2021-12-28 03:59:15', '2021-12-28 03:59:15', NULL, 'Junior Non-Executive (NE1)', NULL, 'Web developer', 'NE2', 'employee'),
	(42, 'Test', 'test711@gmail.com', NULL, '$2y$10$JgXIBzpYeloyS6lt.Qnr6OmWGIh9z70p.vUZ7CNsgji7k4Kikokeq', NULL, '2021-12-28 03:59:18', '2021-12-28 03:59:18', NULL, 'Junior Non-Executive (NE1)', NULL, 'Web developer', 'NE2', 'employee'),
	(43, 'Hakim Johnawdawd', 'hakimhamsadasdwbali77@gmail.com', NULL, '$2y$10$fCwUb6GeYWkEa/HjwQXWLuKaLx57nG0aqq.UU9V9q3PJ5G3SJbV4m', NULL, '2021-12-30 03:48:00', '2021-12-30 03:48:00', 'A007', 'Director (TM1)', 'CEO Office', 'Web Designer', 'NE2', 'employee'),
	(44, 'Hamdan', 'saiful77@gmail.com', NULL, '$2y$10$lSJf90n8AGO.I3VwiAigr.eKwWK1ZVlsMtWNyH7YxDfpC2bw4b8iO', NULL, '2022-01-07 06:54:56', '2022-01-07 07:23:21', 'A005', 'Executive (E2)', 'Research & Development (R&D)', 'Training & Development', NULL, 'employee'),
	(45, 'Hakim John123', 'hakimhambali44@gmail.com', NULL, '$2y$10$..6J5ooMBRtxCFIByvO9eORq2cFe3PIp.QlyRKT0dwj1MgHPK7l/i', NULL, '2022-01-10 02:12:32', '2022-01-10 02:12:32', NULL, NULL, NULL, NULL, NULL, 'employee'),
	(46, 'Pro', 'pro@gmail.com', NULL, '$2y$10$9ovHBlZg6xE6iAsq.M8MzOY/M7LFL086PPGISfmaqiLiR5rAVkm96', NULL, '2022-01-17 03:07:58', '2022-01-17 03:07:58', '0015', 'Executive (E2)', 'Research & Development (R&D)', 'Web Developer', NULL, 'pro'),
	(47, 'HR User', 'hr@gmail.com', NULL, '$2y$10$4vWtDMGg1PtVYiS9hAAOUu/4BnXok7XkhFWQXNlYwIUg5CVd1FAoa', NULL, '2022-01-18 01:23:28', '2022-01-18 01:23:28', 'A0101', 'Executive (E2)', 'Research & Development (R&D)', 'Web Developer', NULL, 'hr');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
