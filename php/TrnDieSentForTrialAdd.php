<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$pkSentTrial = generatePk('ST','trn_log_blank_cutting','pkTrnLogsheet');

if (isset($_POST['Submit'])){
    echo("<br>SUBMITTED<br>");   
    echo ("<br>".$_POST['pkSentTrial']."<br>");
    echo ("<br>".$_POST['txtDieNo']."<br>");
    echo ("<br>".$_POST['dtTrialSent']."<br>");
    echo ("<br>".$_POST['dtTrialEnd']."<br>");
    echo ("<br>".$_POST['txtStatus']."<br>");
    echo ("<br>".$_POST['txtRemarks']."<br>");
    
    $pkSentTrial = $_POST['pkSentTrial'];
    $txtDieNo           =   $_POST['txtDieNo'];
    $dtTrialSent    =   $_POST['dtTrialSent'];
    $dtTrialEnd           =   $_POST['dtTrialEnd'];
    $txtStatus   =   $_POST['txtStatus'];
    $txtRemarks        =   $_POST['txtRemarks'];
    
    if ($dtTrialEnd=='') {        
        $dtTrialEnd = "NULL";
    }
    else {
        $dtTrialEnd = "'".$dtTrialEnd."'";
    }
    if ($txtStatus=="1") {
        $txtStatus="5";
    }
    $insert_qry ="INSERT INTO alpro_prod.trn_die_sent_trial (txtTrialNo, txtDieNo, dtTrialSent, dtTrialEnd, txtStatus, txtRemarks) VALUES ('$pkSentTrial','$txtDieNo','$dtTrialSent',$dtTrialEnd,'$txtStatus','$txtRemarks')";
    //echo $insert_qry ;

    // $update_qry = "update alpro_prod.mst_section set txtIdentificationNo = '".$_POST['txtIdentificationNo']."',txtSectionDesc='".$_POST['txtSectionDesc']."',txtNormalWt='".$_POST['txtNormalWt']."',txtMaxWtRange='".$_POST['txtMaxWtRange']."', txtMinWtRange='".$_POST['txtMinWtRange']."',dtDateTime = now() where txtSectionNo = '".$_POST['txtSectionNo']."'";
    // //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($insert_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    else{
		header("Location: ../php/TrnDieSentForTrialView.php");
	}
}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>
<!-- HTML -->