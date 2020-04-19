-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 08:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_empmon`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_generate_report` (IN `p_department` VARCHAR(45), IN `p_team` VARCHAR(45), IN `p_starttime` DATETIME, IN `p_endtime` DATETIME)  BEGIN

select 
(select count(*) from db_empmon.mst_employee where department = p_department and 
team = p_team) as NO_EMPLOYEE,
(select count(*) from db_empmon.mst_family_member inner join db_empmon.mst_employee
on db_empmon.mst_family_member.emp_id = db_empmon.mst_employee.emp_id
where db_empmon.mst_employee.department = p_department and db_empmon.mst_employee.team = p_team) as NO_FAMILY,
(select count(*)  from db_empmon.tr_family_member_reporting where cough = 1 
and time_reporting between p_starttime and p_endtime) as EMP_COUGH, 
(select count(*) from db_empmon.tr_family_member_reporting where fever = 1 
and time_reporting between p_starttime and p_endtime) as EMP_FEVER,
(select count(*) from db_empmon.tr_family_member_reporting where flue = 1 
and time_reporting between p_starttime and p_endtime) as EMP_FLUE,
(select count(*) from db_empmon.tr_employee_reporting er inner join db_empmon.mst_employee e
 where e.department = "BPC" and e.team = "P/C" and er.visit_oth_city = 1) as EMP_VISIT_OTH_CITY,
(select count(*)  from db_empmon.tr_family_member_reporting fm inner join db_empmon.mst_employee e
on fm.emp_id = e.emp_id where fm.cough = 1 
and fm.time_reporting between p_starttime and p_endtime) as FAM_COUGH, 
(select count(*) from db_empmon.tr_family_member_reportingsp_get_report_status fm inner join db_empmon.mst_employee e
on fm.emp_id = e.emp_id
where fm.fever = 1 
and fm.time_reporting between p_starttime and p_endtime) as FAM_FEVER,
(select count(*) from db_empmon.tr_family_member_reporting fm inner join db_empmon.mst_employee e
on fm.emp_id = e.emp_id
where fm.flue = 1 
and fm.time_reporting between p_starttime and p_endtime) as FAM_FLUE,
(select count(*) from db_empmon.tr_family_member_reporting fm inner join db_empmon.mst_employee e
on fm.emp_id = e.emp_id
where e.department = p_department and e.team = p_team and fm.visit_oth_city = 1 ) as EMP_VISIT_OTH_CITY;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_report_status` ()  BEGIN
	select e.emp_id, e.name, ifnull(er.report_time,"REPORT NOT SEND") as report_status
	from db_empmon.mst_employee e
	left outer join (select * from  db_empmon.tr_employee_reporting 
	where DATE(report_time) = CURDATE())  er
	on e.emp_id = er.emp_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_devices`
--

CREATE TABLE `mst_devices` (
  `emp_id` varchar(20) NOT NULL COMMENT 'sudah tau bwt apa, ga usah di jelasin lg....',
  `token` varchar(155) DEFAULT NULL COMMENT 'generate token dari firebase'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='master table untuk storing token device-device untuk notifikasi dari fire base' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_devices`
--

INSERT INTO `mst_devices` (`emp_id`, `token`) VALUES
('104010', 'ektU7_v_4pI:APA91bHwkM7jVm51TWBy1Rffr20tRR_qfhjcATqfnk6vfllkcLadUUgs6Ers05yxamQRfyff7x5effE92wdMBs9zXI1xL4_rj07OkgXTZfLD9faBu1hPTVkIEA6Iby2nez4RhD4a0ffK');

-- --------------------------------------------------------

--
-- Table structure for table `mst_employee`
--

CREATE TABLE `mst_employee` (
  `id` int(11) NOT NULL COMMENT 'Test tambah id ',
  `emp_id` varchar(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `team` varchar(45) DEFAULT NULL,
  `plant` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL COMMENT '0 = member\n1 = GL\n2 = SL\n3 = JAM\n4 = TL\n5 = DH',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_employee`
--

INSERT INTO `mst_employee` (`id`, `emp_id`, `name`, `company`, `department`, `team`, `plant`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(31, '0000001', 'Sinto Gendeng', 'DUMMY', 'BPC', 'INFRA', NULL, '$2y$10$EpvHBfsHtpzSXh.Do9YVvubnPfju9uPwREHG78w5xzEOeTQljMkDG', 0, NULL, '2020-04-18 11:01:14', '2020-04-18 18:01:14'),
(40, '00000010', 'Larina Wahisam', 'DUMMY', 'BPC', 'MES', NULL, '$2y$10$Jm4q8wV2oasfDpZlDLSpcukuYLMeWgOd4DrEU4fLzZGLePkV6w7V.', 0, NULL, '2020-04-18 11:04:51', '2020-04-18 18:04:51'),
(32, '0000002', 'Wira Lanang', 'DUMMY', 'BPC', 'INFRA', NULL, '$2y$10$tTU7mPThALZOZ4ASBb/pGu1MIcNK9qrIwhjdxt4P50x6h7U.yU3z6', 0, NULL, '2020-04-18 11:01:34', '2020-04-18 18:01:34'),
(33, '0000003', 'Sinne Diriwa', 'DUMMY', 'BPC', 'INFRA', NULL, '$2y$10$eE63fH6Tn.v4Uo7J.7ZB8etEUpieTgPBxtH4ogNFKuL2rZcNioztW', 0, NULL, '2020-04-18 11:01:51', '2020-04-18 18:01:51'),
(34, '0000004', 'Wahid Sotoy', 'DUMMY', 'BPC', 'INFRA', NULL, '$2y$10$63KuT3Skjbd9/Vk/1uU0B.m6tSFkDvPYqK0hI0kjXQsFk64LHebeW', 0, NULL, '2020-04-18 11:02:11', '2020-04-18 18:02:11'),
(35, '0000005', 'Walang Sungsang', 'DUMMY', 'BPC', 'INFRA', NULL, '$2y$10$49IzAekv283dwuU1muxVuu7wmqYyWUVjx..an7B4mJYvGyfJBPMTS', 0, NULL, '2020-04-18 11:02:59', '2020-04-18 18:02:59'),
(36, '0000006', 'Lirina Sungsang', 'DUMMY', 'BPC', 'MES', NULL, '$2y$10$C0aSaM17F2y/32Rud0fvc.sHYbA1IVjpiA9uA6OFkMLXzQ4gZvuxC', 0, NULL, '2020-04-18 11:03:42', '2020-04-18 18:03:42'),
(37, '0000007', 'Brilian Wiranto', 'DUMMY', 'BPC', 'MES', NULL, '$2y$10$4R8BquUpAdyjD08TWMma0ez1DkqURltIdjoJq97pBcQFWMjzfuIPy', 0, NULL, '2020-04-18 11:03:59', '2020-04-18 18:03:59'),
(38, '0000008', 'Sikina Natarali', 'DUMMY', 'BPC', 'MES', NULL, '$2y$10$oyQgGV1L4nDrMEBwxnarY.Ufpk4zkeCC4djlQzEwLi2mWQC4f1gji', 0, NULL, '2020-04-18 11:04:18', '2020-04-18 18:04:18'),
(39, '0000009', 'Walani Sukoy', 'DUMMY', 'BPC', 'MES', NULL, '$2y$10$hWkcf36u0AC/dQRIkOikTe1kJXTnzMwNz26d0MZKRUuu1AfxnfCrC', 0, NULL, '2020-04-18 11:04:31', '2020-04-18 18:04:31'),
(13, '101511', 'KHAIRUL AKHYAR', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '$2y$10$4/sTlQ8Wp7x3MR6uMKF.6O1dh1vzRphYxNZqwkn89gL49iWo8iuVy', 0, 'fXmoSuvujtQ0wUdWclOfPpa89nAcg74h5v1TBAKfYU72bahr4d5o3I6bkFnN', '2020-04-13 04:15:39', '2020-04-17 16:19:48'),
(1, '103494', 'TUBAGUS MOCHAMAD ISNAENI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CCP', '$2y$10$41eW1ZLxiociciqk4bdn4e6mgBbJ0dDJlqz42ndwwLrUv7oXeJgOS', 0, NULL, NULL, '2020-04-16 14:50:40'),
(2, '103585', 'FAISAL AKBAR PURNAMA PUTRA', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'BF', '$2y$10$x5gfJOYICnCiD1ujzJle6.uUDVYz7/BVQBYzwzCfUCg5t5DJX03Yi', 0, NULL, NULL, '2020-04-16 14:50:40'),
(22, '103610', 'GRAHITO GERY NUGROHO', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '$2y$10$T/xJymk3EcVjS07dIKk4wusYRzDxXxpGc4qxdiYTqfFXOxYpNVmhS', 0, NULL, '2020-04-13 04:32:37', '2020-04-16 14:50:40'),
(3, '104010', 'RADEN BAMBANG ERGIANSYAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'COKE', '$2y$10$o5IgqUoPw3CV5HNQRwlb/.WTHwrWIqaEcz5fVNaQ3zMacO.GiTItu', 2, NULL, NULL, '2020-04-16 14:50:41'),
(15, '106860', 'DENNIE PRASETYO', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CHEMICAL TESTING', '$2y$10$2st55x1fSyFQ7JeUMHiwy.uvLLkct9/uFygnfM.wxH6EpPv6RSdjW', 0, NULL, '2020-04-13 04:18:27', '2020-04-16 14:50:41'),
(19, '106893', 'HASBULLAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'UCC', '$2y$10$Z7CBdxdsIBJeKye9yVFLv.SZPX9Hu0AItQyvLgcMnItBh8n2cikkW', 0, NULL, '2020-04-13 04:28:03', '2020-04-16 14:50:41'),
(30, '106916', 'INDRA GUNAWAN', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'LIME', '$2y$10$CBtIo0Sr9WMBS6unIndPy.mwfTLlgJSSnB9uNQMc2K/m.i06DalLa', 0, NULL, '2020-04-13 04:40:06', '2020-04-16 14:50:42'),
(25, '106940', 'ADITYO EKO WIBOWO', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '$2y$10$c0A/fU0.HxKbaHXqX1Jlb.aEdOhD71zsPo0O3.9NwO8YinaPpDG0K', 0, NULL, '2020-04-13 04:35:22', '2020-04-16 14:50:42'),
(12, '106973', 'SONY HERLAMBANG', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SMP', '$2y$10$9YLEl95xLSbNB3nB4BP.j.R6fK6uTYb2cYgHghICHAWMKpUC3jcYO', 0, NULL, '2020-04-13 04:13:41', '2020-04-16 14:50:42'),
(20, '107065', 'WASISKHA WATI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SMP', '$2y$10$dsf6VF14ia2ZPHWJm2TVPOY7ZgjXFAGU4wPN6weMnvOrxtx3eZX/.', 0, NULL, '2020-04-13 04:28:52', '2020-04-16 14:50:43'),
(4, '107098', 'AHMAD ZAINAL', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'RMH', '$2y$10$AoFYicGFcbtySA3qEIKZBuJjuetRpjqPUOF1qDDrhouRxq4AyRKGC', 0, NULL, NULL, '2020-04-16 14:50:43'),
(21, '109687', 'GAWANG SETYAWAN', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CCP', '$2y$10$J7oVStuEwxS1AriPkrWC7.BaaixIjw.m73BOiO7yoUFdGVLChx4sy', 0, NULL, '2020-04-13 04:30:28', '2020-04-16 14:50:43'),
(26, '109721', 'MUHAMMAD FAUJI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '$2y$10$SBZBhBqigkDsB4J7krtW7.982NTPB30vs8FxdT/eNINLb7mRYM1pW', 0, NULL, '2020-04-13 04:36:07', '2020-04-16 14:50:44'),
(24, '109951', 'DIAULHAK', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '$2y$10$LeEH3XKczPu82mhkkyOe3OuwDvcjtHHLVdsROwYW1JwbdCNtsEea.', 0, NULL, '2020-04-13 04:34:52', '2020-04-16 14:50:44'),
(28, '110988', 'MOCHAMAD SYAWALU RIFAI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '$2y$10$nzuMGm3EaVzqJXxOESuezuJl1SWOmvih1B98iU5bPdmCVTb.jPhj2', 0, NULL, '2020-04-13 04:37:46', '2020-04-16 14:50:44'),
(5, '111105', 'RUDI HIKMATULLAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'BF', '$2y$10$PD.4tGqn4D86DE9znniJreY2s50fLJqImnB4eu.UwCEl4TtwOcI2G', 0, 'yHKqlQg4Esl6lPpLxbssHHdesLHksSXPjDbnDihGvsqWndyOnuNTDYt932Ih', NULL, '2020-04-16 14:50:45'),
(23, '111572', 'ANGGA FIRMANSYAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'UCC', '$2y$10$meeA2f5SlXfO7Z1Ljb4Wau.h6FXGOB9Et74Ug0GlUHLokjoNQTLLu', 0, NULL, '2020-04-13 04:33:34', '2020-04-16 14:50:45'),
(17, '111606', 'FUJIANTO', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PM', '$2y$10$J1OrI/0APY.hipSIEiPCveS/nnMRWauiBHVMyj1sXaVvKpSwkYxKW', 0, NULL, '2020-04-13 04:24:49', '2020-04-16 14:50:45'),
(6, '111652', 'BRAMANTIYO ARDI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CCP', '$2y$10$nP9a/OMBIV49HUXMvsOIauZH7CJrr9sJJQGbSdrrUQFNwz8vnBuze', 0, NULL, NULL, '2020-04-16 14:50:46'),
(27, '111663', 'ERDANO SEDYA DWIPRASAJAWARA', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SMP', '$2y$10$RKkbT8kKbvnLb7cUM.UchOgmOirMzDbhtdElspSvYBTHcDKlWbnOK', 0, NULL, '2020-04-13 04:36:53', '2020-04-16 14:50:46'),
(7, '111845', 'ADI FUADIL HIDAYAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'RMH', '$2y$10$Tng4YHv8qNzv8N5HHHMNmeF/Rz2wjx7.oPfqSIY5iXNInkUQMlwZC', 0, NULL, NULL, '2020-04-16 14:50:47'),
(14, '112030', 'DARU ANUGERAH', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PHYSICAL TESTING', '$2y$10$HIcNU6FeLL4lHkHb.Z..4eO4OXeoDAhSYu4CXSAyFoXSlLiIFfbRG', 0, NULL, '2020-04-13 04:17:11', '2020-04-16 14:50:47'),
(8, '112052', 'KHARIZMA DWI MARTU FANNY', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SINTER', '$2y$10$qg1WJQpiI2n/JPQQaXDQEepOVRPaomun2MFjvywKVUFzj0HfEy24a', 0, NULL, NULL, '2020-04-16 14:50:47'),
(9, '112143', 'ADAM KUSNAEDI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SINTER', '$2y$10$gYFQn7TpaVw2bddL1HA9ju3q3fL0woS2U1G/IObO.BkQDtk7ZFDgC', 0, NULL, NULL, '2020-04-16 14:50:48'),
(29, '112360', 'MOCHAMAD GALUH RUWANDA AKBAR', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CHEMICAL TESTING', '$2y$10$JJVSsErjsgQsOck5N1UXseMogU4UmGfeDeIMePPxzn9TyUV23j.u.', 0, NULL, '2020-04-13 04:38:38', '2020-04-16 14:50:48'),
(10, '112471', 'MEDIAN PRASETYA', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'PHYSICAL TESTING', '$2y$10$VtuVdDJ.YBocArTpUcH7rOwZEUyyBF93pM0jh3D7WcT7/4dzxg5ji', 0, 'B4lY6pPPEjJXlr4FKSc5BNYLLNHYfJPNGDrmELWiZ1BtdAD3I6WF6QKZG1Rr', NULL, '2020-04-16 14:50:48'),
(16, '112484', 'SHUSMITA PUSPITASARI', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'CCP', '$2y$10$B3wAw..RcVOHJTvTmrTiieTVMDN.cTZxds87kMw4FQWXEzH11oscG', 0, NULL, '2020-04-13 04:22:24', '2020-04-16 14:50:48'),
(11, '112895', 'LINDA EVAN ENGLISTA', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'COKE', '$2y$10$4bSNbYtAaJOJZAmFrTwhvuYcFZhinZzeCI4i2ZFRtNBJbaJwl6ax.', 0, NULL, NULL, '2020-04-16 14:50:49'),
(18, '113096', 'MUHAMMAD IHSAN', 'POSCO ICT INDONESIA', 'BPC', 'P/C', 'SMP', '$2y$10$JXDikGLV0T6Xr9mdbMkNLeZjGT.rT9RtBAURkjok.TwtAAfVHyoA.', 0, NULL, '2020-04-13 04:27:27', '2020-04-16 14:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `mst_family_member`
--

CREATE TABLE `mst_family_member` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `relation` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_family_member`
--

INSERT INTO `mst_family_member` (`id`, `emp_id`, `name`, `relation`, `created_at`, `updated_at`) VALUES
(1, '101511', 'DEWI', 'MAID', '2020-04-13 04:16:11', '2020-04-13 04:16:11'),
(2, '101511', 'HANIE', 'WIFE', '2020-04-13 04:15:39', '2020-04-13 04:15:39'),
(3, '101511', 'KAREEM', 'SON', '2020-04-13 04:15:53', '2020-04-13 04:15:53'),
(4, '101511', 'MALIK', 'SON', '2020-04-13 04:16:01', '2020-04-13 04:16:01'),
(5, '103494', 'QOYYIMAH', 'WIFE', NULL, NULL),
(6, '103494', 'RATU AYUNDA ZHAFIRA', 'DAUGHTER', NULL, NULL),
(7, '103585', 'RAFFAEL ALVAREZ', 'SON', NULL, NULL),
(8, '103585', 'RHANTIKA ANDINI', 'WIFE', NULL, NULL),
(9, '103610', 'KEN', 'SON', '2020-04-13 04:32:46', '2020-04-13 04:32:46'),
(10, '103610', 'OVY', 'WIFE', '2020-04-13 04:32:37', '2020-04-13 04:32:37'),
(11, '104010', 'DEWY APRIYANI', 'WIFE', NULL, NULL),
(12, '104010', 'MELODY RAIHANA KADITA', 'DAUGHTER', NULL, NULL),
(13, '106860', 'FATIH', 'NEPHEW', '2020-04-13 04:19:36', '2020-04-13 04:19:36'),
(14, '106860', 'RESTU INDRIANI', 'WIFE', '2020-04-13 04:18:27', '2020-04-13 04:18:27'),
(15, '106860', 'SYAKIRA KEYZA', 'DAUGHTER', '2020-04-13 04:18:59', '2020-04-13 04:18:59'),
(16, '106860', 'YAYAH', 'MOTHER', '2020-04-13 04:19:12', '2020-04-13 04:19:12'),
(17, '106860', 'ZDIKRI', 'SON', '2020-04-13 04:18:42', '2020-04-13 04:18:42'),
(18, '106893', 'NIZAM', 'SON', '2020-04-13 04:28:14', '2020-04-13 04:28:14'),
(19, '106893', 'NURUL', 'WIFE', '2020-04-13 04:28:04', '2020-04-13 04:28:04'),
(20, '106916', 'ALTEMAL HUGA ALFIAN', 'NEPHEW', '2020-04-16 03:25:54', '2020-04-16 03:25:54'),
(21, '106916', 'AURA LATISHA ZAFARANI', 'DAUGHTER', '2020-04-13 04:40:27', '2020-04-13 04:40:27'),
(22, '106916', 'HILWAN FIRMANSYAH', 'BROTHER IN LAW', '2020-04-16 03:25:09', '2020-04-16 03:25:09'),
(23, '106916', 'NADIA', 'SISTER IN LAW', '2020-04-16 03:25:33', '2020-04-16 03:25:33'),
(24, '106916', 'WAWAN KARMAWAN', 'FATHER IN LAW', '2020-04-16 03:24:24', '2020-04-16 03:24:24'),
(25, '106916', 'WILDA SEPTINI MELINDA', 'WIFE', '2020-04-13 04:40:06', '2020-04-13 04:40:06'),
(26, '106916', 'YUYUN KURNIASIH', 'MOTHER IN LAW', '2020-04-16 03:24:49', '2020-04-16 03:24:49'),
(27, '106940', 'ADIA', 'SON', '2020-04-13 04:35:31', '2020-04-13 04:35:31'),
(28, '106940', 'DIAN', 'WIFE', '2020-04-13 04:35:22', '2020-04-13 04:35:22'),
(29, '106973', 'EZIO', 'SON', '2020-04-13 04:14:30', '2020-04-13 04:14:30'),
(30, '106973', 'NUFUS', 'WIFE', '2020-04-13 04:13:41', '2020-04-13 04:13:41'),
(31, '107065', 'NIDA NUR RAFA', 'SISTER', '2020-04-13 04:29:21', '2020-04-13 04:29:21'),
(32, '107065', 'SUCI SUHARTI', 'MOTHER', '2020-04-13 04:29:05', '2020-04-13 04:29:05'),
(33, '107065', 'SUWANTO', 'FATHER', '2020-04-13 04:28:52', '2020-04-13 04:28:52'),
(34, '107098', 'ENO SRIBULAN', 'WIFE', NULL, NULL),
(35, '107098', 'MUHAMMAD MUZAKY', 'SON', NULL, NULL),
(36, '107098', 'SYAPIRA AZALEA', 'DAUGHTER', NULL, NULL),
(37, '109687', 'HESTI AMINATUN', 'MOTHER IN LAW', '2020-04-13 04:31:11', '2020-04-13 04:31:11'),
(38, '109687', 'KANSA', 'BROTHER IN LAW', '2020-04-13 04:31:55', '2020-04-13 04:31:55'),
(39, '109687', 'KAYANA NIANDRA SETYANINGRUM', 'DAUGHTER', '2020-04-13 04:30:48', '2020-04-13 04:30:48'),
(40, '109687', 'MUHID PRATONDO', 'BROTHER IN LAW', '2020-04-13 04:31:36', '2020-04-13 04:31:36'),
(41, '109687', 'YURILLA ISTYANINGRUM', 'WIFE', '2020-04-13 04:30:28', '2020-04-13 04:30:28'),
(42, '109721', 'FARID', 'BROTHER', '2020-04-13 04:36:07', '2020-04-13 04:36:07'),
(43, '109951', 'RULLY SEPTRIA', 'WIFE', '2020-04-13 04:34:52', '2020-04-13 04:34:52'),
(44, '110988', 'KUSMIN', 'FATHER', '2020-04-13 04:37:46', '2020-04-13 04:37:46'),
(45, '110988', 'MUJIATUN', 'MOTHER', '2020-04-13 04:37:58', '2020-04-13 04:37:58'),
(46, '111105', 'HOIMAH', 'MOTHER', NULL, NULL),
(47, '111105', 'RACHMATULLAH', 'FATHER', NULL, NULL),
(48, '111572', 'NAUFAL', 'BROTHER', '2020-04-13 04:33:46', '2020-04-13 04:33:46'),
(49, '111572', 'NUNUNG', 'FATHER', '2020-04-13 04:34:12', '2020-04-13 04:34:12'),
(50, '111572', 'YAYAH', 'MOTHER', '2020-04-13 04:33:58', '2020-04-13 04:33:58'),
(51, '111572', 'ZAHRA', 'SISTER', '2020-04-13 04:33:34', '2020-04-13 04:33:34'),
(52, '111606', 'ERNAWATI', 'MOTHER', '2020-04-13 04:24:49', '2020-04-13 04:24:49'),
(53, '111606', 'FACHRI AL GHIFARI', 'BROTHER', '2020-04-13 04:25:14', '2020-04-13 04:25:14'),
(54, '111606', 'HANA HAFIDZOTU JAHROH', 'SISTER', '2020-04-13 04:25:59', '2020-04-13 04:25:59'),
(55, '111606', 'MUHAMMAD AL HAFIZH', 'BROTHER', '2020-04-13 04:25:32', '2020-04-13 04:25:32'),
(56, '111606', 'OMA', 'FATHER', '2020-04-13 04:24:58', '2020-04-13 04:24:58'),
(57, '111663', 'ENDANG S', 'MOTHER', '2020-04-13 04:36:53', '2020-04-13 04:36:53'),
(58, '111663', 'ERWI S', 'SISTER', '2020-04-13 04:37:08', '2020-04-13 04:37:08'),
(59, '111845', 'ABDUL MUTHOLIB', 'FATHER', NULL, NULL),
(60, '112030', 'GHAISAN', 'BROTHER', '2020-04-13 04:17:32', '2020-04-13 04:17:32'),
(61, '112030', 'LENAH', 'AUNT', '2020-04-13 04:17:20', '2020-04-13 04:17:20'),
(62, '112030', 'LENVAH', 'MOTHER', '2020-04-13 04:17:11', '2020-04-13 04:17:11'),
(63, '112052', 'DIKI ARISTA', 'WIFE', NULL, NULL),
(64, '112052', 'HARI S', 'FATHER', NULL, NULL),
(65, '112052', 'KHARIZMA DWI MARTU FANDY', 'BROTHER', NULL, NULL),
(66, '112052', 'SITI JAWARIYAH', 'MOTHER', NULL, NULL),
(67, '112052', 'SUHERNI', 'GRAND MOTHER', NULL, NULL),
(68, '112143', 'JUHRIYAH', 'MOTHER', NULL, NULL),
(69, '112143', 'SYAHRUDIN', 'FATHER', NULL, NULL),
(70, '112360', 'GILANG M. RIZKI PAMUNGKAS', 'BROTHER', '2020-04-13 04:38:58', '2020-04-13 04:38:58'),
(71, '112360', 'HANAH', 'MOTHER', '2020-04-13 04:38:38', '2020-04-13 04:38:38'),
(72, '112360', 'RIDA INDRIANI', 'SISTER', '2020-04-13 04:39:24', '2020-04-13 04:39:24'),
(73, '112360', 'RISA INDAH R', 'SISTER', '2020-04-13 04:39:11', '2020-04-13 04:39:11'),
(74, '112471', 'DEDI JUNAEDI', 'FATHER', NULL, NULL),
(75, '112471', 'MARYANI', 'MOTHER', NULL, NULL),
(76, '112484', 'HARININGSIH', 'MOTHER', '2020-04-13 04:22:51', '2020-04-13 04:22:51'),
(77, '112484', 'UDI SASMITO', 'FATHER', '2020-04-13 04:22:24', '2020-04-13 04:22:24'),
(78, '112895', 'EVANDI', 'FATHER', NULL, NULL),
(79, '112895', 'FAHMI S', 'BROTHER', NULL, NULL),
(80, '112895', 'JAWARIYAH', 'MOTHER', NULL, NULL),
(81, '113096', 'ALIYA', 'WIFE', '2020-04-13 04:27:27', '2020-04-13 04:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `tr_employee_reporting`
--

CREATE TABLE `tr_employee_reporting` (
  `emp_id` varchar(20) NOT NULL,
  `report_time` datetime NOT NULL,
  `cough` int(11) DEFAULT NULL,
  `fever` int(11) DEFAULT NULL,
  `flue` int(11) DEFAULT NULL,
  `temperature` decimal(3,1) DEFAULT NULL,
  `visiting` varchar(100) DEFAULT NULL,
  `visit_oth_city` int(11) DEFAULT NULL,
  `gps_location` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tr_employee_reporting`
--

INSERT INTO `tr_employee_reporting` (`emp_id`, `report_time`, `cough`, `fever`, `flue`, `temperature`, `visiting`, `visit_oth_city`, `gps_location`, `created_at`, `updated_at`) VALUES
('101511', '2020-04-19 12:44:28', 0, 0, 0, '37.0', 'Cilegon,KP', 0, NULL, '2020-04-19 05:44:28', '2020-04-19 12:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `tr_family_member_reporting`
--

CREATE TABLE `tr_family_member_reporting` (
  `family_id` int(11) NOT NULL,
  `time_reporting` datetime NOT NULL,
  `cough` int(11) DEFAULT NULL,
  `fever` int(11) DEFAULT NULL,
  `flue` int(11) DEFAULT NULL,
  `temperature` decimal(3,1) DEFAULT NULL,
  `visiting` varchar(100) DEFAULT NULL,
  `visit_oth_city` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tr_family_member_reporting`
--

INSERT INTO `tr_family_member_reporting` (`family_id`, `time_reporting`, `cough`, `fever`, `flue`, `temperature`, `visiting`, `visit_oth_city`, `created_at`, `updated_at`) VALUES
(1, '2020-04-19 12:52:44', 0, 0, 0, '34.8', 'Home', 0, '2020-04-19 05:53:02', '2020-04-19 12:52:59'),
(2, '2020-04-19 12:52:44', 0, 0, 0, '34.8', 'Home', 0, '2020-04-19 05:53:02', '2020-04-19 12:52:59'),
(3, '2020-04-19 12:52:44', 0, 0, 0, '34.8', 'Home', 0, '2020-04-19 05:53:02', '2020-04-19 12:52:59'),
(4, '2020-04-19 12:52:44', 0, 0, 0, '34.8', 'Home', 0, '2020-04-19 05:53:02', '2020-04-19 12:52:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_devices`
--
ALTER TABLE `mst_devices`
  ADD PRIMARY KEY (`emp_id`) USING BTREE;

--
-- Indexes for table `mst_employee`
--
ALTER TABLE `mst_employee`
  ADD PRIMARY KEY (`emp_id`,`id`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `mst_family_member`
--
ALTER TABLE `mst_family_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `tr_employee_reporting`
--
ALTER TABLE `tr_employee_reporting`
  ADD PRIMARY KEY (`emp_id`,`report_time`) USING BTREE;

--
-- Indexes for table `tr_family_member_reporting`
--
ALTER TABLE `tr_family_member_reporting`
  ADD PRIMARY KEY (`family_id`,`time_reporting`) USING BTREE,
  ADD KEY `family_id` (`family_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_employee`
--
ALTER TABLE `mst_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Test tambah id ', AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `mst_family_member`
--
ALTER TABLE `mst_family_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
