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
-- Table structure for table `trn_heattreatment_tmp`
--

DROP TABLE IF EXISTS `trn_heattreatment_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trn_heattreatment_tmp` (
  `pk_HeatTrtID` varchar(30) NOT NULL,
  `txtDieNo` varchar(20) DEFAULT NULL,
  `txtCompCode` varchar(20) DEFAULT NULL,
  `dtSentDate` datetime DEFAULT NULL,
  `txtHTType` varchar(45) DEFAULT NULL,
  `dtRecvDate` datetime DEFAULT NULL,
  `numFinalHardness` decimal(6,2) DEFAULT '0.00',
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `txtVendor` varchar(45) DEFAULT NULL,
  `numCompWt` decimal(6,2) DEFAULT '0.00',
  `txtChallanNo` varchar(45) DEFAULT NULL,
  `txtSessionId` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trn_heattreatment_tmp`
--

LOCK TABLES `trn_heattreatment_tmp` WRITE;
/*!40000 ALTER TABLE `trn_heattreatment_tmp` DISABLE KEYS */;
INSERT INTO `trn_heattreatment_tmp` VALUES ('HT/20221219/0001','1021/P3/007','1021/P3/007/MD','2022-12-19 17:33:00','1',NULL,47.00,'2022-12-19 17:36:08','SUPER HEAT TREATMENT',8.60,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0002','1021/P3/007','1021/P3/007/DP','2022-12-19 17:36:00','1',NULL,49.00,'2022-12-19 17:37:20','SUPER HEAT TREATMENT',7.14,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0003','2041L/P1/002','2041l/P1/002/MD','2022-12-19 17:37:00','1',NULL,47.00,'2022-12-19 17:37:55','SUPER HEAT TREATMENT',8.00,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0004','2041L/P1/002','2041l/P1/002/DP','2022-12-19 17:37:00','1',NULL,49.00,'2022-12-19 17:38:26','SUPER HEAT TREATMENT',7.00,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0005','2061L/P1/015','2061L/P1/015/MD','2022-12-19 17:37:00','1',NULL,47.00,'2022-12-19 17:38:57','SUPER HEAT TREATMENT',8.58,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0006','2061L/P1/015','2061L/P1/015/DP','2022-12-19 17:37:00','1',NULL,49.00,'2022-12-19 17:39:14','SUPER HEAT TREATMENT',7.42,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0007','2061L/P1/016','2061L/P1/016/MD','2022-12-19 17:37:00','1',NULL,47.00,'2022-12-19 17:39:49','SUPER HEAT TREATMENT',8.72,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0008','2061L/P1/016','2061L/P1/016/DP','2022-12-19 17:37:00','1',NULL,49.00,'2022-12-19 17:40:06','SUPER HEAT TREATMENT',7.32,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0009','1552/P3/001','1552/P3/001/MD','2022-12-19 17:42:00','1',NULL,47.00,'2022-12-19 17:43:15','SUPER HEAT TREATMENT',11.06,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0010','1552/P3/001','1552/P3/001/DP','2022-12-19 17:42:00','1',NULL,49.00,'2022-12-19 17:43:34','SUPER HEAT TREATMENT',9.44,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0011','1427/P2/003','1427/P2/003/MD','2022-12-19 17:43:00','1',NULL,47.00,'2022-12-19 17:44:12','SUPER HEAT TREATMENT',14.58,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0012','1427/P2/003','1427/P2/003/DP','2022-12-19 17:43:00','1',NULL,49.00,'2022-12-19 17:44:44','SUPER HEAT TREATMENT',8.92,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0013','1122/H/P2/001','1122/H/P2/01/MD','2022-12-19 17:44:00','1',NULL,47.00,'2022-12-19 17:45:20','SUPER HEAT TREATMENT',15.30,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0014','1122/H/P2/001','1122/H/P2/01/DP','2022-12-19 17:44:00','1',NULL,49.00,'2022-12-19 17:46:41','SUPER HEAT TREATMENT',9.12,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0015','AL-1530R1/P1/001','AL-1530R1/P1/001/DP','2022-12-19 17:44:00','1',NULL,49.00,'2022-12-19 17:47:01','SUPER HEAT TREATMENT',5.32,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0016','AL-1530R1/P1/001','AL-1530R1/P1/001/FD','2022-12-19 17:44:00','1',NULL,49.00,'2022-12-19 17:47:24','SUPER HEAT TREATMENT',5.94,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0017','AL-1530R1/P1/001','AL-1530R1/P1/001/BA','2022-12-19 17:44:00','1',NULL,49.00,'2022-12-19 17:47:36','SUPER HEAT TREATMENT',11.58,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn'),('HT/20221219/0018','AL-1530R1/P1/001','AL-1530R1/P1/001/IB','2022-12-19 17:44:00','1',NULL,49.00,'2022-12-19 17:47:52','SUPER HEAT TREATMENT',19.72,'AEPL/JOB/204','ds2jg1p7vo39di5kbap1omj5fn');
/*!40000 ALTER TABLE `trn_heattreatment_tmp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 18:05:04