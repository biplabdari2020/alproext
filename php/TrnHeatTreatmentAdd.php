<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
//$pkSentTrial = generatePk('ST','trn_log_blank_cutting','pkTrnLogsheet');

if (isset($_POST['Add'])){
    
    
    $pk_HeatTrtID = $_POST['pk_HeatTrtID'];
    $txtDieNo           =   $_POST['txtDieNo'];
    $txtCompCode    =   $_POST['txtCompCode'];
    $dtSentDate           =   $_POST['dtSentDate'];
    $txtChallanNo = $_POST['txtChallanNo'];
    $txtSessionId = $_POST['txtSessionId'];
    if ($dtSentDate=='') {        
        $dtSentDate = "NULL";
    }
    else {
        $dtSentDate = "'".$dtSentDate."'";
    }
    $txtHTType   =   $_POST['txtHTType'];
    $dtRecvDate        =   $_POST['dtRecvDate'];
    if ($dtRecvDate=='') {        
        $dtRecvDate = "NULL";
    }
    else {
        $dtRecvDate = "'".$dtRecvDate."'";
    }
    $numFinalHardness           =   $_POST['numFinalHardness'];
    if ($numFinalHardness=='') {        
        $numFinalHardness = "NULL";
    }
    else {
        $numFinalHardness = "'".$numFinalHardness."'";
    }
    $txtVendor    =   $_POST['txtVendor'];
    $numCompWt           =   $_POST['numCompWt'];
    if ($numCompWt=='') {        
        $numCompWt = "NULL";
    }
    else {
        $numCompWt = "'".$numCompWt."'";
    }
    echo $numCompWt  ;
    $insert_qry ="INSERT INTO alpro_prod.trn_heattreatment_tmp (pk_HeatTrtID, txtDieNo, txtCompCode, dtSentDate, txtHTType, dtRecvDate, numFinalHardness, txtVendor, numCompWt,txtChallanNo,txtSessionId) VALUES ('$pk_HeatTrtID','$txtDieNo','$txtCompCode',$dtSentDate,'$txtHTType',$dtRecvDate,$numFinalHardness,'$txtVendor',$numCompWt,'$txtChallanNo','$txtSessionId')";
    echo $insert_qry ;

    // $update_qry = "update alpro_prod.mst_section set txtIdentificationNo = '".$_POST['txtIdentificationNo']."',txtSectionDesc='".$_POST['txtSectionDesc']."',txtNormalWt='".$_POST['txtNormalWt']."',txtMaxWtRange='".$_POST['txtMaxWtRange']."', txtMinWtRange='".$_POST['txtMinWtRange']."',dtDateTime = now() where txtSectionNo = '".$_POST['txtSectionNo']."'";
    // //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($insert_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    else{
		header("Location: ../php/TrnHeatTreatmentEntry.php");
	}
}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>
<!-- HTML -->