<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
//$pkSentTrial = generatePk('ST','trn_log_blank_cutting','pkTrnLogsheet');

if (isset($_POST['Complete'])){
    
    
    //$txtDieNo = $_POST['txtDieNo'];
    //$txtComponent           =   $_POST['txtComponent'];
    //$txtCompleteFlag    =   $_POST['txtCompleteFlag'];
    $txtSessionId = $_POST['txtSessionId'];
    //echo $numCompWt  ;
    $insert_qry ="INSERT INTO alpro_prod.trn_mfg_complete(txtDieNo, txtComponent, txtCompleteFlag) select txtDieNo, txtComponent, txtCompleteFlag from alpro_prod.trn_mfg_complete_tmp where txtSessionId = '".$txtSessionId."'";
    $delete_qry ="Delete from alpro_prod.trn_mfg_complete_tmp where txtSessionId = '".$txtSessionId."'";
     echo $insert_qry;
     echo $delete_qry;
    $execute_status = executeQuery($insert_qry);
    $execute_status = executeQuery($delete_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    else{
		header("Location: ../php/TrnManufacturingCompleteView.php");
	}
}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>
<!-- HTML -->