-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: alpro_prod
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `trn_log_blank_cutting_temp`
--

DROP TABLE IF EXISTS `trn_log_blank_cutting_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trn_log_blank_cutting_temp` (
  `pkTrnLogsheet` varchar(20) NOT NULL,
  `txtLogNo` varchar(10) NOT NULL,
  `txtOperatorCode` varchar(10) DEFAULT NULL,
  `txtShift` varchar(1) DEFAULT NULL,
  `numCuttingLength` decimal(8,2) DEFAULT NULL,
  `dtStartTime` datetime DEFAULT NULL,
  `dtEndTime` datetime DEFAULT NULL,
  `txtReleaseFlag` varchar(1) DEFAULT NULL,
  `txtUserCode` varchar(45) DEFAULT 'dbuser',
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `txtDieNo` varchar(20) DEFAULT NULL,
  `txtCompCode` varchar(45) DEFAULT NULL,
  `txtSessionId` varchar(45) NOT NULL,
  `numCuttingTolerence` decimal(8,2) DEFAULT NULL,
  `numFinishLength` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trn_log_blank_cutting_temp`
--

LOCK TABLES `trn_log_blank_cutting_temp` WRITE;
/*!40000 ALTER TABLE `trn_log_blank_cutting_temp` DISABLE KEYS */;
INSERT INTO `trn_log_blank_cutting_temp` VALUES ('BC/20221108/0001','TB127','EM-003','A',110.00,'2022-08-23 10:07:00','2022-08-23 13:07:00','Y','biplab','2022-11-08 10:08:13','1524/P2/001','1524/P2/001/MD','ppe2uo3qo40cn2p4actjh2nofs',7.00,117.00);
/*!40000 ALTER TABLE `trn_log_blank_cutting_temp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 18:05:10
