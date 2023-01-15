<?php
include('checkSession.php');
include('UserDefinedLibrary.php');

$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];

if (isset($_POST['Add'])){
    echo("<br>SUBMITTED<br>");   
    echo ("<br>".$_POST['pkTRLogsheet']."<br>");
    echo ("<br>".$_POST['txtOperatorCode']."<br>");
    echo ("<br>".$_POST['txtShift']."<br>");
    echo ("<br>".$_POST['dtEndTime']."<br>");
    $pkTRLogsheet = generatePk('TR','trn_trlogsheet_temp','pkTRLogsheet');
    //$pkTRLogsheet = "";
	$fk_trnbclogsheet = $_POST['txtBCSrl'];
	$txtOperatorCode    =   $_POST['txtOperatorCode'];
    $txtShift           =   $_POST['txtShift'];
    $txtOperationCode   =   $_POST['txtOperation'];
    $txtWorkStation        =   $_POST['txtWorkStation'];
	$txtDieNo  = $_POST['txtDieNo'];
    $txtCompCode  = $_POST['txtCompCode'];
    $numEstTime	=$_POST['numEstTime'];
    if ($numEstTime=='') {        
        $numEstTime = "NULL";
    }
    else {
        $numEstTime = "'".$numEstTime."'";
    }

	
	$numBrkdHrs	=	$_POST['numBrkdHrs'];
    if ($numBrkdHrs=='') {        
        $numBrkdHrs = "NULL";
    }
    else {
        $numBrkdHrs = "'".$numBrkdHrs."'";
    }
    
    $dtStartTime        =   $_POST['dtStartTime'];
    if ($dtStartTime=='') {        
        $dtStartTime = "NULL";
    }
    else {
        $dtStartTime = "'".$dtStartTime."'";
    }
    $dtEndTime	=	$_POST['dtEndTime'];

    $dtEndTime        =   $_POST['dtEndTime'];
    if ($dtEndTime=='') {        
        $dtEndTime = "NULL";
    }
    else {
        $dtEndTime = "'".$dtEndTime."'";
    }
    

    $NumSettingTime = $_POST['NumSettingTime'];
    $NumUnloadingTime = $_POST['NumUnloadingTime'];

    $insert_qry ="INSERT INTO alpro_prod.trn_trlogsheet_temp (pkTRLogsheet,fk_trnbclogsheet,txtOperatorCode, txtShift, txtOperationCode, txtWorkStation, numEstTime, dtStartTime, dtEndTime, numBrkdHrs, txtUser, txtSessionID,txtDieNo,txtComponent,NumSettingTime,NumUnloadingTime) VALUES ('$pkTRLogsheet','$fk_trnbclogsheet','$txtOperatorCode','$txtShift','$txtOperationCode','$txtWorkStation',$numEstTime,$dtStartTime,$dtEndTime,$numBrkdHrs, '$txtUserCode', '$txtSessionId','$txtDieNo','$txtCompCode','$NumSettingTime','$NumUnloadingTime')";
    echo $insert_qry ;

    // $update_qry = "update alpro_prod.mst_section set txtIdentificationNo = '".$_POST['txtIdentificationNo']."',txtSectionDesc='".$_POST['txtSectionDesc']."',txtNormalWt='".$_POST['txtNormalWt']."',txtMaxWtRange='".$_POST['txtMaxWtRange']."', txtMinWtRange='".$_POST['txtMinWtRange']."',dtDateTime = now() where txtSectionNo = '".$_POST['txtSectionNo']."'";
    // //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($insert_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    else{
		header("Location: ../php/TrnTRLogsheetEntry.php");  
	}

}
else{
    echo("<br>Not SUBMITTED<br>");
}

?>

<!-- HTML -->


