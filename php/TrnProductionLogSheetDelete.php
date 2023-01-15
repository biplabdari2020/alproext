<?php
include('checkSession.php');
    include('UserDefinedLibrary.php');
    $pkProdLogSheet=$_GET['id'];
    //echo("<br>SUBMITTED<br>");   
    $delete_query = "Delete from alpro_prod.trn_prod_logsheet where pkProdLogSheet = '$pkProdLogSheet'";
    echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/TrnProductionLogSheetView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
    
?>