
<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
if (isset($_POST['Submit'])){
    echo("<br>SUBMITTED<br>");   
	//echo $pkTRLogsheet;
	echo "<br>";
    $update_qry = "update alpro_prod.trn_prod_logsheet set dtLogDate='".$_POST['dtLogDate']."', txtPress='".$_POST['txtPress']."', txtShift='".$_POST['txtShift']."', txtDieNo='".$_POST['txtDieNo']."', numCavity='".$_POST['numCavity']."', txtQuenchMedia='".$_POST['txtQuenchMedia']."', dtStartTime='".$_POST['dtStartTime']."', dtEndTime='".$_POST['dtEndTime']."', numRunningHour='".$_POST['numRunningHour']."', txtLotNo='".$_POST['txtLotNo']."', txtBilletAlloy='".$_POST['txtBilletAlloy']."', txtCastNo='".$_POST['txtCastNo']."', numBilletTemp='".$_POST['numBilletTemp']."', numBilletDia='".$_POST['numBilletDia']."', numBilletLength='".$_POST['numBilletLength']."', numNoOfBillet='".$_POST['numNoOfBillet']."', numInputWt='".$_POST['numInputWt']."', numDischThick='".$_POST['numDischThick']."', numCuttingLegth='".$_POST['numCuttingLegth']."', numWtPerPc='".$_POST['numWtPerPc']."', numNoOfGoodPcs='".$_POST['numNoOfGoodPcs']."', numOutputWt='".$_POST['numOutputWt']."', numRecovery='".$_POST['numRecovery']."', numOutputPerHour='".$_POST['numOutputPerHour']."',numReasonCode='".$_POST['numReasonCode']."', txtRemarks='".$_POST['txtRemarks']."',txtProductionType='".$_POST['txtProductionType']."',dtDateTime = now() where pkProdLogSheet = '".$_POST['pkProdLogSheet']."'";
    echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
    //    echo("<br>".$execute_status."<br>");
    }
    header("Location: ../php/TrnProductionLogSheetView.php");  

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>
