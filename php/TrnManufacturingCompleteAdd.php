<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
//$pkSentTrial = generatePk('ST','trn_log_blank_cutting','pkTrnLogsheet');

if (isset($_POST['Add'])){
    
    
    $txtDieNo = $_POST['txtDieNo'];
    $txtComponent           =   $_POST['txtComponent'];
    $txtCompleteFlag    =   $_POST['txtCompleteFlag'];
    $txtSessionId = $_POST['txtSessionId'];
    //echo $numCompWt  ;
    $insert_qry ="INSERT INTO alpro_prod.trn_mfg_complete_tmp (txtDieNo, txtComponent, txtCompleteFlag,txtSessionId) VALUES ('$txtDieNo','$txtComponent','$txtCompleteFlag','$txtSessionId')";
    //echo $insert_qry;
    $execute_status = executeQuery($insert_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    else{
		header("Location: ../php/TrnManufacturingCompleteEntry.php");
	}
}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>
<!-- HTML -->