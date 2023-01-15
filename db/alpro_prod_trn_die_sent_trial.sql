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
-- Table structure for table `trn_die_sent_trial`
--

DROP TABLE IF EXISTS `trn_die_sent_trial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trn_die_sent_trial` (
  `txtTrialNo` varchar(30) NOT NULL,
  `txtDieNo` varchar(20) DEFAULT NULL,
  `dtTrialSent` datetime DEFAULT NULL,
  `dtTrialEnd` datetime DEFAULT NULL,
  `txtStatus` varchar(20) DEFAULT NULL,
  `txtRemarks` varchar(45) DEFAULT NULL,
  `txtUser` varchar(45) DEFAULT 'dbuser',
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`txtTrialNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trn_die_sent_trial`
--

LOCK TABLES `trn_die_sent_trial` WRITE;
/*!40000 ALTER TABLE `trn_die_sent_trial` DISABLE KEYS */;
INSERT INTO `trn_die_sent_trial` VALUES ('ST/20221026/0004','1841/P3/003','2022-10-18 13:52:00','2022-11-10 16:08:00','2','','dbuser','2022-10-26 17:14:06'),('ST/20221026/0007','1851/P3/001','2022-10-22 17:43:00','2022-11-02 16:09:00','2','','dbuser','2022-10-26 17:44:05'),('ST/20221029/0003','1212/P2/01','2022-10-21 18:16:00','2022-11-02 16:09:00','2','','dbuser','2022-10-29 18:17:18'),('ST/20221105/0004','2061L/P3/007','2022-11-02 16:38:00','2022-11-03 16:38:00','2','','dbuser','2022-11-05 16:39:01'),('ST/20221106/0031','2051L/P2/001','2022-11-02 19:26:00','2022-11-07 16:10:00','2','','dbuser','2022-11-06 19:29:05'),('ST/20221106/0033','1632/P2/001','2022-11-06 19:56:00',NULL,'5','','dbuser','2022-11-06 19:56:39'),('ST/20221107/0001','2061/P3/008','2022-11-05 09:10:00','2022-12-21 16:29:00','2','','dbuser','2022-11-07 09:11:15'),('ST/20221108/0004','1091/P3/003','2022-11-05 12:39:00','2022-12-28 16:29:00','2','','dbuser','2022-11-08 12:39:15'),('ST/20221115/0005','2011/P2/003','2022-11-06 17:02:00','2022-12-08 16:30:00','2','','dbuser','2022-11-15 12:02:24'),('ST/20221116/0001','Al-742/P3/001','2022-11-08 19:27:00','2022-11-16 16:10:00','2','','dbuser','2022-11-16 19:27:54'),('ST/20221118/0001','2051L/P3/004','2022-11-08 17:00:00','2022-11-09 16:30:00','2','','dbuser','2022-11-18 07:01:12'),('ST/20221118/0002','AL-449/P3/001','2022-11-09 18:00:00','2022-11-16 16:11:00','2','','dbuser','2022-11-18 07:26:27'),('ST/20221118/0003','2131/P2/001','2022-11-10 18:00:00',NULL,'5','','dbuser','2022-11-18 07:26:53'),('ST/20221118/0004','2021/P2/006','2022-11-11 18:00:00','2022-11-12 16:12:00','2','','dbuser','2022-11-18 07:27:22'),('ST/20221118/0005','AL-997R2/P2/001','2022-11-11 18:00:00','2022-11-12 16:31:00','2','','dbuser','2022-11-18 07:27:47'),('ST/20221118/0006','AL-1236/P2/001','2022-11-12 18:00:00',NULL,'5','','dbuser','2022-11-18 07:28:08'),('ST/20221118/0007','1554/P3/001','2022-11-12 18:00:00','2022-11-15 16:13:00','2','','dbuser','2022-11-18 07:28:38'),('ST/20221118/0008','AL-59/P2/001','2022-11-13 18:00:00',NULL,'5','','dbuser','2022-11-18 08:05:00'),('ST/20221118/0009','2051L/P3/005','2022-11-14 18:00:00','2022-11-28 16:31:00','2','','dbuser','2022-11-18 08:05:27'),('ST/20221118/0010','1001/P1/002','2022-11-14 18:00:00','2022-11-18 16:32:00','2','','dbuser','2022-11-18 08:05:46'),('ST/20221118/0011','2001L/P2/004','2022-11-14 18:00:00','2022-11-17 16:32:00','2','','dbuser','2022-11-18 08:06:07'),('ST/20221118/0012','AL-512/P3/001','2022-11-14 18:00:00','2022-11-15 16:33:00','2','','dbuser','2022-11-18 08:06:29'),('ST/20221118/0013','AL-1348/P2/001','2022-11-14 18:00:00',NULL,'5','','dbuser','2022-11-18 08:06:49'),('ST/20221118/0014','1315/P1/001','2022-11-15 18:00:00','2022-11-17 16:33:00','2','','dbuser','2022-11-18 08:07:12'),('ST/20221118/0015','Al-647/P1/001','2022-11-16 18:00:00',NULL,'5','','dbuser','2022-11-18 08:07:37'),('ST/20221118/0016','2021L/P2/005','2022-11-16 18:00:00','2022-11-17 16:34:00','2','','dbuser','2022-11-18 08:08:04'),('ST/20221118/0017','AL-809/P3/001','2022-11-17 18:00:00',NULL,'5','','dbuser','2022-11-18 08:08:26'),('ST/20221119/0001','AL-1517R1/P1/001','2022-11-19 12:24:00',NULL,'5','','dbuser','2022-11-19 12:25:12'),('ST/20221121/0001','7225/P2/001','2022-11-12 18:00:00','2022-11-13 16:34:00','2','','dbuser','2022-11-21 14:54:05'),('ST/20221121/0002','AL-1516/P2/001','2022-11-14 18:00:00','2022-11-16 16:41:00','2','','dbuser','2022-11-21 15:00:20'),('ST/20221121/0003','AL-996/P2/001','2022-11-12 18:00:00',NULL,'5','','dbuser','2022-11-21 15:05:28'),('ST/20221121/0004','2041L/P3/004','2022-11-19 15:10:00','2022-11-23 16:35:00','2','','dbuser','2022-11-21 15:10:35'),('ST/20221121/0005','1021/P3/005','2022-11-19 15:14:00','2022-11-21 16:35:00','2','','dbuser','2022-11-21 15:14:42'),('ST/20221122/0001','Al-750/P1/001','2022-11-21 17:00:00',NULL,'5','','dbuser','2022-11-22 12:29:59'),('ST/20221122/0002','1310/P3/001','2022-11-21 17:00:00',NULL,'5','','dbuser','2022-11-22 12:35:21'),('ST/20221122/0003','AL-1376/P3/01','2022-10-29 16:34:00','2022-11-07 16:34:00','2','OK AS PER QA','dbuser','2022-11-22 16:34:12'),('ST/20221122/0004','AL-1377/P3/01','2022-10-29 16:36:00','2022-11-07 16:36:00','2','','dbuser','2022-11-22 16:36:30'),('ST/20221125/0001','1626/P3/001','2022-11-22 16:12:00',NULL,'5','','dbuser','2022-11-25 16:12:26'),('ST/20221125/0002','1021/P3/004','2022-11-23 16:12:00',NULL,'5','','dbuser','2022-11-25 16:12:43'),('ST/20221129/0001','1605/P1/001','2022-11-26 16:00:00',NULL,'5','','dbuser','2022-11-29 11:52:07'),('ST/20221129/0002','AL-1198/P1/001','2022-11-28 18:00:00','2022-11-29 16:39:00','2','','dbuser','2022-11-29 11:53:02'),('ST/20221202/0001','AL-1479/P2/001','2022-12-01 18:10:00',NULL,'5','','dbuser','2022-12-02 18:10:07'),('ST/20221202/0002','1760L/P1/003','2022-12-01 18:10:00','2022-12-02 16:40:00','2','','dbuser','2022-12-02 18:10:25'),('ST/20221207/0001','2071/P2/001','2022-12-01 17:12:00',NULL,'5','','dbuser','2022-12-07 08:12:38'),('ST/20221207/0002','1524/P2/001','2022-12-02 17:15:00',NULL,'5','','dbuser','2022-12-07 08:15:51'),('ST/20221207/0003','2061/P3/009','2022-12-03 17:33:00',NULL,'5','','dbuser','2022-12-07 08:33:14'),('ST/20221210/0001','AL-1517R1/P2/001','2022-12-05 17:00:00',NULL,'5','','dbuser','2022-12-10 11:49:41'),('ST/20221210/0002','2041L/P2/001','2022-12-06 11:49:00',NULL,'5','','dbuser','2022-12-10 11:49:57'),('ST/20221210/0003','2081/P2/001','2022-12-08 11:50:00',NULL,'5','','dbuser','2022-12-10 11:50:13'),('ST/20221210/0004','AL-1480/P2/001','2022-12-08 12:09:00',NULL,'5','','dbuser','2022-12-10 12:09:59'),('ST/20221214/0001','AL-1514/P2/001','2022-12-09 11:27:00',NULL,'5','','dbuser','2022-12-14 11:27:24'),('ST/20221214/0002','2001L/P2/006','2022-12-10 11:27:00',NULL,'5','','dbuser','2022-12-14 11:27:55'),('ST/20221214/0003','AL-1515/P3/001','2022-12-10 11:28:00',NULL,'5','','dbuser','2022-12-14 11:28:11'),('ST/20221214/0004','2041L/P3/006','2022-12-10 11:28:00',NULL,'5','','dbuser','2022-12-14 11:28:32'),('ST/20221214/0005','2011/P2/004','2022-12-10 11:28:00',NULL,'5','','dbuser','2022-12-14 11:28:52'),('ST/20221214/0006','AL-1234/P2/001','2022-12-12 11:38:00',NULL,'5','','dbuser','2022-12-14 11:38:46'),('ST/20221214/0007','AL-1347/P2/001','2022-12-12 11:38:00',NULL,'5','','dbuser','2022-12-14 11:39:00'),('ST/20221222/0001','3106/P3/001','2022-12-14 11:28:00',NULL,'5','','dbuser','2022-12-22 11:29:03'),('ST/20221222/0002','7462/P2/001','2022-12-14 11:29:00',NULL,'5','','dbuser','2022-12-22 11:29:21'),('ST/20221222/0003','AL-1280/P2/001','2022-12-14 11:29:00',NULL,'5','','dbuser','2022-12-22 11:29:48'),('ST/20221222/0004','2051L/P3/008','2022-12-15 11:30:00',NULL,'5','','dbuser','2022-12-22 11:30:10'),('ST/20221222/0005','AL-1507/P2/001','2022-12-15 11:36:00',NULL,'5','','dbuser','2022-12-22 11:36:31'),('ST/20221222/0006','AL-1509/P3/001','2022-12-16 11:42:00',NULL,'5','','dbuser','2022-12-22 11:42:13'),('ST/20221222/0007','2001L/P2/005','2022-12-16 11:46:00',NULL,'5','','dbuser','2022-12-22 11:46:13'),('ST/20221222/0008','2011L/P3/001','2022-12-16 11:52:00',NULL,'5','','dbuser','2022-12-22 11:53:00'),('ST/20221222/0009','2051L/P3/007','2022-12-16 11:56:00',NULL,'5','','dbuser','2022-12-22 11:56:37'),('ST/20221222/0010','2051L/P3/006','2022-12-21 11:56:00',NULL,'5','','dbuser','2022-12-22 11:57:04'),('ST/20221222/0011','AL-947/P3/001','2022-12-16 11:59:00',NULL,'5','','dbuser','2022-12-22 11:59:14'),('ST/20221222/0012','1507/P3/001','2022-12-16 12:02:00',NULL,'5','','dbuser','2022-12-22 12:03:13'),('ST/20221222/0013','AL-1386/P2/001','2022-12-17 12:07:00',NULL,'5','','dbuser','2022-12-22 12:07:36'),('ST/20221222/0014','2061/P3/010','2022-12-17 12:09:00',NULL,'5','','dbuser','2022-12-22 12:09:42'),('ST/20221222/0015','2011/P2/005','2022-12-17 12:12:00',NULL,'5','','dbuser','2022-12-22 12:12:20'),('ST/20221222/0016','2041L/P3/005','2022-12-20 12:30:00',NULL,'5','','dbuser','2022-12-22 12:30:18'),('ST/20221222/0017','2061L/P3/011','2022-12-21 12:41:00',NULL,'5','','dbuser','2022-12-22 12:41:10'),('ST/20230101/0001','2041L/P3/007','2022-12-22 16:13:00',NULL,'5','','dbuser','2023-01-01 16:13:34'),('ST/20230101/0002','AL-946/P3/001','2022-12-23 16:13:00',NULL,'5','','dbuser','2023-01-01 16:13:55'),('ST/20230101/0003','2061L/P3/012','2022-12-24 16:13:00',NULL,'5','','dbuser','2023-01-01 16:14:12'),('ST/20230101/0004','AL-1139/P2/001','2022-12-24 16:13:00',NULL,'5','','dbuser','2023-01-01 16:14:25'),('ST/20230101/0005','AL-1525/P3/001','2022-12-25 16:13:00',NULL,'5','','dbuser','2023-01-01 16:15:01'),('ST/20230101/0006','1021/P3/006','2022-12-28 16:13:00',NULL,'5','','dbuser','2023-01-01 16:15:17'),('ST/20230101/0007','AL-1530R1/P1/001','2022-12-30 16:13:00',NULL,'5','','dbuser','2023-01-01 16:15:44'),('ST/20230101/0008','2041L/P1/008','2022-12-14 17:06:00',NULL,'5','','dbuser','2023-01-01 17:06:43'),('ST/20230104/0001','2001L/P2/007','2023-01-02 08:24:00',NULL,'5','','dbuser','2023-01-04 08:24:42'),('ST/20230104/0002','7500/P2/002','2023-01-03 08:24:00',NULL,'5','','dbuser','2023-01-04 08:25:00'),('ST/20230107/0001','1760L/P1/001','2023-01-04 12:12:00',NULL,'5','','dbuser','2023-01-07 12:12:27'),('ST/20230107/0002','1760L/P1/002','2023-01-04 12:12:00',NULL,'5','','dbuser','2023-01-07 12:12:35'),('ST/20230107/0003','2141/P2/001','2023-01-06 12:12:00',NULL,'5','','dbuser','2023-01-07 12:12:52'),('ST/20230107/0004','AL-1183/P1/001','2023-01-06 12:12:00',NULL,'5','','dbuser','2023-01-07 12:13:11');
/*!40000 ALTER TABLE `trn_die_sent_trial` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trn_die_sent_trial_AFTER_INSERT` AFTER INSERT ON `trn_die_sent_trial` FOR EACH ROW BEGIN
if new.txtStatus ='2' then
UPDATE trndietrialdet
SET
txtDieNo = new.txtDieNo ,
dtTrialSent = new.dtTrialSent ,
dtTrialEnd = new.dtTrialEnd ,
txtStatus = new.txtStatus ,
txtRemarks = new.txtRemarks
WHERE txtTrialNo = new.txtTrialNo;
delete from mst_die_stock where txtDieNo=new.txtDieNo;
insert into mst_die_stock (txtDieNo,txtStatus) values (new.txtDieNo,new.txtStatus);
insert into trg_die_stock (txtDieNo, txtComp, txtStatus, dtDateTime) SELECT a.txtDieNo, b.txtComponent, a.txtStatus,now() dttime FROM alpro_prod.trn_die_sent_trial a inner join alpro_prod.trn_mfg_complete b on a.txtDieNo=b.txtDieNo where a.txtDieNo=new.txtDieNo;
end if;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trn_die_sent_trial_AFTER_UPDATE` AFTER UPDATE ON `trn_die_sent_trial` FOR EACH ROW BEGIN
UPDATE trndietrialdet
SET
txtDieNo = new.txtDieNo ,
dtTrialSent = new.dtTrialSent ,
dtTrialEnd = new.dtTrialEnd ,
txtStatus = new.txtStatus ,
txtRemarks = new.txtRemarks
WHERE txtTrialNo = new.txtTrialNo;
delete from mst_die_stock where txtDieNo=new.txtDieNo;
insert into mst_die_stock (txtDieNo,txtStatus) values (new.txtDieNo,new.txtStatus);
insert into trg_die_stock (txtDieNo, txtComp, txtStatus, dtDateTime) SELECT a.txtDieNo, b.txtComponent, a.txtStatus,now() dttime FROM alpro_prod.trn_die_sent_trial a left outer join alpro_prod.trn_mfg_complete b on a.txtDieNo=b.txtDieNo where a.txtDieNo=new.txtDieNo;
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

-- Dump completed on 2023-01-12 18:05:08
