<?php
include('checkSession.php');
    include('UserDefinedLibrary.php');
    $txtTrialNo=$_GET['id'];
    //echo("<br>SUBMITTED<br>");   
    $delete_query = "Delete from alpro_prod.trn_die_sent_trial where txtTrialNo = '$txtTrialNo'";
    //echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/TrnDieSentForTrialView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
    
?>