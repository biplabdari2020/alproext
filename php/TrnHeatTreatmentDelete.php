<?php
include('checkSession.php');
    include('UserDefinedLibrary.php');
    $pk_HeatTrtID=$_GET['id'];
    //echo("<br>SUBMITTED<br>");   
    $delete_query = "Delete from alpro_prod.trn_heattreatment where pk_HeatTrtID = '$pk_HeatTrtID'";
    //echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/TrnHeatTreatmentEntry.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
    
?>