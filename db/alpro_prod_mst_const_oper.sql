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
-- Table structure for table `mst_const_oper`
--

DROP TABLE IF EXISTS `mst_const_oper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_const_oper` (
  `txtOperCode` varchar(3) NOT NULL COMMENT 'Operation Code',
  `txtOperName` varchar(45) DEFAULT NULL COMMENT 'Operation Name',
  PRIMARY KEY (`txtOperCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_const_oper`
--

LOCK TABLES `mst_const_oper` WRITE;
/*!40000 ALTER TABLE `mst_const_oper` DISABLE KEYS */;
INSERT INTO `mst_const_oper` VALUES ('1','Turning'),('10','Others'),('11','Rough Milling'),('12','Finish Milling'),('13','Pocket Milling'),('14','Sizing'),('15','Back Milling'),('16','Under Cut'),('17','Bearing'),('18','Pin hole & Bolt hole'),('19','Drill & Tap'),('2','Milling'),('20','Number Punching'),('21','Back Side operation'),('22','Front Side Operation'),('23','Recess Operation'),('24','Bench Work'),('25','Quality Sample Cutting'),('3','Surface Grinding'),('4','Wire Cut / EDM'),('5','Bench Die Final Sizing'),('6','Bench  Rework'),('7','Bench Assembly Check'),('8','Bench Polishing'),('9','Maintanance');
/*!40000 ALTER TABLE `mst_const_oper` ENABLE KEYS */;
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
