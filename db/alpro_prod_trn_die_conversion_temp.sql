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
-- Table structure for table `trn_die_conversion_temp`
--

DROP TABLE IF EXISTS `trn_die_conversion_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trn_die_conversion_temp` (
  `pkdieconv` varchar(50) NOT NULL,
  `txtDieNo` varchar(50) NOT NULL,
  `txtComponent` varchar(50) NOT NULL,
  `txtDieNoConv` varchar(45) DEFAULT NULL,
  `txtComponentConv` varchar(100) DEFAULT NULL,
  `txtRemarks` varchar(500) DEFAULT NULL,
  `txtSessionId` varchar(100) DEFAULT NULL,
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pkdieconv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trn_die_conversion_temp`
--

LOCK TABLES `trn_die_conversion_temp` WRITE;
/*!40000 ALTER TABLE `trn_die_conversion_temp` DISABLE KEYS */;
INSERT INTO `trn_die_conversion_temp` VALUES ('CON/20221117/0001','1161/8','1161/8 DP','1162/BOTH/08','','DIE CONVERT TO 1162/BOTH/08','8asgguup2viqhb41734rd09bsf','2022-11-17 13:40:57');
/*!40000 ALTER TABLE `trn_die_conversion_temp` ENABLE KEYS */;
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
