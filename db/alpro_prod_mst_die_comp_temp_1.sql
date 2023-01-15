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
-- Table structure for table `mst_die_comp_temp_1`
--

DROP TABLE IF EXISTS `mst_die_comp_temp_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_die_comp_temp_1` (
  `txtDieNo` varchar(30) NOT NULL COMMENT 'Die No',
  `txtCompCode` varchar(30) NOT NULL COMMENT 'Component Code',
  `txtCompName` varchar(30) NOT NULL COMMENT 'COmponent Name',
  `dtDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `txtCompStatus` varchar(45) DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_die_comp_temp_1`
--

LOCK TABLES `mst_die_comp_temp_1` WRITE;
/*!40000 ALTER TABLE `mst_die_comp_temp_1` DISABLE KEYS */;
INSERT INTO `mst_die_comp_temp_1` VALUES ('1001 P1/01','BA','1001 P1/01 BA','2022-11-05 08:51:00','NEW'),('1001 P1/01','DP','1001 P1/01 DP','2022-11-05 08:51:00','NEW'),('1001 P1/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('1001 P1/01','MD','1001 P1/01 MD','2022-11-05 08:51:00','NEW'),('1021 P1/01','DP','1021 P1/01 DP','2022-11-05 08:51:00','NEW'),('1021 P1/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('1021 P1/01','MD','1021 P1/01 MD','2022-11-05 08:51:00','NEW'),('1021/06','DP','1021/06 DP','2022-11-05 08:51:00','NEW'),('1021/06','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('1021/06','MD','1021/06 MD','2022-11-05 08:51:00','NEW'),('1021/1','DP','1021/1 DP','2022-11-05 08:51:00','NEW'),('1021/1','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('1021/1','MD','1021/1 MD','2022-11-05 08:51:00','NEW'),('1022 P1/01','DP','1022 P1/01 DP','2022-11-05 08:51:00','NEW'),('1022 P1/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('1022 P1/01','MD','1022 P1/01 MD','2022-11-05 08:51:00','NEW'),('1025/P2/01','BA','1025/P2/01 BA','2022-11-05 08:51:00','NEW'),('1025/P2/01','DP','1025/P2/01 DP','2022-11-05 08:51:00','NEW'),('1025/P2/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('1025/P2/01','MD','1025/P2/01 MD','2022-11-05 08:51:00','NEW'),('1091 P3/02','DP','1091 P3/02 DP','2022-11-05 08:51:00','NEW'),('1091 P3/02','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('1091 P3/02','MD','1091 P3/02 MD','2022-11-05 08:51:00','NEW'),('1091/52','BA','1091/52 BA','2022-11-05 08:51:00','NEW'),('1091/52','DP','1091/52 DP','2022-11-05 08:51:00','NEW'),('1091/52','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('1091/52','MD','1091/52 MD','2022-11-05 08:51:00','NEW'),('1091/P1/01','DP','1091/P1/01 DP','2022-11-05 08:51:00','NEW'),('1091/P1/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('1091/P1/01','MD','1091/P1/01 MD','2022-11-05 08:51:00','NEW'),('1095 P2/01','BA','1095 P2/01 BA','2022-11-05 08:51:00','NEW'),('1095 P2/01','DP','1095 P2/01 DP','2022-11-05 08:51:00','NEW'),('1095 P2/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('1095 P2/01','MD','1095 P2/01 MD','2022-11-05 08:51:00','NEW'),('1096 P1/01','BA','1096 P1/01 BA','2022-11-05 08:51:00','NEW'),('1096 P1/01','DP','1096 P1/01 DP','2022-11-05 08:51:00','NEW'),('1096 P1/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('1096 P1/01','MD','1096 P1/01 MD','2022-11-05 08:51:00','NEW'),('1122/02','DP','1122/02 DP','2022-11-05 08:51:00','NEW'),('1122/02','IB','IB-A-REC-1-120 X 63','2022-11-05 08:51:00','NEW'),('1122/02','MD','1122/02 MD','2022-11-05 08:51:00','NEW'),('1251/P1/01','DP','1251/P1/01 DP','2022-11-05 08:51:00','NEW'),('1251/P1/01','IB','IB-A-PRO-6-1251','2022-11-05 08:51:01','NEW'),('1301 P2/01','BA','1301 P2/01 BA','2022-11-05 08:51:00','NEW'),('1301 P2/01','DP','1301 P2/01 DP','2022-11-05 08:51:00','NEW'),('1301 P2/01','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('1335 P1/01','BA','1335 P1/01 BA','2022-11-05 08:51:00','NEW'),('1335 P1/01','DP','1335 P1/01 DP','2022-11-05 08:51:00','NEW'),('1335 P1/01','IB','IB-A-REC-4-48 X 38','2022-11-05 08:51:01','NEW'),('1341 P2/01','BA','1341 P2/01 BA','2022-11-05 08:51:00','NEW'),('1341 P2/01','DP','1341 P2/01 DP','2022-11-05 08:51:00','NEW'),('1341 P2/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('1422/7','DP','1422/7 DP','2022-11-05 08:51:00','NEW'),('1422/7','IB','IB-A-PRO-1-1422','2022-11-05 08:51:00','NEW'),('1422/7','MD','1422/7 MD','2022-11-05 08:51:00','NEW'),('1422/P3/01','DP','1422/P3/01 DP','2022-11-05 08:51:00','NEW'),('1422/P3/01','IB','IB-A-PRO-1-1422','2022-11-05 08:51:01','NEW'),('1422/P3/01','MD','1422/P3/01 MD','2022-11-05 08:51:00','NEW'),('1427/P2/01','DP','1427/P2/01 DP','2022-11-05 08:51:00','NEW'),('1427/P2/01','IB','IB-B-PRO-1-1427','2022-11-05 08:51:01','NEW'),('1427/P2/01','MD','1427/P2/01 MD','2022-11-05 08:51:00','NEW'),('1511/13','DP','1511/13 DP','2022-11-05 08:51:00','NEW'),('1511/13','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('1511/13','MD','1511/13 MD','2022-11-05 08:51:00','NEW'),('1512/13','DP','1512/13 DP','2022-11-05 08:51:00','NEW'),('1512/13','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('1512/13','MD','1512/13 MD','2022-11-05 08:51:00','NEW'),('1550 P2/01','DP','1550 P2/01 DP','2022-11-05 08:51:00','NEW'),('1550 P2/01','IB','IB-A-REC-1-120 X 63','2022-11-05 08:51:00','NEW'),('1550 P2/01','MD','1550 P2/01 MD','2022-11-05 08:51:00','NEW'),('1562/6','DP','1562/6 DP','2022-11-05 08:51:00','NEW'),('1562/6','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('1562/6','MD','1562/6 MD','2022-11-05 08:51:00','NEW'),('1631/8','DP','1631/8 DP','2022-11-05 08:51:00','NEW'),('1631/8','IB','IB-A-R-1-60','2022-11-05 08:51:01','NEW'),('1631/8','MD','1631/8 MD','2022-11-05 08:51:00','NEW'),('1760 P1/01','BA','1760 P1/01 BA','2022-11-05 08:51:00','NEW'),('1760 P1/01','DP','1760 P1/01 DP','2022-11-05 08:51:00','NEW'),('1760 P1/01','IB','IB-A-PRO-2-71 X 1760','2022-11-05 08:51:00','NEW'),('1760L P1/01','BA','1760L P1/01 BA','2022-11-05 08:51:00','NEW'),('1760L P1/01','DP','1760L P1/01 DP','2022-11-05 08:51:00','NEW'),('1760L P1/01','FD','1760L P1/01 FP','2022-11-05 08:51:00','NEW'),('1760L P1/01','IB','IB-A-PRO-1-1760','2022-11-05 08:51:00','NEW'),('1770/25','DP','1770/25 DP','2022-11-05 08:51:00','NEW'),('1770/25','IB','IB-A-PRO-2-1770','2022-11-05 08:51:00','NEW'),('1770/25','MD','1770/25 MD','2022-11-05 08:51:00','NEW'),('1770/P3/01','BA','1770/P3/01 BA','2022-11-05 08:51:00','NEW'),('1770/P3/01','DP','1770/P3/01 DP','2022-11-05 08:51:00','NEW'),('1770/P3/01','IB','IB-A-PRO-1-1770','2022-11-05 08:51:00','NEW'),('1770/P3/01','MD','1770/P3/01 MD','2022-11-05 08:51:00','NEW'),('1770L P1/03','DP','1770L P1/03 DP','2022-11-05 08:51:00','NEW'),('1770L P1/03','IB','IB-A-PRO-1-1770','2022-11-05 08:51:00','NEW'),('1770L P1/03','MD','1770L P1/03 MD','2022-11-05 08:51:00','NEW'),('1770L/P3/01','DP','1770L P1/01 DP','2022-11-05 08:51:00','NEW'),('1770L/P3/01','IB','IB-A-PRO-1-1770','2022-11-05 08:51:01','NEW'),('1770L/P3/01','MD','1770L P1/01 MD','2022-11-05 08:51:00','NEW'),('1851L P3/01','BA','1851L P3/01 BA','2022-11-05 08:51:00','NEW'),('1851L P3/01','DP','1851L P3/01 DP','2022-11-05 08:51:00','NEW'),('1851L P3/01','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('1851L P3/01','MD','1851L P3/01 MD','2022-11-05 08:51:00','NEW'),('1861L P3/01','BA','1861L P3/01 BA','2022-11-05 08:51:00','NEW'),('1861L P3/01','DP','1861L P3/01 DP','2022-11-05 08:51:00','NEW'),('1861L P3/01','IB','IB-A-PRO-2-2061','2022-11-05 08:51:00','NEW'),('1861L P3/01','MD','1861L P3/01 MD','2022-11-05 08:51:00','NEW'),('2001L P2/03','BA','2001L P2/03 BA','2022-11-05 08:51:00','NEW'),('2001L P2/03','DP','2001L P2/03 DP','2022-11-05 08:51:00','NEW'),('2001L P2/03','IB','IB-A-PRO-2-2001','2022-11-05 08:51:01','NEW'),('2001L/P3/02','BA','2001L/P3/02 BA','2022-11-05 08:51:00','NEW'),('2001L/P3/02','DP','2001L/P3/02 DP','2022-11-05 08:51:00','NEW'),('2001L/P3/02','IB','IB-A-PRO-2-2001','2022-11-05 08:51:01','NEW'),('2003 P2/01','BA','2003 P2/01 BA','2022-11-05 08:51:00','NEW'),('2003 P2/01','DP','2003 P2/01 DP','2022-11-05 08:51:00','NEW'),('2003 P2/01','IB','IB-A-PRO-2-2001','2022-11-05 08:51:01','NEW'),('2005 P2/01','BA','2005 P2/01 BA','2022-11-05 08:51:00','NEW'),('2005 P2/01','DP','2005 P2/01 DP','2022-11-05 08:51:00','NEW'),('2005 P2/01','IB','IB-A-PRO-2-2001','2022-11-05 08:51:01','NEW'),('2011/P2/01','BA','2011/P2/01 BA','2022-11-05 08:51:00','NEW'),('2011/P2/01','DP','2011/P2/01 DP','2022-11-05 08:51:00','NEW'),('2011/P2/01','IB','IB-A-PRO-2-2011','2022-11-05 08:51:01','NEW'),('2011L P2/02','BA','2011L P2/02 BA','2022-11-05 08:51:00','NEW'),('2011L P2/02','DP','2011L P2/02 DP','2022-11-05 08:51:00','NEW'),('2011L P2/02','IB','IB-A-PRO-2-2011','2022-11-05 08:51:01','NEW'),('2013/7','BA','2013/7 BA','2022-11-05 08:51:00','NEW'),('2013/7','DP','2013/7 DP','2022-11-05 08:51:00','NEW'),('2013/7','IB','IB-A-PRO-2-2011','2022-11-05 08:51:01','NEW'),('2021/01','BA','2021/01 BA','2022-11-05 08:51:00','NEW'),('2021/01','DP','2021/01 DP','2022-11-05 08:51:00','NEW'),('2021/01','IB','IB-A-PRO-2-2001','2022-11-05 08:51:01','NEW'),('2021/1','BA','2021/1 BA','2022-11-05 08:51:00','NEW'),('2021/1','DP','2021/1 DP','2022-11-05 08:51:00','NEW'),('2021/1','IB','IB-A-PRO-2-2001','2022-11-05 08:51:01','NEW'),('2021/L P2/04','BA','2021/L P2/04 BA','2022-11-05 08:51:00','NEW'),('2021/L P2/04','DP','2021/L P2/04 DP','2022-11-05 08:51:00','NEW'),('2021/L P2/04','IB','IB-A-PRO-2-2001','2022-11-05 08:51:01','NEW'),('2021L/P1/02','DP','2021L/P1/02 DP','2022-11-05 08:51:00','NEW'),('2021L/P1/02','IB','IB-A-PRO-2-2021','2022-11-05 08:51:01','NEW'),('2031 P2/01','BA','2031 P2/01 BA','2022-11-05 08:51:00','NEW'),('2031 P2/01','DP','2031 P2/01 DP','2022-11-05 08:51:00','NEW'),('2031 P2/01','IB','IB-A-PRO-2-2011','2022-11-05 08:51:01','NEW'),('2031/1','BA','2031/1 BA','2022-11-05 08:51:00','NEW'),('2031/1','DP','2031/1 DP','2022-11-05 08:51:00','NEW'),('2031/1','IB','IB-A-PRO-2-2011','2022-11-05 08:51:01','NEW'),('2035/13','BA','2035/13 BA','2022-11-05 08:51:00','NEW'),('2035/13','DP','2035/13 DP','2022-11-05 08:51:00','NEW'),('2035/13','IB','IB-A-PRO-2-2011','2022-11-05 08:51:01','NEW'),('2041 P3/01','DP','2041 P3/01 DP','2022-11-05 08:51:00','NEW'),('2041 P3/01','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('2041 P3/01','MD','2041 P3/01 MD','2022-11-05 08:51:00','NEW'),('2041 P3/03','DP','2041 P3/03 DP','2022-11-05 08:51:00','NEW'),('2041 P3/03','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('2041 P3/03','MD','2041 P3/03 MD','2022-11-05 08:51:00','NEW'),('2041L P3/01','BA','2041L P3/01 BA','2022-11-05 08:51:00','NEW'),('2041L P3/01','DP','2041L P3/01 DP','2022-11-05 08:51:00','NEW'),('2041L P3/01','IB','IB-A-REC-4-48 X 38','2022-11-05 08:51:00','NEW'),('2041L P3/01','MD','2041L P3/01 MD','2022-11-05 08:51:00','NEW'),('2041L P3/02','DP','2041L P3/02 DP','2022-11-05 08:51:00','NEW'),('2041L P3/02','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('2041L P3/02','MD','2041L P3/02 MD','2022-11-05 08:51:00','NEW'),('2045 P2/01','BA','2045 P2/01 BA','2022-11-05 08:51:00','NEW'),('2045 P2/01','DP','2045 P2/01 DP','2022-11-05 08:51:00','NEW'),('2045 P2/01','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('2045 P2/01','MD','2045 P2/01 MD','2022-11-05 08:51:00','NEW'),('2051 P3/01','BA','2051 P3/01 BA','2022-11-05 08:51:00','NEW'),('2051 P3/01','DP','2051 P3/01 DP','2022-11-05 08:51:00','NEW'),('2051 P3/01','IB','IB-A-PRO-2-2051','2022-11-05 08:51:00','NEW'),('2051 P3/03','BA','2051 P3/03 BA','2022-11-05 08:51:00','NEW'),('2051 P3/03','DP','2051 P3/03 DP','2022-11-05 08:51:00','NEW'),('2051 P3/03','IB','IB-A-PRO-2-2051','2022-11-05 08:51:00','NEW'),('2051L P1/01','BA','2051L P1/01 BA','2022-11-05 08:51:00','NEW'),('2051L P1/01','DP','2051L P1/01 DP','2022-11-05 08:51:00','NEW'),('2051L P1/01','IB','IB-A-REC-4-48 X 38','2022-11-05 08:51:00','NEW'),('2051L P3/02','BA','2051L P3/02 BA','2022-11-05 08:51:00','NEW'),('2051L P3/02','DP','2051L P3/02 DP','2022-11-05 08:51:00','NEW'),('2051L P3/02','IB','IB-A-PRO-2-2051','2022-11-05 08:51:00','NEW'),('2051L/06','BA','2051L/06 BA','2022-11-05 08:51:00','NEW'),('2051L/06','DP','2051L/06 DP','2022-11-05 08:51:00','NEW'),('2051L/06','IB','IB-A-PRO-2-2051','2022-11-05 08:51:00','NEW'),('2061/44','BA','2061/44 BA','2022-11-05 08:51:00','NEW'),('2061/44','DP','2061/44 DP','2022-11-05 08:51:00','NEW'),('2061/44','IB','IB-A-PRO-2-2061','2022-11-05 08:51:00','NEW'),('2061/44','MD','2061/44 MD','2022-11-05 08:51:00','NEW'),('2061/45','DP','2061/45 DP','2022-11-05 08:51:00','NEW'),('2061/45','IB','IB-A-REC-4-48 X 38','2022-11-05 08:51:00','NEW'),('2061/45','MD','2061/45 MD','2022-11-05 08:51:00','NEW'),('2061/P3/07','BA','2061/P3/07 BA','2022-11-05 08:51:00','NEW'),('2061/P3/07','DP','2061/P3/07 DP','2022-11-05 08:51:00','NEW'),('2061/P3/07','IB','IB-A-PRO-2-2061','2022-11-05 08:51:00','NEW'),('2061/P3/07','MD','2061/P3/07 DPMD','2022-11-05 08:51:00','NEW'),('2061L P3/02','DP','2061L P3/02 DP','2022-11-05 08:51:00','NEW'),('2061L P3/02','IB','IB-A-PRO-2-2061','2022-11-05 08:51:00','NEW'),('2061L P3/02','MD','2061L P3/02 MD','2022-11-05 08:51:00','NEW'),('2061L P3/03','DP','2061L P3/03 DP','2022-11-05 08:51:00','NEW'),('2061L P3/03','IB','IB-A-PRO-2-2061','2022-11-05 08:51:00','NEW'),('2061L P3/03','MD','2061L P3/03 MD','2022-11-05 08:51:00','NEW'),('2061L P3/05','DP','2061L P3/05 DP','2022-11-05 08:51:00','NEW'),('2061L P3/05','IB','IB-A-PRO-2-2061','2022-11-05 08:51:00','NEW'),('2061L P3/05','MD','2061L P3/05 MD','2022-11-05 08:51:00','NEW'),('2061L/1','BA','2061L/1 BA','2022-11-05 08:51:00','NEW'),('2061L/1','DP','2061L/1 DP','2022-11-05 08:51:00','NEW'),('2061L/1','IB','IB-A-PRO-2-2061','2022-11-05 08:51:00','NEW'),('2061L/1','MD','2061L/1 MD','2022-11-05 08:51:00','NEW'),('2063/P3/01','DP','2063/P3/01 DP','2022-11-05 08:51:00','NEW'),('2063/P3/01','IB','IB-A-PRO-2-2061','2022-11-05 08:51:00','NEW'),('2063/P3/01','MD','2063/P3/01 MD','2022-11-05 08:51:00','NEW'),('2065 P2/01','BA','2065 P2/01 BA','2022-11-05 08:51:00','NEW'),('2065 P2/01','DP','2065 P2/01 DP','2022-11-05 08:51:00','NEW'),('2065 P2/01','IB','IB-A-PRO-2-2061','2022-11-05 08:51:00','NEW'),('2065 P2/01','MD','2065 P2/01 MD','2022-11-05 08:51:00','NEW'),('2151/P3/01','DP','2151/P3/01 DP','2022-11-05 08:51:00','NEW'),('2151/P3/01','IB','IB-A-PRO-1-2151','2022-11-05 08:51:01','NEW'),('2161 P3/02','DP','2161 P3/02 DP','2022-11-05 08:51:00','NEW'),('2161 P3/02','IB','IB-A-PRO-1-2161','2022-11-05 08:51:00','NEW'),('2161 P3/02','MD','2161 P3/02 MD','2022-11-05 08:51:00','NEW'),('2161/P3/01','DP','2161/P3/01 DP','2022-11-05 08:51:00','NEW'),('2161/P3/01','IB','IB-A-PRO-2-2161','2022-11-05 08:51:01','NEW'),('2161/P3/01','MD','2161/P3/01 DP','2022-11-05 08:51:00','NEW'),('5140/2','BA','5140/2 BA','2022-11-05 08:51:00','NEW'),('5140/2','DP','5140/2 DP','2022-11-05 08:51:00','NEW'),('5140/2','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:01','NEW'),('7400/2','BA','7400/2 BA','2022-11-05 08:51:00','NEW'),('7400/2','DP','7400/2 DP','2022-11-05 08:51:00','NEW'),('7400/2','IB','IB-A-REC-4-48 X 38','2022-11-05 08:51:00','NEW'),('7443/P2/01','BA','7443 P2/01 BA','2022-11-05 08:51:00','NEW'),('7443/P2/01','DP','7443 P2/01 DP','2022-11-05 08:51:00','NEW'),('7443/P2/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('7459 P2/01','BA','7459 P2/01 BA','2022-11-05 08:51:00','NEW'),('7459 P2/01','DP','7459 P2/01 DP','2022-11-05 08:51:00','NEW'),('7459 P2/01','FD','7459 P2/01 FP','2022-11-05 08:51:00','NEW'),('7459 P2/01','IB','IB-A-REC-1-120 X 63','2022-11-05 08:51:00','NEW'),('7500 P2/01','BA','7500 P2/01 BA','2022-11-05 08:51:00','NEW'),('7500 P2/01','DP','7500 P2/01 DP','2022-11-05 08:51:00','NEW'),('7500 P2/01','IB','IB-A-PRO-1-7500','2022-11-05 08:51:00','NEW'),('7511/12','BA','7511/12 BA','2022-11-05 08:51:00','NEW'),('7511/12','DP','7511/12 DP','2022-11-05 08:51:00','NEW'),('7511/12','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:01','NEW'),('7760 P2/1','BA','7760 P2/1 BA','2022-11-05 08:51:00','NEW'),('7760 P2/1','DP','7760 P2/1 DP','2022-11-05 08:51:00','NEW'),('7760 P2/1','IB','IB-A-REC-1-120 X 63','2022-11-05 08:51:00','NEW'),('AL-1195/1','BA','AL-1195/1 BA','2022-11-05 08:51:00','NEW'),('AL-1195/1','DP','AL-1195/1 DP','2022-11-05 08:51:00','NEW'),('AL-1195/1','IB','IB-A-PRO-1-AL-1195','2022-11-05 08:51:00','NEW'),('AL-1217/1','BA','AL-1217/1 BA','2022-11-05 08:51:00','NEW'),('AL-1217/1','DP','AL-1217/1 DP','2022-11-05 08:51:00','NEW'),('AL-1217/1','IB','IB-A-PRO-1-1217','2022-11-05 08:51:00','NEW'),('AL-1230 P1/01','DP','AL-1230 P1/01 DP','2022-11-05 08:51:00','NEW'),('AL-1230 P1/01','IB','IB-A-R-2-55','2022-11-05 08:51:00','NEW'),('AL-1230 P1/01','MD','AL-1230 P1/01 MD','2022-11-05 08:51:00','NEW'),('AL-1238 P2/01','DP','AL-1238 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-1238 P2/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('AL-1238 P2/01','MD','AL-1238 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-1322 P2/01','BA','AL-1322 P2/01 BA','2022-11-05 08:51:00','NEW'),('AL-1322 P2/01','DP','AL-1322 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-1322 P2/01','IB','IB-B-R-1-120','2022-11-05 08:51:01','NEW'),('AL-1322 P2/01','MD','AL-1322 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-1330 P2/01','DP','AL-1330 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-1330 P2/01','IB','IB-A-R-1-90','2022-11-05 08:51:01','NEW'),('AL-1330 P2/01','MD','AL-1330 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-1349 P2/01','DP','AL-1349 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-1349 P2/01','IB','IB-B-PRO-1-AL-1349','2022-11-05 08:51:00','NEW'),('AL-1349 P2/01','MD','AL-1349 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-1368/1','DP','AL-1368 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-1368/1','IB','IB-A-R-1-60','2022-11-05 08:51:01','NEW'),('AL-1368/1','MD','AL-1368 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-1369/1','DP','AL-1369 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-1369/1','IB','IB-A-R-1-60','2022-11-05 08:51:01','NEW'),('AL-1369/1','MD','AL-1369 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-1370/1','DP','AL-1370 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-1370/1','IB','IB-A-R-1-60','2022-11-05 08:51:01','NEW'),('AL-1370/1','MD','AL-1370 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-1376/P3/01','BA','AL-1376/P3/01 BA','2022-11-05 08:51:00','NEW'),('AL-1376/P3/01','DP','AL-1376/P3/01 DP','2022-11-05 08:51:00','NEW'),('AL-1376/P3/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('AL-1376/P3/01','MD','AL-1376/P3/01 MD','2022-11-05 08:51:00','NEW'),('AL-1377/P3/01','BA','AL-1377/P3/01 BA','2022-11-05 08:51:00','NEW'),('AL-1377/P3/01','DP','AL-1377/P3/01 DP','2022-11-05 08:51:00','NEW'),('AL-1377/P3/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('AL-1377/P3/01','MD','AL-1377/P3/01 MD','2022-11-05 08:51:00','NEW'),('AL-1393/1','BA','AL-1393/1 BA','2022-11-05 08:51:00','NEW'),('AL-1393/1','DP','AL-1393/1 DP','2022-11-05 08:51:00','NEW'),('AL-1393/1','IB','IB-A-REC-4-48 X 38','2022-11-05 08:51:00','NEW'),('AL-1393/1','MD','AL-1393/1 MD','2022-11-05 08:51:00','NEW'),('AL-1462/1','BA','AL-1462 P21/01 BA','2022-11-05 08:51:00','NEW'),('AL-1462/1','DP','AL-1462 P21/01 DP','2022-11-05 08:51:00','NEW'),('AL-1462/1','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('AL-1463/1','BA','AL-1463 P21/01 BA','2022-11-05 08:51:00','NEW'),('AL-1463/1','DP','AL-1463 P21/01 DP','2022-11-05 08:51:00','NEW'),('AL-1463/1','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('AL-1464/1','BA','AL-1464 P21/01 BA','2022-11-05 08:51:00','NEW'),('AL-1464/1','DP','AL-1464 P21/01 DP','2022-11-05 08:51:00','NEW'),('AL-1464/1','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('AL-1465 P2/01','DP','AL-1465 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-1465 P2/01','IB','IB-B-R-1-120','2022-11-05 08:51:01','NEW'),('AL-1465 P2/01','MD','AL-1465 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-1493/P2/1','DP','AL-1493/P2/1 DP','2022-11-05 08:51:00','NEW'),('AL-1493/P2/1','IB','IB-B-PRO-1-AL-912','2022-11-05 08:51:00','NEW'),('AL-1493/P2/1','MD','AL-1493/P2/1 MD','2022-11-05 08:51:00','NEW'),('AL-1501L P1/01','BA','AL-1501L P1/01 BA','2022-11-05 08:51:00','NEW'),('AL-1501L P1/01','DP','AL-1501L P1/01 DP','2022-11-05 08:51:00','NEW'),('AL-1501L P1/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('AL-1501L P1/01','MD','AL-1501L P1/01 MD','2022-11-05 08:51:00','NEW'),('AL-1508 P3/01','BA','AL-1508 P3/01 BA','2022-11-05 08:51:00','NEW'),('AL-1508 P3/01','DP','AL-1508 P3/01 DP','2022-11-05 08:51:00','NEW'),('AL-1508 P3/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:01','NEW'),('AL-1508 P3/01','MD','AL-1508 P3/01 MD','2022-11-05 08:51:00','NEW'),('AL-1511 P2/1','BA','AL-1508 P2/01 BA','2022-11-05 08:51:00','NEW'),('AL-1511 P2/1','DP','AL-1508 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-1511 P2/1','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('AL-246 P1/02','BA','AL-246 P1/02 BA','2022-11-05 08:51:00','NEW'),('AL-246 P1/02','DP','AL-246 P1/02 DP','2022-11-05 08:51:00','NEW'),('AL-246 P1/02','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('AL-246 P1/02','MD','AL-246 P1/02 MD','2022-11-05 08:51:00','NEW'),('AL-248 P1/01','DP','AL-248 P1/01 DP','2022-11-05 08:51:00','NEW'),('AL-248 P1/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('AL-248 P1/01','MD','AL-248 P1/01 MD','2022-11-05 08:51:00','NEW'),('AL-249 P1 /01','DP','AL-249 P1 /01 DP','2022-11-05 08:51:00','NEW'),('AL-249 P1 /01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('AL-249 P1 /01','MD','AL-249 P1 /01 MD','2022-11-05 08:51:00','NEW'),('AL-511 P1/01','BA','AL-511 P1/01 BA','2022-11-05 08:51:00','NEW'),('AL-511 P1/01','DP','AL-511 P1/01 DP','2022-11-05 08:51:00','NEW'),('AL-511 P1/01','IB','IB-A-REC-2-71 X 47','2022-11-05 08:51:00','NEW'),('AL-53  P1/01','DP','AL-53  P1/01 DP','2022-11-05 08:51:00','NEW'),('AL-53  P1/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('AL-53  P1/01','MD','AL-53  P1/01 MD','2022-11-05 08:51:00','NEW'),('AL-583/2','DP','AL-583/2 DP','2022-11-05 08:51:00','NEW'),('AL-583/2','IB','IB-B-PRO-1-AL-583','2022-11-05 08:51:00','NEW'),('AL-583/2','MD','AL-583/2 MD','2022-11-05 08:51:00','NEW'),('AL-708/P1/01','DP','AL-708/P1/01 DP','2022-11-05 08:51:00','NEW'),('AL-708/P1/01','IB','IB-A-PRO-1-AL-708','2022-11-05 08:51:01','NEW'),('AL-708/P1/01','MD','AL-708/P1/01 DP','2022-11-05 08:51:00','NEW'),('AL-796 P1/01','BA','AL-796 P1/01 BA','2022-11-05 08:51:00','NEW'),('AL-796 P1/01','DP','AL-796 P1/01 DP','2022-11-05 08:51:00','NEW'),('AL-796 P1/01','IB','IB-A-REC-4-48 X 38','2022-11-05 08:51:00','NEW'),('AL-810 P2/01','BA','AL-810 P2/01 BA','2022-11-05 08:51:00','NEW'),('AL-810 P2/01','DP','AL-810 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-810 P2/01','FD','AL-810 P2/01 FP','2022-11-05 08:51:00','NEW'),('AL-810 P2/01','IB','IB-A-REC-4-48 X 38','2022-11-05 08:51:00','NEW'),('AL-912/3','DP','AL-912 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-912/3','IB','IB-B-PRO-1-AL-912','2022-11-05 08:51:00','NEW'),('AL-912/3','MD','AL-912 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-936 P2/01','BA','AL-936 P2/01 BA','2022-11-05 08:51:00','NEW'),('AL-936 P2/01','DP','AL-936 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-936 P2/01','IB','IB-A-PRO-2-AL-936','2022-11-05 08:51:01','NEW'),('AL-972/1','BA','AL-972/1 BA','2022-11-05 08:51:00','NEW'),('AL-972/1','DP','AL-972/1 DP','2022-11-05 08:51:00','NEW'),('AL-972/1','FD','AL-972/1 FP','2022-11-05 08:51:00','NEW'),('AL-972/1','IB','IB-A-PRO-1-AL-972','2022-11-05 08:51:00','NEW'),('AL-994 P2/01','DP','AL-994 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-994 P2/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('AL-994 P2/01','MD','AL-994 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-995 P2/01','DP','AL-995 P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-995 P2/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('AL-995 P2/01','MD','AL-995 P2/01 MD','2022-11-05 08:51:00','NEW'),('AL-998  P2/01','DP','AL-998  P2/01 DP','2022-11-05 08:51:00','NEW'),('AL-998  P2/01','IB','IB-A-REC-1-84 X 58','2022-11-05 08:51:00','NEW'),('AL-998  P2/01','MD','AL-998  P2/01 MD','2022-11-05 08:51:00','NEW'),('AL/1440/P2/01','DP','AL/1440/P2/01 DP','2022-11-05 08:51:00','NEW'),('AL/1440/P2/01','IB','IB-A-PRO-1-AL1440','2022-11-05 08:51:01','NEW'),('AL/1440/P2/01','MD','AL/1440/P2/01 DP','2022-11-05 08:51:00','NEW');
/*!40000 ALTER TABLE `mst_die_comp_temp_1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 18:05:05