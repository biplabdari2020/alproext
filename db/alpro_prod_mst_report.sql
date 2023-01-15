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
-- Table structure for table `mst_report`
--

DROP TABLE IF EXISTS `mst_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_report` (
  `txtName` varchar(100) NOT NULL,
  `txtReportHeader` varchar(1000) DEFAULT NULL,
  `txtColumnHeader` varchar(500) DEFAULT NULL,
  `txtViewQry` varchar(1000) DEFAULT NULL,
  `txtActive` varchar(2) DEFAULT NULL,
  `txtGetTotalColumn` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`txtName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_report`
--

LOCK TABLES `mst_report` WRITE;
/*!40000 ALTER TABLE `mst_report` DISABLE KEYS */;
INSERT INTO `mst_report` VALUES ('Die Cutting Order','Date, Section No,Die No,Press,Component,Log No,Length including Cutting Tolerance','dtStartTime, txtSectionNo, txtDieNo, txtPress, txtComponent, txtLogNo, numFinishLength','v_diecuttingorder','Y',NULL),('Die Manufacturing Status Report','Srl,Date,Section,Type Of Profile,Die No,Press,Cavity,Component,Cutting Order Releasing Date,Cutting,Turning,CNC Milling,Con. Milling,Heat treatment Sending Date,Heattreatment Receving Date,Surface grinding,CNC wire cut,EDM,Bench,Manufacturing complition Date','rownum,dtStartTime,txtSectionNo,txtTypeOfSection,txtDieNo,txtPress,NumCavity,txtComponent,CuttingRelDt,CuttingDt,Turning,CNCMilling,ConvMilling,HTSentDate,HTRecvDate,SurfaceGrinding,CNCWireCut,EDM,BenchWork,dtOkDate','v_diemfgstatus_report','Y',NULL),('Die Manufacturing Status Report(Hours)','Section,Section Description,Type Of Profile,Die No,Press,Cavity,Component,Hot Die Steel Cons (Kg.),Cutting Hr,Turning Hr,CNC Milling Hr,Conv. Milling Hr,HT Weight (Kg),Surface Grinding Hr,CNC Wire Cut Hr,EDM Hr,Bench Hr,Total Hr,Mfg Start Date','txtSectionNo,txtSectionDesc,txtTypeOfSection,txtDieNo,txtPress,NumCavity,txtComponent,comp_wt,CuttingHr,TurningHr,CNCMillingHr,ConvMillingHr,HTWt,SGHr,CNCWireCutHr,EDMHr,BenchHr,TotalHr,dtStartTime','v_diemfgstat_hr','Y','comp_wt,CuttingHr,TurningHr,CNCMillingHr,ConvMillingHr,HTWt,SGHr,CNCWireCutHr,EDMHr,BenchHr,TotalHr'),('Die Trial Requisition','Date,Section No,Die No,IB Details,Press,Cavity,No Of Trial,Remarks','dtStartTime, txtSectionNo, txtDieNo, txtCompName, txtPress, NumCavity,NoOfTrial,txtRemarks','v_die_trial_req','Y',NULL),('Die Wise Manufacturing','Die No,Component No,Name of the Component,Date,Shift,Operation,Name of the Operator,M/C no,Allocated Hours,Total Hours','txtDieNo,txtComponent,txtDieCompName,dtStartTime,txtShift,txtOperName,txtEmpName,txtMachineName,numEstTime,Total_hours','v_diewisemfg','Y',NULL),('Hot Die Steel Consumption Report','Log no,Log Received Dt,Log Dia (mm),Log Length (mm),Log Grade,Vendor Name,Component No,Cut Length (mm),Cut Weight (Kg),Date of Cutting,Cutting Operator Name','txtLogNo,dtLogRecv,numDia,numLength,txtMake,txtSuppName,txtComponent,numFinishLength,cutwt,dtStartTime,txtEmpName','v_rpt_hdsconsumption_daily','Y','cutwt'),('Hot Die Steel Stock Report','Log No, Date Of Purchase, Invoice No, Vendor Name,Log Dia (mm), Log Length (mm), Log Weight (Kg)','txtLogNo, dtLogRecv, txtInvNo, txtSuppName, numDia, numLength, numLogWt','v_rpt_hdsstock','Y','numLogWt'),('Monthly Die Conversion Report','Srl,Year,Month,Section,Section Description,Type Of Profile,Die No,Press,Cavity,Alloy,Total Input (Kg),Total Output (Kg),Converted Section,Converted Section Description,Converted Die Cavity,Converted Die Press,Converted Die,Converted Die Input Till Date (Kg),Converted Die Output Till Date (Kg), Conversion Date','rownum,yearname,monname,txtSectionNo,txtSectionDesc,txtTypeOfSection,txtDieNo,txtPress,NumCavity,txtAlloy,numInputTillDate,numOnputTillDate,convsecno,convsecdesc,convcavity,convpress,txtDieNoConv,convinput,convop,dtStartTime','v_monthly_convdiereport','Y','numInputTillDate,numOnputTillDate,convinput,convop'),('Monthly Die Manufacturing Details','Year,Month,Section,Section Description,Type of Profile,Die No,Component,Press,Cavity,Alloy,Mfg starting date,Die Sent for trial date,Start Date,End Date,Total Days Taken ','yearname,monname,txtSectionNo,txtSectionDesc,txtTypeOfSection,txtDieNo,txtComponent,txtPress,NumCavity,txtAlloy,mfg_startdt,dtTrialSent,dtStartTime,dtEndTime,days_taken','v_monthly_diemfgreport','Y','days_taken'),('Monthly Die Rejection Report','Srl,Year,Month,Section,Section Description,Type Of Profile,Die No,Log No,Log Type,Make,Press,Cavity,Alloy,Total Input (Kg),Total Output (Kg),Rejection Reason,Rejection Remarks, Rejected Date','rownum,yearname, monname, txtSectionNo, txtSectionDesc, txtTypeOfSection, txtDieNo,txtLogNo,txtLogType,txtMake, txtPress, NumCavity, txtAlloy, numInputTillDate, numOnputTillDate, txtRejectionReason, txtRemarks, dtStartTime','v_monthly_rejdiereport','Y',NULL),('Monthly OK Die Report','srl,Section,Section Description,Type Of Profile,Die No,Press,Cavity,Alloy,First Trial Date,Targeted No of Trial,Total Trail Taken,Date Of OK','rownum,txtSectionNo, txtSectionDesc, txtTypeOfSection, txtDieNo, txtPress, NumCavity, txtAlloy, firsttrialdt, numEstTrial, actualnotrial, dtStartTime','v_monthly_okdiereport','Y',NULL),('Production Logsheet Report','Section,Section Description,Press,Shift,Production Date,Die No,Cavity,Quanching Media,Running Hour,Alloy,Billet Length,No. of Billet,Input Weight,Cutting Length,Weight /Pcs.,Good Pcs.,Output Weight,Recovery%,Output Rate,Unload Reasons,Remarks','txtSectionNo,txtSectionDesc,txtPress, txtShift, dtStartTime, txtDieNo, numCavity, txtQuenchMedia, numRunningHour, txtBilletAlloy, numBilletLength, numNoOfBillet, numInputWt, numCuttingLegth, numWtPerPc, numNoOfGoodPcs, numOutputWt, numRecovery, numOutputPerHour, txtReason,txtRemarks','v_productionlogsheet','Y','numNoOfBillet,numInputWt,numNoOfGoodPcs, numOutputWt'),('Production Unloading Report','Press,Shift,Production Date,Die No,Cavity,Quanching Media,Running Hour,Alloy,Billet Length,No. of Billet,Input Weight,Cutting Length,Weight /Pcs.,Good Pcs.,Output Weight,Recovery%,Output Rate,Unload Reasons,Remarks','txtPress, txtShift, dtStartTime, txtDieNo, numCavity, txtQuenchMedia, numRunningHour, txtBilletAlloy, numBilletLength, numNoOfBillet, numInputWt, numCuttingLegth, numWtPerPc, numNoOfGoodPcs, numOutputWt, numRecovery, numOutputPerHour, txtReason,txtRemarks','v_productionlogsheet_u','Y','numNoOfBillet,numInputWt,numNoOfGoodPcs, numOutputWt'),('Section Wise Die Availability Report','Section,Section Description,OK P1P3,OK P2,OK All,Under MFG P1P3,Under MFG P2,Under MFG All,Under Trial P1P3,Under Trial P2,Under Trial All,Total','txtSectionNo,txtSectionDesc,OKDieCount_P1P3,OKDieCount_P2,OKDieCount_All,MFGDieCount_P1P3,MFGDieCount_P2,MFGDieCount_All,Under Trial DieCount_P1P3,Under Trial DieCount_P2,Under Trial DieCount_All,TotalCount','v_secdieview_1','Y',NULL),('ToolRoom Logsheet Report','Name of the operator,Date,Shift,Die No,Component No,Machine,Operation,Allocated Time,Start Time,End Time,Setting Time,Unloading time,Breakdown Time,Running Hrs','txtEmpName, dtStartTime, txtShift,txtDieNo,txtComponent, txtMachineName, txtOperName, numEstTime, EtartTime, EndTime, NumSettingTime, NumUnloadingTime, numBrkdHrs, RunningHours','v_toolroomlogsheet','Y',NULL),('ToolRoom Miscellaneous Logsheet Report','Name of the operator,Date,Shift,Die No,Component No,Machine,Operation,Allocated Time,Start Time,End Time,Setting Time,Unloading time,Breakdown Time,Running Hrs','txtEmpName, dtStartTime, txtShift,txtDieNo,txtComponent, txtMachineName, txtOperName, numEstTime, EtartTime, EndTime, NumSettingTime, NumUnloadingTime, numBrkdHrs, RunningHours','v_toolroomlogsheet_misc','Y','numBrkdHrs,RunningHours');
/*!40000 ALTER TABLE `mst_report` ENABLE KEYS */;
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
