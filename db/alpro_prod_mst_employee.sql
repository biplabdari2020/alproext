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
-- Table structure for table `mst_employee`
--

DROP TABLE IF EXISTS `mst_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_employee` (
  `txtEmpNo` varchar(20) NOT NULL COMMENT 'Employee No',
  `txtEmpName` varchar(100) DEFAULT NULL COMMENT 'Employee Name',
  `txtEmployeeType` varchar(20) DEFAULT NULL COMMENT 'Permanent/Contractor',
  `txtDesg` varchar(50) DEFAULT NULL COMMENT 'Designation',
  `txtActiveFlag` varchar(1) DEFAULT NULL COMMENT 'Active (Y)/ In Active(N)',
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`txtEmpNo`),
  UNIQUE KEY `txtEmpName_UNIQUE` (`txtEmpName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_employee`
--

LOCK TABLES `mst_employee` WRITE;
/*!40000 ALTER TABLE `mst_employee` DISABLE KEYS */;
INSERT INTO `mst_employee` VALUES ('00','MD. FARUK  ANSARI',NULL,'CNN-VMC Operator','Y','2022-11-15 08:57:40'),('DM-1037','SHIBANANDA PAL',NULL,'CNC-VMC/W-cut/EDM Operator','Y','2022-10-08 16:15:38'),('DM-107','SWAPAN NASKAR',NULL,'Turner','Y','2022-10-08 16:15:38'),('DM-108','KUMAR KARMAKAR',NULL,'Miller','Y','2022-10-08 16:15:38'),('DM-1100','AVIJIT MAITY',NULL,'CNC-VMC Operator','Y','2022-10-08 16:15:38'),('DM-1101','ANUP BERA',NULL,'Miller-cum-Die maker','Y','2022-10-08 16:15:38'),('DM-111','RAMJEE CHOWHAN',NULL,'Miller-cum-Die maker','Y','2022-10-08 16:15:38'),('DM-330','LALIT KUMAR',NULL,'Helper','Y','2022-10-08 16:15:38'),('DM-839','SK FARIDUL HASAN',NULL,'CNC-VMC Programmer','Y','2022-10-08 16:15:38'),('DM-840','GOURAV KUMAR DEY',NULL,'Wire Cut Programmer -cum- Tool Room Incharge','Y','2022-10-08 16:15:38'),('DM-908','CHOTU',NULL,'Helper','Y','2022-10-08 16:15:38'),('DM-937','MRIGANKA SANTRA',NULL,'Helper','Y','2022-10-08 16:15:38'),('DM-99','LAL BAHADUR BIND',NULL,'Miller-cum-Die maker','Y','2022-10-08 16:15:38'),('EM-001','RAJKUMAR DAS',NULL,'CNC-VMC Operator','Y','2022-10-08 16:15:38'),('EM-002','SOUVIK PATRA',NULL,'CNC-VMC Operator','Y','2022-10-08 16:15:38'),('EM-003','AKASH GHOSH',NULL,'Helper','Y','2022-10-08 16:15:38'),('EM-999','ADMIN',NULL,'ADMIN','Y','2022-10-08 16:16:33'),('MD-001','J.K.Malpani',NULL,'Management','N','2022-11-04 00:40:20'),('MD-002','Partha Naskar',NULL,'Finance','N','2022-11-04 00:40:20'),('MD-003','Rajesh',NULL,NULL,'N','2022-11-05 15:13:24'),('PR-001','Sushovon',NULL,'PROD','N','2022-11-19 13:18:05'),('SH-001','Shaibal',NULL,'PROD','N','2022-10-31 13:25:11');
/*!40000 ALTER TABLE `mst_employee` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 18:05:07
