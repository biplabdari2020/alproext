<?php
include('checkSession.php');
    include('UserDefinedLibrary.php');
    $txtDieNo=$_GET['id'];
    //echo("<br>SUBMITTED<br>");   
    $delete_query = "Delete from alpro_prod.trn_mfg_complete where txtDieNo = '$txtDieNo'";
    //echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/TrnManufacturingCompleteView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
    
?>