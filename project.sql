-- --------------------------------------------------------
-- Host:                         115.85.65.222
-- Server version:               5.6.25 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_empmon
DROP DATABASE IF EXISTS `db_empmon`;
CREATE DATABASE IF NOT EXISTS `db_empmon` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_empmon`;

-- Dumping structure for table db_empmon.mst_devices
DROP TABLE IF EXISTS `mst_devices`;
CREATE TABLE IF NOT EXISTS `mst_devices` (
  `emp_id` varchar(20) NOT NULL COMMENT 'sudah tau bwt apa, ga usah di jelasin lg....',
  `token` varchar(155) DEFAULT NULL COMMENT 'generate token dari firebase',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='master table untuk storing token device-device untuk notifikasi dari fire base';

-- Dumping data for table db_empmon.mst_devices: ~0 rows (approximately)
/*!40000 ALTER TABLE `mst_devices` DISABLE KEYS */;
REPLACE INTO `mst_devices` (`emp_id`, `token`) VALUES
	('104010', 'ektU7_v_4pI:APA91bHwkM7jVm51TWBy1Rffr20tRR_qfhjcATqfnk6vfllkcLadUUgs6Ers05yxamQRfyff7x5effE92wdMBs9zXI1xL4_rj07OkgXTZfLD9faBu1hPTVkIEA6Iby2nez4RhD4a0ffK');
/*!40000 ALTER TABLE `mst_devices` ENABLE KEYS */;

-- Dumping structure for table db_empmon.mst_employee
DROP TABLE IF EXISTS `mst_employee`;
CREATE TABLE IF NOT EXISTS `mst_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Test tambah id ',
  `emp_id` varchar(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `team` varchar(45) DEFAULT NULL,
  `plant` varchar(45) DEFAULT NULL,
  `password` varchar(65) DEFAULT NULL,
  `level` int(11) DEFAULT NULL COMMENT '0 = member\n1 = GL\n2 = SL\n3 = JAM\n4 = TL\n5 = DH',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`emp_id`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table db_empmon.mst_employee: ~30 rows (approximately)
/*!40000 ALTER TABLE `mst_employee` DISABLE KEYS */;
REPLACE INTO `mst_employee` (`id`, `emp_id`, `name`, `company`, `department`, `team`, `plant`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
	(13, '101511', 'KHAIRUL AKHYAR', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '101511', 0, NULL, '2020-04-13 11:15:39', '2020-04-13 11:15:39'),
	(1, '103494', 'TUBAGUS MOCHAMAD ISNAENI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CCP', '103494', 0, NULL, NULL, NULL),
	(2, '103585', 'FAISAL AKBAR PURNAMA PUTRA', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'BF', '103585', 0, NULL, NULL, NULL),
	(22, '103610', 'GRAHITO GERY NUGROHO', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '103610', 0, NULL, '2020-04-13 11:32:37', '2020-04-13 11:32:37'),
	(3, '104010', 'RADEN BAMBANG ERGIANSYAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'COKE', '104010', 2, NULL, NULL, NULL),
	(15, '106860', 'DENNIE PRASETYO', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CHEMICAL TESTING', '106860', 0, NULL, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
	(19, '106893', 'HASBULLAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'UCC', '106893', 0, NULL, '2020-04-13 11:28:03', '2020-04-13 11:28:03'),
	(30, '106916', 'INDRA GUNAWAN', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'LIME', '106916', 0, NULL, '2020-04-13 11:40:06', '2020-04-13 11:40:06'),
	(25, '106940', 'ADITYO EKO WIBOWO', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '106940', 0, NULL, '2020-04-13 11:35:22', '2020-04-13 11:35:22'),
	(12, '106973', 'SONY HERLAMBANG', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SMP', '106973', 0, NULL, '2020-04-13 11:13:41', '2020-04-13 11:13:41'),
	(20, '107065', 'WASISKHA WATI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SMP', '107065', 0, NULL, '2020-04-13 11:28:52', '2020-04-13 11:28:52'),
	(4, '107098', 'AHMAD ZAINAL', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'RMH', '107098', 0, NULL, NULL, NULL),
	(21, '109687', 'GAWANG SETYAWAN', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CCP', '109687', 0, NULL, '2020-04-13 11:30:28', '2020-04-13 11:30:28'),
	(26, '109721', 'MUHAMMAD FAUJI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '109721', 0, NULL, '2020-04-13 11:36:07', '2020-04-13 11:36:07'),
	(24, '109951', 'DIAULHAK', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '109951', 0, NULL, '2020-04-13 11:34:52', '2020-04-13 11:34:52'),
	(18, '110693', 'MUHAMMAD IHSAN', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SMP', '110693', 0, NULL, '2020-04-13 11:27:27', '2020-04-13 11:27:27'),
	(28, '110988', 'MOCHAMAD SYAWALU RIFAI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '110988', 0, NULL, '2020-04-13 11:37:46', '2020-04-13 11:37:46'),
	(5, '111105', 'RUDI HIKMATULLAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'BF', '$2y$10$tzMZQ4n/.I/iDqNSZV1NGepfJiznfo2662EoF9CFe5JqP2qkjjX.2', 0, '0ouga0YNs5RXwlqPnB63PkVsRgRgSei89ybKNfvfJ1hLl8tgMxwFeWFzSgg3', NULL, NULL),
	(23, '111572', 'ANGGA FIRMANSYAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'UCC', '111572', 0, NULL, '2020-04-13 11:33:34', '2020-04-13 11:33:34'),
	(17, '111606', 'FUJIANTO', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '111606', 0, NULL, '2020-04-13 11:24:49', '2020-04-13 11:24:49'),
	(6, '111652', 'BRAMANTIYO ARDI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CCP', '111652', 0, NULL, NULL, NULL),
	(27, '111663', 'ERDANO SEDYA DWIPRASAJAWARA', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SMP', '111663', 0, NULL, '2020-04-13 11:36:53', '2020-04-13 11:36:53'),
	(7, '111845', 'ADI FUADIL HIDAYAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'RMH', '111845', 0, NULL, NULL, NULL),
	(14, '112030', 'DARU ANUGERAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PHYSICAL TESTING', '112030', 0, NULL, '2020-04-13 11:17:11', '2020-04-13 11:17:11'),
	(8, '112052', 'KHARIZMA DWI MARTU FANNY', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SINTER', '112052', 0, NULL, NULL, NULL),
	(9, '112143', 'ADAM KUSNAEDI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SINTER', '112143', 0, NULL, NULL, NULL),
	(29, '112360', 'MOCHAMAD GALUH RUWANDA AKBAR', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CHEMICAL TESTING', '112360', 0, NULL, '2020-04-13 11:38:38', '2020-04-13 11:38:38'),
	(10, '112471', 'MEDIAN PRASETYA', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PHYSICAL TESTING', '$2y$10$tzMZQ4n/.I/iDqNSZV1NGepfJiznfo2662EoF9CFe5JqP2qkjjX.2', 0, '7RKsd3BjGzP9aw0Ks4k4cicKl1L7ARUWgwxjcMWts84SGgIUFs0WKoazXj28', NULL, NULL),
	(16, '112484', 'SHUSMITA PUSPITASARI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CCP', '112484', 0, NULL, '2020-04-13 11:22:24', '2020-04-13 11:22:24'),
	(11, '112895', 'LINDA EVAN ENGLISTA', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'COKE', '112895', 0, NULL, NULL, NULL);
/*!40000 ALTER TABLE `mst_employee` ENABLE KEYS */;

-- Dumping structure for table db_empmon.mst_family_member
DROP TABLE IF EXISTS `mst_family_member`;
CREATE TABLE IF NOT EXISTS `mst_family_member` (
  `emp_id` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `relation` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`emp_id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_empmon.mst_family_member: ~76 rows (approximately)
/*!40000 ALTER TABLE `mst_family_member` DISABLE KEYS */;
REPLACE INTO `mst_family_member` (`emp_id`, `name`, `relation`, `created_at`, `updated_at`) VALUES
	('101511', 'DEWI', 'MAID', '2020-04-13 11:16:11', '2020-04-13 11:16:11'),
	('101511', 'HANIE', 'WIFE', '2020-04-13 11:15:39', '2020-04-13 11:15:39'),
	('101511', 'KAREEM', 'SON', '2020-04-13 11:15:53', '2020-04-13 11:15:53'),
	('101511', 'MALIK', 'SON', '2020-04-13 11:16:01', '2020-04-13 11:16:01'),
	('103494', 'QOYYIMAH', 'WIFE', NULL, NULL),
	('103494', 'RATU AYUNDA ZHAFIRA', 'DAUGHTER', NULL, NULL),
	('103585', 'RAFFAEL ALVAREZ', 'SON', NULL, NULL),
	('103585', 'RHANTIKA ANDINI', 'WIFE', NULL, NULL),
	('103610', 'KEN', 'SON', '2020-04-13 11:32:46', '2020-04-13 11:32:46'),
	('103610', 'OVY', 'WIFE', '2020-04-13 11:32:37', '2020-04-13 11:32:37'),
	('104010', 'DEWY APRIYANI', 'WIFE', NULL, NULL),
	('104010', 'MELODY RAIHANA KADITA', 'DAUGHTER', NULL, NULL),
	('106860', 'FATIH', 'NEPHEW', '2020-04-13 11:19:36', '2020-04-13 11:19:36'),
	('106860', 'RESTU INDRIANI', 'WIFE', '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
	('106860', 'SYAKIRA KEYZA', 'DAUGHTER', '2020-04-13 11:18:59', '2020-04-13 11:18:59'),
	('106860', 'YAYAH', 'MOTHER', '2020-04-13 11:19:12', '2020-04-13 11:19:12'),
	('106860', 'ZDIKRI', 'SON', '2020-04-13 11:18:42', '2020-04-13 11:18:42'),
	('106893', 'NIZAM', 'SON', '2020-04-13 11:28:14', '2020-04-13 11:28:14'),
	('106893', 'NURUL', 'WIFE', '2020-04-13 11:28:04', '2020-04-13 11:28:04'),
	('106916', 'AURA LATISHA ZAFARANI', 'DAUGHTER', '2020-04-13 11:40:27', '2020-04-13 11:40:27'),
	('106916', 'WILDA SEPTINI MELINDA', 'WIFE', '2020-04-13 11:40:06', '2020-04-13 11:40:06'),
	('106940', 'ADIA', 'SON', '2020-04-13 11:35:31', '2020-04-13 11:35:31'),
	('106940', 'DIAN', 'WIFE', '2020-04-13 11:35:22', '2020-04-13 11:35:22'),
	('106973', 'EZIO', 'SON', '2020-04-13 11:14:30', '2020-04-13 11:14:30'),
	('106973', 'NUFUS', 'WIFE', '2020-04-13 11:13:41', '2020-04-13 11:13:41'),
	('107065', 'NIDA NUR RAFA', 'SISTER', '2020-04-13 11:29:21', '2020-04-13 11:29:21'),
	('107065', 'SUCI SUHARTI', 'MOTHER', '2020-04-13 11:29:05', '2020-04-13 11:29:05'),
	('107065', 'SUWANTO', 'FATHER', '2020-04-13 11:28:52', '2020-04-13 11:28:52'),
	('107098', 'ENO SRIBULAN', 'WIFE', NULL, NULL),
	('107098', 'MUHAMMAD MUZAKY', 'SON', NULL, NULL),
	('107098', 'SYAPIRA AZALEA', 'DAUGHTER', NULL, NULL),
	('109687', 'HESTI AMINATUN', 'MOTHER IN LAW', '2020-04-13 11:31:11', '2020-04-13 11:31:11'),
	('109687', 'KANSA', 'BROTHER IN LAW', '2020-04-13 11:31:55', '2020-04-13 11:31:55'),
	('109687', 'KAYANA NIANDRA SETYANINGRUM', 'DAUGHTER', '2020-04-13 11:30:48', '2020-04-13 11:30:48'),
	('109687', 'MUHID PRATONDO', 'BROTHER IN LAW', '2020-04-13 11:31:36', '2020-04-13 11:31:36'),
	('109687', 'YURILLA ISTYANINGRUM', 'WIFE', '2020-04-13 11:30:28', '2020-04-13 11:30:28'),
	('109721', 'FARID', 'BROTHER', '2020-04-13 11:36:07', '2020-04-13 11:36:07'),
	('109951', 'RULLY SEPTRIA', 'WIFE', '2020-04-13 11:34:52', '2020-04-13 11:34:52'),
	('110693', 'ALIYA', 'WIFE', '2020-04-13 11:27:27', '2020-04-13 11:27:27'),
	('110988', 'KUSMIN', 'FATHER', '2020-04-13 11:37:46', '2020-04-13 11:37:46'),
	('110988', 'MUJIATUN', 'MOTHER', '2020-04-13 11:37:58', '2020-04-13 11:37:58'),
	('111105', 'HOIMAH', 'MOTHER', NULL, NULL),
	('111105', 'RACHMATULLAH', 'FATHER', NULL, NULL),
	('111572', 'NAUFAL', 'BROTHER', '2020-04-13 11:33:46', '2020-04-13 11:33:46'),
	('111572', 'NUNUNG', 'FATHER', '2020-04-13 11:34:12', '2020-04-13 11:34:12'),
	('111572', 'YAYAH', 'MOTHER', '2020-04-13 11:33:58', '2020-04-13 11:33:58'),
	('111572', 'ZAHRA', 'SISTER', '2020-04-13 11:33:34', '2020-04-13 11:33:34'),
	('111606', 'ERNAWATI', 'MOTHER', '2020-04-13 11:24:49', '2020-04-13 11:24:49'),
	('111606', 'FACHRI AL GHIFARI', 'BROTHER', '2020-04-13 11:25:14', '2020-04-13 11:25:14'),
	('111606', 'HANA HAFIDZOTU JAHROH', 'SISTER', '2020-04-13 11:25:59', '2020-04-13 11:25:59'),
	('111606', 'MUHAMMAD AL HAFIZH', 'BROTHER', '2020-04-13 11:25:32', '2020-04-13 11:25:32'),
	('111606', 'OMA', 'FATHER', '2020-04-13 11:24:58', '2020-04-13 11:24:58'),
	('111663', 'ENDANG S', 'MOTHER', '2020-04-13 11:36:53', '2020-04-13 11:36:53'),
	('111663', 'ERWI S', 'SISTER', '2020-04-13 11:37:08', '2020-04-13 11:37:08'),
	('111845', 'ABDUL MUTHOLIB', 'FATHER', NULL, NULL),
	('112030', 'GHAISAN', 'BROTHER', '2020-04-13 11:17:32', '2020-04-13 11:17:32'),
	('112030', 'LENAH', 'AUNT', '2020-04-13 11:17:20', '2020-04-13 11:17:20'),
	('112030', 'LENVAH', 'MOTHER', '2020-04-13 11:17:11', '2020-04-13 11:17:11'),
	('112052', 'DIKI ARISTA', 'WIFE', NULL, NULL),
	('112052', 'HARI S', 'FATHER', NULL, NULL),
	('112052', 'KHARIZMA DWI MARTU FANDY', 'BROTHER', NULL, NULL),
	('112052', 'SITI JAWARIYAH', 'MOTHER', NULL, NULL),
	('112052', 'SUHERNI', 'GRAND MOTHER', NULL, NULL),
	('112143', 'JUHRIYAH', 'MOTHER', NULL, NULL),
	('112143', 'SYAHRUDIN', 'FATHER', NULL, NULL),
	('112360', 'GILANG M. RIZKI PAMUNGKAS', 'BROTHER', '2020-04-13 11:38:58', '2020-04-13 11:38:58'),
	('112360', 'HANAH', 'MOTHER', '2020-04-13 11:38:38', '2020-04-13 11:38:38'),
	('112360', 'RIDA INDRIANI', 'SISTER', '2020-04-13 11:39:24', '2020-04-13 11:39:24'),
	('112360', 'RISA INDAH R', 'SISTER', '2020-04-13 11:39:11', '2020-04-13 11:39:11'),
	('112471', 'DEDI JUNAEDI', 'FATHER', NULL, NULL),
	('112471', 'MARYANI', 'MOTHER', NULL, NULL),
	('112484', 'HARININGSIH', 'MOTHER', '2020-04-13 11:22:51', '2020-04-13 11:22:51'),
	('112484', 'UDI SASMITO', 'FATHER', '2020-04-13 11:22:24', '2020-04-13 11:22:24'),
	('112895', 'EVANDI', 'FATHER', NULL, NULL),
	('112895', 'FAHMI S', 'BROTHER', NULL, NULL),
	('112895', 'JAWARIYAH', 'MOTHER', NULL, NULL);
/*!40000 ALTER TABLE `mst_family_member` ENABLE KEYS */;

-- Dumping structure for procedure db_empmon.sp_get_report_status
DROP PROCEDURE IF EXISTS `sp_get_report_status`;
DELIMITER //
CREATE PROCEDURE `sp_get_report_status`()
BEGIN
	select e.emp_id, e.name, ifnull(er.report_time,"REPORT NOT SEND") as report_status
	from db_empmon.mst_employee e
	left outer join (select * from  db_empmon.tr_employee_reporting 
	where DATE(report_time) = CURDATE())  er
	on e.emp_id = er.emp_id;
END//
DELIMITER ;

-- Dumping structure for table db_empmon.tr_employee_reporting
DROP TABLE IF EXISTS `tr_employee_reporting`;
CREATE TABLE IF NOT EXISTS `tr_employee_reporting` (
  `emp_id` varchar(20) NOT NULL,
  `report_time` datetime NOT NULL,
  `cough` int(11) DEFAULT NULL,
  `fever` int(11) DEFAULT NULL,
  `flue` int(11) DEFAULT NULL,
  `temperature` decimal(3,1) DEFAULT NULL,
  `visiting` varchar(100) DEFAULT NULL,
  `gps_location` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`emp_id`,`report_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_empmon.tr_employee_reporting: ~1 rows (approximately)
/*!40000 ALTER TABLE `tr_employee_reporting` DISABLE KEYS */;
REPLACE INTO `tr_employee_reporting` (`emp_id`, `report_time`, `cough`, `fever`, `flue`, `temperature`, `visiting`, `gps_location`, `created_at`, `updated_at`) VALUES
	('104010', '2020-04-07 20:55:09', 0, 0, 0, 36.6, 'KP,HOME', '1.2131231,0.1212313', NULL, NULL);
/*!40000 ALTER TABLE `tr_employee_reporting` ENABLE KEYS */;

-- Dumping structure for table db_empmon.tr_family_member_reporting
DROP TABLE IF EXISTS `tr_family_member_reporting`;
CREATE TABLE IF NOT EXISTS `tr_family_member_reporting` (
  `emp_id` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `time_reporting` datetime NOT NULL,
  `cough` int(11) DEFAULT NULL,
  `fever` int(11) DEFAULT NULL,
  `flue` int(11) DEFAULT NULL,
  `temperature` decimal(3,1) DEFAULT NULL,
  `visiting` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`emp_id`,`name`,`time_reporting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_empmon.tr_family_member_reporting: ~0 rows (approximately)
/*!40000 ALTER TABLE `tr_family_member_reporting` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_family_member_reporting` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
