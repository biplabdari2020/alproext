<?php
    include('checkSession.php');
    include('UserDefinedLibrary.php');
    $txtMachineNo=$_GET['id'];  
    $delete_query = "Delete from alpro_prod.mst_machine where txtMachineNo = '$txtMachineNo'";
    //echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/MasterMachineView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
?>