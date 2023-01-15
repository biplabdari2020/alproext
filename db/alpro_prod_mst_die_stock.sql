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
-- Table structure for table `mst_die_stock`
--

DROP TABLE IF EXISTS `mst_die_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_die_stock` (
  `txtDieNo` varchar(20) NOT NULL,
  `txtStatus` varchar(20) DEFAULT NULL,
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`txtDieNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_die_stock`
--

LOCK TABLES `mst_die_stock` WRITE;
/*!40000 ALTER TABLE `mst_die_stock` DISABLE KEYS */;
INSERT INTO `mst_die_stock` VALUES ('1001/19','4','2022-11-19 16:27:29'),('1001/P1/002','2','2022-12-10 16:29:05'),('1021/P3/005','2','2022-12-10 16:32:26'),('1091/P3/003','2','2022-12-10 16:26:13'),('1212/P2/01','2','2022-11-21 16:06:55'),('1315/P1/001','2','2022-12-10 16:30:26'),('1554/P3/001','2','2022-11-21 16:10:39'),('1760L/P1/003','2','2022-12-10 16:36:33'),('1841/P3/003','2','2022-11-21 16:06:08'),('1851/P3/001','2','2022-11-21 16:06:31'),('2001L/P2/004','2','2022-12-10 16:29:29'),('2011/P2/003','2','2022-12-10 16:26:29'),('2011/P2/005','5','2022-12-22 12:29:56'),('2021/P2/006','2','2022-11-21 16:10:17'),('2021L/P2/005','2','2022-12-10 16:30:52'),('2041L/P3/004','2','2022-12-10 16:31:58'),('2051L/P2/001','2','2022-11-21 16:07:49'),('2051L/P3/004','2','2022-12-10 16:27:06'),('2051L/P3/005','2','2022-12-10 16:28:35'),('2061/P3/008','2','2022-12-10 16:25:47'),('2061L/P3/007','2','2022-11-05 16:39:01'),('7225/P2/001','2','2022-12-10 16:31:33'),('AL-1198/P1/001','2','2022-12-10 16:36:07'),('AL-1376/P3/01','2','2022-11-22 16:35:29'),('AL-1377/P3/01','2','2022-11-22 16:36:30'),('AL-1511/P3/001','1','2022-10-11 20:39:09'),('AL-1516/P2/001','2','2022-12-10 16:37:35'),('AL-1517R1/P1/001','5','2022-11-19 18:15:34'),('AL-449/P3/001','2','2022-11-21 16:09:23'),('AL-512/P3/001','2','2022-12-10 16:29:52'),('Al-742/P3/001','2','2022-11-21 16:08:57'),('AL-958/P1/001','1','2022-10-09 03:38:57'),('AL-997R2/P2/001','2','2022-12-10 16:27:49');
/*!40000 ALTER TABLE `mst_die_stock` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 18:05:08
