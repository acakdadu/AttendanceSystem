-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_empmon
-- ------------------------------------------------------
-- Server version	5.1.43-community

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mst_employee`
--

DROP TABLE IF EXISTS `mst_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_employee` (
  `emp_id` varchar(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `team` varchar(45) DEFAULT NULL,
  `plant` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL COMMENT '0 = member\n1 = GL\n2 = SL\n3 = JAM\n4 = TL\n5 = DH',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_employee`
--

LOCK TABLES `mst_employee` WRITE;
/*!40000 ALTER TABLE `mst_employee` DISABLE KEYS */;
INSERT INTO `mst_employee` VALUES ('103494','TUBAGUS MOCHAMAD ISNAENI','POSCO ICT INDONESIA','BPC','P/C','CCP','103494',0),('103585','FAISAL AKBAR PURNAMA PUTRA','POSCO ICT INDONESIA','BPC','P/C','BF','103585',0),('104010','RADEN BAMBANG ERGIANSYAH','POSCO ICT INDONESIA','BPC','P/C','COKE','104010',2),('107098','AHMAD ZAINAL','POSCO ICT INDONESIA','BPC','P/C','RMH','107098',0),('111105','RUDI HIKMATULLAH','POSCO ICT INDONESIA','BPC','P/C','BF','111105',0),('111652','BRAMANTIYO ARDI','POSCO ICT INDONESIA','BPC','P/C','CCP','111652',0),('111845','ADI FUADIL HIDAYAH','POSCO ICT INDONESIA','BPC','P/C','RMH','111845',0),('112052','KHARIZMA DWI MARTU FANNY','POSCO ICT INDONESIA','BPC','P/C','SINTER','112052',0),('112143','ADAM KUSNAEDI','POSCO ICT INDONESIA','BPC','P/C','SINTER','112143',0),('112471','MESIAN PRASETYA','POSCO ICT INDONESIA','BPC','P/C','PHYSICAL TESTING','112471',0),('112895','LINDA EVAN ENGLISTA','POSCO ICT INDONESIA','BPC','P/C','COKE','112895',0);
/*!40000 ALTER TABLE `mst_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_family_member`
--

DROP TABLE IF EXISTS `mst_family_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_family_member` (
  `emp_id` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `relation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`emp_id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_family_member`
--

LOCK TABLES `mst_family_member` WRITE;
/*!40000 ALTER TABLE `mst_family_member` DISABLE KEYS */;
INSERT INTO `mst_family_member` VALUES ('103494','QOYYIMAH','WIFE'),('103494','RATU AYUNDA ZHAFIRA','DAUGHTER'),('103585','RAFFAEL ALVAREZ','SON'),('103585','RHANTIKA ANDINI','WIFE'),('104010','DEWY APRIYANI','WIFE'),('104010','MELODY RAIHANA KADITA','DAUGHTER'),('107098','ENO SRIBULAN','WIFE'),('107098','MUHAMMAD MUZAKY','SON'),('107098','SYAPIRA AZALEA','DAUGHTER'),('111105','HOIMAH','MOTHER'),('111105','RACHMATULLAH','FATHER'),('111845','ABDUL MUTHOLIB','FATHER'),('112052','DIKI ARISTA','WIFE'),('112052','HARI S','FATHER'),('112052','KHARIZMA DWI MARTU FANDY','BROTHER'),('112052','SITI JAWARIYAH','MOTHER'),('112052','SUHERNI','GRAND MOTHER'),('112143','JUHRIYAH','MOTHER'),('112143','SYAHRUDIN','FATHER'),('112471','DEDI JUNAEDI','FATHER'),('112471','MARYANI','MOTHER'),('112895','EVANDI','FATHER'),('112895','FAHMI S','BROTHER'),('112895','JAWARIYAH','MOTHER');
/*!40000 ALTER TABLE `mst_family_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_employee_reporting`
--

DROP TABLE IF EXISTS `tr_employee_reporting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tr_employee_reporting` (
  `emp_id` varchar(20) NOT NULL,
  `report_time` datetime NOT NULL,
  `cough` int(11) DEFAULT NULL,
  `fever` int(11) DEFAULT NULL,
  `flue` int(11) DEFAULT NULL,
  `temperature` decimal(2,1) DEFAULT NULL,
  `visiting` varchar(100) DEFAULT NULL,
  `gps_location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`emp_id`,`report_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_employee_reporting`
--

LOCK TABLES `tr_employee_reporting` WRITE;
/*!40000 ALTER TABLE `tr_employee_reporting` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_employee_reporting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_family_member_reporting`
--

DROP TABLE IF EXISTS `tr_family_member_reporting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tr_family_member_reporting` (
  `emp_id` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `time_reporting` datetime NOT NULL,
  `cough` int(11) DEFAULT NULL,
  `fever` int(11) DEFAULT NULL,
  `flue` int(11) DEFAULT NULL,
  `temperature` decimal(2,1) DEFAULT NULL,
  `visiting` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`emp_id`,`name`,`time_reporting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_family_member_reporting`
--

LOCK TABLES `tr_family_member_reporting` WRITE;
/*!40000 ALTER TABLE `tr_family_member_reporting` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_family_member_reporting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_empmon'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-07 14:29:30
