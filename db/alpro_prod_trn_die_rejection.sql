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
-- Table structure for table `trn_die_rejection`
--

DROP TABLE IF EXISTS `trn_die_rejection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trn_die_rejection` (
  `txtDieNo` varchar(50) NOT NULL,
  `txtRejectionReason` varchar(100) DEFAULT NULL,
  `txtRemarks` varchar(500) DEFAULT NULL,
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`txtDieNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trn_die_rejection`
--

LOCK TABLES `trn_die_rejection` WRITE;
/*!40000 ALTER TABLE `trn_die_rejection` DISABLE KEYS */;
INSERT INTO `trn_die_rejection` VALUES ('1001/19','Mandrel Rib Cracked','DIE CONVERT TO 1002/19','2022-12-14 18:00:51'),('1021/4','Die Plate Broken','DIE CONVERT TO 1022/94','2022-11-29 16:23:12'),('1021/94','Die Plate Broken','DIE CONVERT TO 1025/4','2022-11-29 16:24:05'),('1021/P3/005','Profile Weight Increased','DIE CONVERT TO 1022/P3/05','2022-12-19 15:25:30'),('1022/92','Die Converted','DIE CONVERT TO 1023/92','2022-11-28 17:45:43'),('1092/41','Die Converted','DIE CONVERT TO 1093/41','2023-01-05 15:37:02'),('1095/27','Die Plate Shifted ','INCLUSION PROBLEM','2022-11-22 11:31:20'),('1122/1','Mandrel Rib Cracked','INCLUSION PROBLEM','2022-11-28 15:49:54'),('1201/18','Die Converted','DIE CONVERT TO 1202/18','2022-11-12 17:16:47'),('1202/18','Die Converted','DIE CONVERT TO 1203/P3/18','2022-11-16 19:42:16'),('1203/9','Mandrel Rib Cracked','DIE SHIFT ON 21/10/22','2022-11-12 17:11:25'),('1252/22','Die Converted','DIE CONVERT TO AL-1455','2022-11-29 17:30:33'),('1253/19','Die Converted','DIE CONVERT TO 1256/19  DATE 29/08/22','2022-12-07 12:24:00'),('1256/9','Die Plate Shifted ','DIE SHIFT ON 23/08/22','2022-12-07 12:22:39'),('1301/19','Die Converted','DIE CONVERT TO 1302/19','2023-01-02 16:02:15'),('1506/16','Die Converted','DIE CONVERT TO 1507/16','2022-11-12 18:03:21'),('1511/11','Profile Weight Increased','DIE CONVERT TO 1512/11','2022-12-19 15:33:56'),('1641/01','Die Converted','DIE CONVERT TO AL-1386/P2/001','2022-12-21 15:04:52'),('1770/19','Die Converted','DIE CONVERT TO 1771/19','2022-11-29 16:54:37'),('1861/3','Die Plate Broken','INCLUSION PROBLEM','2022-11-15 15:40:14'),('2002/10','Overweight','DIE CONVERT TO 2003/10','2022-11-07 16:43:38'),('2011/1','Die Plate Broken','INCLUSION PROBLEM','2022-11-15 15:44:34'),('2011/14','Die Plate Broken','INCLUSION PROBLEM','2022-11-15 15:41:59'),('2011/16','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 18:12:55'),('2011L P2/02','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 18:14:40'),('2013/1','Die Converted','DIE CONVERT TO 2014/01','2022-11-21 16:05:54'),('2022/49','Die Converted','CONVERTED TO 2023','2022-11-11 17:13:56'),('2024/4','Die Converted','DIE CONVERT TO 2025','2022-11-11 17:17:18'),('2031/57','Die Converted','DIE CONVERT TO 2032/57','2023-01-02 11:43:48'),('2031/59','Die Converted','DIE CONVERT TO 2032/59','2022-11-28 16:53:28'),('2031/63','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 11:14:08'),('2041/78','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 11:09:53'),('2041/87','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 11:10:43'),('2041/90','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 11:11:12'),('2042/73','Die Converted','DIE CONVERT TO 2043/73','2022-11-28 16:35:41'),('2043/04','Die Converted','DIE CONVERT TO 2044/4','2022-11-14 12:33:31'),('2043/1','Die Converted','DIE CONVERT TO 2044/1','2023-01-05 15:31:45'),('2051/1','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 18:21:39'),('2051/2','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 18:22:10'),('2051/3','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 18:37:43'),('2051/5','Die Converted','DIE CONVERT TO 2052/5','2022-11-28 18:23:10'),('2051/65','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 18:16:31'),('2051/90','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 18:21:15'),('2051L P3/02','Die Plate Broken','INCLUSION PROBLEM','2022-11-28 18:36:44'),('2052/81','Die Converted','DIE CONVERT TO 2053/81','2022-12-17 19:51:24'),('2061/44','Die Plate Broken','INCLUSION PROBLEM','2022-11-29 13:19:35'),('2061/P3/01','Die Plate Broken','INCLUSION PROBLEM','2022-11-29 13:21:03'),('2061/P3/40','Die Converted','DIE CONVERT TO 2062/40','2022-11-29 17:06:11'),('2061/P3/41','Die Plate Broken','INCLUSION PROBLEM','2022-11-29 13:18:20'),('2061/P3/43','Die Plate Broken','INCLUSION PROBLEM','2022-11-22 13:48:24'),('2061L P3/02','Die Plate Broken','INCLUSION PROBLEM','2022-11-29 17:11:36'),('2061L/1','Die Plate Broken','INCLUSION PROBLEM','2022-11-15 15:44:11'),('7204/1','Die Converted','DIE CONVERT TO AL-904/1','2022-12-12 15:37:58'),('7441/01','Profile Weight Increased','DIE CONVERT TO 7442/1','2022-12-06 11:21:52'),('7452/3','Die Converted','DIE CONVERT TO 7453/3','2022-12-26 15:25:46'),('AL-1450/1','Die Converted','DIE CONVERT TO AL-1516','2022-11-14 16:56:15'),('AL-1457/1','Die Converted','DIE CONVERT TO AL-1509/P3/001','2022-12-21 19:57:39'),('AL-311/1','Die Converted','DIE CONVERT TO Al-1517/P1/1','2022-11-19 12:11:41'),('AL-940/3','Die Converted','DIE CONVERT TO 7225','2022-11-14 16:59:52');
/*!40000 ALTER TABLE `trn_die_rejection` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trn_die_rejection_AFTER_INSERT` AFTER INSERT ON `trn_die_rejection` FOR EACH ROW BEGIN
update mst_die set txtDieStatus ='Rejected',dtRejectedDate=now() where txtDieNo=new.txtDieNo;
update mst_die_comp set txtCompStatus='Rejected' where txtDieNo=new.txtDieNo;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trn_die_rejection_AFTER_DELETE` AFTER DELETE ON `trn_die_rejection` FOR EACH ROW BEGIN
update mst_die set txtDieStatus ='OK',dtRejectedDate= NULL where txtDieNo=old.txtDieNo;
update mst_die_comp set txtCompStatus='Ready' where txtDieNo=old.txtDieNo;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 18:05:10
