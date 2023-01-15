<?php
include('checkSession.php');
include('UserDefinedLibrary.php');

$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];
$pkTrnLogsheet = generatePk('BC','trn_log_blank_cutting_temp','pkTrnLogsheet');

if (isset($_POST['Add'])){
    echo("<br>SUBMITTED<br>");   
    // echo ("<br>".$_POST['pkTrnLogsheet']."<br>");
    echo ("<br>".$_POST['txtLogNo']."<br>");
    echo ("<br>".$_POST['txtOperatorCode']."<br>");
    echo ("<br>".$_POST['txtShift']."<br>");
    echo ("<br>".$_POST['numCuttingLength']."<br>");
    echo ("<br>".$_POST['dtStartTime']."<br>");
    echo ("<br>".$_POST['dtEndTime']."<br>");
    echo ("<br>".$_POST['txtReleaseFlag']."<br>");
    // $pkTrnLogsheet = $_POST['pkTrnLogsheet'];
    $txtLogNo           =   $_POST['txtLogNo'];
    $txtOperatorCode    =   $_POST['txtOperatorCode'];
    $txtShift           =   $_POST['txtShift'];
    $numCuttingLength   =   $_POST['numCuttingLength'];
    $numCuttingTolerence   =   $_POST['numCuttingTolerence'];
    $numFinishLength   =   $_POST['numFinishLength'];
    $dtStartTime        =   $_POST['dtStartTime'];
    
    if ($dtStartTime=='') {        
        $dtStartTime = "NULL";
    }
    else {
        $dtStartTime = "'".$dtStartTime."'";
    }
    $dtEndTime        =   $_POST['dtEndTime'];
    if ($dtEndTime=='') {        
        $dtEndTime = "NULL";
    }
    else {
        $dtEndTime = "'".$dtEndTime."'";
    }
    $txtReleaseFlag = $_POST['txtReleaseFlag'];
	$txtdieno = $_POST['txtDieNo'];
    $txtDieCompCode = $_POST['txtDieCompCode'];
    $insert_qry ="INSERT INTO alpro_prod.trn_log_blank_cutting_temp (pkTrnLogsheet, txtLogNo, txtOperatorCode, txtShift, numCuttingLength, dtStartTime, dtEndTime, txtReleaseFlag,txtUserCode,txtdieno,txtCompCode,txtSessionId,numCuttingTolerence,numFinishLength) VALUES ('$pkTrnLogsheet','$txtLogNo','$txtOperatorCode','$txtShift',$numCuttingLength,$dtStartTime,$dtEndTime,'$txtReleaseFlag','$txtUserCode','$txtdieno','$txtDieCompCode','$txtSessionId',$numCuttingTolerence,$numFinishLength)";
    echo $insert_qry ;

    // $update_qry = "update alpro_prod.mst_section set txtIdentificationNo = '".$_POST['txtIdentificationNo']."',txtSectionDesc='".$_POST['txtSectionDesc']."',txtNormalWt='".$_POST['txtNormalWt']."',txtMaxWtRange='".$_POST['txtMaxWtRange']."', txtMinWtRange='".$_POST['txtMinWtRange']."',dtDateTime = now() where txtSectionNo = '".$_POST['txtSectionNo']."'";
    // //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($insert_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    else{
		header("Location: ../php/TrnBlankCuttingEntry.php");
	}
}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>
<!-- HTML -->