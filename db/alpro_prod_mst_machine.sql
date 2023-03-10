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
-- Table structure for table `mst_machine`
--

DROP TABLE IF EXISTS `mst_machine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_machine` (
  `txtMachineNo` varchar(6) NOT NULL COMMENT 'Machine No ',
  `txtMachineName` varchar(100) DEFAULT NULL COMMENT 'Machine Name',
  `txtMake` varchar(20) DEFAULT NULL COMMENT 'Maker Company',
  `txtActiveFlag` varchar(1) DEFAULT NULL COMMENT 'Active(Y)/ In Active (N)',
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`txtMachineNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_machine`
--

LOCK TABLES `mst_machine` WRITE;
/*!40000 ALTER TABLE `mst_machine` DISABLE KEYS */;
INSERT INTO `mst_machine` VALUES ('M002','MILLING M/C-1','HMT','Y','2022-10-31 11:43:20'),('M003','MILLING M/C-2','HMT','Y','2022-10-31 11:43:28'),('M004','MILLING M/C-3','HMT','Y','2022-10-31 11:43:37'),('M005','LATHE MC-1','PATHAK','Y','2022-10-31 11:42:29'),('M006','LATHE MC-2','PIMCO','Y','2022-10-31 11:42:18'),('M007','SURFACE GRINDING M/C-1','HPSM','Y','2022-10-31 11:44:45'),('M008','CNC- VMC -1','BFW','Y','2022-10-31 11:43:06'),('M009','CNC- VMC -2','BFW','Y','2022-10-31 11:43:55'),('M010','CNC- WIRE CUT-1','ELECTRONICA','Y','2022-10-31 11:44:07'),('M011','EDM-1','ELECTRONICA','Y','2022-10-31 11:42:52'),('M012','HARDNESS TESTING MC-1','SAROJ','Y','2022-10-31 11:44:33'),('M013','CNC TURNING','','Y','2022-10-08 16:21:52'),('M014','BAND SAW','','Y','2022-10-08 16:21:52'),('M015','Manual Work',NULL,'Y','2022-11-08 00:02:55');
/*!40000 ALTER TABLE `mst_machine` ENABLE KEYS */;
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
