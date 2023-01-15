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
-- Temporary view structure for view `v_productionlogsheet_u`
--

DROP TABLE IF EXISTS `v_productionlogsheet_u`;
/*!50001 DROP VIEW IF EXISTS `v_productionlogsheet_u`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_productionlogsheet_u` AS SELECT 
 1 AS `txtPress`,
 1 AS `txtShift`,
 1 AS `dtStartTime`,
 1 AS `txtDieNo`,
 1 AS `numCavity`,
 1 AS `txtQuenchMedia`,
 1 AS `numRunningHour`,
 1 AS `txtBilletAlloy`,
 1 AS `numBilletLength`,
 1 AS `numNoOfBillet`,
 1 AS `numInputWt`,
 1 AS `numCuttingLegth`,
 1 AS `numWtPerPc`,
 1 AS `numNoOfGoodPcs`,
 1 AS `numOutputWt`,
 1 AS `numRecovery`,
 1 AS `numOutputPerHour`,
 1 AS `txtReason`,
 1 AS `txtRemarks`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_diemfgstatus_report`
--

DROP TABLE IF EXISTS `v_diemfgstatus_report`;
/*!50001 DROP VIEW IF EXISTS `v_diemfgstatus_report`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_diemfgstatus_report` AS SELECT 
 1 AS `txtSectionNo`,
 1 AS `txtTypeOfSection`,
 1 AS `txtDieNo`,
 1 AS `txtPress`,
 1 AS `NumCavity`,
 1 AS `txtComponent`,
 1 AS `CuttingRelDt`,
 1 AS `CuttingDt`,
 1 AS `Turning`,
 1 AS `CNCMilling`,
 1 AS `ConvMilling`,
 1 AS `HTSentDate`,
 1 AS `HTRecvDate`,
 1 AS `SurfaceGrinding`,
 1 AS `CNCWireCut`,
 1 AS `EDM`,
 1 AS `BenchWork`,
 1 AS `dtOkDate`,
 1 AS `dtStartTime`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_die_trial_req`
--

DROP TABLE IF EXISTS `v_die_trial_req`;
/*!50001 DROP VIEW IF EXISTS `v_die_trial_req`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_die_trial_req` AS SELECT 
 1 AS `dtStartTime`,
 1 AS `txtSectionNo`,
 1 AS `txtDieNo`,
 1 AS `txtCompName`,
 1 AS `txtPress`,
 1 AS `NumCavity`,
 1 AS `txtRemarks`,
 1 AS `NoOfTrial`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_diemfgstat_hr`
--

DROP TABLE IF EXISTS `v_diemfgstat_hr`;
/*!50001 DROP VIEW IF EXISTS `v_diemfgstat_hr`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_diemfgstat_hr` AS SELECT 
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `txtTypeOfSection`,
 1 AS `txtDieNo`,
 1 AS `txtPress`,
 1 AS `NumCavity`,
 1 AS `txtComponent`,
 1 AS `comp_wt`,
 1 AS `CuttingHr`,
 1 AS `TurningHr`,
 1 AS `CNCMillingHr`,
 1 AS `ConvMillingHr`,
 1 AS `HTWt`,
 1 AS `SGHr`,
 1 AS `CNCWireCutHr`,
 1 AS `EDMHr`,
 1 AS `BenchHr`,
 1 AS `TotalHr`,
 1 AS `dtStartTime`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_secdieview_1`
--

DROP TABLE IF EXISTS `v_secdieview_1`;
/*!50001 DROP VIEW IF EXISTS `v_secdieview_1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_secdieview_1` AS SELECT 
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `OKDieCount_P1P3`,
 1 AS `OKDieCount_P2`,
 1 AS `OKDieCount_All`,
 1 AS `MFGDieCount_P1P3`,
 1 AS `MFGDieCount_P2`,
 1 AS `MFGDieCount_All`,
 1 AS `Under Trial DieCount_P1P3`,
 1 AS `Under Trial DieCount_P2`,
 1 AS `Under Trial DieCount_All`,
 1 AS `TotalCount`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_pendingdiemfg`
--

DROP TABLE IF EXISTS `v_pendingdiemfg`;
/*!50001 DROP VIEW IF EXISTS `v_pendingdiemfg`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_pendingdiemfg` AS SELECT 
 1 AS `txtDieNo`,
 1 AS `txtPress`,
 1 AS `NumCavity`,
 1 AS `numEstInputRate`,
 1 AS `numInputRate`,
 1 AS `numEstOutputRate`,
 1 AS `numOututRate`,
 1 AS `numEstLife`,
 1 AS `numInputTillDate`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_monthly_rejdiereport`
--

DROP TABLE IF EXISTS `v_monthly_rejdiereport`;
/*!50001 DROP VIEW IF EXISTS `v_monthly_rejdiereport`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_monthly_rejdiereport` AS SELECT 
 1 AS `yearname`,
 1 AS `monname`,
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `txtTypeOfSection`,
 1 AS `txtDieNo`,
 1 AS `txtLogNo`,
 1 AS `txtLogType`,
 1 AS `txtMake`,
 1 AS `txtPress`,
 1 AS `NumCavity`,
 1 AS `txtAlloy`,
 1 AS `numInputTillDate`,
 1 AS `numOnputTillDate`,
 1 AS `txtRejectionReason`,
 1 AS `txtRemarks`,
 1 AS `dtStartTime`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_diecomponent`
--

DROP TABLE IF EXISTS `v_diecomponent`;
/*!50001 DROP VIEW IF EXISTS `v_diecomponent`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_diecomponent` AS SELECT 
 1 AS `txtDieNo`,
 1 AS `txtDieCompName`,
 1 AS `txtCompCode`,
 1 AS `txtComp`,
 1 AS `txtStatus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_dieperformancecard`
--

DROP TABLE IF EXISTS `v_dieperformancecard`;
/*!50001 DROP VIEW IF EXISTS `v_dieperformancecard`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_dieperformancecard` AS SELECT 
 1 AS `txtDieNo`,
 1 AS `numCavity`,
 1 AS `dtIssue`,
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `dtRejectedDate`,
 1 AS `dtLogDate`,
 1 AS `txtPress`,
 1 AS `dtStartTime`,
 1 AS `dtEndTime`,
 1 AS `numRunningHour`,
 1 AS `numInputWt`,
 1 AS `numOutputWt`,
 1 AS `inpRate`,
 1 AS `outputpRate`,
 1 AS `dtDateTime`,
 1 AS `txtShift`,
 1 AS `numInputTillDate`,
 1 AS `txtReason`,
 1 AS `txtBilletAlloy`,
 1 AS `prodtxtPress`,
 1 AS `numWtPerPc`,
 1 AS `txtNormalWt`,
 1 AS `txtMinWtRange`,
 1 AS `txtMaxWtRange`,
 1 AS `numDieWt`,
 1 AS `txtRemarks`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_rpt_hdsconsumption_daily_old`
--

DROP TABLE IF EXISTS `v_rpt_hdsconsumption_daily_old`;
/*!50001 DROP VIEW IF EXISTS `v_rpt_hdsconsumption_daily_old`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_rpt_hdsconsumption_daily_old` AS SELECT 
 1 AS `txtLogNo`,
 1 AS `dtLogRecv`,
 1 AS `numDia`,
 1 AS `numLength`,
 1 AS `txtMake`,
 1 AS `txtSuppName`,
 1 AS `txtComponent`,
 1 AS `numFinishLength`,
 1 AS `cutwt`,
 1 AS `dtStartTime`,
 1 AS `txtEmpName`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_monthly_diemfgreport`
--

DROP TABLE IF EXISTS `v_monthly_diemfgreport`;
/*!50001 DROP VIEW IF EXISTS `v_monthly_diemfgreport`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_monthly_diemfgreport` AS SELECT 
 1 AS `yearname`,
 1 AS `monname`,
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `txtTypeOfSection`,
 1 AS `txtDieNo`,
 1 AS `txtComponent`,
 1 AS `txtPress`,
 1 AS `NumCavity`,
 1 AS `txtAlloy`,
 1 AS `mfg_startdt`,
 1 AS `dtTrialSent`,
 1 AS `dtStartTime`,
 1 AS `dtEndTime`,
 1 AS `days_taken`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_rpt_hdsconsumption_daily`
--

DROP TABLE IF EXISTS `v_rpt_hdsconsumption_daily`;
/*!50001 DROP VIEW IF EXISTS `v_rpt_hdsconsumption_daily`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_rpt_hdsconsumption_daily` AS SELECT 
 1 AS `txtLogNo`,
 1 AS `dtLogRecv`,
 1 AS `numDia`,
 1 AS `numLength`,
 1 AS `txtMake`,
 1 AS `txtSuppName`,
 1 AS `txtComponent`,
 1 AS `numFinishLength`,
 1 AS `cutwt`,
 1 AS `dtStartTime`,
 1 AS `txtEmpName`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_toolroomlogsheet`
--

DROP TABLE IF EXISTS `v_toolroomlogsheet`;
/*!50001 DROP VIEW IF EXISTS `v_toolroomlogsheet`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_toolroomlogsheet` AS SELECT 
 1 AS `txtDieNo`,
 1 AS `txtEmpName`,
 1 AS `dtStartTime`,
 1 AS `txtShift`,
 1 AS `txtComponent`,
 1 AS `txtMachineName`,
 1 AS `txtOperName`,
 1 AS `numEstTime`,
 1 AS `EtartTime`,
 1 AS `EndTime`,
 1 AS `NumSettingTime`,
 1 AS `NumUnloadingTime`,
 1 AS `numBrkdHrs`,
 1 AS `RunningHours`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `report_diecuttingorder`
--

DROP TABLE IF EXISTS `report_diecuttingorder`;
/*!50001 DROP VIEW IF EXISTS `report_diecuttingorder`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `report_diecuttingorder` AS SELECT 
 1 AS `dtStartTime`,
 1 AS `txtSectionNo`,
 1 AS `txtDieNo`,
 1 AS `txtCompCode`,
 1 AS `txtDieCompName`,
 1 AS `txtLogNo`,
 1 AS `numCuttingLength`,
 1 AS `txtRemarks`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_secdieview_oftake`
--

DROP TABLE IF EXISTS `v_secdieview_oftake`;
/*!50001 DROP VIEW IF EXISTS `v_secdieview_oftake`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_secdieview_oftake` AS SELECT 
 1 AS `dtStartTime`,
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `txtIdentificationNo`,
 1 AS `txtProfile`,
 1 AS `Output_P1`,
 1 AS `Output_P2`,
 1 AS `Output_P3`,
 1 AS `TotalOutput`,
 1 AS `numRunningHour`,
 1 AS `outputrate`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `report_diewisemanufacturing`
--

DROP TABLE IF EXISTS `report_diewisemanufacturing`;
/*!50001 DROP VIEW IF EXISTS `report_diewisemanufacturing`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `report_diewisemanufacturing` AS SELECT 
 1 AS `txtDieNo`,
 1 AS `txtShift`,
 1 AS `txtCompCode`,
 1 AS `txtDieCompName`,
 1 AS `txtOperationCode`,
 1 AS `txtLogNo`,
 1 AS `txtMfgBy`,
 1 AS `numCuttingLength`,
 1 AS `numLastRunWt`,
 1 AS `dtStartTime`,
 1 AS `txtOperatorCode`,
 1 AS `txtEmpName`,
 1 AS `txtOperName`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_rpt_hdsstock`
--

DROP TABLE IF EXISTS `v_rpt_hdsstock`;
/*!50001 DROP VIEW IF EXISTS `v_rpt_hdsstock`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_rpt_hdsstock` AS SELECT 
 1 AS `txtLogNo`,
 1 AS `dtLogRecv`,
 1 AS `txtInvNo`,
 1 AS `txtSuppName`,
 1 AS `numDia`,
 1 AS `numLength`,
 1 AS `numLogWt`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vv_trn_prod_logsheet`
--

DROP TABLE IF EXISTS `vv_trn_prod_logsheet`;
/*!50001 DROP VIEW IF EXISTS `vv_trn_prod_logsheet`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vv_trn_prod_logsheet` AS SELECT 
 1 AS `pkProdLogSheet`,
 1 AS `txtPress`,
 1 AS `dtLogDate`,
 1 AS `txtShift`,
 1 AS `txtLotNo`,
 1 AS `txtDieNo`,
 1 AS `numCavity`,
 1 AS `txtQuenchMedia`,
 1 AS `dtStartTime`,
 1 AS `dtEndTime`,
 1 AS `numRunningHour`,
 1 AS `txtCastNo`,
 1 AS `txtBilletAlloy`,
 1 AS `numBilletTemp`,
 1 AS `numBilletDia`,
 1 AS `numNoOfBillet`,
 1 AS `numInputWt`,
 1 AS `numDischThick`,
 1 AS `numCuttingLegth`,
 1 AS `numWtPerPc`,
 1 AS `numNoOfGoodPcs`,
 1 AS `numOutputWt`,
 1 AS `numRecovery`,
 1 AS `numOutputPerHour`,
 1 AS `txtRemarks`,
 1 AS `numBilletLength`,
 1 AS `dtDateTime`,
 1 AS `txtProductionType`,
 1 AS `numReasonCode`,
 1 AS `txtReason`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `report_hotdiesteelcons`
--

DROP TABLE IF EXISTS `report_hotdiesteelcons`;
/*!50001 DROP VIEW IF EXISTS `report_hotdiesteelcons`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `report_hotdiesteelcons` AS SELECT 
 1 AS `txtLogNo`,
 1 AS `numDia`,
 1 AS `txtSuppName`,
 1 AS `txtCompCode`,
 1 AS `txtDieNo`,
 1 AS `txtDieCompName`,
 1 AS `txtEmpName`,
 1 AS `txtShift`,
 1 AS `numCuttingLength`,
 1 AS `dtStartTime`,
 1 AS `dtEndTime`,
 1 AS `txtReleaseFlag`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_toolroomlogsheet_misc`
--

DROP TABLE IF EXISTS `v_toolroomlogsheet_misc`;
/*!50001 DROP VIEW IF EXISTS `v_toolroomlogsheet_misc`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_toolroomlogsheet_misc` AS SELECT 
 1 AS `txtDieNo`,
 1 AS `txtEmpName`,
 1 AS `dtStartTime`,
 1 AS `txtShift`,
 1 AS `txtComponent`,
 1 AS `txtMachineName`,
 1 AS `txtOperName`,
 1 AS `numEstTime`,
 1 AS `EtartTime`,
 1 AS `EndTime`,
 1 AS `NumSettingTime`,
 1 AS `NumUnloadingTime`,
 1 AS `numBrkdHrs`,
 1 AS `RunningHours`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_diecuttingorder`
--

DROP TABLE IF EXISTS `v_diecuttingorder`;
/*!50001 DROP VIEW IF EXISTS `v_diecuttingorder`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_diecuttingorder` AS SELECT 
 1 AS `dtStartTime`,
 1 AS `txtSectionNo`,
 1 AS `txtDieNo`,
 1 AS `txtPress`,
 1 AS `txtComponent`,
 1 AS `txtLogNo`,
 1 AS `numFinishLength`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `report_logsheet`
--

DROP TABLE IF EXISTS `report_logsheet`;
/*!50001 DROP VIEW IF EXISTS `report_logsheet`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `report_logsheet` AS SELECT 
 1 AS `pkTRLogsheet`,
 1 AS `txtDieNo`,
 1 AS `txtDieCompName`,
 1 AS `txtOperName`,
 1 AS `txtEmpName`,
 1 AS `txtShift`,
 1 AS `txtWorkStation`,
 1 AS `numEstTime`,
 1 AS `dtStartTime`,
 1 AS `dtEndTime`,
 1 AS `TimeInMin`,
 1 AS `numBrkdHrs`,
 1 AS `txtHTFlag`,
 1 AS `dtDateTime`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_monthly_okdiereport`
--

DROP TABLE IF EXISTS `v_monthly_okdiereport`;
/*!50001 DROP VIEW IF EXISTS `v_monthly_okdiereport`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_monthly_okdiereport` AS SELECT 
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `txtTypeOfSection`,
 1 AS `txtDieNo`,
 1 AS `txtPress`,
 1 AS `NumCavity`,
 1 AS `txtAlloy`,
 1 AS `firsttrialdt`,
 1 AS `numEstTrial`,
 1 AS `actualnotrial`,
 1 AS `dtStartTime`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_secdieview`
--

DROP TABLE IF EXISTS `v_secdieview`;
/*!50001 DROP VIEW IF EXISTS `v_secdieview`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_secdieview` AS SELECT 
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `Output_P1`,
 1 AS `Output_P2`,
 1 AS `Output_P3`,
 1 AS `TotalOutput`,
 1 AS `OKDieCount_P1P3`,
 1 AS `OKDieCount_P2`,
 1 AS `OKDieCount_All`,
 1 AS `MFGDieCount_P1P3`,
 1 AS `MFGDieCount_P2`,
 1 AS `MFGDieCount_All`,
 1 AS `MFGCompDieCount_P1P3`,
 1 AS `MFGCompDieCount_P2`,
 1 AS `MFGCompDieCount_All`,
 1 AS `ConvDieCount_P1P3`,
 1 AS `ConvDieCount_P2`,
 1 AS `ConvDieCount_All`,
 1 AS `RejDieCount_P1P3`,
 1 AS `RejDieCount_P2`,
 1 AS `RejDieCount_All`,
 1 AS `CorrDieCount_P1P3`,
 1 AS `CorrDieCount_P2`,
 1 AS `CorrDieCount_All`,
 1 AS `Under Trial DieCount_P1P3`,
 1 AS `Under Trial DieCount_P2`,
 1 AS `Under Trial DieCount_All`,
 1 AS `NewDieCount_P1P3`,
 1 AS `NewDieCount_P2`,
 1 AS `NewDieCount_All`,
 1 AS `TotalCount`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_dieoutputdet`
--

DROP TABLE IF EXISTS `v_dieoutputdet`;
/*!50001 DROP VIEW IF EXISTS `v_dieoutputdet`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_dieoutputdet` AS SELECT 
 1 AS `txtDieNo`,
 1 AS `numOutputWt`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_diewisemfg`
--

DROP TABLE IF EXISTS `v_diewisemfg`;
/*!50001 DROP VIEW IF EXISTS `v_diewisemfg`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_diewisemfg` AS SELECT 
 1 AS `dtStartTime`,
 1 AS `txtDieNo`,
 1 AS `txtDieCompName`,
 1 AS `txtComponent`,
 1 AS `txtShift`,
 1 AS `txtOperName`,
 1 AS `txtEmpName`,
 1 AS `txtMachineName`,
 1 AS `numEstTime`,
 1 AS `Total_hours`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_monthly_convdiereport`
--

DROP TABLE IF EXISTS `v_monthly_convdiereport`;
/*!50001 DROP VIEW IF EXISTS `v_monthly_convdiereport`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_monthly_convdiereport` AS SELECT 
 1 AS `yearname`,
 1 AS `monname`,
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `txtTypeOfSection`,
 1 AS `txtDieNo`,
 1 AS `txtPress`,
 1 AS `NumCavity`,
 1 AS `txtAlloy`,
 1 AS `numInputTillDate`,
 1 AS `numOnputTillDate`,
 1 AS `convsecno`,
 1 AS `convsecdesc`,
 1 AS `convcavity`,
 1 AS `convpress`,
 1 AS `txtDieNoConv`,
 1 AS `convinput`,
 1 AS `convop`,
 1 AS `dtStartTime`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `report_hotdiesteelstock`
--

DROP TABLE IF EXISTS `report_hotdiesteelstock`;
/*!50001 DROP VIEW IF EXISTS `report_hotdiesteelstock`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `report_hotdiesteelstock` AS SELECT 
 1 AS `txtLogNo`,
 1 AS `txtLogType`,
 1 AS `txtInvNo`,
 1 AS `txtSuppName`,
 1 AS `numDia`,
 1 AS `numLength`,
 1 AS `numLogWt`,
 1 AS `dtLogRecv`,
 1 AS `txtRemarks`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_productionlogsheet`
--

DROP TABLE IF EXISTS `v_productionlogsheet`;
/*!50001 DROP VIEW IF EXISTS `v_productionlogsheet`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_productionlogsheet` AS SELECT 
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `txtPress`,
 1 AS `txtShift`,
 1 AS `dtStartTime`,
 1 AS `txtDieNo`,
 1 AS `numCavity`,
 1 AS `txtQuenchMedia`,
 1 AS `numRunningHour`,
 1 AS `txtBilletAlloy`,
 1 AS `numBilletLength`,
 1 AS `numNoOfBillet`,
 1 AS `numInputWt`,
 1 AS `numCuttingLegth`,
 1 AS `numWtPerPc`,
 1 AS `numNoOfGoodPcs`,
 1 AS `numOutputWt`,
 1 AS `numRecovery`,
 1 AS `numOutputPerHour`,
 1 AS `txtReason`,
 1 AS `txtRemarks`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_secdieviewdatewise`
--

DROP TABLE IF EXISTS `v_secdieviewdatewise`;
/*!50001 DROP VIEW IF EXISTS `v_secdieviewdatewise`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_secdieviewdatewise` AS SELECT 
 1 AS `dtStartTime`,
 1 AS `txtSectionNo`,
 1 AS `txtSectionDesc`,
 1 AS `Output_P1`,
 1 AS `Output_P2`,
 1 AS `Output_P3`,
 1 AS `TotalOutput`,
 1 AS `OKDieCount_P1P3`,
 1 AS `OKDieCount_P2`,
 1 AS `OKDieCount_All`,
 1 AS `MFGDieCount_P1P3`,
 1 AS `MFGDieCount_P2`,
 1 AS `MFGDieCount_All`,
 1 AS `MFGCompDieCount_P1P3`,
 1 AS `MFGCompDieCount_P2`,
 1 AS `MFGCompDieCount_All`,
 1 AS `ConvDieCount_P1P3`,
 1 AS `ConvDieCount_P2`,
 1 AS `ConvDieCount_All`,
 1 AS `RejDieCount_P1P3`,
 1 AS `RejDieCount_P2`,
 1 AS `RejDieCount_All`,
 1 AS `CorrDieCount_P1P3`,
 1 AS `CorrDieCount_P2`,
 1 AS `CorrDieCount_All`,
 1 AS `Under Trial DieCount_P1P3`,
 1 AS `Under Trial DieCount_P2`,
 1 AS `Under Trial DieCount_All`,
 1 AS `NewDieCount_P1P3`,
 1 AS `NewDieCount_P2`,
 1 AS `NewDieCount_All`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_trn_prod_logsheet`
--

DROP TABLE IF EXISTS `v_trn_prod_logsheet`;
/*!50001 DROP VIEW IF EXISTS `v_trn_prod_logsheet`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_trn_prod_logsheet` AS SELECT 
 1 AS `pkProdLogSheet`,
 1 AS `txtPress`,
 1 AS `dtLogDate`,
 1 AS `txtShift`,
 1 AS `txtLotNo`,
 1 AS `txtDieNo`,
 1 AS `numCavity`,
 1 AS `txtQuenchMedia`,
 1 AS `dtStartTime`,
 1 AS `dtEndTime`,
 1 AS `numRunningHour`,
 1 AS `txtCastNo`,
 1 AS `txtBilletAlloy`,
 1 AS `numBilletTemp`,
 1 AS `numBilletDia`,
 1 AS `numNoOfBillet`,
 1 AS `numInputWt`,
 1 AS `numDischThick`,
 1 AS `numCuttingLegth`,
 1 AS `numWtPerPc`,
 1 AS `numNoOfGoodPcs`,
 1 AS `numOutputWt`,
 1 AS `numRecovery`,
 1 AS `numOutputPerHour`,
 1 AS `txtRemarks`,
 1 AS `numBilletLength`,
 1 AS `dtDateTime`,
 1 AS `txtProductionType`,
 1 AS `numReasonCode`,
 1 AS `txtReason`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `report_heattreatment`
--

DROP TABLE IF EXISTS `report_heattreatment`;
/*!50001 DROP VIEW IF EXISTS `report_heattreatment`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `report_heattreatment` AS SELECT 
 1 AS `dtRecvDate`,
 1 AS `dtSentDate`,
 1 AS `txtDieNo`,
 1 AS `txtCompCode`,
 1 AS `txtDieCompName`,
 1 AS `txtLogNo`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_productionlogsheet_u`
--

/*!50001 DROP VIEW IF EXISTS `v_productionlogsheet_u`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_productionlogsheet_u` AS select `a`.`txtPress` AS `txtPress`,`a`.`txtShift` AS `txtShift`,cast(`a`.`dtLogDate` as date) AS `dtStartTime`,`a`.`txtDieNo` AS `txtDieNo`,`a`.`numCavity` AS `numCavity`,`a`.`txtQuenchMedia` AS `txtQuenchMedia`,`a`.`numRunningHour` AS `numRunningHour`,`a`.`txtBilletAlloy` AS `txtBilletAlloy`,`a`.`numBilletLength` AS `numBilletLength`,`a`.`numNoOfBillet` AS `numNoOfBillet`,`a`.`numInputWt` AS `numInputWt`,`a`.`numCuttingLegth` AS `numCuttingLegth`,`a`.`numWtPerPc` AS `numWtPerPc`,`a`.`numNoOfGoodPcs` AS `numNoOfGoodPcs`,`a`.`numOutputWt` AS `numOutputWt`,`a`.`numRecovery` AS `numRecovery`,`a`.`numOutputPerHour` AS `numOutputPerHour`,`b`.`txtReason` AS `txtReason`,`a`.`txtRemarks` AS `txtRemarks` from (`trn_prod_logsheet` `a` join `mst_cons_unload_reason` `b` on((`a`.`numReasonCode` = `b`.`numReasonCode`))) where (`b`.`txtReason` not in ('Order Complete','Others')) order by `a`.`dtLogDate` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_diemfgstatus_report`
--

/*!50001 DROP VIEW IF EXISTS `v_diemfgstatus_report`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_diemfgstatus_report` AS select `c`.`txtSectionNo` AS `txtSectionNo`,(case when (`c`.`txtTypeOfSection` = 'H') then 'Hollow' else 'Solid' end) AS `txtTypeOfSection`,`a`.`txtDieNo` AS `txtDieNo`,`b`.`txtPress` AS `txtPress`,`b`.`NumCavity` AS `NumCavity`,`a`.`txtComponent` AS `txtComponent`,min(cast(`d`.`dtStartTime` as date)) AS `CuttingRelDt`,max(cast(`d`.`dtDateTime` as date)) AS `CuttingDt`,max((case when (`e`.`txtOperName` like '%Turning%') then cast(`a`.`dtEndTime` as date) else NULL end)) AS `Turning`,max((case when (`f`.`txtMachineNo` in ('M008','M009')) then cast(`a`.`dtEndTime` as date) else NULL end)) AS `CNCMilling`,max((case when (`f`.`txtMachineNo` in ('M002','M003','M004')) then cast(`a`.`dtEndTime` as date) else NULL end)) AS `ConvMilling`,max(cast(`g`.`dtSentDate` as date)) AS `HTSentDate`,max(cast(`g`.`dtRecvDate` as date)) AS `HTRecvDate`,max((case when (`e`.`txtOperName` like '%Surface Grinding%') then cast(`a`.`dtEndTime` as date) else NULL end)) AS `SurfaceGrinding`,max((case when (`f`.`txtMachineNo` = 'M010') then cast(`a`.`dtEndTime` as date) else NULL end)) AS `CNCWireCut`,max((case when (`f`.`txtMachineNo` = 'M011') then cast(`a`.`dtEndTime` as date) else NULL end)) AS `EDM`,max((case when (`e`.`txtOperName` like '%Bench%') then cast(`a`.`dtEndTime` as date) else NULL end)) AS `BenchWork`,cast(`b`.`dtOkDate` as date) AS `dtOkDate`,min(cast(`a`.`dtStartTime` as date)) AS `dtStartTime` from ((((((`trn_trlogsheet` `a` join `mst_die` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) join `mst_section` `c` on((`c`.`txtSectionNo` = `b`.`txtSectionNo`))) join `trn_log_blank_cutting` `d` on(((`d`.`txtDieNo` = `a`.`txtDieNo`) and (`d`.`txtComponent` = `a`.`txtComponent`)))) join `mst_const_oper` `e` on((`e`.`txtOperCode` = `a`.`txtOperationCode`))) join `mst_machine` `f` on((`f`.`txtMachineNo` = `a`.`txtWorkStation`))) left join `trn_heattreatment` `g` on(((`g`.`txtDieNo` = `a`.`txtDieNo`) and (`g`.`txtCompCode` = `a`.`txtComponent`)))) where ((`a`.`dtStartTime` is not null) and (`b`.`txtDieStatus` = 'Under Manufacturing')) group by `c`.`txtSectionNo`,(case when (`c`.`txtTypeOfSection` = 'H') then 'Hollow' else 'Solid' end),`a`.`txtDieNo`,`b`.`txtPress`,`b`.`NumCavity`,`a`.`txtComponent`,`b`.`dtOkDate` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_die_trial_req`
--

/*!50001 DROP VIEW IF EXISTS `v_die_trial_req`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_die_trial_req` AS select distinct cast(`a`.`dtTrialSent` as date) AS `dtStartTime`,`b`.`txtSectionNo` AS `txtSectionNo`,`a`.`txtDieNo` AS `txtDieNo`,`c`.`txtIB` AS `txtCompName`,`b`.`txtPress` AS `txtPress`,`b`.`NumCavity` AS `NumCavity`,`a`.`txtRemarks` AS `txtRemarks`,`d`.`NoOfTrial` AS `NoOfTrial` from (((`trn_die_sent_trial` `a` join `mst_die` `b` on((`b`.`txtDieNo` = `a`.`txtDieNo`))) join `trn_die_assembly` `c` on((`c`.`txtDieNo` = `a`.`txtDieNo`))) left join (select `trn_die_sent_trial`.`txtDieNo` AS `txtDieNo`,count(1) AS `NoOfTrial` from `trn_die_sent_trial` where (`trn_die_sent_trial`.`dtTrialEnd` is not null) group by `trn_die_sent_trial`.`txtDieNo`) `d` on((`d`.`txtDieNo` = `a`.`txtDieNo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_diemfgstat_hr`
--

/*!50001 DROP VIEW IF EXISTS `v_diemfgstat_hr`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_diemfgstat_hr` AS select `c`.`txtSectionNo` AS `txtSectionNo`,`d`.`txtSectionDesc` AS `txtSectionDesc`,(case when (`d`.`txtTypeOfSection` = 'H') then 'Hollow' else 'Solid' end) AS `txtTypeOfSection`,`a`.`txtDieNo` AS `txtDieNo`,`c`.`txtPress` AS `txtPress`,`c`.`NumCavity` AS `NumCavity`,`a`.`txtComponent` AS `txtComponent`,`b`.`comp_wt` AS `comp_wt`,round((sum(timestampdiff(SECOND,`b`.`dtStartTime`,`b`.`dtEndTime`)) / 3600),1) AS `CuttingHr`,round((sum((case when (`a`.`txtOperationCode` = '1') then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1) AS `TurningHr`,round((sum((case when (`a`.`txtWorkStation` in ('M008','M009')) then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1) AS `CNCMillingHr`,round((sum((case when (`a`.`txtWorkStation` in ('M002','M003','M004')) then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1) AS `ConvMillingHr`,`e`.`numCompWt` AS `HTWt`,round((sum((case when (`a`.`txtOperationCode` = '3') then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1) AS `SGHr`,round((sum((case when (`a`.`txtWorkStation` = 'M010') then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1) AS `CNCWireCutHr`,round((sum((case when (`a`.`txtWorkStation` = 'M011') then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1) AS `EDMHr`,round((sum((case when (`a`.`txtOperationCode` in ('5','6','7','8','24')) then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1) AS `BenchHr`,(((((((round((sum(timestampdiff(SECOND,`b`.`dtStartTime`,`b`.`dtEndTime`)) / 3600),1) + round((sum((case when (`a`.`txtOperationCode` = '1') then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1)) + round((sum((case when (`a`.`txtWorkStation` in ('M008','M009')) then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1)) + round((sum((case when (`a`.`txtWorkStation` in ('M002','M003','M004')) then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1)) + round((sum((case when (`a`.`txtOperationCode` = '3') then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1)) + round((sum((case when (`a`.`txtWorkStation` = 'M010') then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1)) + round((sum((case when (`a`.`txtWorkStation` = 'M011') then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1)) + round((sum((case when (`a`.`txtOperationCode` in ('5','6','7','8','24')) then timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) else 0 end)) / 3600),1)) AS `TotalHr`,min(cast(`a`.`dtStartTime` as date)) AS `dtStartTime` from ((((`trn_trlogsheet` `a` join (select `bk`.`txtDieNo` AS `txtDieNo`,`bk`.`txtComponent` AS `txtComponent`,`bk`.`txtLogNo` AS `txtLogNo`,`bk`.`dtStartTime` AS `dtStartTime`,`bk`.`dtEndTime` AS `dtEndTime`,round(((`hds`.`numFirstWeight` / `hds`.`numFirstLength`) * `bk`.`numFinishLength`),2) AS `comp_wt` from (`trn_log_blank_cutting` `bk` join `mst_hot_die_steel` `hds` on((`hds`.`txtLogNo` = `bk`.`txtLogNo`)))) `b` on(((`a`.`txtDieNo` = `b`.`txtDieNo`) and (`a`.`txtComponent` = `b`.`txtComponent`)))) join `mst_die` `c` on((`c`.`txtDieNo` = `a`.`txtDieNo`))) join `mst_section` `d` on((`d`.`txtSectionNo` = `c`.`txtSectionNo`))) left join `trn_heattreatment` `e` on(((`e`.`txtDieNo` = `a`.`txtDieNo`) and (`e`.`txtCompCode` = `a`.`txtComponent`)))) where ((`a`.`dtStartTime` is not null) and (`c`.`txtDieStatus` = 'Under Manufacturing')) group by `c`.`txtSectionNo`,`d`.`txtSectionDesc`,(case when (`d`.`txtTypeOfSection` = 'H') then 'Hollow' else 'Solid' end),`a`.`txtDieNo`,`c`.`txtPress`,`c`.`NumCavity`,`a`.`txtComponent`,`b`.`comp_wt`,`e`.`numCompWt` order by `a`.`dtStartTime` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_secdieview_1`
--

/*!50001 DROP VIEW IF EXISTS `v_secdieview_1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_secdieview_1` AS select `b`.`txtSectionNo` AS `txtSectionNo`,`b`.`txtSectionDesc` AS `txtSectionDesc`,count(distinct (case when ((`a`.`txtDieStatus` in ('OK','Converted','Correction')) and (`a`.`txtPress` in ('P1/P3','P1','P3'))) then `a`.`txtDieNo` else NULL end)) AS `OKDieCount_P1P3`,count(distinct (case when ((`a`.`txtDieStatus` in ('OK','Converted','Correction')) and (`a`.`txtPress` = 'P2')) then `a`.`txtDieNo` else NULL end)) AS `OKDieCount_P2`,count(distinct (case when ((`a`.`txtDieStatus` in ('OK','Converted','Correction')) and (`a`.`txtPress` = 'P1/P2/P3')) then `a`.`txtDieNo` else NULL end)) AS `OKDieCount_All`,count(distinct (case when ((`a`.`txtDieStatus` in ('Under Manufacturing','Manufacturing Complete','New')) and (`a`.`txtPress` in ('P1/P3','P1','P3'))) then `a`.`txtDieNo` else NULL end)) AS `MFGDieCount_P1P3`,count(distinct (case when ((`a`.`txtDieStatus` in ('Under Manufacturing','Manufacturing Complete','New')) and (`a`.`txtPress` = 'P2')) then `a`.`txtDieNo` else NULL end)) AS `MFGDieCount_P2`,count(distinct (case when ((`a`.`txtDieStatus` in ('Under Manufacturing','Manufacturing Complete','New')) and (`a`.`txtPress` = 'P1/P2/P3')) then `a`.`txtDieNo` else NULL end)) AS `MFGDieCount_All`,count(distinct (case when ((`a`.`txtDieStatus` = 'Under Trial') and (`a`.`txtPress` in ('P1/P3','P1','P3'))) then `a`.`txtDieNo` else NULL end)) AS `Under Trial DieCount_P1P3`,count(distinct (case when ((`a`.`txtDieStatus` = 'Under Trial') and (`a`.`txtPress` = 'P2')) then `a`.`txtDieNo` else NULL end)) AS `Under Trial DieCount_P2`,count(distinct (case when ((`a`.`txtDieStatus` = 'Under Trial') and (`a`.`txtPress` = 'P1/P2/P3')) then `a`.`txtDieNo` else NULL end)) AS `Under Trial DieCount_All`,count(distinct (case when ((`a`.`txtPress` in ('P3','P2','P1/P3','P1/P2/P3','P1')) and (`a`.`txtDieStatus` <> 'Rejected')) then `a`.`txtDieNo` else NULL end)) AS `TotalCount` from (`mst_die` `a` join `mst_section` `b` on((`a`.`txtSectionNo` = `b`.`txtSectionNo`))) group by `b`.`txtSectionNo`,`b`.`txtSectionDesc` order by `b`.`txtSectionNo`,`b`.`txtSectionDesc` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pendingdiemfg`
--

/*!50001 DROP VIEW IF EXISTS `v_pendingdiemfg`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pendingdiemfg` AS select `mst_die`.`txtDieNo` AS `txtDieNo`,`mst_die`.`txtPress` AS `txtPress`,`mst_die`.`NumCavity` AS `NumCavity`,`mst_die`.`numEstInputRate` AS `numEstInputRate`,`mst_die`.`numInputRate` AS `numInputRate`,`mst_die`.`numEstOutputRate` AS `numEstOutputRate`,`mst_die`.`numOututRate` AS `numOututRate`,(`mst_die`.`numEstLife` * 1000) AS `numEstLife`,(`mst_die`.`numInputTillDate` * 0.80) AS `numInputTillDate` from `mst_die` where (`mst_die`.`txtDieMfgRqrd` = 'Y') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_monthly_rejdiereport`
--

/*!50001 DROP VIEW IF EXISTS `v_monthly_rejdiereport`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_monthly_rejdiereport` AS select year(`b`.`dtRejectedDate`) AS `yearname`,monthname(`b`.`dtRejectedDate`) AS `monname`,`c`.`txtSectionNo` AS `txtSectionNo`,`c`.`txtSectionDesc` AS `txtSectionDesc`,`c`.`txtTypeOfSection` AS `txtTypeOfSection`,`a`.`txtDieNo` AS `txtDieNo`,`logtbl`.`txtLogNo` AS `txtLogNo`,`logtbl`.`txtLogType` AS `txtLogType`,`logtbl`.`txtMake` AS `txtMake`,`b`.`txtPress` AS `txtPress`,`b`.`NumCavity` AS `NumCavity`,`b`.`txtAlloy` AS `txtAlloy`,`b`.`numInputTillDate` AS `numInputTillDate`,(`b`.`numInputTillDate` * 0.80) AS `numOnputTillDate`,`d`.`txtRejectionReason` AS `txtRejectionReason`,`d`.`txtRemarks` AS `txtRemarks`,cast(`b`.`dtRejectedDate` as date) AS `dtStartTime` from ((((`mst_die` `a` join `mst_die` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) join `mst_section` `c` on((`c`.`txtSectionNo` = `b`.`txtSectionNo`))) left join `trn_die_rejection` `d` on((`a`.`txtDieNo` = `d`.`txtDieNo`))) left join (select distinct `b`.`txtDieNo` AS `txtDieNo`,`a`.`txtLogNo` AS `txtLogNo`,`a`.`txtLogType` AS `txtLogType`,`a`.`txtMake` AS `txtMake` from (`mst_hot_die_steel` `a` join `trn_log_blank_cutting` `b` on((`b`.`txtLogNo` = `a`.`txtLogNo`)))) `logtbl` on((`logtbl`.`txtDieNo` = `a`.`txtDieNo`))) where (`b`.`txtDieStatus` = 'Rejected') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_diecomponent`
--

/*!50001 DROP VIEW IF EXISTS `v_diecomponent`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_diecomponent` AS select `a`.`txtDieNo` AS `txtDieNo`,`c`.`txtDieCompName` AS `txtDieCompName`,`b`.`txtCompCode` AS `txtCompCode`,`a`.`txtComp` AS `txtComp`,`a`.`txtStatus` AS `txtStatus` from ((`trg_die_stock` `a` join `mst_die_comp` `b` on(((`a`.`txtDieNo` = `b`.`txtDieNo`) and (`a`.`txtComp` = `b`.`txtCompName`)))) join `mst_const_diecomp` `c` on((`c`.`txtDieCompCode` = `b`.`txtCompCode`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_dieperformancecard`
--

/*!50001 DROP VIEW IF EXISTS `v_dieperformancecard`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_dieperformancecard` AS select `a`.`txtDieNo` AS `txtDieNo`,`a`.`NumCavity` AS `numCavity`,`a`.`dtIssue` AS `dtIssue`,`a`.`txtSectionNo` AS `txtSectionNo`,`c`.`txtSectionDesc` AS `txtSectionDesc`,`a`.`dtRejectedDate` AS `dtRejectedDate`,`b`.`dtLogDate` AS `dtLogDate`,`a`.`txtPress` AS `txtPress`,`b`.`dtStartTime` AS `dtStartTime`,`b`.`dtEndTime` AS `dtEndTime`,`b`.`numRunningHour` AS `numRunningHour`,`b`.`numInputWt` AS `numInputWt`,`b`.`numOutputWt` AS `numOutputWt`,(`b`.`numInputWt` / `b`.`numRunningHour`) AS `inpRate`,(`b`.`numOutputWt` / `b`.`numRunningHour`) AS `outputpRate`,`b`.`dtDateTime` AS `dtDateTime`,`b`.`txtShift` AS `txtShift`,`a`.`numInputTillDate` AS `numInputTillDate`,`d`.`txtReason` AS `txtReason`,`b`.`txtBilletAlloy` AS `txtBilletAlloy`,`b`.`txtPress` AS `prodtxtPress`,`b`.`numWtPerPc` AS `numWtPerPc`,`c`.`txtNormalWt` AS `txtNormalWt`,`c`.`txtMinWtRange` AS `txtMinWtRange`,`c`.`txtMaxWtRange` AS `txtMaxWtRange`,`a`.`numDieWt` AS `numDieWt`,`b`.`txtRemarks` AS `txtRemarks` from (((`mst_die` `a` left join `trn_prod_logsheet` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) left join `mst_section` `c` on((`a`.`txtSectionNo` = `c`.`txtSectionNo`))) left join `mst_cons_unload_reason` `d` on((`b`.`numReasonCode` = `d`.`numReasonCode`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_rpt_hdsconsumption_daily_old`
--

/*!50001 DROP VIEW IF EXISTS `v_rpt_hdsconsumption_daily_old`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_rpt_hdsconsumption_daily_old` AS select `a`.`txtLogNo` AS `txtLogNo`,`b`.`dtLogRecv` AS `dtLogRecv`,`b`.`numDia` AS `numDia`,`b`.`numFirstLength` AS `numLength`,`b`.`txtMake` AS `txtMake`,`b`.`txtSuppName` AS `txtSuppName`,`a`.`txtComponent` AS `txtComponent`,`a`.`numFinishLength` AS `numFinishLength`,round(((`b`.`numFirstWeight` / `b`.`numFirstLength`) * `a`.`numFinishLength`),2) AS `cutwt`,cast(`a`.`dtStartTime` as date) AS `dtStartTime`,`c`.`txtEmpName` AS `txtEmpName` from ((`trn_log_blank_cutting` `a` join `mst_hot_die_steel` `b` on((`a`.`txtLogNo` = `b`.`txtLogNo`))) join `mst_employee` `c` on((`a`.`txtOperatorCode` = `c`.`txtEmpNo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_monthly_diemfgreport`
--

/*!50001 DROP VIEW IF EXISTS `v_monthly_diemfgreport`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_monthly_diemfgreport` AS select year(min(`a`.`dtStartTime`)) AS `yearname`,monthname(min(`a`.`dtStartTime`)) AS `monname`,`c`.`txtSectionNo` AS `txtSectionNo`,`c`.`txtSectionDesc` AS `txtSectionDesc`,`c`.`txtTypeOfSection` AS `txtTypeOfSection`,`a`.`txtDieNo` AS `txtDieNo`,`a`.`txtComponent` AS `txtComponent`,`b`.`txtPress` AS `txtPress`,`b`.`NumCavity` AS `NumCavity`,`b`.`txtAlloy` AS `txtAlloy`,min(`a`.`dtStartTime`) AS `mfg_startdt`,`d`.`dtTrialSent` AS `dtTrialSent`,min(`a`.`dtStartTime`) AS `dtStartTime`,max(`a`.`dtEndTime`) AS `dtEndTime`,round((timestampdiff(SECOND,min(`a`.`dtStartTime`),max(`a`.`dtEndTime`)) / (3600 * 24)),1) AS `days_taken` from (((`trn_trlogsheet` `a` join `mst_die` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) join `mst_section` `c` on((`c`.`txtSectionNo` = `b`.`txtSectionNo`))) left join `trn_die_sent_trial` `d` on((`a`.`txtDieNo` = `d`.`txtDieNo`))) group by `c`.`txtSectionNo`,`c`.`txtSectionDesc`,`c`.`txtTypeOfSection`,`a`.`txtDieNo`,`a`.`txtComponent`,`b`.`txtPress`,`b`.`NumCavity`,`b`.`txtAlloy` having (max(`a`.`dtEndTime`) is not null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_rpt_hdsconsumption_daily`
--

/*!50001 DROP VIEW IF EXISTS `v_rpt_hdsconsumption_daily`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_rpt_hdsconsumption_daily` AS select `a`.`txtLogNo` AS `txtLogNo`,`b`.`dtLogRecv` AS `dtLogRecv`,`b`.`numDia` AS `numDia`,`b`.`numFirstLength` AS `numLength`,`b`.`txtMake` AS `txtMake`,`b`.`txtSuppName` AS `txtSuppName`,`a`.`txtComponent` AS `txtComponent`,`a`.`numFinishLength` AS `numFinishLength`,round(((((((3.14 * `b`.`numDia`) * `b`.`numDia`) * 0.25) * 0.0785) * `a`.`numFinishLength`) * 0.0001),2) AS `cutwt`,cast(`a`.`dtStartTime` as date) AS `dtStartTime`,`c`.`txtEmpName` AS `txtEmpName` from ((`trn_log_blank_cutting` `a` join `mst_hot_die_steel` `b` on((`a`.`txtLogNo` = `b`.`txtLogNo`))) join `mst_employee` `c` on((`a`.`txtOperatorCode` = `c`.`txtEmpNo`))) where (`a`.`numFinishLength` > 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_toolroomlogsheet`
--

/*!50001 DROP VIEW IF EXISTS `v_toolroomlogsheet`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_toolroomlogsheet` AS select `a`.`txtDieNo` AS `txtDieNo`,`b`.`txtEmpName` AS `txtEmpName`,cast(`a`.`dtStartTime` as date) AS `dtStartTime`,`a`.`txtShift` AS `txtShift`,`a`.`txtComponent` AS `txtComponent`,`c`.`txtMachineName` AS `txtMachineName`,`d`.`txtOperName` AS `txtOperName`,`a`.`numEstTime` AS `numEstTime`,cast(`a`.`dtStartTime` as time) AS `EtartTime`,cast(`a`.`dtEndTime` as time) AS `EndTime`,`a`.`NumSettingTime` AS `NumSettingTime`,`a`.`NumUnloadingTime` AS `NumUnloadingTime`,`a`.`numBrkdHrs` AS `numBrkdHrs`,abs((round((timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) / 3600),2) - ((`a`.`NumSettingTime` + `a`.`NumUnloadingTime`) + ifnull(`a`.`numBrkdHrs`,0)))) AS `RunningHours` from (((`trn_trlogsheet` `a` join `mst_employee` `b` on((`a`.`txtOperatorCode` = `b`.`txtEmpNo`))) join `mst_machine` `c` on((`a`.`txtWorkStation` = `c`.`txtMachineNo`))) join `mst_const_oper` `d` on((`a`.`txtOperationCode` = `d`.`txtOperCode`))) order by cast(`a`.`dtStartTime` as date),cast(`a`.`dtStartTime` as time) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `report_diecuttingorder`
--

/*!50001 DROP VIEW IF EXISTS `report_diecuttingorder`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `report_diecuttingorder` AS select `trn_log_blank_cutting`.`dtStartTime` AS `dtStartTime`,`mst_die`.`txtSectionNo` AS `txtSectionNo`,`trn_log_blank_cutting`.`txtDieNo` AS `txtDieNo`,`trn_log_blank_cutting`.`txtCompCode` AS `txtCompCode`,`mst_const_diecomp`.`txtDieCompName` AS `txtDieCompName`,`trn_log_blank_cutting`.`txtLogNo` AS `txtLogNo`,`trn_log_blank_cutting`.`numCuttingLength` AS `numCuttingLength`,NULL AS `txtRemarks` from ((`trn_log_blank_cutting` join `mst_const_diecomp` on((`trn_log_blank_cutting`.`txtCompCode` = `mst_const_diecomp`.`txtDieCompCode`))) join `mst_die` on((`trn_log_blank_cutting`.`txtDieNo` = `mst_die`.`txtDieNo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_secdieview_oftake`
--

/*!50001 DROP VIEW IF EXISTS `v_secdieview_oftake`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_secdieview_oftake` AS select cast(`c`.`dtLogDate` as date) AS `dtStartTime`,`b`.`txtSectionNo` AS `txtSectionNo`,`b`.`txtSectionDesc` AS `txtSectionDesc`,`b`.`txtIdentificationNo` AS `txtIdentificationNo`,(case when (`b`.`txtTypeOfSection` = 'H') then 'Hollow' else 'Solid' end) AS `txtProfile`,round(sum((case when (`c`.`txtPress` = 'P1') then `c`.`numOutputWt` else 0 end)),0) AS `Output_P1`,round(sum((case when (`c`.`txtPress` = 'P2') then `c`.`numOutputWt` else 0 end)),0) AS `Output_P2`,round(sum((case when (`c`.`txtPress` = 'P3') then `c`.`numOutputWt` else 0 end)),0) AS `Output_P3`,round(sum(ifnull(`c`.`numOutputWt`,0)),0) AS `TotalOutput`,sum(`c`.`numRunningHour`) AS `numRunningHour`,round((sum(ifnull(`c`.`numOutputWt`,0)) / sum(`c`.`numRunningHour`)),0) AS `outputrate` from ((`mst_die` `a` join `mst_section` `b` on((`a`.`txtSectionNo` = `b`.`txtSectionNo`))) left join (select `a`.`dtLogDate` AS `dtLogDate`,`a`.`txtDieNo` AS `txtDieNo`,`b`.`txtSectionNo` AS `txtSectionNo`,`a`.`txtPress` AS `txtPress`,sum(`a`.`numOutputWt`) AS `numOutputWt`,sum(`a`.`numRunningHour`) AS `numRunningHour` from (`trn_prod_logsheet` `a` join `mst_die` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) group by `b`.`txtSectionNo`,`a`.`dtLogDate`,`a`.`txtDieNo`) `c` on(((`c`.`txtSectionNo` = `a`.`txtSectionNo`) and (`c`.`txtDieNo` = `a`.`txtDieNo`)))) group by `b`.`txtSectionNo`,`b`.`txtSectionDesc`,cast(`c`.`dtLogDate` as date),`b`.`txtIdentificationNo`,(case when (`b`.`txtTypeOfSection` = 'H') then 'Hollow' else 'Solid' end) order by `b`.`txtSectionNo`,`b`.`txtSectionDesc`,`a`.`txtPress` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `report_diewisemanufacturing`
--

/*!50001 DROP VIEW IF EXISTS `report_diewisemanufacturing`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `report_diewisemanufacturing` AS select `mst_die`.`txtDieNo` AS `txtDieNo`,`trn_log_blank_cutting`.`txtShift` AS `txtShift`,`trn_log_blank_cutting`.`txtCompCode` AS `txtCompCode`,`mst_const_diecomp`.`txtDieCompName` AS `txtDieCompName`,`trn_trlogsheet`.`txtOperationCode` AS `txtOperationCode`,`trn_log_blank_cutting`.`txtLogNo` AS `txtLogNo`,`mst_die`.`txtMfgBy` AS `txtMfgBy`,`trn_log_blank_cutting`.`numCuttingLength` AS `numCuttingLength`,`mst_die`.`numLastRunWt` AS `numLastRunWt`,`trn_log_blank_cutting`.`dtStartTime` AS `dtStartTime`,`trn_trlogsheet`.`txtOperatorCode` AS `txtOperatorCode`,`mst_employee`.`txtEmpName` AS `txtEmpName`,`mst_const_oper`.`txtOperName` AS `txtOperName` from (((((`mst_die` join `trn_log_blank_cutting` on((`mst_die`.`txtDieNo` = `trn_log_blank_cutting`.`txtDieNo`))) join `trn_trlogsheet` on((`trn_trlogsheet`.`fk_trnbclogsheet` = `trn_log_blank_cutting`.`pkTrnLogsheet`))) left join `mst_const_diecomp` on((`trn_log_blank_cutting`.`txtCompCode` = `mst_const_diecomp`.`txtDieCompCode`))) join `mst_employee` on((`trn_log_blank_cutting`.`txtOperatorCode` = `mst_employee`.`txtEmpNo`))) left join `mst_const_oper` on((`trn_trlogsheet`.`txtOperationCode` = `mst_const_oper`.`txtOperCode`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_rpt_hdsstock`
--

/*!50001 DROP VIEW IF EXISTS `v_rpt_hdsstock`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_rpt_hdsstock` AS select `mst_hot_die_steel`.`txtLogNo` AS `txtLogNo`,`mst_hot_die_steel`.`dtLogRecv` AS `dtLogRecv`,`mst_hot_die_steel`.`txtInvNo` AS `txtInvNo`,`mst_hot_die_steel`.`txtSuppName` AS `txtSuppName`,`mst_hot_die_steel`.`numDia` AS `numDia`,`mst_hot_die_steel`.`numLength` AS `numLength`,`mst_hot_die_steel`.`numLogWt` AS `numLogWt` from `mst_hot_die_steel` where (`mst_hot_die_steel`.`numLogWt` > 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vv_trn_prod_logsheet`
--

/*!50001 DROP VIEW IF EXISTS `vv_trn_prod_logsheet`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vv_trn_prod_logsheet` AS select `a`.`pkProdLogSheet` AS `pkProdLogSheet`,`a`.`txtPress` AS `txtPress`,cast(`a`.`dtLogDate` as date) AS `dtLogDate`,`a`.`txtShift` AS `txtShift`,`a`.`txtLotNo` AS `txtLotNo`,`a`.`txtDieNo` AS `txtDieNo`,`a`.`numCavity` AS `numCavity`,`a`.`txtQuenchMedia` AS `txtQuenchMedia`,`a`.`dtStartTime` AS `dtStartTime`,`a`.`dtEndTime` AS `dtEndTime`,`a`.`numRunningHour` AS `numRunningHour`,`a`.`txtCastNo` AS `txtCastNo`,`a`.`txtBilletAlloy` AS `txtBilletAlloy`,`a`.`numBilletTemp` AS `numBilletTemp`,`a`.`numBilletDia` AS `numBilletDia`,`a`.`numNoOfBillet` AS `numNoOfBillet`,`a`.`numInputWt` AS `numInputWt`,`a`.`numDischThick` AS `numDischThick`,`a`.`numCuttingLegth` AS `numCuttingLegth`,`a`.`numWtPerPc` AS `numWtPerPc`,`a`.`numNoOfGoodPcs` AS `numNoOfGoodPcs`,`a`.`numOutputWt` AS `numOutputWt`,`a`.`numRecovery` AS `numRecovery`,`a`.`numOutputPerHour` AS `numOutputPerHour`,`a`.`txtRemarks` AS `txtRemarks`,`a`.`numBilletLength` AS `numBilletLength`,`a`.`dtDateTime` AS `dtDateTime`,`a`.`txtProductionType` AS `txtProductionType`,ifnull(`a`.`numReasonCode`,0) AS `numReasonCode`,`b`.`txtReason` AS `txtReason` from (`trn_prod_logsheet` `a` left join `mst_cons_unload_reason` `b` on((`a`.`numReasonCode` = `b`.`numReasonCode`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `report_hotdiesteelcons`
--

/*!50001 DROP VIEW IF EXISTS `report_hotdiesteelcons`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `report_hotdiesteelcons` AS select `a`.`txtLogNo` AS `txtLogNo`,`e`.`numDia` AS `numDia`,`e`.`txtSuppName` AS `txtSuppName`,`a`.`txtCompCode` AS `txtCompCode`,`a`.`txtDieNo` AS `txtDieNo`,`d`.`txtDieCompName` AS `txtDieCompName`,`b`.`txtEmpName` AS `txtEmpName`,`a`.`txtShift` AS `txtShift`,`a`.`numCuttingLength` AS `numCuttingLength`,`a`.`dtStartTime` AS `dtStartTime`,`a`.`dtEndTime` AS `dtEndTime`,(case when (`a`.`txtReleaseFlag` = 'Y') then 'Yes' else 'No' end) AS `txtReleaseFlag` from ((((`trn_log_blank_cutting` `a` join `mst_employee` `b`) join `mst_const_shift` `c`) join `mst_const_diecomp` `d`) join `mst_hot_die_steel` `e` on(((`a`.`txtOperatorCode` = `b`.`txtEmpNo`) and (`a`.`txtShift` = `c`.`txtShiftCOde`) and (`a`.`txtCompCode` = `d`.`txtDieCompCode`) and (`a`.`txtLogNo` = `e`.`txtLogNo`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_toolroomlogsheet_misc`
--

/*!50001 DROP VIEW IF EXISTS `v_toolroomlogsheet_misc`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_toolroomlogsheet_misc` AS select `a`.`txtDieNo` AS `txtDieNo`,`b`.`txtEmpName` AS `txtEmpName`,cast(`a`.`dtStartTime` as date) AS `dtStartTime`,`a`.`txtShift` AS `txtShift`,`a`.`txtComponent` AS `txtComponent`,`c`.`txtMachineName` AS `txtMachineName`,`d`.`txtOperName` AS `txtOperName`,`a`.`numEstTime` AS `numEstTime`,cast(`a`.`dtStartTime` as time) AS `EtartTime`,cast(`a`.`dtEndTime` as time) AS `EndTime`,`a`.`NumSettingTime` AS `NumSettingTime`,`a`.`NumUnloadingTime` AS `NumUnloadingTime`,`a`.`numBrkdHrs` AS `numBrkdHrs`,abs((round((timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) / 3600),2) - ((`a`.`NumSettingTime` + `a`.`NumUnloadingTime`) + ifnull(`a`.`numBrkdHrs`,0)))) AS `RunningHours` from (((`trn_trlogsheet` `a` join `mst_employee` `b` on((`a`.`txtOperatorCode` = `b`.`txtEmpNo`))) join `mst_machine` `c` on((`a`.`txtWorkStation` = `c`.`txtMachineNo`))) join `mst_const_oper` `d` on((`a`.`txtOperationCode` = `d`.`txtOperCode`))) where (`a`.`txtOperationCode` in (9,10,25)) order by cast(`a`.`dtStartTime` as date),cast(`a`.`dtStartTime` as time) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_diecuttingorder`
--

/*!50001 DROP VIEW IF EXISTS `v_diecuttingorder`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_diecuttingorder` AS select cast(`a`.`dtStartTime` as date) AS `dtStartTime`,`b`.`txtSectionNo` AS `txtSectionNo`,`a`.`txtDieNo` AS `txtDieNo`,`b`.`txtPress` AS `txtPress`,`a`.`txtComponent` AS `txtComponent`,`a`.`txtLogNo` AS `txtLogNo`,`a`.`numFinishLength` AS `numFinishLength` from (`trn_log_blank_cutting` `a` join `mst_die` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) where (`a`.`dtStartTime` >= '2022-11-01') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `report_logsheet`
--

/*!50001 DROP VIEW IF EXISTS `report_logsheet`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `report_logsheet` AS select `trn_trlogsheet`.`pkTRLogsheet` AS `pkTRLogsheet`,`trn_log_blank_cutting`.`txtDieNo` AS `txtDieNo`,`mst_const_diecomp`.`txtDieCompName` AS `txtDieCompName`,`mst_const_oper`.`txtOperName` AS `txtOperName`,`mst_employee`.`txtEmpName` AS `txtEmpName`,`trn_trlogsheet`.`txtShift` AS `txtShift`,`trn_trlogsheet`.`txtWorkStation` AS `txtWorkStation`,`trn_trlogsheet`.`numEstTime` AS `numEstTime`,`trn_trlogsheet`.`dtStartTime` AS `dtStartTime`,`trn_trlogsheet`.`dtEndTime` AS `dtEndTime`,round((time_to_sec(timediff(`trn_trlogsheet`.`dtEndTime`,`trn_trlogsheet`.`dtStartTime`)) / 60),0) AS `TimeInMin`,`trn_trlogsheet`.`numBrkdHrs` AS `numBrkdHrs`,`trn_trlogsheet`.`txtHTFlag` AS `txtHTFlag`,`trn_trlogsheet`.`dtDateTime` AS `dtDateTime` from ((((`trn_trlogsheet` join `mst_employee` on((`trn_trlogsheet`.`txtOperatorCode` = `mst_employee`.`txtEmpNo`))) join `trn_log_blank_cutting` on((`trn_trlogsheet`.`fk_trnbclogsheet` = `trn_log_blank_cutting`.`pkTrnLogsheet`))) join `mst_const_diecomp` on((`trn_log_blank_cutting`.`txtCompCode` = `mst_const_diecomp`.`txtDieCompCode`))) join `mst_const_oper` on((`trn_trlogsheet`.`txtOperationCode` = `mst_const_oper`.`txtOperCode`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_monthly_okdiereport`
--

/*!50001 DROP VIEW IF EXISTS `v_monthly_okdiereport`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_monthly_okdiereport` AS select distinct `c`.`txtSectionNo` AS `txtSectionNo`,`c`.`txtSectionDesc` AS `txtSectionDesc`,`c`.`txtTypeOfSection` AS `txtTypeOfSection`,`a`.`txtDieNo` AS `txtDieNo`,`b`.`txtPress` AS `txtPress`,`b`.`NumCavity` AS `NumCavity`,`b`.`txtAlloy` AS `txtAlloy`,`e`.`dtTrialSent` AS `firsttrialdt`,`b`.`numEstTrial` AS `numEstTrial`,ifnull(`e`.`actualnotrial`,1) AS `actualnotrial`,ifnull(cast(`b`.`dtOkDate` as date),cast(`b`.`dtIssue` as date)) AS `dtStartTime` from ((((`mst_die_comp` `a` join `mst_die` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) join `mst_section` `c` on((`c`.`txtSectionNo` = `b`.`txtSectionNo`))) left join `trn_die_sent_trial` `d` on((`a`.`txtDieNo` = `d`.`txtDieNo`))) left join (select `trn_die_sent_trial`.`txtDieNo` AS `txtDieNo`,count(1) AS `actualnotrial`,min(`trn_die_sent_trial`.`dtTrialSent`) AS `dtTrialSent` from `trn_die_sent_trial` group by `trn_die_sent_trial`.`txtDieNo`) `e` on((`a`.`txtDieNo` = `e`.`txtDieNo`))) where (`b`.`txtDieStatus` = 'Ok') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_secdieview`
--

/*!50001 DROP VIEW IF EXISTS `v_secdieview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_secdieview` AS select `b`.`txtSectionNo` AS `txtSectionNo`,`b`.`txtSectionDesc` AS `txtSectionDesc`,sum((case when (`c`.`txtPress` = 'P1') then `c`.`numOutputWt` else 0 end)) AS `Output_P1`,sum((case when (`c`.`txtPress` = 'P2') then `c`.`numOutputWt` else 0 end)) AS `Output_P2`,sum((case when (`c`.`txtPress` = 'P3') then `c`.`numOutputWt` else 0 end)) AS `Output_P3`,sum(ifnull(`c`.`numOutputWt`,0)) AS `TotalOutput`,sum((case when ((`a`.`txtDieStatus` = 'OK') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `OKDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'OK') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `OKDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'OK') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `OKDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Under Manufacturing') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `MFGDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Under Manufacturing') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `MFGDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Under Manufacturing') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `MFGDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Manufacturing Complete') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `MFGCompDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Manufacturing Complete') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `MFGCompDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Manufacturing Complete') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `MFGCompDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Converted') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `ConvDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Converted') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `ConvDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Converted') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `ConvDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Rejected') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `RejDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Rejected') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `RejDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Rejected') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `RejDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Correction') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `CorrDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Correction') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `CorrDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Correction') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `CorrDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Under Trial') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `Under Trial DieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Under Trial') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `Under Trial DieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Under Trial') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `Under Trial DieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'New') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `NewDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'New') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `NewDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'New') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `NewDieCount_All`,count(distinct `c`.`txtDieNo`) AS `TotalCount` from ((`mst_die` `a` join `mst_section` `b` on((`a`.`txtSectionNo` = `b`.`txtSectionNo`))) left join (select `a`.`txtDieNo` AS `txtDieNo`,`b`.`txtSectionNo` AS `txtSectionNo`,`a`.`txtPress` AS `txtPress`,sum(`a`.`numOutputWt`) AS `numOutputWt` from (`trn_prod_logsheet` `a` join `mst_die` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) group by `b`.`txtSectionNo`,`a`.`dtLogDate`,`a`.`txtDieNo`) `c` on(((`c`.`txtSectionNo` = `a`.`txtSectionNo`) and (`c`.`txtDieNo` = `a`.`txtDieNo`)))) group by `b`.`txtSectionNo`,`b`.`txtSectionDesc` order by `b`.`txtSectionNo`,`b`.`txtSectionDesc` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_dieoutputdet`
--

/*!50001 DROP VIEW IF EXISTS `v_dieoutputdet`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_dieoutputdet` AS select `trn_prod_logsheet`.`txtDieNo` AS `txtDieNo`,sum(`trn_prod_logsheet`.`numOutputWt`) AS `numOutputWt` from `trn_prod_logsheet` group by `trn_prod_logsheet`.`txtDieNo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_diewisemfg`
--

/*!50001 DROP VIEW IF EXISTS `v_diewisemfg`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_diewisemfg` AS select cast(`a`.`dtStartTime` as date) AS `dtStartTime`,`a`.`txtDieNo` AS `txtDieNo`,`c`.`txtDieCompName` AS `txtDieCompName`,`a`.`txtComponent` AS `txtComponent`,`a`.`txtShift` AS `txtShift`,`d`.`txtOperName` AS `txtOperName`,`e`.`txtEmpName` AS `txtEmpName`,`f`.`txtMachineName` AS `txtMachineName`,`a`.`numEstTime` AS `numEstTime`,abs(round(((timestampdiff(SECOND,`a`.`dtStartTime`,`a`.`dtEndTime`) / 3600) - (((ifnull(`a`.`NumSettingTime`,0) / 60) + ifnull(`a`.`NumUnloadingTime`,0)) + ifnull(`a`.`numBrkdHrs`,0))),2)) AS `Total_hours` from (((((`trn_trlogsheet` `a` join `mst_die_comp` `b` on((`a`.`txtComponent` = `b`.`txtCompName`))) join `mst_const_diecomp` `c` on((`c`.`txtDieCompCode` = `b`.`txtCompCode`))) join `mst_const_oper` `d` on((`d`.`txtOperCode` = `a`.`txtOperationCode`))) join `mst_employee` `e` on((`e`.`txtEmpNo` = `a`.`txtOperatorCode`))) join `mst_machine` `f` on((`f`.`txtMachineNo` = `a`.`txtWorkStation`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_monthly_convdiereport`
--

/*!50001 DROP VIEW IF EXISTS `v_monthly_convdiereport`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_monthly_convdiereport` AS select distinct year(`d`.`dtConvertDateDate`) AS `yearname`,monthname(`d`.`dtConvertDateDate`) AS `monname`,`c`.`txtSectionNo` AS `txtSectionNo`,`c`.`txtSectionDesc` AS `txtSectionDesc`,`c`.`txtTypeOfSection` AS `txtTypeOfSection`,`a`.`txtDieNo` AS `txtDieNo`,`b`.`txtPress` AS `txtPress`,`b`.`NumCavity` AS `NumCavity`,`b`.`txtAlloy` AS `txtAlloy`,`b`.`numInputTillDate` AS `numInputTillDate`,(`b`.`numInputTillDate` * 0.80) AS `numOnputTillDate`,`d`.`txtSectionNo` AS `convsecno`,`d`.`txtSectionDesc` AS `convsecdesc`,`d`.`NumCavity` AS `convcavity`,`d`.`txtPress` AS `convpress`,`d`.`txtDieNoConv` AS `txtDieNoConv`,`d`.`numInputTillDate` AS `convinput`,`d`.`numOnputTillDate` AS `convop`,cast(`d`.`dtConvertDateDate` as date) AS `dtStartTime` from (((`mst_die_comp` `a` join `mst_die` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) join `mst_section` `c` on((`c`.`txtSectionNo` = `b`.`txtSectionNo`))) join (select distinct `x`.`txtDieNo` AS `txtDieNo`,`x`.`txtDieNoConv` AS `txtDieNoConv`,`y`.`numInputTillDate` AS `numInputTillDate`,(`y`.`numInputTillDate` * 0.80) AS `numOnputTillDate`,`y`.`dtConvertDateDate` AS `dtConvertDateDate`,`y`.`txtPress` AS `txtPress`,`z`.`txtSectionNo` AS `txtSectionNo`,`z`.`txtSectionDesc` AS `txtSectionDesc`,`y`.`NumCavity` AS `NumCavity` from ((`trn_die_conversion` `x` join `mst_die` `y` on((`x`.`txtDieNoConv` = `y`.`txtDieNo`))) join `mst_section` `z` on((`z`.`txtSectionNo` = `y`.`txtSectionNo`)))) `d` on((`a`.`txtDieNo` = `d`.`txtDieNo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `report_hotdiesteelstock`
--

/*!50001 DROP VIEW IF EXISTS `report_hotdiesteelstock`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `report_hotdiesteelstock` AS select `mst_hot_die_steel`.`txtLogNo` AS `txtLogNo`,`mst_hot_die_steel`.`txtLogType` AS `txtLogType`,`mst_hot_die_steel`.`txtInvNo` AS `txtInvNo`,`mst_hot_die_steel`.`txtSuppName` AS `txtSuppName`,`mst_hot_die_steel`.`numDia` AS `numDia`,`mst_hot_die_steel`.`numLength` AS `numLength`,`mst_hot_die_steel`.`numLogWt` AS `numLogWt`,`mst_hot_die_steel`.`dtLogRecv` AS `dtLogRecv`,NULL AS `txtRemarks` from `mst_hot_die_steel` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_productionlogsheet`
--

/*!50001 DROP VIEW IF EXISTS `v_productionlogsheet`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_productionlogsheet` AS select `d`.`txtSectionNo` AS `txtSectionNo`,`d`.`txtSectionDesc` AS `txtSectionDesc`,`a`.`txtPress` AS `txtPress`,`a`.`txtShift` AS `txtShift`,cast(`a`.`dtLogDate` as date) AS `dtStartTime`,`a`.`txtDieNo` AS `txtDieNo`,`a`.`numCavity` AS `numCavity`,`a`.`txtQuenchMedia` AS `txtQuenchMedia`,`a`.`numRunningHour` AS `numRunningHour`,`a`.`txtBilletAlloy` AS `txtBilletAlloy`,`a`.`numBilletLength` AS `numBilletLength`,`a`.`numNoOfBillet` AS `numNoOfBillet`,`a`.`numInputWt` AS `numInputWt`,`a`.`numCuttingLegth` AS `numCuttingLegth`,`a`.`numWtPerPc` AS `numWtPerPc`,`a`.`numNoOfGoodPcs` AS `numNoOfGoodPcs`,`a`.`numOutputWt` AS `numOutputWt`,`a`.`numRecovery` AS `numRecovery`,`a`.`numOutputPerHour` AS `numOutputPerHour`,`b`.`txtReason` AS `txtReason`,`a`.`txtRemarks` AS `txtRemarks` from (((`trn_prod_logsheet` `a` join `mst_die` `c` on((`c`.`txtDieNo` = `a`.`txtDieNo`))) join `mst_section` `d` on((`d`.`txtSectionNo` = `c`.`txtSectionNo`))) join `mst_cons_unload_reason` `b` on((`a`.`numReasonCode` = `b`.`numReasonCode`))) order by `a`.`dtLogDate` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_secdieviewdatewise`
--

/*!50001 DROP VIEW IF EXISTS `v_secdieviewdatewise`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_secdieviewdatewise` AS select cast(`c`.`dtLogDate` as date) AS `dtStartTime`,`b`.`txtSectionNo` AS `txtSectionNo`,`b`.`txtSectionDesc` AS `txtSectionDesc`,sum((case when (`c`.`txtPress` = 'P1') then `c`.`numOutputWt` else 0 end)) AS `Output_P1`,sum((case when (`c`.`txtPress` = 'P2') then `c`.`numOutputWt` else 0 end)) AS `Output_P2`,sum((case when (`c`.`txtPress` = 'P3') then `c`.`numOutputWt` else 0 end)) AS `Output_P3`,sum(ifnull(`c`.`numOutputWt`,0)) AS `TotalOutput`,sum((case when ((`a`.`txtDieStatus` = 'OK') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `OKDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'OK') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `OKDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'OK') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `OKDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Under Manufacturing') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `MFGDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Under Manufacturing') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `MFGDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Under Manufacturing') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `MFGDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Manufacturing Complete') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `MFGCompDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Manufacturing Complete') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `MFGCompDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Manufacturing Complete') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `MFGCompDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Converted') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `ConvDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Converted') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `ConvDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Converted') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `ConvDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Rejected') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `RejDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Rejected') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `RejDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Rejected') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `RejDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Correction') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `CorrDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Correction') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `CorrDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Correction') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `CorrDieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'Under Trial') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `Under Trial DieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'Under Trial') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `Under Trial DieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'Under Trial') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `Under Trial DieCount_All`,sum((case when ((`a`.`txtDieStatus` = 'New') and (`a`.`txtPress` = 'P1/P3')) then 1 else 0 end)) AS `NewDieCount_P1P3`,sum((case when ((`a`.`txtDieStatus` = 'New') and (`a`.`txtPress` = 'P2')) then 1 else 0 end)) AS `NewDieCount_P2`,sum((case when ((`a`.`txtDieStatus` = 'New') and (`a`.`txtPress` = 'P1/P2/P3')) then 1 else 0 end)) AS `NewDieCount_All` from ((`mst_die` `a` join `mst_section` `b` on((`a`.`txtSectionNo` = `b`.`txtSectionNo`))) left join (select `a`.`dtLogDate` AS `dtLogDate`,`a`.`txtDieNo` AS `txtDieNo`,`b`.`txtSectionNo` AS `txtSectionNo`,`a`.`txtPress` AS `txtPress`,sum(`a`.`numOutputWt`) AS `numOutputWt` from (`trn_prod_logsheet` `a` join `mst_die` `b` on((`a`.`txtDieNo` = `b`.`txtDieNo`))) group by `b`.`txtSectionNo`,`a`.`dtLogDate`,`a`.`txtDieNo`) `c` on(((`c`.`txtSectionNo` = `a`.`txtSectionNo`) and (`c`.`txtDieNo` = `a`.`txtDieNo`)))) group by `b`.`txtSectionNo`,`b`.`txtSectionDesc`,`a`.`txtPress`,cast(`c`.`dtLogDate` as date) order by `b`.`txtSectionNo`,`b`.`txtSectionDesc`,`a`.`txtPress` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_trn_prod_logsheet`
--

/*!50001 DROP VIEW IF EXISTS `v_trn_prod_logsheet`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_trn_prod_logsheet` AS select `a`.`pkProdLogSheet` AS `pkProdLogSheet`,`a`.`txtPress` AS `txtPress`,`a`.`dtLogDate` AS `dtLogDate`,`a`.`txtShift` AS `txtShift`,`a`.`txtLotNo` AS `txtLotNo`,`a`.`txtDieNo` AS `txtDieNo`,`a`.`numCavity` AS `numCavity`,`a`.`txtQuenchMedia` AS `txtQuenchMedia`,`a`.`dtStartTime` AS `dtStartTime`,`a`.`dtEndTime` AS `dtEndTime`,`a`.`numRunningHour` AS `numRunningHour`,`a`.`txtCastNo` AS `txtCastNo`,`a`.`txtBilletAlloy` AS `txtBilletAlloy`,`a`.`numBilletTemp` AS `numBilletTemp`,`a`.`numBilletDia` AS `numBilletDia`,`a`.`numNoOfBillet` AS `numNoOfBillet`,`a`.`numInputWt` AS `numInputWt`,`a`.`numDischThick` AS `numDischThick`,`a`.`numCuttingLegth` AS `numCuttingLegth`,`a`.`numWtPerPc` AS `numWtPerPc`,`a`.`numNoOfGoodPcs` AS `numNoOfGoodPcs`,`a`.`numOutputWt` AS `numOutputWt`,`a`.`numRecovery` AS `numRecovery`,`a`.`numOutputPerHour` AS `numOutputPerHour`,`a`.`txtRemarks` AS `txtRemarks`,`a`.`numBilletLength` AS `numBilletLength`,`a`.`dtDateTime` AS `dtDateTime`,`a`.`txtProductionType` AS `txtProductionType`,ifnull(`a`.`numReasonCode`,0) AS `numReasonCode`,ifnull(`b`.`txtReason`,'--Select--') AS `txtReason` from (`trn_prod_logsheet` `a` left join `mst_cons_unload_reason` `b` on((`a`.`numReasonCode` = `b`.`numReasonCode`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `report_heattreatment`
--

/*!50001 DROP VIEW IF EXISTS `report_heattreatment`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `report_heattreatment` AS select `a`.`dtRecvDate` AS `dtRecvDate`,`a`.`dtSentDate` AS `dtSentDate`,`a`.`txtDieNo` AS `txtDieNo`,`a`.`txtCompCode` AS `txtCompCode`,`a`.`txtCompCode` AS `txtDieCompName`,`b`.`txtLogNo` AS `txtLogNo` from (`trn_heattreatment` `a` left join `trn_log_blank_cutting` `b` on(((`a`.`txtDieNo` = `b`.`txtDieNo`) and (`a`.`txtCompCode` = `b`.`txtComponent`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping events for database 'alpro_prod'
--

--
-- Dumping routines for database 'alpro_prod'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 18:05:10
