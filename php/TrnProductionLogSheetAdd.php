<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
if (isset($_POST['Submit'])){
    echo("<br>SUBMITTED<br>");   
    echo ("<br>".$_POST['pkProdLogSheet']."<br>");
   // echo ("<br>".$_POST['txtOperatorCode']."<br>");
   // echo ("<br>".$_POST['txtShift']."<br>");
   // echo ("<br>".$_POST['dtEndTime']."<br>");
    $pkProdLogSheet = $_POST['pkProdLogSheet'];
    $txtPress = $_POST['txtPress'];
    $txtShift           =   $_POST['txtShift'];
    $dtLogDate	=	$_POST['dtLogDate'];
	$txtDieNo = $_POST['txtDieNo'];
    $numCavity = $_POST['numCavity'];
	$txtQuenchMedia	=	$_POST['txtQuenchMedia'];
	$dtStartTime        =   $_POST['dtStartTime'];
    $dtEndTime        =   $_POST['dtEndTime'];
    $numRunningHour   = $_POST['numRunningHour'];
    $txtLotNo   = $_POST['txtLotNo'];
    $txtBilletAlloy         = $_POST['txtBilletAlloy'];
    $txtCastNo         = $_POST['txtCastNo'];
    $numBilletTemp        =   $_POST['numBilletTemp'];
	$numBilletDia	=$_POST['numBilletDia'];
	$numBilletLengt	=$_POST['numBilletLength'];
    $numNoOfBillet        =   $_POST['numNoOfBillet'];
	$numInputWt        =   $_POST['numInputWt'];
    $numDischThick        =   $_POST['numDischThick'];
    $numCuttingLegth        =   $_POST['numCuttingLegth'];
    $numWtPerPc        =   $_POST['numWtPerPc'];

    $numNoOfGoodPcs        =   $_POST['numNoOfGoodPcs'];
    $numOutputWt        =   $_POST['numOutputWt'];
    $numRecovery        =   $_POST['numRecovery'];
    $numOutputPerHour = $_POST['numOutputPerHour'];
    $unloadreasoncode = $_POST['numReasonCode'];    
    $txtRemarks = $_POST['txtRemarks'];
    $txtProductionType = $_POST['txtProductionType'];
    
    $insert_qry ="INSERT INTO alpro_prod.trn_prod_logsheet (pkProdLogSheet, txtPress, dtLogDate, txtShift, txtLotNo, txtDieNo, numCavity, txtQuenchMedia, dtStartTime, dtEndTime, numRunningHour, txtCastNo, txtBilletAlloy, numBilletTemp, numBilletDia,numBilletLength, numNoOfBillet, numInputWt, numDischThick, numCuttingLegth, numWtPerPc, numNoOfGoodPcs, numOutputWt, numRecovery, numOutputPerHour, numReasonCode,txtRemarks,txtProductionType) VALUES ('$pkProdLogSheet','$txtPress', '$dtLogDate', '$txtShift', '$txtLotNo', '$txtDieNo', '$numCavity', '$txtQuenchMedia', '$dtStartTime', '$dtEndTime', '$numRunningHour', '$txtCastNo', '$txtBilletAlloy', '$numBilletTemp', '$numBilletDia','$numBilletLengt', '$numNoOfBillet', '$numInputWt', '$numDischThick', '$numCuttingLegth', '$numWtPerPc', '$numNoOfGoodPcs','$numOutputWt', '$numRecovery', '$numOutputPerHour', '$unloadreasoncode','$txtRemarks','$txtProductionType')";
    echo $insert_qry ;

    // $update_qry = "update alpro_prod.mst_section set txtIdentificationNo = '".$_POST['txtIdentificationNo']."',txtSectionDesc='".$_POST['txtSectionDesc']."',txtNormalWt='".$_POST['txtNormalWt']."',txtMaxWtRange='".$_POST['txtMaxWtRange']."', txtMinWtRange='".$_POST['txtMinWtRange']."',dtDateTime = now() where txtSectionNo = '".$_POST['txtSectionNo']."'";
    // //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($insert_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    else{
		header("Location: ../php/TrnProductionLogSheetEntry.php");  
	}

}
else{
    echo("<br>Not SUBMITTED<br>");
}

?>

<!-- HTML -->


