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
-- Table structure for table `trn_die_conversion`
--

DROP TABLE IF EXISTS `trn_die_conversion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trn_die_conversion` (
  `txtDieNo` varchar(50) NOT NULL,
  `txtComponent` varchar(50) NOT NULL,
  `txtDieNoConv` varchar(45) DEFAULT NULL,
  `txtComponentConv` varchar(100) DEFAULT NULL,
  `txtRemarks` varchar(500) DEFAULT NULL,
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trn_die_conversion`
--

LOCK TABLES `trn_die_conversion` WRITE;
/*!40000 ALTER TABLE `trn_die_conversion` DISABLE KEYS */;
INSERT INTO `trn_die_conversion` VALUES ('2002/10','2002/10 DP','2003 P2/01','2003 P2/01 DP','DIE CONVERT TO 2003/10','2022-11-08 13:37:01'),('2002/10','IB-A-PRO-2-2021','2003 P2/01','2003 P2/01 BA','','2022-11-08 13:37:01'),('2022/49','2022/49 DP','2023/49','','DIE CONVERTED FROM 2022/49','2022-12-17 19:33:34'),('2022/49','2022/49 DP','2023/49','','DIE CONVERTED FROM 2022/49','2022-12-17 19:33:34'),('2022/49','2022/49 DP','2023/49','','DIE CONVERTED FROM 2022/49','2022-12-17 19:33:34'),('2024/4','2024/4 DP','2025/P2/001','','DIE CONVERTED FROM 2024/4','2022-11-11 17:19:03'),('2022/49','2022/49 DP','2023/49','','DIE CONVERTED FROM 2022/49','2022-12-17 19:33:34'),('2024/4','2024/4 DP','2025/P2/001','','DIE CONVERTED FROM 2024/4','2022-11-11 17:28:16'),('2022/49','2022/49 DP','2023/49','','DIE CONVERTED FROM 2022/49','2022-12-17 19:33:34'),('2024/4','2024/4 DP','2025/P2/001','','DIE CONVERTED FROM 2024/4','2022-11-12 17:18:36'),('2022/49','2022/49 DP','2023/49','','DIE CONVERTED FROM 2022/49','2022-12-17 19:33:34'),('2024/4','2024/4 DP','2025/P2/001','','DIE CONVERTED FROM 2024/4','2022-11-12 18:08:53'),('1201/18','1201/18 DP','1202/18','','DIE CONVERTED FROM  1201/18','2022-11-12 18:08:53'),('1506/16','1506/16 DP','1507/16','','DIE CONVERTED FROM 1506/16','2022-11-12 18:08:53'),('2043/04','','2044/4','','DIE CONVERTED FROM 2043/04','2022-11-14 12:35:59'),('AL-1450/1','AL-1450/1 DP','AL-1516/P2/001','','DIE CONVERT TO AL-1516/P2/001','2022-11-14 16:58:42'),('1202/18','1202/18/DP','1203/P3/018','1203/P3/018/DP','DIE CONVERTED','2022-11-16 19:56:52'),('AL-311/1','AL-311/1 DP','AL-1517R1/P1/001','','DIE CONVERTED TO AL-1517R1/P1/001','2022-11-19 12:19:48'),('AL-940/3','AL-940/3 DP','7225/P2/001','7225/P2/001/DP','DIE CONVERTED FROM AL-940/3','2022-11-19 15:20:06'),('2013/1','2013/1 DP','2014/02','','DIE CONVERT TO 2014/02','2022-11-21 16:10:00'),('2042/73','2042/73 DP','2043/73','','DIE CONVERTED FROM 2042/73','2022-11-28 16:38:44'),('1022/92','1022/92 DP','1023/92','','DIE CONVERTED FROM 1022/92','2022-11-28 17:52:49'),('2051/5','2051/5 DP','2052/5','','DIE CONVERTED FROM 2051/5','2022-11-28 18:26:22'),('1021/94','1021/94 DP','1022/94','','DIE CONVERTED FROM 1021/94','2022-11-29 16:25:46'),('1021/4','1021/4 DP','1025/4','','DIE CONVERTED FROM 1021/4','2022-11-29 16:25:46'),('1770/19','1770/19 DP','1771/19','','DIE CONVERTED FROM 1770/19','2022-11-29 16:56:44'),('2061/P3/40','','2062/40','','DIE CONVERTED FROM 2061/40','2022-11-29 17:08:32'),('1252/22','1252/22 DP','AL-1455/22','','DIE CONVERTED FROM 1252/22','2022-11-29 17:32:07'),('1253/19','1253/19 DP','1256/19','','DIE CONVERT TO1256/19','2022-12-07 12:18:52'),('7204/1','7204/1 DP','AL-904/1','','DIE CONVERTED TO AL-904/1','2022-12-12 15:38:59'),('1001/19','1001/19 MD','1002/19','','DIE CONVERT TO 1002/19','2022-12-14 18:02:56'),('2052/81','2052/81 DP','2053/81','','DIE CONVERT TO 2053/81','2022-12-17 19:52:03'),('1021/P3/005','1021/P3/005/DP','1022/P3/005','','DIE CONVERT TO 1022/P3/005','2022-12-19 15:32:15'),('1511/11','1511/11 DP','1512/11','','DIE CONVERT TO 1512/11','2022-12-19 15:35:14'),('AL-1457/1','AL-1457/1 DP','AL-1509/P3/001','','DIE CONVERT TO AL-1509/P3/001','2022-12-21 20:00:27'),('1641/01','1641/01 DP','AL-1386/P2/001','','DIE CONVERT TO AL-1386/P2/001','2022-12-21 20:00:27'),('7452/3','7452/3 DP','7453/3','','DIE CONVERT TO 7453/3','2022-12-26 15:28:03'),('2031/57','2031/57 DP','2032/57','','DIE CONVERT TO 2032/57','2023-01-02 11:49:16'),('1301/19','1301/19 DP','1302/19','','DIE CONVERT TO 1302/19','2023-01-02 16:05:05'),('2043/1','2043/1 DP','2044/1','','DIE CONVERT TO 2044/1','2023-01-05 15:33:58'),('1092/41','1092/41 DP','1093/41','1093/1 DP','DIE CONVERT TO 1093/41','2023-01-05 15:37:50');
/*!40000 ALTER TABLE `trn_die_conversion` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trn_die_conversion_AFTER_INSERT` AFTER INSERT ON `trn_die_conversion` FOR EACH ROW BEGIN
update mst_die set txtDieStatus ='Converted',dtConvertDateDate=now() where txtDieNo=new.txtDieNoConv;
update mst_die_comp set txtCompStatus='Converted' where txtDieNo=new.txtDieNoConv;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trn_die_conversion_AFTER_UPDATE` AFTER UPDATE ON `trn_die_conversion` FOR EACH ROW BEGIN
update mst_die set txtDieStatus ='Converted',dtConvertDateDate=now() where txtDieNo=new.txtDieNoConv;
update mst_die_comp set txtCompStatus='Converted' where txtDieNo=new.txtDieNoConv;
update mst_die set txtDieStatus ='Rejected' where txtDieNo=old.txtDieNoConv;
update mst_die_comp set txtCompStatus='Rejected' where txtDieNo=old.txtDieNoConv;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trn_die_conversion_AFTER_DELETE` AFTER DELETE ON `trn_die_conversion` FOR EACH ROW BEGIN
update mst_die set txtDieStatus ='Rejected' where txtDieNo=old.txtDieNoConv;
update mst_die_comp set txtCompStatus='Rejected' where txtDieNo=old.txtDieNoConv;
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

-- Dump completed on 2023-01-12 18:05:05
