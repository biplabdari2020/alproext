<?php
include('checkSession.php');
    include('UserDefinedLibrary.php');
    $pkTrnLogsheet=$_GET['id'];
    //echo("<br>SUBMITTED<br>");   
    $delete_query = "Delete from alpro_prod.trn_log_blank_cutting where pkTrnLogsheet = '$pkTrnLogsheet'";
    //echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/TrnBlankCuttingView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
    
?>